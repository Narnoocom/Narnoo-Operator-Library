<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
        //$this->authenticate->loggedIn( $this->session->userdata('logged_in') );
        //$this->authenticate->authen_admin( $this->session->userdata('type') );
        //$this->load->model('members_model');
    }
    
    public function index(){
        
        $this->load->view('404_tpl');
        
    }
    
    public function unauthorised(){
        
        $this->load->view('401_tpl');
    }
    
}