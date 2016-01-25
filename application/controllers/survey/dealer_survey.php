<?php
class Dealer_Survey extends CI_Controller {  

	public function __construct(){
		parent::__construct();  
		/*$this->load->model('login_mod','login',TRUE);            
		if(!$this->login->check_session()){
			redirect('/login?wrn='.urlencode('You are not logged in!'));
		}
		if(($this->session->userdata('adID') != '-1') && ($this->uri->segment(4) != $this->session->userdata('adID'))){
			redirect('?wrn='.urlencode('You are not authorized to view page!'));
		}*/
	}
	
	public function create(){
		
		$this->load->model('survey/dealer_survey_mod');

		$adID										= $this->uri->segment(4);
		$output['areadev']							= $this->dealer_survey_mod->get_AD($adID);
					
		$output['mainH1']							= '<a href="'.$this->config->item('base_url').'">COP Reporting</a>';
		$output['pageName']							= "Dealership Survey - Submit";
		$output['mainh2']							= "<strong>Dealer Satisfaction Survey</strong>";
		$output['mainh2']    						= "Dealership Survey for <strong>".$output['areadev'][0]->special_sales_report_name."</strong> of <strong>".$output['areadev'][0]->region_office_name."</strong>";
		$output['sect1h3']							= "Survey Questions Section";
		$output['sect2h3']							= "Dealer Information Section";
					
		$output['button'] 							= 'Submit Survey';
		$output['action'] 							= 'Submit';
		
		$this->load->view('common/header',$output);
		$this->load->view('survey/dealership_create',$output);
		$this->load->view('common/footer',$output);
		
	}
	public function submit(){
										
		$adID = $this->uri->segment(4);
		
		if ($this->form_validation->run('dealer_survey') == FALSE){
			$this->form_validation->set_error_delimiters('<span style="color:#F00;">', '</span>');
		
			$this->create();
		}else{
			
			$entry = array(
				'ID'     							=> '',
				'adID'     							=> $adID,
				'franID'  							=> $_POST['franID'],
				'dateSubmit'						=> date("Y-m-d"),
				'repair_quality'     				=> $_POST['repair_quality'],
				'cycle_time'     					=> $_POST['cycle_time'],
				'customer_service'     				=> $_POST['customer_service'],
				'professionalism'     				=> $_POST['professionalism'],
				'communication'    					=> $_POST['communication'],
				'recommend'    						=> $_POST['recommend'],
				'dealerName'     					=> $_POST['dealerName'],
				'dealerContact'    					=> $_POST['dealerContact'],
				'dealerAddress'     				=> $_POST['dealerAddress'],
				'dealerCity'     					=> $_POST['dealerCity'],
				'dealerState'     					=> $_POST['dealerState'],
				'dealerZip'    						=> $_POST['dealerZip'],
				'dealerPhone'    					=> $_POST['dealerPhone'],
				'dealerEmail'     					=> $_POST['dealerEmail']
			);
			
			$insert['results'] 	= $this->db->insert('dealer_surveys', $entry);
			
			if($insert['results'])
				redirect(base_url().'?msg='.urlencode('Your Dealer Surevey for '.$_POST['dealerName'].' was successfully entered!'));
			else
				redirect(base_url().'?err='.urlencode('There was an issue with the survey. Contact your site Admin.'));
				
		}
	}
	public function view(){
				
		$this->load->model('survey/dealer_survey_mod');

		$adID										= $this->uri->segment(4);
		$sID										= $this->uri->segment(5);
				
		$output['adInfo']							= $this->dealer_survey_mod->get_AD($adID);		
		$output['survey']  							= $this->dealer_survey_mod->get_survey($sID);
		$franInfo  									= $this->dealer_survey_mod->get_surveyFran($output['survey'][0]->franID);
		$output['survey'][0]->submittedBy			= ($franInfo[0]->nickname != '' ? $franInfo[0]->nickname : $franInfo[0]->firstName).' '.$franInfo[0]->lastName.($franInfo[0]->suffix != '' ? ' '.$franInfo[0]->suffix : '');
		
		$output['mainH1']							= '<a href="'.$this->config->item('base_url').'">COP Reporting</a>';
		$output['pageName']							= "Dealership Survey - View";
		$output['mainh2']							= "<strong>Submitted Dealer Satisfaction Surveys</strong>";
		$output['mainh2']    						= "Dealership Survey - <strong>".$output['survey'][0]->dealerName."</strong>";
		$output['sect1h3']							= "Survey Answers Section";
		$output['sect2h3']							= "Dealer Information Section";

		$this->load->view('common/header',$output);
		$this->load->view('survey/dealership_view',$output);
		$this->load->view('common/footer',$output);
		
	}
	public function printView(){
				
		$this->load->model('survey/dealer_survey_mod');

		$adID										= $this->uri->segment(4);
		$sID										= $this->uri->segment(5);
				
		$output['adInfo']							= $this->dealer_survey_mod->get_AD($adID);		
		$output['survey']  							= $this->dealer_survey_mod->get_survey($sID);
		$franInfo  									= $this->dealer_survey_mod->get_surveyFran($output['survey'][0]->franID);
		$output['survey'][0]->submittedBy			= ($franInfo[0]->nickname != '' ? $franInfo[0]->nickname : $franInfo[0]->firstName).' '.$franInfo[0]->lastName.($franInfo[0]->suffix != '' ? ' '.$franInfo[0]->suffix : '');
		
		$output['mainH1']							= '<a href="'.$this->config->item('base_url').'">COP Reporting</a>';
		$output['mainh2']							= "<strong>Submitted Dealer Satisfaction Surveys</strong>";
		$output['mainh2']    						= "Dealership Survey <strong>".$output['survey'][0]->dealerName."</strong>";
		$output['sect1h3']							= "Survey Answers Section";
		$output['sect2h3']							= "Dealer Information Section";

		$this->load->view('common/header_print',$output);
		$this->load->view('survey/dealership_print',$output);
		$this->load->view('common/footer_print',$output);
		
	}
	
	
}

?>
