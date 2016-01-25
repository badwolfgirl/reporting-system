<?php
  class End_Of_Year extends CI_Controller {  

		public function __construct(){
			parent::__construct();  
			$this->load->model('login_mod','login',TRUE);            
			if(!$this->login->check_session()){
				redirect('/login?wrn='.urlencode('You are not logged in!'));
			}
			if(($this->session->userdata('adID') != '-1') && ($this->uri->segment(4) != $this->session->userdata('adID') && $this->uri->segment(4) != $this->session->userdata('alt_adID'))){
				redirect('?wrn='.urlencode('You are not authorized to view page!'));
			}
			
		}
		

    public function view_AD(){
			
			$adID 												= $this->uri->segment(4);
			$lastyear 										=  date("Y",strtotime("-1 year"));
			$prevyear 										=  date("Y",strtotime("-2 year"));
						
      $this->load->model('reports/end_of_year_mod');
			
			$areadev  										= $this->end_of_year_mod->get_AD($adID);

      $recognition  								= $this->end_of_year_mod->get_ad_yrend_recognition($adID, $lastyear);
      if($recognition != NULL) 
				$areadev[0]->recognition		= $recognition[0];
						
			$ex_where 										= "adID = ".$adID." && (year = '".$lastyear."' OR year = '".$prevyear."')";
      $expenses						 					= $this->end_of_year_mod->get_fran_yrend_expenses($adID, $ex_where);
			
      if($expenses != NULL) 
				$areadev[0]->expenses	  		= $expenses[0];
				
				//$this->functions->debug($areadev);
								
			$where 											  = 'reportADs LIKE "%|'.$adID.'|%"';
      $frans			  								= $this->end_of_year_mod->get_all_Franchisees($areadev[0]->franID, $where);
			$areadev[0]->frans						= $frans;
			
      if($frans != NULL){
				foreach($frans as $k => $fran){
					
					$checks										= $this->end_of_year_mod->get_ad_yrend_checks($fran->franID, $lastyear);
					
					$areadev[0]->frans[$k]->year						= $checks[0]->year;
					$areadev[0]->frans[$k]->meet_attended		= $checks[0]->meet_attended;
					$areadev[0]->frans[$k]->unit_check			= $checks[0]->unit_check;
					$areadev[0]->frans[$k]->comments				= $checks[0]->comments;
					
				}
				
			}			
			
			$output['areadev']						= $areadev;
	    $output['mainH1']							= '<a href="'.$this->config->item('base_url').'">COP Reporting</a>';
			$output['pageName']						= "AD End of the Year Worksheet - View";
      $output['mainh2']    					= "<strong>".$areadev[0]->special_sales_report_name."'s</strong> ".$year." End of the Year AD Worksheet";
      $output['sect1h3'] 						= "Section I: Recognition Event";
      $output['sect2h3'] 						= "Section II: ".$areadev[0]->expenses->year." Area Operating Expenses (no unit or tech info)";
      $output['sect3h3'] 						= "Section III: Franchisee Checklist";
			
			
			$this->load->view('common/header',$output);
			$this->load->view('reports/end_of_year_ad',$output);
			$this->load->view('common/footer',$output);
			
		}
		
    public function create_AD(){
			$today 				= date('Y-m-d');
			//MAKE SURE DATE IS CORRECT
			/*
			if(($this->session->userdata('adID') != '-1') && $dateOk == false){
				redirect('?wrn='.urlencode('You are not authorized to view page!'));
			}
			if($this->session->userdata('adID') != '-1'){
				redirect('?wrn='.urlencode('You are not authorized to view page!'));
			}*/
			
			$adID 																						= $this->uri->segment(4);
			
			$this->load->model('reports/end_of_year_mod');

			$output['areadev']  		  												= $this->end_of_year_mod->get_AD($adID);
			$output['franAD']  				  											= $this->end_of_year_mod->get_AD_Franchisee($output['areadev'][0]->franID);
			
			$where 											  										= 'reportADs LIKE "%|'.$adID.'|%"';
			$output['franchisees']  		  										= $this->end_of_year_mod->get_all_Franchisees($output['areadev'][0]->franID, $where);
			
			
			if(!isset($_POST['action'])){
				// DISPLAY THE SAVED DATA
				
				foreach($output['franchisees'] as $num => $fran){
					
					$saved_checks = $this->end_of_year_mod->get_yec_saved($fran->franID);
					
					if($saved_checks){
						$output['franchisees'][$num]->year 									= $saved_checks[0]->year;
						$output['franchisees'][$num]->meet_attended					= $saved_checks[0]->meet_attended;
						$output['franchisees'][$num]->unit_check						= $saved_checks[0]->unit_check;
						$output['franchisees'][$num]->comments							= $saved_checks[0]->comments;
					}else{
						$output['franchisees'][$num]->saved 								= 0;
					}
					
				}
				
				$output['yee_saves'] 			= $this->end_of_year_mod->get_yee_saved($adID);
				if(isset($output['yee_saves']) && $output['yee_saves'] == NULL)
						$output['yee_saves'][0]->saved											= 0;

				$output['yer_saves'] 			= $this->end_of_year_mod->get_yer_saved($adID);
				if(isset($output['yer_saves']) && $output['yer_saves'] == NULL)
						$output['yer_saves'][0]->saved											= 0;
				
				//$this->functions->debug($output);
				
			}
			
			if(isset($_POST['action']) && $_POST['action'] == 'Save Form'){
				$this->save();
			}else
			if(isset($_POST['action']) && $_POST['action'] == 'Submit Report'){
				
				$output['emailData'] = $_POST;
							
				if($_POST['total'] == '' || $_POST['total'] == '0.00'){
					$output['err'] = 'Failed to Submit! There must be a valid Sales Total amount!';
				}else{
					// INSERT RECOGNITIONS
					$recognition = array(
						'id'														=> '',
						'adID'     											=> $adID,
						'franID'  											=> $_POST['franID'],
						'year'													=> $_POST['year'],
						'submitted'    									=> $today,
						'recognition_meet'    					=> $_POST['recognition_meet'],
						'comments'    									=> urlencode($_POST['comments'])
					);
					
					// INSERT EXPENSES
					$expenses = array(
						'id'														=> '',
						'adID'     											=> $this->uri->segment(4),
						'franID'  											=> $_POST['franID'],
						'year'													=> $_POST['tax_year'],
						'submitted'    									=> $today,
						'royalty'    										=> str_replace(',', '', $_POST['royalty']),
						'insurance'    									=> str_replace(',', '', $_POST['insurance']),
						'billcoll'    									=> str_replace(',', '', $_POST['billcoll']),
						'fuel'    											=> str_replace(',', '', $_POST['fuel']),
						'maintenance'    								=> str_replace(',', '', $_POST['maintenance']),
						'cellphone'    									=> str_replace(',', '', $_POST['cellphone']),
						'officephone'    								=> str_replace(',', '', $_POST['officephone']),
						'officesupp'    								=> str_replace(',', '', $_POST['officesupp']),
						'bussmeetings'    							=> str_replace(',', '', $_POST['bussmeetings']),
						'zeerecognition'    						=> str_replace(',', '', $_POST['zeerecognition']),
						'adFund'    										=> str_replace(',', '', $_POST['adFund']),
						'localAd'    										=> str_replace(',', '', $_POST['localAd']),
						'licensefees'    								=> str_replace(',', '', $_POST['licensefees']),
						'busstax'    										=> str_replace(',', '', $_POST['busstax']),
						'paintsupp'    									=> str_replace(',', '', $_POST['paintsupp']),
						'labor'    											=> str_replace(',', '', $_POST['labor']),
						'vanexpense'    								=> str_replace(',', '', $_POST['vanexpense']),
						'uniform'    										=> str_replace(',', '', $_POST['uniform']),
						'payrolltax'    								=> str_replace(',', '', $_POST['payrolltax']),
						'other'    											=> str_replace(',', '', $_POST['other']),
						'total'    											=> str_replace(',', '', $_POST['total'])
					);
					// INSERT FRANCHISEE CHECKS
					$i=1;
					foreach($_POST['frans'] as $fran){
						$eachFran[$i] = array(
							'id'														=> '',
							'adID'     											=> $adID,
							'franID'  											=> $fran['franID'],
							'year'													=> $_POST['year'],
							'submitted'    									=> $today,
							'meet_attended'    							=> $fran['meet_attended'],
							'unit_check'    								=> $fran['unit_check'],
							'comments'    									=> urlencode($fran['comments'])
						);
						$i++;
					}
					
				}
				//$this->functions->debug($eachFran);
				
				if(!isset($output['err'])){			
											
					$insert['recognition']		= $this->db->insert('year_end_recognition', $recognition);
					$insert['expenses']				= $this->db->insert('year_end_expenses', $expenses);
					
					if($eachFran)
						$insert['checks'] 				= $this->db->insert_batch('year_end_checks', $eachFran);
					
					$this->db->delete('yec_saves', array('adID' => $_POST['adID']));
					$this->db->delete('yee_saves', array('adID' => $_POST['adID']));
					$this->db->delete('yer_saves', array('adID' => $_POST['adID']));
						
					$cleanEmails 							= 'admin@msharmonydesigns.com' . ', ';
															
					$output['subject']				= $output['areadev'][0]->region_office_name." End of the Year Worksheet";
					$output['mainh2']					= "<strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> End of the Year AD Worksheet for ".$output['emailData']['year'];
					$output['sect1h3'] 				= "Section I: Recognition Event";
					$output['sect2h3'] 				= "Section II: Area Operating Expenses (no unit or tech info)";
					$output['sect3h3'] 				= "Section III: Franchisee Checklist";
					
					$temp											= $this->load->view('common/header_email',$output, true);
					$temp 										.= $this->load->view('reports/end_of_year_ad_email',$output, true);
					$temp 										.= $this->load->view('common/footer_print',$output, true);
					
					$headers  								= 'MIME-Version: 1.0' . "\r\n";
					$headers 									.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers 									.= 'From: MYCOP <no-reply@msharmonydesigns.com>' . "\r\n";
					$headers									.= 'Cc: jason@elementalmaze.com' . "\r\n";
			
					if(mail($cleanEmails, $output['subject'], $temp, $headers))
						redirect(base_url().'index.php/reports/end_of_year/view_AD/'.$adID.'/'.$_POST['year'].'?msg='.urlencode('Report Successfully Entered for '.$output['emailData']['year'].'!'));
					else
						$output['err'] = 'Failed to send email, but Report Successfully Entered for '.$months[$output['emailData']['month']].' '.$output['emailData']['year'].'!';
				}
			}

			$output['mainH1']							= '<a href="'.$this->config->item('base_url').'">COP Reporting</a>';
			$output['pageName']						= "AD End of the Year Worksheet - Create";
      $output['mainh2']    					= "<strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> ".$year." End of the Year AD Worksheet";
      $output['sect1h3'] 						= "Section I: End of Year Recognition Event";
      $output['sect2h3'] 						= "Section II: Area Operating Expenses (no unit or tech info)";
      $output['sect3h3'] 						= "Section III: End of Year Franchisee Checklist";
			
			$output['button'] 						= 'Submit Report';
			$output['action'] 						= 'noSubmit';

			$this->load->view('common/header',$output);
			$this->load->view('reports/end_of_year_ad_form',$output);
			$this->load->view('common/footer',$output);
		
    }
		
		public function save(){
			
			$today 				= date('Y-m-d');
						
			// DELETE EXISTING DATA
			$this->db->delete('yec_saves', array('adID' => $_POST['adID']));
			$this->db->delete('yee_saves', array('adID' => $_POST['adID']));
			$this->db->delete('yer_saves', array('adID' => $_POST['adID']));
			
			// SAVE THE NEW DATA			
			// INSERT RECOGNITIONS
			$recognition = array(
				'id'														=> '',
				'adID'     											=> $_POST['adID'],
				'franID'  											=> $_POST['franID'],
				'year'													=> $_POST['year'],
				'submitted'    									=> $today,
				'recognition_meet'    					=> $_POST['recognition_meet'],
				'comments'    									=> urlencode($_POST['comments'])
			);
			
			// INSERT EXPENSES
			$expenses = array(
				'id'														=> '',
				'adID'     											=> $_POST['adID'],
				'franID'  											=> $_POST['franID'],
				'year'													=> $_POST['tax_year'],
				'submitted'    									=> $today,
				'royalty'    										=> str_replace(',', '', $_POST['royalty']),
				'insurance'    									=> str_replace(',', '', $_POST['insurance']),
				'billcoll'    									=> str_replace(',', '', $_POST['billcoll']),
				'fuel'    											=> str_replace(',', '', $_POST['fuel']),
				'maintenance'    								=> str_replace(',', '', $_POST['maintenance']),
				'cellphone'    									=> str_replace(',', '', $_POST['cellphone']),
				'officephone'    								=> str_replace(',', '', $_POST['officephone']),
				'officesupp'    								=> str_replace(',', '', $_POST['officesupp']),
				'bussmeetings'    							=> str_replace(',', '', $_POST['bussmeetings']),
				'zeerecognition'    						=> str_replace(',', '', $_POST['zeerecognition']),
				'adFund'    										=> str_replace(',', '', $_POST['adFund']),
				'localAd'    										=> str_replace(',', '', $_POST['localAd']),
				'licensefees'    								=> str_replace(',', '', $_POST['licensefees']),
				'busstax'    										=> str_replace(',', '', $_POST['busstax']),
				'paintsupp'    									=> str_replace(',', '', $_POST['paintsupp']),
				'labor'    											=> str_replace(',', '', $_POST['labor']),
				'vanexpense'    								=> str_replace(',', '', $_POST['vanexpense']),
				'uniform'    										=> str_replace(',', '', $_POST['uniform']),
				'payrolltax'    								=> str_replace(',', '', $_POST['payrolltax']),
				'other'    											=> str_replace(',', '', $_POST['other']),
				'total'    											=> str_replace(',', '', $_POST['total'])
			);
			// INSERT FRANCHISEE CHECKS
			$i=1;
			foreach($_POST['frans'] as $fran){
				$eachFran[$i] = array(
					'id'														=> '',
					'adID'     											=> $_POST['adID'],
					'franID'  											=> $fran['franID'],
					'year'													=> $_POST['year'],
					'submitted'    									=> $today,
					'meet_attended'    							=> $fran['meet_attended'],
					'unit_check'    								=> $fran['unit_check'],
					'comments'    									=> urlencode($fran['comments'])
				);
				$i++;
			}
			
			/*												
			echo "***** RECOGNITIONS *****<br />";
			$this->functions->debug($recognition);
			echo "***** EXPENSES *****<br />";
			$this->functions->debug($expenses);
			echo "***** CHECKS *****<br />";
			$this->functions->debug($eachFran);*/
			
			//$this->functions->debug($eachFran);
				
			$insert['recognition']		= $this->db->insert('yer_saves', $recognition);
			$insert['expenses']				= $this->db->insert('yee_saves', $expenses);
			if($eachFran)
			$insert['checks'] 				= $this->db->insert_batch('yec_saves', $eachFran);
				
			redirect(base_url().'index.php/reports/end_of_year/create_AD/'.$_POST['adID'].'?msg='.urlencode('Your report has been saved!! <a href="'.base_url().'index.php">Click here to return to your Dashboard</a>'));
						
		}
		
    public function print_report(){
			
			$adID 										= $this->uri->segment(4);
			
			$lastyear 										=  date("Y",strtotime("-1 year"));
			$prevyear 										=  date("Y",strtotime("-2 year"));
						
      $this->load->model('reports/end_of_year_mod');
			
			$areadev  										= $this->end_of_year_mod->get_AD($adID);

      $recognition  								= $this->end_of_year_mod->get_ad_yrend_recognition($adID, $lastyear);
      if($recognition != NULL) 
				$areadev[0]->recognition	= $recognition[0];
						
			$ex_where 										= "adID = ".$adID." && (year = '".$lastyear."' OR year = '".$prevyear."')";
      $expenses						 					= $this->end_of_year_mod->get_fran_yrend_expenses($areadev[0]->franID, $ex_where);
      if($expenses != NULL) 
				$areadev[0]->expenses	  		= $expenses[0];
				
			$where 											  = 'reportADs LIKE "%|'.$adID.'|%"';
      $frans			  								= $this->end_of_year_mod->get_all_Franchisees($areadev[0]->franID, $where);
			$areadev[0]->frans						= $frans;
			
      if($frans != NULL){
				foreach($frans as $k => $fran){
					
					$checks				= $this->end_of_year_mod->get_ad_yrend_checks($fran->franID, $lastyear);
					
					$areadev[0]->frans[$k]->year						= $checks[0]->year;
					$areadev[0]->frans[$k]->meet_attended		= $checks[0]->meet_attended;
					$areadev[0]->frans[$k]->unit_check			= $checks[0]->unit_check;
					$areadev[0]->frans[$k]->comments				= $checks[0]->comments;
					
				}
				
			}			
								
			
			$output['areadev']						= $areadev;

	    $output['mainH1']							= '<a href="'.$this->config->item('base_url').'">COP Reporting</a>';
			$output['pageName']						= "AD End of the Year Worksheet - View";
      $output['mainh2']    					= "<strong>".$areadev[0]->special_sales_report_name."'s</strong> ".$year." End of the Year AD Worksheet";
      $output['sect1h3'] 						= "Section I: Recognition Event";
      $output['sect2h3'] 						= "Section II: ".$areadev[0]->expenses->year." Area Operating Expenses (no unit or tech info)";
      $output['sect3h3'] 						= "Section III: Franchisee Checklist";
			
			//echo $this->functions->debug($reports);
			
			$this->load->view('common/header_print',$output);
			$this->load->view('reports/end_of_year_ad_print',$output);
			$this->load->view('common/footer_print',$output);
			
		}
		
    public function edit(){
								
			//MAKE SURE ADMIN
			if(($this->session->userdata('adID') != '-1')){
				redirect('?wrn='.urlencode('You are not authorized to view page!'));
			}
			
			$adID 																												= $this->uri->segment(4);
			$output['month'] 																							= $this->uri->segment(5);
			$output['year']																								= $this->uri->segment(6);
			
			$this->load->model('reports/areadev_month_sales');

			$months  		  																  		  				= $this->functions->months();
			$output['areadev']  		  																		= $this->areadev_month_sales->get_AD($adID);
			//$output['months']  		  																			= $this->functions->months();
			//$output['years']  		  																			= $this->functions->years();
			$rptDate 				  				  																	=  date('Y-m-01',  mktime(0, 0, 0, date("n")-2  , date("d"), date("Y")));
										
      $reports	= $this->areadev_month_sales->get_AD_sales_report($adID, $output['year'].'-'.$output['month'].'-01');
	
			if($reports != NULL){
				$totalSales=0;
				$totalUnits=0;
				$totalTechs=0;
				$totalVehicles=0;
				$totalDays=0;
				$totalAccounts=0;
				$totalPaint=0;
				$totalPDR=0;
				$totalInterior=0;
				$totalOtherS=0;
				$totalServTtl=0;
				$totalRetail=0;
				$totalDealNew=0;
				$totalDealUsed=0;
				$totalDealServ=0;
				$totalFleet=0;
				$totalOtherC=0;
				$totalCustTtl=0;

				foreach($reports as $report){
					$totalSales							= $totalSales+$report->customer_type_total;
	
					$totalUnits 						=  $totalUnits+$report->units;
					$totalTechs 						=  $totalTechs+$report->techs;
					$totalVehicles 					=  $totalVehicles+$report->vehicles_repaired;
					$totalDays 							=  $totalDays+$report->days_worked;
					$totalAccounts 					=  $totalAccounts+$report->accounts_worked;
					$totalPaint 						=  $totalPaint+$report->paint_sales;
					$totalPDR								=  $totalPDR+$report->PDR_sales;
					$totalInterior 					=  $totalInterior+$report->interior_sales;
					$totalOtherS 						=  $totalOtherS+$report->other_sales;
					$totalServTtl 					=  $totalServTtl+$report->service_type_total;
					$totalRetail 						=  $totalRetail+$report->retail_dollars;
					$totalDealNew 					=  $totalDealNew+$report->dealer_new_dollars;
					$totalDealUsed 					=  $totalDealUsed+$report->dealer_used_dollars;
					$totalDealServ 					=  $totalDealServ+$report->dealer_service_dollars;
					$totalFleet 						=  $totalFleet+$report->fleet_dollars;
					$totalOtherC						=  $totalOtherC+$report->other_dollars;
					$totalCustTtl 					=  $totalCustTtl+$report->customer_type_total;
					
				}		
				
				$output['totalSales']			= $totalSales;	
				$output['totalUnits']			= $totalUnits;
				$output['totalTechs']			= $totalTechs;
				$output['totalVehicles']	= $totalVehicles;
				$output['totalDays']			= $totalDays;
				$output['totalAccounts']	= $totalAccounts;
				$output['totalPaint']			= number_format($totalPaint, 2);
				$output['totalPDR']				= number_format($totalPDR, 2);
				$output['totalInterior']	= number_format($totalInterior, 2);
				$output['totalOtherS']		= number_format($totalOtherS, 2);
				$output['totalServTtl']		= number_format($totalServTtl, 2);
				$output['totalRetail']		= number_format($totalRetail, 2);
				$output['totalDealNew']		= number_format($totalDealNew, 2);
				$output['totalDealUsed']	= number_format($totalDealUsed, 2);
				$output['totalDealServ']	= number_format($totalDealServ, 2);
				$output['totalFleet']			= number_format($totalFleet, 2);
				$output['totalOtherC']		= number_format($totalOtherC, 2);
				$output['totalCustTtl']		= number_format($totalCustTtl, 2);
				$output['notes']					= urldecode($reports[0]->notes);
				$output['reports'] 				= $reports;
				
			}else{
				$output['reports'][0]			= false;
				$output['reports']['msg']	= 'No report data available for '.$months[$output['month']].' '.$output['year'].'!';
				$output['totalSales']			= '0.00';
			}
			
			if(isset($_POST['action']) && $_POST['action'] == 'Update Report'){							
				if($_POST['total_month_sales_dollars'] != '0.00'){
	
					$i=0;
					foreach($_POST['frans'] as $fran){
						if($fran['service_type_total'] == $fran['customer_type_total']){
							if($fran['service_type_total'] != '0.00' && $fran['customer_type_total'] != '0.00'){
								$eachFran[$i] = array(
									'adID'     											=> $adID,
									'franID'  											=> $fran['franID'],
									'sales_month'										=> $_POST['year'].'-'.$_POST['month'].'-01',
									'units'     										=> $fran['units'],
									'techs'    											=> $fran['techs'],
									'vehicles_repaired'	    				=> $fran['vehicles_repaired'],
									'days_worked'     							=> $fran['days_worked'],
									'accounts_worked'    						=> $fran['accounts_worked'],
									'paint_sales'    								=> str_replace(',', '', $fran['paint_sales']),
									'PDR_sales'     								=> str_replace(',', '', $fran['PDR_sales']),
									'interior_sales'    						=> str_replace(',', '', $fran['interior_sales']),
									'other_sales'    								=> str_replace(',', '', $fran['other_sales']),
									'service_type_total'    				=> str_replace(',', '', $fran['service_type_total']),
									'retail_dollars'     						=> str_replace(',', '', $fran['retail_dollars']),
									'dealer_new_dollars'    				=> str_replace(',', '', $fran['dealer_new_dollars']),
									'dealer_used_dollars'    				=> str_replace(',', '', $fran['dealer_used_dollars']),
									'dealer_service_dollars'    		=> str_replace(',', '', $fran['dealer_service_dollars']),
									'fleet_dollars'     						=> str_replace(',', '', $fran['fleet_dollars']),
									'other_dollars'    							=> str_replace(',', '', $fran['other_dollars']),
									'customer_type_total'						=> str_replace(',', '', $fran['customer_type_total']),
									'total_month_sales_dollars'    	=> str_replace(',', '', $_POST['total_month_sales_dollars']),
									'billCollects'    							=> str_replace(',', '', $_POST['billCollects']),
									'adFundRoyalty'    							=> str_replace(',', '', $_POST['adFundRoyalty']),
									'royaltyDue'     								=> str_replace(',', '', $_POST['royaltyDue']),
									'notes'    											=> urlencode($_POST['comments'])
								);
								$this->db->update('sales', $eachFran[$i], "ID = ".$fran['ID']);
								
								$i++;
							}
						}else{
							$output['err'] = 'ERROR! Your Service Type Sales and Customer Type Sales do not match! Please fix.';
						}
					}
					
					if(!isset($output['err'])){							
						if(isset($_POST['bcOn']) && $_POST['bcOn'] == 'on') $data['billColl2'] = 'yes'; else $data['billColl2'] = 'no';
						if(isset($_POST['adfOn']) && $_POST['adfOn'] == 'on') $data['adFund1'] = 'yes'; else $data['adFund1'] = 'no';
						if(isset($_POST['royOn']) && $_POST['royOn'] == 'on') $data['royalty7'] = 'yes'; else $data['royalty7'] = 'no';
						
						$update				= $this->db->update('area_developer', $data, array('adID' => $adID));
												
						redirect(base_url().'index.php?msg='.urlencode('Report Successfully Updated for '.$output['year'].'!'));
					}
				}else{
					$output['err'] = 'Failed to Submit! There must be a valid Sales Total amount!';
				}
			}

			$output['mainH1']					= '<a href="'.$this->config->item('base_url').'">COP Reporting</a>';
			$output['pageName']				= "AD Monthly Sales Report - Edit";
			$output['mainh2']    			= "Generate <strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> of ".$output['areadev'][0]->region_office_name." Report for ";
			$output['sect1h3'] 				= "Section I: Total Sales / Royalty / Ad Fund Contribution / Billing & Collections Report";
			$output['sect2h3'] 				= "Section II: Sales Detail";
			
			$output['button'] 				= 'Update Report';
			$output['action'] 				= 'noSubmit';

			$this->load->view('common/header',$output);
			$this->load->view('reports/monthly_AD_sales_edit',$output);
			$this->load->view('common/footer',$output);
		
    }
		
		
	}

?>
