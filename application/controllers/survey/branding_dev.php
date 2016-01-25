<?php
  class Branding_Dev extends CI_Controller {  

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
		
		public function loadSurvey(){
			
			$this->load->model('survey/brand_dev_mod');
			
			if(isset($_POST['action']) && $_POST['action'] == 'Submit'){
								
				// Preform a query for the IP address, if already captured, fail insert
				$checkVote = $this->brand_dev_mod->checkVote($_SERVER['REMOTE_ADDR']);
				
				if($checkVote == NULL){
					
					$vote = array(
						'id'     												=> "",
						'ipAddress'  										=> $_SERVER['REMOTE_ADDR'],
						'surveyOpt'											=> $_POST['RadioGroup1'],
						'datetime'    									=> date("Y-m-d H:i:s")
					);			
					
					$this->db->insert('brandVotes', $vote);
					redirect(base_url().'index.php/survey/branding_dev/thanks');
				
				}else{
					redirect(base_url().'index.php/survey/branding_dev/loadSurvey?err='.urlencode("I'm sorry, but it appears that you have already voted. Thank you again!"));
				}
			}
			
      $output['mainh2']    				= "<strong>Survey for Brand Development</strong>";
						
			$output['button'] 				= 'Submit Vote';
			$output['action'] 				= 'Submit';

			$this->load->view('common/header',$output);
			$this->load->view('survey/branding_dev',$output);
			$this->load->view('common/footer',$output);
			
		}			// load survey form
		public function thanks(){
			
      $output['mainh2']    				= "<strong>Survey for Brand Development</strong>";
						
			$this->load->view('common/header',$output);
			$this->load->view('survey/branding_dev_thank_you',$output);
			$this->load->view('common/footer',$output);
			
		}				// submit survey to DB
		
		
	}

?>
