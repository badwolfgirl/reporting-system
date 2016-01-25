<?php
  class Damaged_Pics extends CI_Controller {  

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
			
			$output['adID'] 										= $this->uri->segment(4);
      $this->load->model('survey/damaged_pics_mod');
			
			$output['categories']  								= $this->damaged_pics_mod->all_pic_categories();
			
			$c=0;			
			foreach($output['categories'] as $cat){
				
				$pics																=	$this->damaged_pics_mod->get_pic_by_category($cat->picCatID);
				if($pics)
					$output['categories'][$c]->pics		= $pics;
				else
					$output['categories'][$c]->pics		=	false;
								
				$c++;	
			}
			
						
			if(isset($_POST['action']) && $_POST['action'] == 'Submit'){
				
				/*
				$i=0;
				foreach($_POST['pic'] as $pic){
					
						$this->functions->debug($pic);
					
						$eachPic[$i] = array(
							'ID'     												=> '',
							'adID'     											=> $this->uri->segment(4),
							'picID'													=> $pic['picID'],
							'picCatID'     									=> $pic['picCatID'],
							'use_it'     										=> $pic['use_it'],
							'price'    											=> $pic['price'],
							'comments'	    								=> urlencode($pic['comments']),
							'dateVoted'    									=> date('Y-m-d')
						);
						
						
					$i++;
				}
				
				//$this->functions->debug($eachPic);
				//$insert 			= $this->db->insert_batch('picVotes', $eachPic);
				
				redirect(base_url().'?msg='.urlencode('Your vote has been submitted! Thank you!'));
				*/
				
				echo '<div class="noteSuccess">WILL REDIRECT TO THE DASHBOARD PAGE WITH A SUCCESS MESSAGE</div>';
				
			}
			
			$output['mainH1']					= '<a href="'.$this->config->item('base_url').'">COP Reporting</a>';
      $output['mainh2']    				= "<strong>Survey for Pricing Guide</strong>";
						
			$output['button'] 				= 'Submit Vote';
			$output['action'] 				= 'Submit';

			$this->load->view('common/header',$output);
			$this->load->view('survey/damaged_pics',$output);
			$this->load->view('common/footer',$output);
			
		}			// load survey form
		public function submitSurvey(){}				// submit survey to DB
		public function reviewSurveySummary(){}	// review survey results from DB
		
		
	}

?>
