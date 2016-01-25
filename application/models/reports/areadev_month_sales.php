<?php
  class Areadev_Month_Sales extends CI_Model {
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
	public function get_AD_Franchisees($where){
      
		
		$this->db->select('*');
		$this->db->from('techs');
		$this->db->where($where);
		//$this->db->where('adID', $id);
		$this->db->where('contract_type', 2);
		$this->db->where('active', 'yes');
		$this->db->order_by('firstName', 'asc');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
		 
			 
    }
    public function get_all_Franchisees($id, $where){
      
		$this->db->select('*');
		$this->db->from('techs');
		$this->db->where($where);
		//$this->db->where('franID !=', $id);
		$this->db->where('contract_type', 1);
		$this->db->where('active', 'yes');
		$this->db->order_by('firstName', 'asc');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
		
			 
    }
    public function get_AD_report_count($id, $date){
      
		$this->db->select('count(s.adID) as totalSales');
		$this->db->from('sales as s');
		$this->db->join('techs as fr', 's.franID = fr.franID');
		$this->db->where('s.adID', $id);
		$this->db->where('s.sales_month', $date);
		
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
		
    }
    public function all_AD_sales_reports($id){
		
		$this->db->select('s.ID, s.adID, s.sales_month, ad.region_office_name');
		$this->db->from('sales as s');
		$this->db->join('area_developer as ad', 's.adID = ad.adID');
		$this->db->or_where('s.adID', $id);	
		$this->db->group_by('s.sales_month');
		$this->db->order_by('s.sales_month', 'desc');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function all_AD_sales_reports_alt($id, $alt_id){
		
		$this->db->select('s.ID, s.adID, s.sales_month, ad.region_office_name');
		$this->db->from('sales as s');
		$this->db->join('area_developer as ad', 's.adID = ad.adID');
		$this->db->or_where('s.adID', $id);	
		$this->db->or_where('s.adID', $alt_id);	
		$this->db->group_by('ad.adID, s.sales_month');
		$this->db->order_by('s.sales_month', 'desc');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function getAllSalesMonths($date){
		
		$this->db->select('sales_month as date');
		$this->db->from('sales');
		$this->db->not_like('sales_month', $date);	
		$this->db->group_by('sales_month');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
		
    }
    public function get_AD_report_complete($id, $date){
      
		$this->db->select('count(ID) as totalSales');
		$this->db->from('sales');
		$this->db->where('adID', $id);
		$this->db->where('sales_month', $date);
		
		
		$query 				= $this->db->get(); 
      	return        $query->result(); 
			
    }
    public function get_saved_AD_ttls($id, $date){
		
		$this->db->select('*');
		$this->db->from('saved_sales_ttls');
		$this->db->where('adID', $id);
		$this->db->order_by('sales_month', 'desc');
		// $this->db->where('sales_month', $date);
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function get_saved_by_franID($adID, $franID, $date){
      
		$this->db->select('*');
		$this->db->from('saved_sales');
		$this->db->where('franID', $franID);
		$this->db->where('adID', $adID);
		$this->db->order_by('sales_month', 'desc');
		// $this->db->where('sales_month', $date);
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function get_sales_by_franID($adID, $franID, $date){
      
		$this->db->select('sales_month, units, techs, vehicles_repaired, days_worked, accounts_worked');
		$this->db->from('sales');
		$this->db->where('franID', $franID);
		$this->db->where('adID', $adID);
		$this->db->order_by('sales_month', 'desc');
		// $this->db->where('sales_month', $date);
		
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function get_AD_sales_report($id, $date){
		
		$this->db->select('s.*, fr.firstName, fr.lastName');
		$this->db->from('sales as s');
		$this->db->join('techs as fr', 's.franID = fr.franID');
		$this->db->where('s.adID', $id);
		$this->db->where('s.sales_month', $date);
		$this->db->order_by('ID', 'asc');
		
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function get_AD_sales_report_count($id, $date){
      
		$this->db->select('count(id) as totalSales');
		$this->db->from('sales as s');
		$this->db->join('techs as fr', 's.franID = fr.franID');
		$this->db->where('s.adID', $id);
		$this->db->where('s.sales_month', $date);
		
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function AD_ZEE_COUNT(){
      
		$this->db->select('ad.adID, ad.region_office_name, count(fr.franID) as totalZees');
		$this->db->from('area_developer as ad');
		$this->db->join('techs as fr', 'ad.adID = fr.adID');
		$this->db->where('fr.active', 'yes');
		
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
  }  
?>
