<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Header extends MX_Controller {
    
    public function __construct()
       {
            parent::__construct();
            $this->authenticate->loggedIn( $this->session->userdata('logged_in') );
       }
 
   public function index(  )
 {  
      if ($this->session->userdata('type') == 1):
            $details['name'] = $this->session->userdata('name');
            $details['id'] = $this->session->userdata('userId');
            $this->load->view('top_menu', $details);

        elseif ($this->session->userdata('type') == 2):

            $details['name'] = $this->session->userdata('name');
            $details['id'] = $this->session->userdata('userId');
            $this->load->view('top_menu', $details);

        endif;
    }
   
   
   
   
}
 
/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
