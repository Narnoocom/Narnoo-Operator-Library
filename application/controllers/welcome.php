<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        public function setSessions(){
            
            //set session data
            $newdata = array(
                   'user_id'  => '192',
                   'type'     => '1',
                   'logged_in' => TRUE
               );

            $this->session->set_userdata($newdata);
            
        }
        public function getSessions(){
            
            $session_id = $this->session->userdata('session_ids');
            
            print_r($session_id);
            
        }
        public function clearSessions(){
            $array_items = array('username' => '','type'  => '','logged_in' => '');
            $this->session->unset_userdata($array_items);
            $this->session->destroy();
            
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */