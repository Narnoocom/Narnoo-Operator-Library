<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class login_model extends CI_Model{

    public function login($user,$pass){

        $query = $this
                 ->db
                ->from('login')
                ->select('login.isSuspend,members.id,members.current,members.contact,members.level,members.privilege,members.email  ')
                ->join('members','members.id = login.members_id')
                 ->where('login.username',$user)
                 ->where('login.password',$pass)
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

    public function userDetails($id){

        $query = $this->db
                    ->where('id',$id)
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

    public function setDate($id,$data){

        $this->db->where('id', $id);
        $this->db->update('members',$data);

    }

    public function setToken($email,$data){
        $this->db->where('username', $email);
        $this->db->update('login', $data);
    }

    public function hashCheck($token){
        $query = $this->db
                    ->where('rememberMe',$token)
                    ->limit(1)
                    ->get('login');

        if($query -> num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }

}
