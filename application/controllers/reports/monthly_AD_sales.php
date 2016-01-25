<?php
  class Monthly_AD_Sales extends CI_Controller {  

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
		
		public function viewAll(){
		
			$this->load->model('reports/areadev_month_sales');
			$this->load->model('reports/areadev_month_meeting');
			
			$month 														= $this->uri->segment(5);
			$year 														= $this->uri->segment(6);
			$months 													= $this->functions->months();
						
			$c=0;
			$output['ads']  									= $this->areadev_month_sales->all_ADs();
			
			$date 														= $year.'-'.$month.'-01';
			
			foreach($output['ads'] as $ad){
				
				$sales													=	$this->areadev_month_sales->get_AD_report_count($ad->adID, $date);
				if($sales)
					$output['ads'][$c]->sales 		= $sales[0]->totalSales;
				else
					$output['ads'][$c]->sales			=	false;
	
				$meetings												=	$this->areadev_month_meeting->get_AD_report_count($ad->adID, $date);
				$contacts												=	$this->areadev_month_meeting->get_AD_contact_count($ad->adID, $date);
								
				
				if($meetings[0]->totalMeetings != 0 || $contacts[0]->totalContacts != 0){
						$output['ads'][$c]->meetings	=	true;
				}else{
						$output['ads'][$c]->meetings	=	false;
				}
				
				$c++;	
			}
			
			$output['rptDate']		= $month.'/'.$year;
			$output['month']		= $months[$month];
			$output['mainH1']		= "Franchise Reporting System";
			$output['mainH2']    	= "Administrator Dashboard - Reports Generated for ".$output['month']." ".$year;
			
			$this->load->view('common/header',$output);
			$this->load->view('reports/allADsReportingByMonth',$output);
			$this->load->view('common/footer',$output);
						
		}

    public function view(){
			
			$adID 										= $this->uri->segment(4);
			$month 										= $this->uri->segment(5);
			$year 										= $this->uri->segment(6);
			
			$months 									= $this->functions->months();
			
						
      $this->load->model('reports/areadev_month_sales');
			
      $output['areadev']  				= $this->areadev_month_sales->get_AD($adID);
      $reports  									= $this->areadev_month_sales->get_AD_sales_report($adID, $year.'-'.$month.'-01');
	
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
				$output['reports']['msg']	= 'No report data available for '.$months[$month].' '.$year.'!';
				$output['totalSales']			= '0.00';
			}

	    $output['mainH1']						= '<a href="'.$this->config->item('base_url').'">Franchise Reporting System</a>';
	    $output['pageName']					= "AD Monthly Sales Report - View";
      $output['mainh2']    				= "<strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> of ".$output['areadev'][0]->region_office_name." Report for ".$months[$month]." ".$year;
      $output['sect1h3'] 					= "Section I: Total Sales / Royalty / Ad Fund Contribution / Billing & Collections Report";
      $output['sect2h3'] 					= "Section II: Sales Detail";
			
			//echo $this->functions->debug($reports);
			
			$this->load->view('common/header',$output);
			$this->load->view('reports/monthly_AD_sales',$output);
			$this->load->view('common/footer',$output);
			
		}

    public function create(){
			//MAKE SURE DATE IS CORRECT
			if($_SERVER['REMOTE_ADDR'] != '64.138.211.45'){
				$today 				= date('Y-m-d');
				if($today >= date('Y-m-16')){
					$start 			= date('Y-m-30', mktime(0, 0, 0, date("n")  , date("j"), date("Y")));
					$end 				= date('Y-m-15', mktime(0, 0, 0, date("n")+1  , date("j"), date("Y")));
				}elseif($today <= date('Y-n-16')){
					$start 			= date('Y-m-30', mktime(0, 0, 0, date("n")-1  , date("j"), date("Y")));
					$end 				= date('Y-m-15', mktime(0, 0, 0, date("n")  , date("j"), date("Y")));
				}
				$dateOk				= $this->functions->check_in_range($start, $end, $today);
				
				if(($this->session->userdata('adID') != '-1') && $dateOk == false){
					redirect('?wrn='.urlencode('You are not authorized to view page!'));
				}
			}
								
			$adID 																	= $this->uri->segment(4);
			$this->load->model('reports/areadev_month_sales');

			$months  		  														= $this->functions->months();
			$output['areadev']  		  											= $this->areadev_month_sales->get_AD($adID);
			$output['months']  		  												= $this->functions->months();
			$output['years']  		  												= $this->functions->years();
			$rptDate 				  				  								=  date('Y-m-01',  mktime(0, 0, 0, date("n")-2  , date("d"), date("Y")));
			
			//$output['franAD']  				  									= $this->areadev_month_sales->get_AD_Franchisee($output['areadev'][0]->franID);
			$whereAD 											  					= 'reportADs LIKE "%|'.$adID.'|%"';
			$output['franAD']  				  										= $this->areadev_month_sales->get_AD_Franchisees($whereAD);
			
			$where 											  						= 'reportADs LIKE "%|'.$adID.'|%"';
			$output['franchisees']  		  										= $this->areadev_month_sales->get_all_Franchisees($output['areadev'][0]->franID, $where);
			
			if(!isset($_POST['action'])){
				// DISPLAY THE SAVED DATA
				$savedTTLs	  														= $this->areadev_month_sales->get_saved_AD_ttls($adID, $rptDate);
								
				if($savedTTLs){
					$output['total_month_sales_dollars']							= $savedTTLs[0]->total_month_sales_dollars;	
					$output['totalUnits']											= $savedTTLs[0]->units;
					$output['totalTechs']											= $savedTTLs[0]->techs;
					$output['totalVehicles']										= $savedTTLs[0]->vehicles_repaired;
					$output['totalDays']											= $savedTTLs[0]->days_worked;
					$output['totalAccounts']										= $savedTTLs[0]->accounts_worked;
					$output['totalPaint']											= $savedTTLs[0]->paint_sales;
					$output['totalPDR']												= $savedTTLs[0]->PDR_sales;
					$output['totalInterior']										= $savedTTLs[0]->interior_sales;
					$output['totalOtherS']											= $savedTTLs[0]->other_sales;
					$output['totalServTtl']											= $savedTTLs[0]->service_type_total;
					$output['totalRetail']											= $savedTTLs[0]->retail_dollars;
					$output['totalDealNew']											= $savedTTLs[0]->dealer_new_dollars;
					$output['totalDealUsed']										= $savedTTLs[0]->dealer_used_dollars;
					$output['totalDealServ']										= $savedTTLs[0]->dealer_service_dollars;
					$output['totalFleet']											= $savedTTLs[0]->fleet_dollars;
					$output['totalOtherC']											= $savedTTLs[0]->other_dollars;
					$output['totalCustTtl']											= $savedTTLs[0]->customer_type_total;

					$output['total_month_sales_dollars']							= $savedTTLs[0]->total_month_sales_dollars;
					$output['billCollects']											= $savedTTLs[0]->billCollects;
					$output['adFundRoyalty']										= $savedTTLs[0]->adFundRoyalty;
					$output['royaltyDue']											= $savedTTLs[0]->royaltyDue;
					$output['total_dues']											= $savedTTLs[0]->total_dues;
				}else{
					$output['totalUnits']											= 0;
					$output['totalTechs']											= 0;
					$output['totalVehicles']										= 0;
					$output['totalDays']											= 0;
					$output['totalAccounts']										= 0;
				}
					
				foreach($output['franAD'] as $key => $franAD){
										
					$savedADfr  													= $this->areadev_month_sales->get_saved_by_franID($adID, $franAD->franID, $rptDate);
					
					if($savedADfr){
						$output['franAD'][$key]->units 								= $savedADfr[0]->units;
						$output['franAD'][$key]->techs								= $savedADfr[0]->techs;
						$output['franAD'][$key]->vehicles_repaired					= $savedADfr[0]->vehicles_repaired;
						$output['franAD'][$key]->days_worked						= $savedADfr[0]->days_worked;
						$output['franAD'][$key]->accounts_worked					= $savedADfr[0]->accounts_worked;
						$output['franAD'][$key]->paint_sales						= $savedADfr[0]->paint_sales;
						$output['franAD'][$key]->PDR_sales							= $savedADfr[0]->PDR_sales;
						$output['franAD'][$key]->interior_sales						= $savedADfr[0]->interior_sales;
						$output['franAD'][$key]->other_sales						= $savedADfr[0]->other_sales;
						$output['franAD'][$key]->service_type_total					= $savedADfr[0]->service_type_total;
						$output['franAD'][$key]->retail_dollars						= $savedADfr[0]->retail_dollars;
						$output['franAD'][$key]->dealer_new_dollars					= $savedADfr[0]->dealer_new_dollars;
						$output['franAD'][$key]->dealer_used_dollars				= $savedADfr[0]->dealer_used_dollars;
						$output['franAD'][$key]->dealer_service_dollars				= $savedADfr[0]->dealer_service_dollars;
						$output['franAD'][$key]->fleet_dollars						= $savedADfr[0]->fleet_dollars;
						$output['franAD'][$key]->other_dollars						= $savedADfr[0]->other_dollars;
						$output['franAD'][$key]->customer_type_total				= $savedADfr[0]->customer_type_total;
						
						$output['franAD'][$key]->sales = 0;
					}else{
						$ADfranRpt  												= $this->areadev_month_sales->get_sales_by_franID($adID, $franAD->franID,$rptDate);
						
						if($ADfranRpt){
							$output['franAD'][$key]->units 							= $ADfranRpt[0]->units;
							$output['franAD'][$key]->techs							= $ADfranRpt[0]->techs;
							
							if(!$savedTTLs){
								$output['totalUnits'] 								=  $output['totalUnits']+$ADfranRpt[0]->units;
								$output['totalTechs'] 								=  $output['totalTechs']+$ADfranRpt[0]->techs;
							}
														
							$output['franAD'][$key]->saved = 0;
						}
					}
						
				}
				
				foreach($output['franchisees'] as $num => $fran){
					
					$savedFran  													= $this->areadev_month_sales->get_saved_by_franID($adID, $fran->franID, $rptDate);
													
					if($savedFran){
						$output['franchisees'][$num]->units 						= $savedFran[0]->units;
						$output['franchisees'][$num]->techs							= $savedFran[0]->techs;
						$output['franchisees'][$num]->vehicles_repaired				= $savedFran[0]->vehicles_repaired;
						$output['franchisees'][$num]->days_worked					= $savedFran[0]->days_worked;
						$output['franchisees'][$num]->accounts_worked				= $savedFran[0]->accounts_worked;
						$output['franchisees'][$num]->paint_sales					= $savedFran[0]->paint_sales;
						$output['franchisees'][$num]->PDR_sales						= $savedFran[0]->PDR_sales;
						$output['franchisees'][$num]->interior_sales				= $savedFran[0]->interior_sales;
						$output['franchisees'][$num]->other_sales					= $savedFran[0]->other_sales;
						$output['franchisees'][$num]->service_type_total			= $savedFran[0]->service_type_total;
						$output['franchisees'][$num]->retail_dollars				= $savedFran[0]->retail_dollars;
						$output['franchisees'][$num]->dealer_new_dollars			= $savedFran[0]->dealer_new_dollars;
						$output['franchisees'][$num]->dealer_used_dollars			= $savedFran[0]->dealer_used_dollars;
						$output['franchisees'][$num]->dealer_service_dollars		= $savedFran[0]->dealer_service_dollars;
						$output['franchisees'][$num]->fleet_dollars					= $savedFran[0]->fleet_dollars;
						$output['franchisees'][$num]->other_dollars					= $savedFran[0]->other_dollars;
						$output['franchisees'][$num]->customer_type_total			= $savedFran[0]->customer_type_total;
						
						$output['franchisees'][$num]->sales = 0;
					}else{
						$franRpt  													= $this->areadev_month_sales->get_sales_by_franID($adID, $fran->franID, $rptDate);
												
						if($franRpt){
							$output['franchisees'][$num]->units 					= $franRpt[0]->units;
							$output['franchisees'][$num]->techs						= $franRpt[0]->techs;
							
							if(!$savedTTLs){
								$output['totalUnits'] 								=  $output['totalUnits']+$franRpt[0]->units;
								$output['totalTechs'] 								=  $output['totalTechs']+$franRpt[0]->techs;
							}

							$output['franchisees'][$num]->saved 					= 0;
							
						}
					}
				}
			}
			
			//$this->functions->debug($output);
			
			if(isset($_POST['action']) && $_POST['action'] == 'Save Form'){
				$this->save();
			}elseif(isset($_POST['action']) && $_POST['action'] == 'Submit Report'){
				$output['emailData'] = $_POST;
							
				if($_POST['total_month_sales_dollars'] != '0.00'){
	
					$i=1;
					foreach($_POST['frans'] as $fran){
						
						if($fran['service_type_total'] == $fran['customer_type_total']){
						
							if($fran['service_type_total'] != '0.00' && $fran['customer_type_total'] != '0.00'){
			
								$eachFran[$i] = array(
									'ID'     												=> '',
									'adID'     											=> $this->uri->segment(4),
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
								$i++;
							}
						
						}else{
							$output['err'] = 'ERROR! Your Service Type Sales and Customer Type Sales do not match! Please fix.';
						}
						
					}
					
					if(!isset($output['err'])){			
												
						$insert 			= $this->db->insert_batch('sales', $eachFran);
														$this->db->delete('saved_sales', array('adID' => $adID));
														$this->db->delete('saved_sales_ttls', array('adID' => $_POST['adID']));
						
						$cleanEmails 	= '';
						
						if(isset($_POST['emailTags']) && $_POST['emailTags'] != ''){
													
							$emails										= explode('|', $_POST['emailTags']);
							foreach($emails as $email){
								if($this->functions->isValidEmail($email)){
									//$to 									.= $email . ', ';
									$cleanEmails						.= $email . ', ';
								}
							}
							
							$userData['emails']				= $_POST['emailTags'];
							$updateUser								= $this->db->update('users', $userData, array('adID' => $this->uri->segment(4)));
						}
						
						$cleanEmails 								.= 'admin@msharmonydesigns.com' . ', ';
										
						if(isset($_POST['bcOn']) && $_POST['bcOn'] == 'on') $data['billColl2'] = 'yes'; else $data['billColl2'] = 'no';
						if(isset($_POST['adfOn']) && $_POST['adfOn'] == 'on') $data['adFund1'] = 'yes'; else $data['adFund1'] = 'no';
						if(isset($_POST['royOn']) && $_POST['royOn'] == 'on') $data['royalty7'] = 'yes'; else $data['royalty7'] = 'no';
						
						$update 										= $this->db->update('area_developer', $data, array('adID' => $this->uri->segment(4)));
						
						$output['pageName']					= $output['areadev'][0]->region_office_name." Monthly Sales Report";
						$output['mainh2']						= "<strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> of ".$output['areadev'][0]->region_office_name." Report for ".$months[$output['emailData']['month']]." ".$output['emailData']['year'];
						$output['sect1h3']					= "Section I: Total Sales / Royalty / Ad Fund Contribution / Billing & Collections Report";
						$output['sect2h3']					= "Section II: Sales Detail";
						
						$temp												= $this->load->view('common/header_email',$output, true);
						$temp 											.= $this->load->view('reports/monthly_AD_sales_email',$output, true);
						$temp 											.= $this->load->view('common/footer_print',$output, true);
						
						$headers  								= 'MIME-Version: 1.0' . "\r\n";
						$headers 								.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers 								.= 'From: MYCOP <no-reply@msharmonydesigns.com>' . "\r\n";
				
						if(mail($cleanEmails, $output['pageName'], $temp, $headers))
							redirect(base_url().'?msg='.urlencode('Report Successfully Entered for '.$months[$output['emailData']['month']].' '.$output['emailData']['year'].'!'));
						else
							$output['err'] = 'Failed to send email, but Report Successfully Entered for '.$months[$output['emailData']['month']].' '.$output['emailData']['year'].'!';
					}
				}else{
					$output['err'] = 'Failed to Submit! There must be a valid Sales Total amount!';
				}
			}

			$output['mainH1']					= '<a href="'.$this->config->item('base_url').'">Franchise Reporting System</a>';
			$output['pageName']				= "AD Monthly Sales Report - Create";
			$output['mainh2']    			= "Generate <strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> of ".$output['areadev'][0]->region_office_name." Report for ";
			$output['sect1h3'] 				= "Section I: Total Sales / Royalty / Ad Fund Contribution / Billing & Collections Report";
			$output['sect2h3'] 				= "Section II: Sales Detail";
			
			$output['button'] 				= 'Submit Report';
			$output['action'] 				= 'noSubmit';

			$this->load->view('common/header',$output);
			$this->load->view('reports/monthly_AD_sales_form',$output);
			$this->load->view('common/footer',$output);
		
    }
		
		public function save(){
			
			
			$this->db->delete('saved_sales', array('adID' => $_POST['adID']));
			$this->db->delete('saved_sales_ttls', array('adID' => $_POST['adID']));
			
			$i=1;
			foreach($_POST['frans'] as $fran){
	
				$eachFran[$i] = array(
					'adID'     											=> $this->uri->segment(4),
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
					'total_month_sales_dollars'    	=> str_replace(',', '', $_POST['total_month_sales_dollars'])
				);
				$i++;
			}
			//echo $this->functions->debug($eachFran);
			
			$this->db->insert_batch('saved_sales', $eachFran);
			
			$totals = array(
				'adID'     											=> $this->uri->segment(4),
				'sales_month'										=> $_POST['year'].'-'.$_POST['month'].'-01',
				'units'     										=> $_POST['ttlUnits'],
				'techs'    											=> $_POST['ttlTechs'],
				'vehicles_repaired'	    				=> $_POST['ttlVehRepairs'],
				'days_worked'     							=> $_POST['ttlDaysWrkd'],
				'accounts_worked'    						=> $_POST['ttlAccountsWrkd'],
				'paint_sales'    								=> str_replace(',', '', $_POST['ttlPaintSales']),
				'PDR_sales'     								=> str_replace(',', '', $_POST['ttlPdrSales']),
				'interior_sales'    						=> str_replace(',', '', $_POST['ttlInteriorSales']),
				'other_sales'    								=> str_replace(',', '', $_POST['ttlOtherSales']),
				'service_type_total'    				=> str_replace(',', '', $_POST['ttlAddedService']),
				'retail_dollars'     						=> str_replace(',', '', $_POST['ttlRetail']),
				'dealer_new_dollars'    				=> str_replace(',', '', $_POST['ttlDealerNew']),
				'dealer_used_dollars'    				=> str_replace(',', '', $_POST['ttlDealerUsed']),
				'dealer_service_dollars'    		=> str_replace(',', '', $_POST['ttlDealerServ']),
				'fleet_dollars'     						=> str_replace(',', '', $_POST['ttlFleet']),
				'other_dollars'    							=> str_replace(',', '', $_POST['ttlOther']),
				'customer_type_total'						=> str_replace(',', '', $_POST['ttlAddedCustomer']),
				'total_month_sales_dollars'    	=> str_replace(',', '', $_POST['total_month_sales_dollars']),
				'billCollects'    							=> str_replace(',', '', $_POST['billCollects']),
				'adFundRoyalty'    							=> str_replace(',', '', $_POST['adFundRoyalty']),
				'royaltyDue'     								=> str_replace(',', '', $_POST['royaltyDue']),
				'total_dues'    								=> str_replace(',', '', $_POST['total_dues']),
				'emailTags'											=> $_POST['emailTags'],
				'comments'    									=> $_POST['comments']
			);

			$this->db->insert('saved_sales_ttls', $totals);
				
			redirect(base_url().'?msg='.urlencode('Your report has been saved!!'));
						
		}
		
    public function print_report(){
			
			$adID 										= $this->uri->segment(4);
			$month 										= $this->uri->segment(5);
			$year 										= $this->uri->segment(6);
			
			$months 									= $this->functions->months();
			
						
      $this->load->model('reports/areadev_month_sales');
			
      $output['areadev']  				= $this->areadev_month_sales->get_AD($adID);
      $reports  									= $this->areadev_month_sales->get_AD_sales_report($adID, $year.'-'.$month.'-01');
	
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
				$output['reports']['msg']	= 'No report data available for '.$months[$month].' '.$year.'!';
				$output['totalSales']			= '$0.00';
			}

      $output['mainh2']    				= "<strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> of ".$output['areadev'][0]->region_office_name." Report for ".$months[$month]." ".$year;
      $output['sect1h3'] 					= "Section I: Total Sales / Royalty / Ad Fund Contribution / Billing & Collections Report";
      $output['sect2h3'] 					= "Section II: Sales Detail";
			
			$this->load->view('common/header_print',$output);
			$this->load->view('reports/monthly_AD_sales_print',$output);
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
												
						redirect(base_url().'?msg='.urlencode('Report Successfully Updated for '.$months[$output['month']].' '.$output['year'].'!'));
					}
				}else{
					$output['err'] = 'Failed to Submit! There must be a valid Sales Total amount!';
				}
			}

			$output['mainH1']					= '<a href="'.$this->config->item('base_url').'">Franchise Reporting System</a>';
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
		
		public function viewList(){
		
			$this->load->model('reports/areadev_month_sales');
						
			$output['ads']  									= $this->areadev_month_sales->all_ADs();
			
			$c=0;
			
			foreach($output['ads'] as $ad){
				
				$adinfo[$c]																= $this->areadev_month_sales->get_AD_Franchisee($ad->franID);
				
				$return[$c]['ads'] = $adinfo[$c];
				
				$return[$c]['adID']												= $ad->adID;
				$return[$c]['franID']											= $ad->franID;
				$return[$c]['areaName']										= $ad->region_office_name;
				
				if($adinfo[$c][0]->firstName != '' && $adinfo[$c][0]->lastName != '')
					$return[$c]['adName']										= $adinfo[$c][0]->firstName.' '.$adinfo[$c][0]->lastName;
				else
					$return[$c]['adName']										= NULL;
							
				$where 											  						= 'reportADs LIKE "%|'.$ad->adID.'|%"';
				$return[$c]['franchisees']  		  				= $this->areadev_month_sales->get_all_Franchisees($ad->franID, $where);

				$c++;	
			}
			
			$output['data']				= $return;
			$output['mainH1']			= '<a href="'.$this->config->item('base_url').'">Reporting</a>';
			$output['pageName']			= "All Active Franchisees";
			$output['mainH2']    		= "All Franchisees By Area";
			
			
			$this->load->view('common/header',$output);
			$this->load->view('reports/listAll',$output);
			$this->load->view('common/footer',$output);
						
		}
		
	}

?>
