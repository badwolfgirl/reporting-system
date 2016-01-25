<?php
    class Login extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('login_mod','login',TRUE);
        }

        function index()
        {
            $this->load->view('login');
        }
        
        function logout(){

            $this->session->sess_destroy();
            redirect('/login?inf='.urlencode('You are logged out!'));

        } 
        
        function do_login(){
            $userName = $this->input->post('username');
            $password = $this->input->post('password');

            $chkAuth = $this->login->checkAuth($userName,$password);
            
            if($chkAuth){
                $result["status"] = true;
                
                $results['subject'] = 'Login Successfull';
                $results['location'] = 'index.php?msg='.urlencode('You have successfully logged in!');
								
            }else{
                $result["status"] = false;
                $results['location'] = 'index.php/login?err='.urlencode('You have failed to log in! Please check username and password.');
                
            }
						
						redirect(base_url().$results['location']);

        }
        
    }
?>