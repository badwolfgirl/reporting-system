<?php
  class End_Of_Year_Mod extends CI_Model {
    public function __construct(){
      parent::__construct();
    }
    public function all_ADs(){
     	$this->db->select('*');
      $this->db->from('area_developer as ad');
      $this->db->where('ad.active', 'yes');
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_AD($id){
     	$this->db->select('*');
      $this->db->from('area_developer as ad');
      $this->db->where('ad.adID', $id);
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_Fran($id){
     	$this->db->select('*');
      $this->db->from('techs');
      $this->db->where('franID', $id);
      $this->db->where('active', 'yes');
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
    public function get_yrend_recognition_count($id, $year){
     	$this->db->select('count(id) as count');
      $this->db->from('year_end_recognition as yr');
      $this->db->where('yr.adID', $id);
      $this->db->where('yr.year', $year);
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_yrend_expense_count($id, $year){
     	$this->db->select('count(id) as count');
      $this->db->from('year_end_expenses as ye');
      $this->db->where('ye.adID', $id);
      $this->db->where('ye.year', $year);
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_yrend_check_count($id, $year){
     	$this->db->select('count(id) as count');
      $this->db->from('year_end_checks as yc');
      $this->db->where('yc.adID', $id);
      $this->db->where('yc.year', $year);
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
		
    public function get_yer_saves_count($id, $year){
     	$this->db->select('count(id) as count');
      $this->db->from('yer_saves as yr');
      $this->db->where('yr.adID', $id);
      $this->db->where('yr.year', $year);
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_yee_saves_count($id, $year){
     	$this->db->select('count(id) as count');
      $this->db->from('yee_saves as ye');
      $this->db->where('ye.adID', $id);
      $this->db->where('ye.year', $year);
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_yec_saves_count($id, $year){
     	$this->db->select('count(id) as count');
      $this->db->from('yec_saves as yc');
      $this->db->where('yc.adID', $id);
      $this->db->where('yc.year', $year);
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
		
    public function get_all_Franchisees($id, $where){     
     	$this->db->select('franID, adID, firstName, lastName, suffix, nickname');
      $this->db->from('techs');
      $this->db->where($where);
      $this->db->where('franID !=', $id);
      $this->db->where('active', 'yes');
			$this->db->order_by('firstName', 'asc');
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_ad_yrend_recognition($id, $year){
     	$this->db->select('*');
      $this->db->from('year_end_recognition');
      $this->db->where('adID', $id);	
      $this->db->where('year', $year);	
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_fran_yrend_expenses($id, $where){
     	$this->db->select('*');
      $this->db->from('year_end_expenses');
      $this->db->where($where);
			$this->db->order_by('year', 'desc');
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_ad_yrend_checks($id, $year){
     	$this->db->select('year, meet_attended, unit_check, comments');
      $this->db->from('year_end_checks');
      $this->db->where('franID', $id);	
      $this->db->where('year', $year);	
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_yec_saved($id){
     	$this->db->select('year, meet_attended, unit_check, comments');
      $this->db->from('yec_saves');
      $this->db->where('franID', $id);	
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_yee_saved($id){
     	$this->db->select('*');
      $this->db->from('yee_saves');
      $this->db->where('adID', $id);	
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
    public function get_yer_saved($id){
     	$this->db->select('*');
      $this->db->from('yer_saves');
      $this->db->where('adID', $id);	
      $query 				= $this->db->get(); 
      return        $query->result(); 
    }
	}
?>