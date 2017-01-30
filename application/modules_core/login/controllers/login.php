<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('error');
        $this->load->model('settings_model');
    }

    public function index() {
        
        $details['business']    = $this->config->item('business_name');
        $details['disclaimer']  = $this->settings_model->getTerms();

        if( empty($details['disclaimer'] ) ){
          $details['disclaimer'] = "Welcome to our media library!";
        }

        $this->load->view('user_login_tpl',$details);
    }

    public function authenticate() {

        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $rememberMe = $this->input->post('rememberme');

        $this->load->model('login_model');

        $result = $this->login_model->login($username, sha1( $password ));

        if ($result) {
            //check if current
            if ($result->current == 1):
                //check if suspended
                if ($result->isSuspend == 0):

                    //set session data
                    $newdata = array(
                        'userId'    => $result->id,
                        'type'      => $result->level,
                        'name'      => $result->contact,
                        'access'    => $result->privilege,
                        'email'     => $result->email,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($newdata);

                    $data = array(
                        'loggedIn' => date('Y-m-d')
                    );
                    $this->login_model->setDate($result->id, $data);

                    /**
                         * if remember is set then we need to store a token in the login table and store as a cookie in browser.
                         */
                        if (!empty($rememberMe)) {
                            $this->load->helper('unique');

                            $token = generateRandomString(25);

                            $table_login_update = array(
                                'rememberMe' => $token
                            );

                            $this->login_model->setToken($username, $table_login_update);

                            setcookie("hashToken", $token, time() + (86400 * 30), "/");
                        }

                    // redirect to the dashboard
                    redirect('dashboard');
                else:
                	$this->session->set_flashdata('error', 'login_error');
                	redirect('/');
                    //die('Account Suspended');
                endif;
            else:
            	$this->session->set_flashdata('error', 'login_error');
            	redirect('/');
                //die('Account deleted');
            endif;
        } else {

            //error message.
            $this->session->set_flashdata('error', 'login_error');
            redirect('/');
            //die('Access denied!');
        }
    }

    public function logout() {

        //if (isset($this->session->userdata('userId'))):


            $this->session->destroy();

          // if(isset($_COOKIE["check"])):

            //endif;


        redirect('login');
    }

}

/** End of file */
