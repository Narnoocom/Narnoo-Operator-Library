<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class members_model extends CI_Model{

    /*
     * Table name: members
     * 
     * add members *
     * remove members
     * set Privacy
     * get members list *
     * get members details *
     */
    
    
    
    // Add member to database - array $data
    public function add($data){
         
        $this->db->insert('members', $data);
        return $this->db->insert_id();
    }
    
    public function getMemberAlbum($id){
        $query = $this->db
                ->where('member_id',$id)
                ->limit(1)
                ->get('member_album');
        
        if($query -> num_rows() == 1)
           {
             return $query->row();
           }
           else
           {
             return false;
           }
    }
    
    public function getMembers($limit=50, $start=0){
        $query = $this->db
                ->where('current',1)
                ->limit($limit,$start)
                ->get('members');
        
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
                 ->select('members.id,members.current,members.registeredDate,members.contact,members.business_name,members.email,members.country,members.level,members.privilege,members.loggedIn,login.isSuspend')
                 ->from('members')
                 ->join('login','login.members_id = members.id')
                 ->where('members.id',$id)
                 ->limit(1)
                 ->get();
        
        if($query -> num_rows() == 1)
           {
             return $query->row();
           }
           else
           {
             return false;
           }
               
        
    }
    
    public function countMembers($type)
    {
        $details = $this
            ->db
            ->from('members')
            ->where('level',$type)
            ->where('current',1)
            ->count_all_results();
        
        return $details;
    }
    
    public function countPageMembers()
    {
        $details = $this
            ->db
            ->from('members')
            ->where('current',1)
            ->count_all_results();
        
        return $details;
    }
    
    public function countPageArchiveMembers()
    {
        $details = $this
            ->db
            ->from('members')
            ->where('current',0)
            ->count_all_results();
        
        return $details;
    }
    
    public function saveDetails($data)
    {
        $this->db->insert('members',$data);
        return $this->db->insert_id();
    }
    
    public function updateDetails($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('members',$data);
        
    }
    
    public function saveLogin($data)
    {
        $this->db->insert('login',$data);
    }
    
    public function updateLogin($id,$data)
    {
        

        $this->db->where('id', $id);
        $this->db->update('login', $data);
    }
    
    public function deleteMember($id) {
        $data = array(
            'current' => 0
        );

        $this->db->where('id', $id);
        $this->db->update('members', $data);
    }
    
    public function getArchivedMembers($limit=50, $start=0){
        $query = $this->db
                ->where('current',0)
                ->limit($limit,$start)
                ->get('members');
        
        if($query -> num_rows() >= 1)
           {
             return $query->result_array();
           }
           else
           {
             return false;
           }
    }
    
    public function restoreMember($id){
        
        $data = array(
            'current' => 1
        );

        $this->db->where('id', $id);
        $this->db->update('members', $data);
    }
    
    public function setPrivilege($id,$type){
        
        $data = array(
            'privilege' => $type
        );

        $this->db->where('id', $id);
        $this->db->update('members', $data);
    }
    
    public function setAlbum($data){
        
        $this->db->insert('member_album', $data);
    }
    
    public function updateAlbum($id,$data){
        $this->db->where('member_id', $id);
        $this->db->update('member_album', $data);
    }
    public function deleteAlbum($id){
        $this->db->delete('member_album', array('member_id' => $id)); 
    }
    
    public function newPassword($id,$data)
    {
        $this->db->where('members_id', $id);
        $this->db->update('login', $data);
    }
    public function setSuspend($id,$type){
        
        $data = array(
            'isSuspend' => $type
        );

        $this->db->where('members_id', $id);
        $this->db->update('login', $data);
    }
    
}
