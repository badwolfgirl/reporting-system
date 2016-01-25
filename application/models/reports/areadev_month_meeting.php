<?php
  class Areadev_Month_Meeting extends CI_Model {
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
    public function all_reporting_ADs($date){
      
		$this->db->select('wmc.adID as adID, ad.region_office_name as office');
		$this->db->from('monthly_update as wmc');
		$this->db->join('area_developer as ad', 'ad.adID=wmc.adID', 'left');
		$this->db->where('month', $date);
		$this->db->group_by('wmc.adID');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
      
    }
    /*public function get_AD($id){
      
     	$this->db->select('*');
      $this->db->from('area_developer as ad');
			$this->db->join('techs as fr', 'ad.franID = fr.franID');
      $this->db->where('ad.adID', $id);

      $query 				= $this->db->get(); 
      return        $query->result(); 
			      
    }
    public function all_franchisees_by_AD($id, $frID){
      
    
     	$this->db->select('*');
      $this->db->from('techs');
      $this->db->where('adID', $id);
      $this->db->where('franID !=', $id);
      $this->db->where('active', 'yes');
			$this->db->order_by('lastName', 'asc');

      $query 				= $this->db->get(); 
      return        $query->result(); 
		 
			 
    }*/
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
    public function get_all_Franchisees($id, $where){
      
		$this->db->select('*');
		$this->db->from('techs');
		$this->db->where($where);
		$this->db->where('franID !=', $id);
		$this->db->where('active', 'yes');
		$this->db->order_by('lastName', 'asc');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
		 
			 
    }
		
    public function get_AD_report_complete($id, $date){
      
		$this->db->select('count(ID) as rptTotal');
		$this->db->from('monthly_update');
		$this->db->where('adID', $id);
		$this->db->where('month', $date);
		
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function get_AD_contact_complete($id, $date){
      
		$this->db->select('count(ID) as rptTotal');
		$this->db->from('contact_leads');
		$this->db->where('adID', $id);
		$this->db->where('month', $date);
		
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
		
    public function get_AD_report_count($id, $date){
      
		$this->db->select('count(ID) as totalMeetings');
		$this->db->from('monthly_update as mc');
		$this->db->where('mc.adID', $id);
		$this->db->where('mc.month', $date);
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
		
    public function get_AD_contact_count($id, $date){
		
		$this->db->select('count(ID) as totalContacts');
		$this->db->from('contact_leads');
		$this->db->where('adID', $id);
		$this->db->where('month', $date);
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function getAllMeetingMonths($date){
      
		$this->db->select('month as date');
		$this->db->from('monthly_update');
		$this->db->not_like('month', $date);
		$this->db->group_by('month');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function all_AD_meeting_reports($id){
      
		$this->db->select('ID, month');
		$this->db->from('monthly_update as mc');
		$this->db->where('mc.adID', $id);
		$this->db->group_by('mc.month');
		$this->db->order_by('mc.month', 'desc');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
		
    }
    public function all_AD_contact_reports($id){
		
		$this->db->select('ID, month');
		$this->db->from('contact_leads');
		$this->db->where('adID', $id);
		$this->db->group_by('month');
		
		$query 		= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function all_AD_meeting_reports_alt($id, $alt_id){

		$this->db->select('mc.ID, mc.adID, mc.month, ad.region_office_name');
		$this->db->from('monthly_update as mc');
		$this->db->join('area_developer as ad', 'mc.adID = ad.adID');
		$this->db->where('mc.adID', $id);
		$this->db->or_where('mc.adID', $alt_id);	
		$this->db->group_by('ad.adID, mc.month');
		$this->db->order_by('mc.month', 'desc');
		
		$query 		= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function all_AD_contact_reports_alt($id, $alt_id){
		
		$this->db->select('c.ID, c.adID, c.month, ad.region_office_name');
		$this->db->from('contact_leads as c');
		$this->db->join('area_developer as ad', 'c.adID = ad.adID');
		$this->db->where('c.adID', $id);
		$this->db->or_where('c.adID', $alt_id);	
		$this->db->group_by('ad.adID, c.month');
		$this->db->order_by('c.month', 'desc');
		
		$query 		= $this->db->get(); 
		return        $query->result(); 
			
    }
		
    public function get_AD_meeting_report($id, $date){
      
		$this->db->select('*');
		$this->db->from('monthly_update as mc');
		$this->db->join('techs as fr', 'mc.franID = fr.franID');
		$this->db->where('mc.adID', $id);
		$this->db->where('mc.month', $date);
		
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    
    public function get_AD_contacts($id, $date, $type){
      
		$this->db->select('*');
		$this->db->from('contact_leads');
		$this->db->where('type', $type);
		$this->db->where('adID', $id);
		$this->db->where('month', $date);
		
			
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    
    public function get_AD_contactCounts($id, $date, $type){
      
		$this->db->select('count(id) as counts');
		$this->db->from('contact_leads');
		$this->db->where('type', $type);
		$this->db->where('adID', $id);
		$this->db->where('month', $date);
		
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }

  }  
?>
