<?php
  class ManageADs extends CI_Controller {  

		public function __construct(){
			parent::__construct();  
			$this->load->model('login_mod','login',TRUE);            
			if(!$this->login->check_session()){
				redirect('/login');
			}
			if($this->session->userdata('adID') != '-1'){
				redirect('?wrn='.urlencode('You are not authorized to view page!'));
			}
		}
		
    public function view(){
			
			$adID 										= $this->uri->segment(4);
			$months 									= $this->functions->months();			
						
      $this->load->model('users/manageads_mod');
			$this->load->model('survey/dealer_survey_mod');
							
			$output['areadev']  				= $this->manageads_mod->get_AD($adID);
			$output['adTechs']  				= $this->manageads_mod->get_ADTechs($adID);
			
			$adTechCount	= 0;
			if($output['adTechs'][0] != false){
				foreach($output['adTechs'] as $adTech){
					$adTechCount++;
				}
			}
			$output['adColumns'] = $adTechCount+1;
							
				if($output['areadev'][0]->franID != 0 ){
						$output['areadev'][0]->username = $logins[0]->username;
						$output['areadev'][0]->password = $logins[0]->password;
						$output['areadev'][0]->emails 	= $logins[0]->emails;
				}else{
						$output['areadev'][0]->firstName 	= '<strong>Admin</strong>';
						$output['areadev'][0]->lastName 	= '<strong> User</strong>';
						$output['areadev'][0]->username 	= '<strong>- Company Owned -</strong>';
						$output['areadev'][0]->password 	= '-';
						$output['areadev'][0]->emails 		= '-';
				}
				
				$where 											= 't.reportADs LIKE "%|'.$adID.'|%"';
				
				$output['franchisees']  		= $this->manageads_mod->all_franchisees_by_AD($where, $adID);
				
				//$this->functions->debug($output);
				
				$meetings  									= $this->manageads_mod->all_AD_meeting_reports($adID);
				$contacts  									= $this->manageads_mod->all_AD_contact_reports($adID);
				
				if($meetings && $contacts){
					$output['meetings'] = $meetings;
				}elseif($meetings && !$contacts){
					$output['meetings'] = $meetings;
				}elseif(!$meetings && $contacts){
					$output['meetings'] = $contacts;
				}elseif(!$meetings && !$contacts){
					$output['meetings']  					= false;				
				}
				
				$output['sales']  					= $this->manageads_mod->all_AD_sales_reports($adID);
				$output['surveys']  				= $this->dealer_survey_mod->get_all_Surveys($adID);
				
				//$this->functions->debug($output['surveys']);
				
				$output['mainH1']						= '<a href="'.$this->config->item('base_url').'">mycolorsonparade</a>';
				$output['pageName']					= "Area Developers - View";
				$output['mainh2']    				= "Viewing <strong>".$output['areadev'][0]->firstName." ".$output['areadev'][0]->lastName."'s</strong> Profile Info";;
				$output['sect1h3'] 					= "Monthly Sales Reports";
				$output['sect2h3'] 					= "Franchisee List";
				$output['sect3h3'] 					= "Monthly Meeting Reports";
				$output['sect4h3'] 					= "Dealership Surveys";
				
				$this->load->view('common/header',$output);
				$this->load->view('users/viewAD',$output);
				$this->load->view('common/footer',$output);
				
			/*}else{
				redirect('?wrn='.urlencode('Profile Page does not exist!'));
			}*/
			
		}
		
    public function edit(){
			
			$adID 										= $this->uri->segment(4);
		
      $this->load->model('users/manageads_mod');
      $output['areadev']  				= $this->manageads_mod->get_AD($adID);
			$logins						  				= $this->manageads_mod->get_login_info($output['areadev'][0]->franID);
			
			if($logins){
					$output['areadev'][0]->username = $logins[0]->username;
					$output['areadev'][0]->password = $logins[0]->password;
					$output['areadev'][0]->emails 	= $logins[0]->emails;
			}else{
					$output['areadev'][0]->username = '';
					$output['areadev'][0]->password = '';
					$output['areadev'][0]->emails 	= '';
			}
			
			
			
		
	    $output['mainH1']						= '<a href="'.$this->config->item('base_url').'">mycolorsonparade</a>';
	    $output['pageName']					= "Area Developers - View";
      $output['mainh2']    				= "Viewing <strong>".$output['areadev'][0]->firstName." ".$output['areadev'][0]->lastName."</strong>";;
      $output['sect1h3'] 					= $output['areadev'][0]->firstName." ".$output['areadev'][0]->lastName."'s Profile";
      $output['sect2h3'] 					= "Franchisee List";
			
			$this->load->view('common/header',$output);
			$this->load->view('users/editAD',$output);
			$this->load->view('common/footer',$output);
		}
		
    public function addAD(){
			
			if(isset($_POST['submitAD'])){
				$this->functions->debug($_POST);
				
				// AD INFO
				$adInfo = array(
					'adID'     											=> $_POST['adID'],
					'franID'  											=> $_POST['franID'],
					'region_color'									=> $_POST['region_color'],
					'region_office_name'    				=> $_POST['region_office_name'],
					'corporate_business_name'    		=> $_POST['corporate_business_name'],
					'special_sales_report_name'   	=> $_POST['special_sales_report_name'],
					'DMA_location'    							=> $_POST['DMA_location'],
					'active'    										=> $_POST['active'],
					'royalty7'    									=> $_POST['royalty7'],
					'adFund1'    										=> $_POST['adFund1'],
					'billColl2'    									=> $_POST['billColl2']
				);
				
				// TECH INFO
				$franInfo = array(
					'adID'     											=> $_POST['adID'],
					'franID'  											=> $_POST['franID'],
					'reportADs'											=> $_POST['reportADs'],
					'contract_type'    							=> $_POST['contract_type'],
					'firstName'    									=> $_POST['firstName'],
					'lastName'    									=> $_POST['lastName'],
					'suffix'    										=> $_POST['suffix'],
					'nickname'    									=> $_POST['nickname'],
					'company'    										=> $_POST['company'],
					'birth_date'    								=> $_POST['birth_date']
				);
				
				// USER INFO (also Tech info if I can eliminate TECH TABLE AND USER TABLE)
				if(isset($_POST['password']) && $_POST['passwordNew'] == "Leave if the Same")
					$pass 	= $_POST['passwordOld'];
				else
					$pass 	= md5($_POST['passwordNew']);
				
				$userInfo = array(
					'id'     												=> $_POST['id'],
					'adID'     											=> $_POST['adID'],
					'franID'  											=> $_POST['franID'],
					'reportADs'											=> $_POST['reportADs'],
					'access_type'    								=> $_POST['access_type'],
					'active'    										=> $_POST['active'],
					'email'    											=> $_POST['email'],
					'password'    									=> $pass,
					'firstName'    									=> $_POST['firstName'],
					'lastName'    									=> $_POST['lastName'],
					'suffix'    										=> $_POST['suffix'],
					'nickname'    									=> $_POST['nickname'],
					'company'    										=> $_POST['company'],
					'birth_date'    								=> $_POST['birth_date'],
					'social_security'    						=> $_POST['social_security'],
					'ein'    												=> $_POST['ein'],
					'payment_date'    							=> $_POST['payment_date'],
					'payment_amount'    						=> $_POST['payment_amount']
				);
				
				
				
				
				//INSERT INTO AREA DEVELOPER TABLE
				//INSERT INTO TECH TABLE
				//INSERT INTO USER TABLE
				
				
			}
			
			
			
			
			
		}
    public function editAD(){
			
			if(isset($_POST['submitAD'])){
				$this->functions->debug($_POST);
				
				// AD INFO
				$adInfo = array(
					'adID'     											=> $_POST['adID'],
					'franID'  											=> $_POST['franID'],
					'region_color'									=> $_POST['region_color'],
					'region_office_name'    				=> $_POST['region_office_name'],
					'corporate_business_name'    		=> $_POST['corporate_business_name'],
					'special_sales_report_name'   	=> $_POST['special_sales_report_name'],
					'DMA_location'    							=> $_POST['DMA_location'],
					'active'    										=> $_POST['active'],
					'royalty7'    									=> $_POST['royalty7'],
					'adFund1'    										=> $_POST['adFund1'],
					'billColl2'    									=> $_POST['billColl2']
				);
				
				// TECH INFO
				$franInfo = array(
					'adID'     											=> $_POST['adID'],
					'franID'  											=> $_POST['franID'],
					'reportADs'											=> $_POST['reportADs'],
					'contract_type'    							=> $_POST['contract_type'],
					'firstName'    									=> $_POST['firstName'],
					'lastName'    									=> $_POST['lastName'],
					'suffix'    										=> $_POST['suffix'],
					'nickname'    									=> $_POST['nickname'],
					'company'    										=> $_POST['company'],
					'birth_date'    								=> $_POST['birth_date']
				);
				
				// USER INFO (also Tech info if I can eliminate TECH TABLE AND USER TABLE)
				if(isset($_POST['password']) && $_POST['passwordNew'] == "Leave if the Same")
					$pass 	= $_POST['passwordOld'];
				else
					$pass 	= md5($_POST['passwordNew']);
				
				$userInfo = array(
					'id'     												=> $_POST['id'],
					'adID'     											=> $_POST['adID'],
					'franID'  											=> $_POST['franID'],
					'reportADs'											=> $_POST['reportADs'],
					'access_type'    								=> $_POST['access_type'],
					'active'    										=> $_POST['active'],
					'email'    											=> $_POST['email'],
					'password'    									=> $pass,
					'firstName'    									=> $_POST['firstName'],
					'lastName'    									=> $_POST['lastName'],
					'suffix'    										=> $_POST['suffix'],
					'nickname'    									=> $_POST['nickname'],
					'company'    										=> $_POST['company'],
					'birth_date'    								=> $_POST['birth_date'],
					'social_security'    						=> $_POST['social_security'],
					'ein'    												=> $_POST['ein'],
					'payment_date'    							=> $_POST['payment_date'],
					'payment_amount'    						=> $_POST['payment_amount']
				);
				
				
				
				
				//UPDATE INTO AREA DEVELOPER TABLE
				//UPDATE INTO TECH TABLE
				//UPDATE INTO DEV_USERS TABLE
				
				
			}
			
			
			
			
			
		}
public function addTech($fnID = '', $tech = ''){

        $adID  = $this->uri->segment(4);

        $adID_edit  = $this->uri->segment(5);
        $tech  = $this->uri->segment(6);
        if(isset($adID) && isset($adID_edit) && isset($tech) && $tech == 'tech'){
            $fnID = $adID;
            $adID = $adID_edit;
        }else{
            $fnID = '';
        }
        $this->load->model('users/manageads_mod');
        $output['areadev'] = $this->manageads_mod->get_AD($adID);
        
        
        if($fnID && $tech == 'tech'){
            $output['tech'] = $this->manageads_mod->get_tech($fnID);
            
            count($output['tech']) || $output['errors'][] = 'Tech could not be found.';
        }else{
            $output['tech'] = $this->manageads_mod->get_new_tech();
        }
        //validation rules
        $this->form_validation->set_rules('reportADs', 'Reporting AD ID(s)', 'required');
        $this->form_validation->set_rules('contract_type', 'Contract Type', 'required');
        $this->form_validation->set_rules('firstName', 'First Name', 'required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required');
        $this->form_validation->set_rules('suffix', 'Suffix', 'required');
        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        $this->form_validation->set_rules('custom_sales_report_name', 'Custom Sales Report Name', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('birth_date', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('social_security', 'Social Security', 'required');
        $this->form_validation->set_rules('ein', 'Ein', 'required');
        $this->form_validation->set_rules('payment_date', 'Payment Date', 'required');
        $this->form_validation->set_rules('payment_amount', 'Payment Amount', 'required');
        $this->form_validation->set_rules('active', 'Active', 'required');
        
        
        if($this->form_validation->run() == TRUE){
            $data_array = $this->manageads_mod->array_form_post(array('adID','reportADs','contract_type','firstName','lastName','suffix','nickname','custom_sales_report_name','company','birth_date','social_security','ein','payment_date','payment_amount','active'));
            
            $this->manageads_mod->save($data_array, $fnID);
            redirect('users/manageADs/view/'.$adID);
        }
        
        $output['mainh2'] = "<strong>" . $output['areadev'][0]->firstName . " " . $output['areadev'][0]->lastName . "'s</strong>";
        $this->load->view('common/header', $output);
        $this->load->view('users/addTech', $output);
        $this->load->view('common/footer', $output);
    }
    
    public function deleteTech($id,$adID){
        $this->load->model('users/manageads_mod');
        $this->manageads_mod->delete($id);
        redirect('users/manageADs/view/'.$adID);
    }
		
	}
		

?>
