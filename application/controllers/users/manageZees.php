<?php
  class ManageZees extends CI_Controller {  

		public function __construct(){
			parent::__construct();  
			$this->load->model('login_mod','login',TRUE);            
			if(!$this->login->check_session()){
				redirect('/login');
			}
			if($this->session->userdata('adID') != '-1'){
				redirect('');
			}
		}
		
    public function view(){
			
			$adID 										= $this->uri->segment(4);
			
			$months 									= $this->functions->months();			
						
      $this->load->model('users/manageads_mod');
			
      $output['areadev']  				= $this->manageads_mod->get_AD($adID);
      $output['franchisees']  		= $this->manageads_mod->all_franchisees_by_AD($adID);
	
	    $output['mainH1']						= '<a href="'.$this->config->item('base_url').'">mycolorsonparade</a>';
	    $output['pageName']					= "Area Developers - View";
      $output['mainh2']    				= "Viewing <strong>".$output['areadev'][0]->firstName." ".$output['areadev'][0]->lastName."</strong>";;
      $output['sect1h3'] 					= $output['areadev'][0]->firstName." ".$output['areadev'][0]->lastName."'s Profile";
      $output['sect2h3'] 					= "Franchisee List";
			
			$this->load->view('common/header',$output);
			$this->load->view('users/viewAD',$output);
			$this->load->view('common/footer',$output);
			
		}
		
    public function update(){
		
      $this->load->model('users/manageads_mod');
			
			if($_POST['adUpdate']){
				
				$adData 				= array( $_POST['type'] => $_POST['val'] );
				$where					= '"adID", '.$_POST['adID'];
				$updateAD  			= $this->manageads_mod->upadate($where, $adData, 'area_developer');
			}
			if($_POST['franUpdate']){
				$franData = array(
					'active' 			=> $_POST['active']
				);
				$where						= '"franID", '.$_POST['franID'];
				$upadateFran  		= $this->manageads_mod->upadate($where, $franData, 'techs');
			}
		
		}
		
	}

?>
