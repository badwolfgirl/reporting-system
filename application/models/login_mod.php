<?php
  class Login_Mod extends CI_Model
  {
    function __construct()
    {
      parent::__construct();
      $this->load->library('session');
    }

    function checkAuth($uName,$pass){
      $this->db->select('*');
      $this->db->where('username',$uName);
      $this->db->where('password',md5($pass));
      $query = $this->db->get('users');

      if($query->num_rows()>0){
        $data = $query->row_array();
        $sessionArray = array(   
          'ID'          => $data['ID'],
          'type'        => $data['type'],
          'adID'        => $data['adID'],
          'alt_adID'        => $data['alt_adID'],
          'franID'      => $data['franID'],
          'name'        => $data['firstName'].' '.$data['lastName'],
          'firstName'   => $data['firstName'],
          'lastName'    => $data['lastName'],
          'username'    => $data['username'],
          'pass'		    => $pass,
          'emails'      => $data['emails'],
          'logged_in'   =>TRUE
        );

        $this->session->set_userdata($sessionArray);
        return TRUE;
      }else{
        return FALSE;
      }
    }

    public function check_session()
    {
      if ($this->session->userdata('ID') AND $this->session->userdata('logged_in')=='TRUE') {
        //$this->log_activity();
        return TRUE;
      } else {
        return FALSE;
      }
    }

    public function restrict($private=false)
    {
      if($private==true){
        if(!$this->check_session()){
          redirect('/login');
        }
      }
    }  

    public function logout(){

      $this->session->unset_userdata('ID');
      $this->session->unset_userdata('logged_in');
      session_destroy();
    }

   /* public function log_activity(){

      $log=array(
        'date'  => date('Y-m-d H:i:s'),
        'ip'    => $_SERVER['REMOTE_ADDR'],
        'user'  => $this->session->userdata('id'),
        'page'  => $_SERVER['REQUEST_URI']        
      );

      //$this->db->insert('table',$log);

    }*/
  }
?>