<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){
		parent::__construct();  
		$this->load->model('login_mod','login',TRUE);            
		if(!$this->login->check_session()){
			redirect('/login');
		}
	}

	public function index(){
		
		$this->load->model('reports/areadev_month_sales');
		$this->load->model('reports/areadev_month_meeting');
		$this->load->model('reports/end_of_year_mod');
		$this->load->model('survey/damaged_pics_mod');
		$this->load->model('survey/dealer_survey_mod');
			
		$adID 							= $this->session->userdata('adID');
		$lastyear 						=  date("Y",strtotime("-1 year"));
		
		if($this->session->userdata('type') == 0){ 
		// SHOW ADMIN DASHBOARD
		
			$c=0;
			$output['ads']  	= $this->areadev_month_sales->all_ADs();
			
			$date 						= date('Y-m-01', mktime(0, 0, 0, date("n")  , date("j")-30, date("Y")));
			
			foreach($output['ads'] as $ad){
				
				$sales					=	$this->areadev_month_sales->get_AD_report_count($ad->adID, $date);
				if($sales)
					$output['ads'][$c]->sales 		= $sales[0]->totalSales;
				else
					$output['ads'][$c]->sales			=	false;
	
				$meetings				=	$this->areadev_month_meeting->get_AD_report_count($ad->adID, $date);
				$contacts				=	$this->areadev_month_meeting->get_AD_contact_count($ad->adID, $date);
								
				if($meetings[0]->totalMeetings != 0 || $contacts[0]->totalContacts != 0){
						$output['ads'][$c]->meetings	=	true;
				}else{
						$output['ads'][$c]->meetings	=	false;
				}
				
				$yrendRec				= $this->end_of_year_mod->get_yrend_recognition_count($ad->adID, $lastyear);
				$yrendExp				= $this->end_of_year_mod->get_yrend_expense_count($ad->adID, $lastyear);
				$yrendChec			= $this->end_of_year_mod->get_yrend_check_count($ad->adID, $lastyear);
				
				$yer_saved			= $this->end_of_year_mod->get_yer_saves_count($ad->adID, $lastyear);
				$yee_saved			= $this->end_of_year_mod->get_yee_saves_count($ad->adID, $lastyear);
				$yec_saved			= $this->end_of_year_mod->get_yec_saves_count($ad->adID, $lastyear);
								
				if(($yrendRec[0]->count == 0 || $yrendExp[0]->count == 0 || $yrendChec[0]->count == 0) && ($yer_saved[0]->count != 0 || $yee_saved[0]->count != 0 || $yec_saved[0]->count != 0)){			
					$output['ads'][$c]->ye_button = '<a href="'.$this->config->item('base_url').'index.php/reports/end_of_year/create_AD/'.$ad->adID.'">
				<img src="'.$this->config->item('base_url').'addons/icons/edit_doc_64.png" alt="Continue" title="Continue" width="36" height="36" align="absmiddle" /> Continue</a>';
				}elseif(($yrendRec[0]->count != 0 || $yrendExp[0]->count != 0 || $yrendChec[0]->count != 0) && ($yer_saved[0]->count == 0 || $yee_saved[0]->count == 0 || $yec_saved[0]->count == 0)){
					$output['ads'][$c]->ye_button = '<a href="'.$this->config->item('base_url').'index.php/reports/end_of_year/view_AD/'.$ad->adID.'">
				<img src="'.$this->config->item('base_url').'addons/icons/view_doc_64.png" alt="View" title="View" width="36" height="36" align="absmiddle" /> View</a>';
				}else{
					$output['ads'][$c]->ye_button = '<a href="'.$this->config->item('base_url').'index.php/reports/end_of_year/create_AD/'.$ad->adID.'">
				<img src="'.$this->config->item('base_url').'addons/icons/add_doc_64.png" alt="Add" title="Add" width="36" height="36" align="absmiddle" /> Create</a>';
				}

				/*if($yrendRec[0]->count != 0 || $yrendExp[0]->count != 0 || $yrendChec[0]->count != 0){
					$output['ads'][$c]->end_of_year	=	true;
				}else{
					$output['ads'][$c]->end_of_year	=	false;
				}*/
				$c++;	
				
			}
			$salesMonths			= $this->areadev_month_sales->getAllSalesMonths($date);
			$meetingMonths		= $this->areadev_month_meeting->getAllMeetingMonths($date);
			//$this->functions->debug($meetingMonths);
			
			if(/*$_SERVER['REMOTE_ADDR'] == '64.138.211.45' &&*/($salesMonths != NULL || $meetingMonths != NULL)){

				function array_to_object($arr){
						$arrObject = array();
						foreach ($arr as $array) {
								$object = new stdClass();
								foreach ($array as $key => $value) {
										$object->$key = $value;
								}
								$arrObject[] = $object;
						}
				
						return $arrObject;
				}
				function super_unique($array){
						$result = array_map("unserialize", array_unique(array_map("serialize", $array)));
						foreach ($result as $key => $value)  {
								if ( is_array($value) ) {
									$result[$key] = super_unique($value);
								}
						}
						return $result;
				}
				function merge_arrays($arr1, $arr2){
						$arr1 = (array)$arr1;
						$arr2 = (array)$arr2;
						$output = array_merge($arr1, $arr2);
						sort($output);
						return super_unique($output);
				}
				
				$salesMonths 		= array_to_object($salesMonths);
				$meetingMonths 	= array_to_object($meetingMonths);
				
				$results = merge_arrays($salesMonths, $meetingMonths);
				
				foreach($results as $key => $result){
					$results[$key]->month	=	date('F', strtotime($result->date));
					$results[$key]->link	=	date('m/Y', strtotime($result->date));
					$results[$key]->year	=	date('Y', strtotime($result->date));
				}
				
				//$this->functions->debug($results);
				
				$output['oldRpts'] = $results;
				
			}
			
			$output['mainH1']			= "Reporting";
      		$output['mainH2']    		= "Administrator Reports for ".date('F, Y', mktime(0, 0, 0, date("n")  , date("j")-30, date("Y")));
			
			$this->load->view('common/header',$output);
			$this->load->view('admin_dashboard');
			$this->load->view('common/footer',$output);
					
		}else{ 
		// SHOW AD DASHBOARD
		
				
			$viewRpt 					=  date('Y-m-01', mktime(0, 0, 0, date("n")  , date("j")-30, date("Y")));
			
			if($this->session->userdata('alt_adID')){
				$alt_adID 				= $this->session->userdata('alt_adID');

				//$where					= 's.adID='.$adID.' OR s.adID='.$alt_adID;

				$output['adInfo']		= $this->areadev_month_sales->get_AD($adID);
				$output['alt_adInfo']	= $this->areadev_month_sales->get_AD($alt_adID);
				$output['sales']		= $this->areadev_month_sales->all_AD_sales_reports_alt($adID, $alt_adID);
				$meetings  				= $this->areadev_month_meeting->all_AD_meeting_reports_alt($adID, $alt_adID);
				$contacts  				= $this->areadev_month_meeting->all_AD_contact_reports_alt($adID, $alt_adID);
			}else{
				$output['adInfo']		= $this->areadev_month_sales->get_AD($adID);
				$output['sales']  		= $this->areadev_month_sales->all_AD_sales_reports($adID);
				$meetings  				= $this->areadev_month_meeting->all_AD_meeting_reports($adID);
				$contacts  				= $this->areadev_month_meeting->all_AD_contact_reports($adID);
			}
			
			if(!$meetings && !$contacts){
				$output['meetings']  	= false;
			}else{
				if($meetings && $contacts || $meetings && !$contacts) $output['meetings'] = $meetings; elseif(!$meetings && $contacts) $output['meetings'] = $contacts;
			}
			
			// CHECK IF THIS MONTH WAS COMPLETED
			$output['salesOK']  		= $this->areadev_month_sales->get_AD_report_complete($adID, $viewRpt);
			$output['meetingsOK']		= $this->areadev_month_meeting->get_AD_report_complete($adID, $viewRpt);
			$output['contactsOK']		= $this->areadev_month_meeting->get_AD_contact_complete($adID, $viewRpt);
			
			// CHECK YEAREND REPORTS AND SAVES
			$yrendRec					= $this->end_of_year_mod->get_yrend_recognition_count($adID, $lastyear);
			$yrendExp					= $this->end_of_year_mod->get_yrend_expense_count($adID, $lastyear);
			$yrendChec					= $this->end_of_year_mod->get_yrend_check_count($adID, $lastyear);
			$yer_saved					= $this->end_of_year_mod->get_yer_saves_count($adID, $lastyear);
			$yee_saved					= $this->end_of_year_mod->get_yee_saves_count($adID, $lastyear);
			$yec_saved					= $this->end_of_year_mod->get_yec_saves_count($adID, $lastyear);
			
			if(($yrendRec[0]->count == 0 || $yrendExp[0]->count == 0 || $yrendChec[0]->count == 0) && ($yer_saved[0]->count != 0 || $yee_saved[0]->count != 0 || $yec_saved[0]->count != 0)){
				$output['ye_link'] = $this->config->item('base_url').'index.php/reports/end_of_year/create_AD/'.$adID;
				$output['ye_text'] = 'Continue the '.$output['adInfo'][0]->region_office_name.' Annual Report';
				$output['ye_image'] = '<img src="'.$this->config->item('base_url').'addons/icons/edit_doc_64.png" alt="Continue" title="Continue" width="36" height="36" align="absmiddle" />';
				
			}elseif(($yrendRec[0]->count != 0 || $yrendExp[0]->count != 0 || $yrendChec[0]->count != 0) && ($yer_saved[0]->count == 0 || $yee_saved[0]->count == 0 || $yec_saved[0]->count == 0)){
				$output['ye_link'] = $this->config->item('base_url').'index.php/reports/end_of_year/view_AD/'.$adID;
				$output['ye_text'] = 'View the '.$output['adInfo'][0]->region_office_name.' Annual Report';
				$output['ye_image'] = '<img src="'.$this->config->item('base_url').'addons/icons/view_doc_64.png" alt="View" title="View" width="36" height="36" align="absmiddle" />';
				
			}else{
				$output['ye_link'] = $this->config->item('base_url').'index.php/reports/end_of_year/create_AD/'.$adID;
				$output['ye_text'] = 'Create the '.$output['adInfo'][0]->region_office_name.' Annual Report';
				$output['ye_image'] = '<img src="'.$this->config->item('base_url').'addons/icons/add_doc_64.png" alt="Add" title="Add" width="36" height="36" align="absmiddle" />';
			}
				
			$adInfo							= $this->areadev_month_sales->get_AD($adID);
			$survey 						= $this->damaged_pics_mod->checkVote($adID);
			
			// Check to see if there are any dealer surveys
			$output['dealerSurveys']  		= $this->dealer_survey_mod->get_all_Surveys($adID);
			
			
			// CHANGE TO == WHEN TEST IS READY FOR SUBMITTING!
			/*if($survey == NULL && $_SERVER['REMOTE_ADDR'] == '64.138.211.45')
				$output['news'] 			= '<strong>ATTENTION:</strong> '.$adInfo[0]->region_office_name. ' has not yet taken the Pricing Guide Photo Survey! Please go <a href="'.$this->config->item('base_url').'index.php/survey/damaged_pics/loadSurvey/'.$adID.'">HERE</a> to complete!';
			else*/
				$output['news'] 			= NULL;
				
							
			$output['mainH1']				= "COP Reporting";
			$output['mainH2']    			= "Area Developer Dashboard";
			
			$this->load->view('common/header',$output);
			
			//if($this->session->userdata('adID')== 0 || $_SERVER['REMOTE_ADDR'] == '64.138.211.45')
				//$this->load->view('AD_dashboard_dev');
			//else
				$this->load->view('AD_dashboard');
			
			
			$this->load->view('common/footer',$output);
		}
	}
}
