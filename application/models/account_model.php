<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class account_model extends CI_Model{

    public function import($data){
         
        $this->db->insert('aba_jobs_manager', $data);
        return $this->db->insert_id();
    }
    
    public function getJobs(){
        $query = $this->db
                ->where('status',1)
                ->get('aba_jobs_manager');
        
        if($query -> num_rows() >= 1)
           {
             return $query->result_array();
           }
           else
           {
             return false;
           }
    }
    
    public function getDetails($id){
        
        
      $query = $this->db
                 ->where('id',$id)
                 ->limit(1)
                 ->get('aba_jobs_manager');
        
        if($query -> num_rows() == 1)
           {
             return $query->row();
           }
           else
           {
             return false;
           }
               
        
    }
    
    public function checkStaff($simproId,$type){
        
        
      $query = $this->db
                 ->where('staffType',$type)
                 ->where('simproID',$simproId)
                 ->limit(1)
                 ->get('aba_staff_manager');
        
        if($query -> num_rows() == 1)
           {
             return $query->row();
           }
           else
           {
             return false;
           }
               
        
    }
    
    public function getStaff(){
        
        
      $query = $this->db
              ->where('staffType',1)
              ->or_where('staffType',3)
              ->or_where('staffType',4)
              ->get('aba_staff_manager');
        
        if($query -> num_rows() >= 1)
           {
             return $query->result_array();
           }
           else
           {
             return false;
           }
               
        
    }
    
    public function getContractors(){
        
        
      $query = $this->db
              ->where('staffType',2)
              ->get('aba_staff_manager');
        
        if($query -> num_rows() >= 1)
           {
             return $query->result_array();
           }
           else
           {
             return false;
           }
               
        
    }
    
    
    public function getIdFromName($name){
        
        
      $query = $this->db
                 ->like('name', $name) 
                 ->limit(1)
                 ->get('aba_staff_manager');
        
        if($query -> num_rows() == 1)
           {
             return $query->row();
           }
           else
           {
             return false;
           }
               
        
    }
    
    public function authSave($data)
    {
        $this->db->insert('aba_login', $data);
    }
    
    
}
