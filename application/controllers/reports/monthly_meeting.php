<?php
  class Monthly_Meeting extends CI_Controller {  

	public function __construct(){
		parent::__construct();  
		$this->load->model('login_mod','login',TRUE);            
		if(!$this->login->check_session()){
			redirect('/login');
		}
		if(($this->session->userdata('adID') != '-1') && ($this->uri->segment(4) != $this->session->userdata('adID') && $this->uri->segment(4) != $this->session->userdata('alt_adID'))){
			redirect('?wrn='.urlencode('You are not authorized to view page!'));
		}
	}
    public function create(){
									
		$adID = $this->uri->segment(4);
			
		$this->load->model('reports/areadev_month_meeting');
			
		$output['months'] 				= $this->functions->months();
		$output['years']				= $this->functions->years();
		
		$output['areadev']  			= $this->areadev_month_meeting->get_AD($adID);
		$output['franAD']  				= $this->areadev_month_meeting->get_AD_Franchisee($output['areadev'][0]->franID);
		
		$where 							= 'reportADs LIKE "%|'.$adID.'|%"';
		$output['franchisees']  		= $this->areadev_month_meeting->get_all_Franchisees($output['areadev'][0]->franID, $where);
			
			//ADDING THE SUBMIT TO THE CREATE LIKE THE SALES
			
			
			/*if(!isset($_POST['action'])){
				//HERE WE WILL LOAD THE SAVED DATA
			}
			
			if(isset($_POST['action']) && $_POST['action'] == 'Save Form'){
				//Here we will save the form			
				//$this->save();
			}else*/
			
			if(isset($_POST['action']) && $_POST['action'] == 'Submit Report'){
				//$this->functions->debug($_POST);
				
				//Here we will submit the form
				if(isset($_POST['frans'])){
					$i=0;
					foreach($_POST['frans'] as $fran){
						$eachFran[$i] = array(
							'ID'     												=> '',
							'adID'     											=> $adID,
							'franID'  											=> $fran['franID'],
							'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
							'week1_attempt'     						=> $fran['week1_attempt'],
							'week2_attempt'     						=> $fran['week2_attempt'],
							'week3_attempt'     						=> $fran['week3_attempt'],
							'week4_attempt'     						=> $fran['week4_attempt'],
							'meeting_held'    							=> $fran['meeting_held'],
							'meeting_attended'    					=> $fran['meeting_attended'],
							'inperson_meeting'     					=> $fran['inperson_meeting'],
							'comments'    									=> $fran['comments']
						);
						$i++;					
					}
				}
				
				//echo $this->functions->debug($_POST);
				
				if(isset($_POST['sConts'])){
					$si=0;
					foreach($_POST['sConts'] as $sConts){
						if(isset($sConts['name']) && $sConts['name'] != ''){
							if((isset($sConts['phone']) && $sConts['phone'] != '') || (isset($sConts['email']) && $sConts['email'] != '')){
								$eachSales[$si] = array(
									'ID'     												=> '',
									'adID'     											=> $adID,
									'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
									'type'     											=> '0',
									'name'     											=> $sConts['name'],
									'phone'     										=> $sConts['phone'],
									'email'     										=> $sConts['email'],
									'address'     									=> $sConts['address'],
									'city'     											=> $sConts['city'],
									'state'     										=> $sConts['state'],
									'zip'     											=> $sConts['zip']
								);
								$si++;
							}else{
								redirect(base_url().'index.php/reports/monthly_meeting/create/'.$adID.'?err=Error! Please fill all appropriate Sales Contacts fields!');
							}
						}
					}
				}

				if(isset($_POST['pConts'])){
					$pi=0;
					foreach($_POST['pConts'] as $pConts){
						if(isset($pConts['name']) && $pConts['name'] != ''){
							if((isset($pConts['phone']) && $pConts['phone'] != '') || (isset($pConts['email']) && $pConts['email'] != '')){
								$eachProsp[$pi] = array(
									'ID'     												=> '',
									'adID'     											=> $adID,
									'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
									'type'     											=> '1',
									'name'     											=> $pConts['name'],
									'phone'     										=> $pConts['phone'],
									'email'     										=> $pConts['email'],
									'address'     									=> $pConts['address'],
									'city'     											=> $pConts['city'],
									'state'     										=> $pConts['state'],
									'zip'     											=> $pConts['zip']
								);
								$pi++;
							}else{
								redirect(base_url().'index.php/reports/monthly_meeting/create/'.$adID.'?err=Error! Please fill all appropriate Prospect Franchisee fields!');
							}
						}
					}
				}
								
				$insert['frans'] 				= $this->db->insert_batch('monthly_update', $eachFran);
				
				if($eachSales)
					$insert['sales'] 			= $this->db->insert_batch('contact_leads', $eachSales);
					
				if($eachProsp)
					$insert['prosp'] 			= $this->db->insert_batch('contact_leads', $eachProsp);
				
				redirect(base_url().'?msg=Success!');
			}
			
	    $output['mainH1']					= '<a href="'.$this->config->item('base_url').'">Franchise Reporting System</a>';
	    $output['pageName']				= "Monthly Meeting Report - Create";
      $output['mainh2']    			= "Generate <strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> of ".$output['areadev'][0]->region_office_name." Report for ";
      $output['sect1h3'] 				= "Monthly Group Meeting Held:";
      $output['sect2h3'] 				= "Sales Contact Info";
      $output['sect3h3'] 				= "Prospective Franchisee Info";
			
			$output['button'] 				= 'Submit Report';
			$output['action'] 				= 'noSubmit';

      $this->load->view('common/header',$output);
      $this->load->view('reports/monthly_meeting_form',$output);
      $this->load->view('common/footer',$output);

    }
		
    public function submit(){			
									
			$adID = $this->uri->segment(4);
		
			if(isset($_POST['frans'])){
			
				foreach($_POST['frans'] as $fran){
					
					$eachFran = array(
						'ID'     												=> '',
						'adID'     											=> $adID,
						'franID'  											=> $fran['franID'],
						'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
						'week1_attempt'     						=> $fran['week1_attempt'],
						'week2_attempt'     						=> $fran['week2_attempt'],
						'week3_attempt'     						=> $fran['week3_attempt'],
						'week4_attempt'     						=> $fran['week4_attempt'],
						'meeting_held'    							=> $fran['meeting_held'],
						'meeting_attended'    					=> $fran['meeting_attended'],
						'inperson_meeting'     					=> $fran['inperson_meeting'],
						'comments'    									=> $fran['comments']
					);
					
					$insert['results'] 	= $this->db->insert('monthly_update', $eachFran);
										
				}
			}
			if(isset($_POST['sConts'])){
			
				foreach($_POST['sConts'] as $sConts){

					if((isset($sConts['name']) && $sConts['name'] != '')){
						$eachS = array(
							'ID'     												=> '',
							'adID'     											=> $adID,
							'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
							'type'     											=> '0',
							'name'     											=> $sConts['name'],
							'phone'     										=> $sConts['phone'],
							'email'     										=> $sConts['email'],
							'address'     									=> $sConts['address'],
							'city'     											=> $sConts['city'],
							'state'     										=> $sConts['state'],
							'zip'     											=> $sConts['zip']
						);
						
						$insert['resultsS'] 	= $this->db->insert('contact_leads', $eachS);
						
					}
					
				}
			}
			if(isset($_POST['pConts'])){
			
				foreach($_POST['pConts'] as $pConts){
					
					if((isset($pConts['name']) && $pConts['name'] != '')){
						$eachP = array(
							'ID'     												=> '',
							'adID'     											=> $adID,
							'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
							'type'     											=> '1',
							'name'     											=> $pConts['name'],
							'phone'     										=> $pConts['phone'],
							'email'     										=> $pConts['email'],
							'address'     									=> $pConts['address'],
							'city'     											=> $pConts['city'],
							'state'     										=> $pConts['state'],
							'zip'     											=> $pConts['zip']
						);
						
						$insert['resultsP'] 	= $this->db->insert('contact_leads', $eachP);
					}					
				}
			}
			
        redirect(base_url().'?msg=Success');
			
    }
		
		public function save(){
			
			$today 				= date('Y-m-d');
						
			// DELETE EXISTING DATA
			$this->db->delete('', array('adID' => $_POST['adID']));
			$this->db->delete('', array('adID' => $_POST['adID']));
			$this->db->delete('', array('adID' => $_POST['adID']));
			
			// SAVE THE NEW DATA
			// INSERT FRANCHISE DATA
			if(isset($_POST['frans'])){
				foreach($_POST['frans'] as $fran){
					$resultsF = array(
						'ID'     												=> '',
						'adID'     											=> $adID,
						'franID'  											=> $fran['franID'],
						'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
						'week1_attempt'     						=> $fran['week1_attempt'],
						'week2_attempt'     						=> $fran['week2_attempt'],
						'week3_attempt'     						=> $fran['week3_attempt'],
						'week4_attempt'     						=> $fran['week4_attempt'],
						'meeting_held'    							=> $fran['meeting_held'],
						'meeting_attended'    					=> $fran['meeting_attended'],
						'inperson_meeting'     					=> $fran['inperson_meeting'],
						'comments'    									=> $fran['comments']
					);
				}
			}
			
			// INSERT SALES CONTACTS
			if(isset($_POST['sConts'])){
				foreach($_POST['sConts'] as $sConts){
					if((isset($sConts['name']) && $sConts['name'] != '')){
						$resultsS = array(
							'ID'     												=> '',
							'adID'     											=> $adID,
							'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
							'type'     											=> '0',
							'name'     											=> $sConts['name'],
							'phone'     										=> $sConts['phone'],
							'email'     										=> $sConts['email'],
							'address'     									=> $sConts['address'],
							'city'     											=> $sConts['city'],
							'state'     										=> $sConts['state'],
							'zip'     											=> $sConts['zip']
						);
					}
				}
			}
			
			// INSERT PROSPECT CONTACTS
			if(isset($_POST['pConts'])){
				foreach($_POST['pConts'] as $pConts){
					if((isset($pConts['name']) && $pConts['name'] != '')){
						$resultsP = array(
							'ID'     												=> '',
							'adID'     											=> $adID,
							'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
							'type'     											=> '1',
							'name'     											=> $pConts['name'],
							'phone'     										=> $pConts['phone'],
							'email'     										=> $pConts['email'],
							'address'     									=> $pConts['address'],
							'city'     											=> $pConts['city'],
							'state'     										=> $pConts['state'],
							'zip'     											=> $pConts['zip']
						);
					}					
				}
			}
														
			echo "***** FRANCHISEES *****<br />";
			$this->functions->debug($resultsF);
			echo "***** SALES *****<br />";
			$this->functions->debug($resultsS);
			echo "***** PROSPECTS *****<br />";
			$this->functions->debug($resultsP);
				
			/*		
			$insert['resultsF']					= $this->db->insert_batch('', $resultsF);
			$insert['resultsS']					= $this->db->insert_batch('', $resultsS);
			$insert['resultsP'] 				= $this->db->insert_batch('', $resultsP);
			*/	
				
			$msg =	urlencode('Your report has been saved!! <a href="'.base_url().'index.php">Click here to return to your Dashboard</a>');
			redirect(base_url().'index.php/reports/monthly_meeting/create/'.$_POST['adID'].'?msg='.$msg);
								
		}
 
		
    public function view(){
			
			$adID 										= $this->uri->segment(4);
			$month 										= $this->uri->segment(5);
			$year 										= $this->uri->segment(6);
			
			$months 									= $this->functions->months();
			
		  $this->load->model('reports/areadev_month_meeting');
				
		  $output['areadev']  			= $this->areadev_month_meeting->get_AD($adID);
		  $reports  								= $this->areadev_month_meeting->get_AD_meeting_report($adID, $year.'-'.$month.'-01');
		  $sales  									= $this->areadev_month_meeting->get_AD_contacts($adID, $year.'-'.$month.'-01', '0');
		  $prosps  									= $this->areadev_month_meeting->get_AD_contacts($adID, $year.'-'.$month.'-01', '1');
			
			if($reports != NULL){
				$output['reports']['frans']						= $reports;
			}else{
				$output['reports']['frans'][0]				= false;
				$output['reports']['frans']['msg']		= 'No meeting data available for '.$months[$month].' '.$year.'!';
			}
			if($sales != NULL){
				$output['reports']['sales'] 					= $sales;
			}else{
				$output['reports']['sales'][0]				= false;
				$output['reports']['sales']['msg']		= 'No contact data for sales available for '.$months[$month].' '.$year.'!';
			}
			if($prosps != NULL){
				$output['reports']['prosp'] 					= $prosps;
			}else{
				$output['reports']['prosp'][0]				= false;
				$output['reports']['prosp']['msg']		= 'No contact data for prospects available for '.$months[$month].' '.$year.'!';
			}
			//$this->functions->debug($output['reports']['prosp']);


	    $output['mainH1']					= '<a href="'.$this->config->item('base_url').'">Franchise Reporting System</a>';
	    $output['pageName']				= "Monthly Meeting Report - View";
      $output['mainh2']    			= "<strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> of ".$output['areadev'][0]->region_office_name." Report for ".$months[$month]." ".$year;
      $output['sect1h3'] 				= "Monthly Group Meeting Held:";
      $output['sect2h3'] 				= "Sales Contact Info";
      $output['sect3h3'] 				= "Prospective Franchisee Info";

      $this->load->view('common/header',$output);
      $this->load->view('reports/monthly_meeting',$output);
      $this->load->view('common/footer',$output);

			
		}
		
    public function print_report(){
			
			$adID 										= $this->uri->segment(4);
			$month 										= $this->uri->segment(5);
			$year 										= $this->uri->segment(6);
			
			$months 									= $this->functions->months();
			
      $this->load->model('reports/areadev_month_meeting');
			
      $output['areadev']  			= $this->areadev_month_meeting->get_AD($adID);
      $reports  								= $this->areadev_month_meeting->get_AD_meeting_report($adID, $year.'-'.$month.'-01');
      $sales  									= $this->areadev_month_meeting->get_AD_contacts($adID, $year.'-'.$month.'-01', '0');
      $prosps  									= $this->areadev_month_meeting->get_AD_contacts($adID, $year.'-'.$month.'-01', '1');
			
			if($reports != NULL){
				$output['reports']['frans']						= $reports;
			}else{
				$output['reports']['frans'][0]				= false;
				$output['reports']['frans']['msg']		= 'No meeting data available for '.$months[$month].' '.$year.'!';
			}
			if($sales != NULL){
				$output['reports']['sales'] 					= $sales;
			}else{
				$output['reports']['sales'][0]				= false;
				$output['reports']['sales']['msg']		= 'No contact data for sales available for '.$months[$month].' '.$year.'!';
			}
			if($prosps != NULL){
				$output['reports']['prosp'] 					= $prosps;
			}else{
				$output['reports']['prosp'][0]				= false;
				$output['reports']['prosp']['msg']		= 'No contact data for prospects available for '.$months[$month].' '.$year.'!';
			}


      $output['mainh2']    			= "<strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> of ".$output['areadev'][0]->region_office_name." Report for ".$months[$month]." ".$year;
      $output['sect1h3'] 				= "Monthly Group Meeting:";
      $output['sect2h3'] 				= "Sales Contact Info";
      $output['sect3h3'] 				= "Prospective Franchisee Info";

      $this->load->view('common/header_print',$output);
      $this->load->view('reports/monthly_meeting_print',$output);
      $this->load->view('common/footer_print',$output);

			
		}
		
		public function edit(){
									
			$adID 										= $this->uri->segment(4);
			$month 										= $this->uri->segment(5);
			$year 										= $this->uri->segment(6);
			
			$months 									= $this->functions->months();
			
		  $this->load->model('reports/areadev_month_meeting');
				
		  $output['areadev']  			= $this->areadev_month_meeting->get_AD($adID);
		  $reports  								= $this->areadev_month_meeting->get_AD_meeting_report($adID, $year.'-'.$month.'-01');
		  $sales  									= $this->areadev_month_meeting->get_AD_contacts($adID, $year.'-'.$month.'-01', '0');
		  $prosps  									= $this->areadev_month_meeting->get_AD_contacts($adID, $year.'-'.$month.'-01', '1');
		  $saleCounts								= $this->areadev_month_meeting->get_AD_contactCounts($adID, $year.'-'.$month.'-01', '0');
		  $prospCounts							= $this->areadev_month_meeting->get_AD_contactCounts($adID, $year.'-'.$month.'-01', '1');
			
			if($reports != NULL){
				$output['reports']['frans']						= $reports;
			}else{
				$output['reports']['frans'][0]				= false;
				$output['reports']['frans']['msg']		= 'No meeting data available for '.$months[$month].' '.$year.'!';
			}
			if($sales != NULL){
				$output['reports']['sales'] 					= $sales;
				$output['reports']['saleCounts'] 			= $saleCounts[0]->counts;
			}else{
				$output['reports']['sales'][0]				= false;
				$output['reports']['sales']['msg']		= 'No contact data for sales available for '.$months[$month].' '.$year.'!';
			}
			if($prosps != NULL){
				$output['reports']['prosp'] 					= $prosps;
				$output['reports']['prospCounts'] 		= $prospCounts[0]->counts;
			}else{
				$output['reports']['prosp'][0]				= false;
				$output['reports']['prosp']['msg']		= 'No contact data for prospects available for '.$months[$month].' '.$year.'!';
			}
			
			//ADDING THE SUBMIT TO THE CREATE LIKE THE SALES
			
			//$this->functions->debug($output['reports']['prospCounts']);
			
			/*if(!isset($_POST['action'])){
				//HERE WE WILL LOAD THE SAVED DATA
			}
			
			if(isset($_POST['action']) && $_POST['action'] == 'Save Form'){
				//Here we will save the form			
				//$this->save();
			}else
			
			if(isset($_POST['action']) && $_POST['action'] == 'Submit Report'){
				//$this->functions->debug($_POST);
				
				//Here we will submit the form
				if(isset($_POST['frans'])){
					$i=0;
					foreach($_POST['frans'] as $fran){
						$eachFran[$i] = array(
							'ID'     												=> '',
							'adID'     											=> $adID,
							'franID'  											=> $fran['franID'],
							'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
							'week1_attempt'     						=> $fran['week1_attempt'],
							'week2_attempt'     						=> $fran['week2_attempt'],
							'week3_attempt'     						=> $fran['week3_attempt'],
							'week4_attempt'     						=> $fran['week4_attempt'],
							'meeting_held'    							=> $fran['meeting_held'],
							'meeting_attended'    					=> $fran['meeting_attended'],
							'inperson_meeting'     					=> $fran['inperson_meeting'],
							'comments'    									=> $fran['comments']
						);
						$i++;					
					}
				}
				
				//echo $this->functions->debug($_POST);
				
				if(isset($_POST['sConts'])){
					$si=0;
					foreach($_POST['sConts'] as $sConts){
						if(isset($sConts['name']) && $sConts['name'] != ''){
							if((isset($sConts['phone']) && $sConts['phone'] != '') || (isset($sConts['email']) && $sConts['email'] != '')){
								$eachSales[$si] = array(
									'ID'     												=> '',
									'adID'     											=> $adID,
									'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
									'type'     											=> '0',
									'name'     											=> $sConts['name'],
									'phone'     										=> $sConts['phone'],
									'email'     										=> $sConts['email'],
									'address'     									=> $sConts['address'],
									'city'     											=> $sConts['city'],
									'state'     										=> $sConts['state'],
									'zip'     											=> $sConts['zip']
								);
								$si++;
							}else{
								redirect(base_url().'index.php/reports/monthly_meeting/create/'.$adID.'?err=Error! Please fill all appropriate Sales Contacts fields!');
							}
						}
					}
				}

				if(isset($_POST['pConts'])){
					$pi=0;
					foreach($_POST['pConts'] as $pConts){
						if(isset($pConts['name']) && $pConts['name'] != ''){
							if((isset($pConts['phone']) && $pConts['phone'] != '') || (isset($pConts['email']) && $pConts['email'] != '')){
								$eachProsp[$pi] = array(
									'ID'     												=> '',
									'adID'     											=> $adID,
									'month'													=> $_POST['year'].'-'.$_POST['month'].'-01',
									'type'     											=> '1',
									'name'     											=> $pConts['name'],
									'phone'     										=> $pConts['phone'],
									'email'     										=> $pConts['email'],
									'address'     									=> $pConts['address'],
									'city'     											=> $pConts['city'],
									'state'     										=> $pConts['state'],
									'zip'     											=> $pConts['zip']
								);
								$pi++;
							}else{
								redirect(base_url().'index.php/reports/monthly_meeting/create/'.$adID.'?err=Error! Please fill all appropriate Prospect Franchisee fields!');
							}
						}
					}
				}
								
				$insert['frans'] 				= $this->db->insert_batch('monthly_update', $eachFran);
				
				//if($insert['sales'])
					$insert['sales'] 			= $this->db->insert_batch('contact_leads', $eachSales);
					
				//if($insert['prosp'])
					$insert['prosp'] 			= $this->db->insert_batch('contact_leads', $eachProsp);
				
				redirect(base_url().'?msg=Success!');
			}*/
			
	    $output['mainH1']					= '<a href="'.$this->config->item('base_url').'">Franchise Reporting System</a>';
	    $output['pageName']				= "Monthly Meeting Report - Create";
      $output['mainh2']    			= "Generate <strong>".$output['areadev'][0]->special_sales_report_name."'s</strong> of ".$output['areadev'][0]->region_office_name." Report for ";
      $output['sect1h3'] 				= "Monthly Group Meeting Held:";
      $output['sect2h3'] 				= "Sales Contact Info";
      $output['sect3h3'] 				= "Prospective Franchisee Info";
			
			$output['button'] 				= 'Submit Report';
			$output['action'] 				= 'noSubmit';

      $this->load->view('common/header',$output);
      $this->load->view('reports/monthly_meeting_edit',$output);
      $this->load->view('common/footer',$output);

    }
		
		public function view_all_month_reports(){
			
			
			//$adID 										= $this->uri->segment(4);
			$month 										= $this->uri->segment(5);
			$year 										= $this->uri->segment(6);
			
			$months 									= $this->functions->months();
			
      $this->load->model('reports/areadev_month_meeting');
			
      $reportingADs  						= $this->areadev_month_meeting->all_reporting_ADs($year.'-'.$month.'-01');
			$i=0;			
			foreach($reportingADs as $ad){
				
				$reports[$i]['office']							=	$ad->office;
      	$reports[$i]['frans']  							= $this->areadev_month_meeting->get_AD_meeting_report($ad->adID, $year.'-'.$month.'-01');
				$i++;
			}
			if($reports != NULL){
				$output['reports']							= $reports;
			}else{
				$output['reports'][0]				= false;
				$output['reports']['msg']		= 'No meeting data available for '.$months[$month].' '.$year.'!';
			}
				
			
	    $output['mainH1']					= '<a href="'.$this->config->item('base_url').'">Franchise Reporting System</a>';
	    $output['pageName']				= "Monthly Meeting Report - View";
      $output['mainh2']    			= "All Reports for ".$months[$month]." ".$year;
      $output['sect1h3'] 				= "Monthly Group Meeting Held:";
      $output['sect2h3'] 				= "Sales Contact Info";
      $output['sect3h3'] 				= "Prospective Franchisee Info";
			

      $this->load->view('common/header',$output);
      $this->load->view('reports/all_monthly_meeting_by_month',$output);
      $this->load->view('common/footer',$output);
			

			
		}
		
		public function view_all_month_non_reports(){
			
			
			//$adID 										= $this->uri->segment(4);
			$month 										= $this->uri->segment(5);
			$year 										= $this->uri->segment(6);
			
			$months 									= $this->functions->months();
			
      $this->load->model('reports/areadev_month_meeting');
			
      $reportingADs  						= $this->areadev_month_meeting->all_non_reporting_ADs($year.'-'.$month.'-01');
			$i=0;			
			foreach($reportingADs as $ad){
				
				$reports[$i]['office']							=	$ad->office;
      	$reports[$i]['frans']  							= $this->areadev_month_meeting->get_AD_meeting_report($ad->adID, $year.'-'.$month.'-01');
				$i++;
			}
			if($reports != NULL){
				$output['reports']							= $reports;
			}else{
				$output['reports'][0]				= false;
				$output['reports']['msg']		= 'No meeting data available for '.$months[$month].' '.$year.'!';
			}
				
			
	    $output['mainH1']					= '<a href="'.$this->config->item('base_url').'">Franchise Reporting System</a>';
	    $output['pageName']				= "Monthly Meeting Report - View";
      $output['mainh2']    			= "All ADs that did not report for ".$months[$month]." ".$year;
      $output['sect1h3'] 				= "Monthly Group Meeting Held:";
			

      $this->load->view('common/header',$output);
      $this->load->view('reports/monthly_meeting_norpt_by_month',$output);
      $this->load->view('common/footer',$output);
			

			
		}

	}

?>
