<?php
  class Manageads_Mod extends CI_Model {
    public function __construct(){
      parent::__construct();
    }
    
    public function all_ADs(){
		
		$this->db->select('*');
		$this->db->from('area_developer as ad');
		$this->db->join('techs as fr', 'ad.franID = fr.franID');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
      
    }
    public function get_AD($id){
		
		$this->db->select('*');
		$this->db->from('area_developer as ad');
		//$this->db->join('techs as fr', 'ad.franID = fr.franID');
		$this->db->join('users as u', 'ad.franID = u.franID', 'left');
		$this->db->where('ad.adID', $id);
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			  
    }
    public function get_ADTechs($id){
		
		$this->db->select('*');
		$this->db->from('techs as t');
		//$this->db->join('techs as fr', 'ad.franID = fr.franID');
		//$this->db->join('dev_users as du', 't.franID = du.franID');
		$this->db->join('users as u', 't.franID = u.franID');
		$this->db->where('t.adID', $id);
		$this->db->where('u.type', '1');
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			      
    }
    public function get_login_info($id){
      
		$this->db->select('*');
		$this->db->from('users as u');
		$this->db->where('u.franID', $id);
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			  
    }
    public function all_franchisees_by_AD($where, $adID){
      
		$this->db->select('t.*');
		$this->db->from('techs as t');
		$this->db->where($where);
		$this->db->or_where('t.adID', $adID);
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
		 
			 
    }
    public function all_AD_sales_reports($id){
		
		$this->db->select('ID, sales_month');
		$this->db->from('sales');
		$this->db->where('adID', $id);	
		$this->db->group_by('sales_month');
		$this->db->order_by('sales_month', 'desc');
		
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
		
		$query 				= $this->db->get(); 
		return        $query->result(); 
			
    }
    public function upadate($where, $data, $table){
		
		$this->db->where($where);
		$this->db->update('mytable', $data);
					
    }
public function get_tech($id = NULL){
        if($id != NULL){
          $this->db->where('techs.franID', $id);  
        }
        return $this->db->get('techs')->row();
    }
    public function get_new_tech(){
        $tech = new stdClass();
        $tech->adID = '';
        $tech->reportADs = '';
        $tech->contract_type = '';
        $tech->firstName = '';
        $tech->lastName = '';
        $tech->suffix = '';
        $tech->nickname = '';
        $tech->custom_sales_report_name = '';
        $tech->company = '';
        $tech->birth_date = '';
        $tech->social_security = '';
        $tech->ein = '';
        $tech->payment_date = '';
        $tech->payment_amount = '';
        $tech->active = '';
        return $tech;
    }
    public function array_form_post($fields){
        $data = array();
        foreach($fields as $field){
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }
    
    public function save($data, $id = NULL){
        
        //Insert
        if($id == NULL){
            $this->db->set($data);
            $this->db->insert('techs');
            $id = $this->db->insert_id();
        }
        //Update
        else{
          
            $this->db->set($data);
            $this->db->where('franID', $id);
            $this->db->update('techs');
        }
        return $id;
    }
    
    public function delete($id){
        $this->db->where('franID',$id);
        $this->db->limit(1);
        $this->db->delete('techs');
    }

  }  
?>
