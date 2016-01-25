<?php
  class Damaged_Pics_Mod extends CI_Model {
    public function __construct(){
      parent::__construct();
    }
    
    public function checkVote($id){
     	$this->db->select('*');
      $this->db->from('picVotes as pv');
      $this->db->where('pv.adID', $id);

      $query 				= $this->db->get(); 
      return        $query->result(); 
		}
		
    public function all_pic_categories(){
      
     	$this->db->select('*');
      $this->db->from('damage_pics_categories as dpc');

      $query 				= $this->db->get(); 
      return        $query->result(); 
      
    }
    public function get_pic_by_category($id){
      
     	$this->db->select('*');
      $this->db->from('damage_pics as dp');
      $this->db->where('dp.picCatID', $id);

      $query 				= $this->db->get(); 
      return        $query->result(); 
			      
    }
		
  }  
?>
