<?php
  class Brand_Dev_Mod extends CI_Model {
    public function __construct(){
      parent::__construct();
    }
    
    public function checkVote($ip){
     	$this->db->select('*');
      $this->db->from('brandVotes as bv');
      $this->db->where('ipAddress', $ip);

      $query 				= $this->db->get(); 
      return        $query->result(); 
		}
		
		
  }  
?>
