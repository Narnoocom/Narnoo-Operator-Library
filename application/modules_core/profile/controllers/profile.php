<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends MX_Controller {

    private $user;

    public function __construct() {
        parent::__construct();
        $this->authenticate->loggedIn( $this->session->userdata('logged_in') );
        $this->load->model('members_model');
        $this->user = $this->session->userdata('userId');
    }

    public function index() {

        $this->load->helper('time');
        $details['info'] = $this->members_model->getDetails($this->user);
        $this->template->load('main_tpl', 'admin/profile_details_tpl', $details);
    }

    public function password() {


        $this->template->load('main_tpl', 'admin/profile_password_tpl');
    }

    public function save() {

        //$this->load->helper('password');
        $name = $this->input->post('name');
        $business = $this->input->post('business');
        $email = $this->input->post('email');


        $data_member = array(
            'contact' => $name,
            'business_name' => $business,
            'email' => $email
        );

        $this->members_model->updateDetails($this->user, $data_member);

        $data_login = array(
            'username' => $email
        );

        $this->members_model->updateLogin($data_login);
    }

    public function savePassword() {

        //$this->load->helper('password');
        $password = $this->input->post('newpass');
        $newpassword = $this->input->post('confirmpass');

        if ($password == $newpassword):


            $data_member = array(
                'password' => $newpassword
            );

            $this->members_model->newPassword($this->user, $data_member);
        endif;
    }

}

//Profile
