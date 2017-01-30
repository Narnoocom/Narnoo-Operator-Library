<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticate {

    public function __construct()
    {
       // $this->load->library('session');
    }
    
    public function loggedIn($loggedIn){
        
        if( $loggedIn !== TRUE || $loggedIn = NULL){
            

            //First is user "remembering Me"
            if (isset($_COOKIE['hashToken'])) {
                $this->object->load->model('login_model');
                $hashCheck = $this->object->login_model->hashCheck( $_COOKIE['hashToken'] );
                if($hashCheck!== FALSE){
                    $login = $this->logbackin( $hashCheck->username );
                    if($login == FALSE){
                        redirect('login');
                    }
                } else {
                     redirect('login');
                }
                
            } else {
               redirect('login'); 
            }

            
        }
        
    }
    
    
    public function authen_admin($type){
        
        if( $type !== '2')
            {
            // change to permission denied page
            redirect('error/unauthorised');
            }
        
    }
    
    public function authen_ajax($check) {
        if ($check == FALSE):
            die('Not Ajax');
        endif;
    }
    
    public function terms_check($check) {
        
        if($check !== 1):
            redirect('dashboard?error=check');
        endif;
    }

    private function logbackin($username){
        $this->load->library('session');
        //get user details based on email/username
        //get type this comes from 
        $details = $this->object
                    ->db
                    ->from('members')
                    ->where('email',$username)
                    ->limit(1)
                    ->get();

        if( $details->num_rows == 1){
            
             $result = $details->row();
             //set session data
             
             //set session data
             $newdata = array(
                'userId' => $result->id,
                'type' => $result->level,
                'name' => $result->contact,
                'access' => $result->privilege,
                'logged_in' => TRUE
            );

            $this->object->session->set_userdata($newdata);
            
            return TRUE;
             
        } else {
            return FALSE;
        }
        
    }
    
}


