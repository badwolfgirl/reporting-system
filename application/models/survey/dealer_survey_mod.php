<?php
  class Dealer_Survey_Mod extends CI_Model {
    public function __construct(){
      parent::__construct();
    }
    
    public function all_ADs(){
      
		$this->db->select('*');
		$this->db->from('area_developer as ad');
			//$this->db->join('techs as fr', 'fr.franID=ad.franID', 'left');
		$this->db->where('ad.active', 'yes');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
      
    }
    public function get_AD($id){
		
		$this->db->select('*');
		$this->db->from('area_developer as ad');
		//$this->db->join('techs as fr', 'ad.franID = fr.franID');
		$this->db->where('ad.adID', $id);
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			      
    }
	public function get_AD_Franchisee($id){
      
		
		$this->db->select('*');
		$this->db->from('techs');
		$this->db->where('franID', $id);
		$this->db->where('active', 'yes');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
		 
			 
    }
    public function get_all_Surveys($id){
      
		$this->db->select('*');
		$this->db->from('dealer_surveys');
		$this->db->where('adID', $id);
		$this->db->order_by('dateSubmit', 'desc');
		
		$query 		= $this->db->get(); 
		return        $query->result(); 
		
			 
    }
    public function get_survey($id){
      
		$this->db->select('*');
		$this->db->from('dealer_surveys');
		$this->db->where('ID', $id);
		
		$query 		= $this->db->get(); 
		return        $query->result(); 
		
			 
    }
	public function get_surveyFran($id){
      
		
		$this->db->select('firstName, lastName, suffix, nickname');
		$this->db->from('techs');
		$this->db->where('franID', $id);
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
		 
			 
    }
  }  
?>
