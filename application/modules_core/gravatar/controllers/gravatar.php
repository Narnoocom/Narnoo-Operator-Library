<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gravatar extends MX_Controller {

    public function __construct()
       {
            parent::__construct();
            //controller can only be used by logged in users
       }

   public function index(  )
   {
      $this->load->helper('gravatar');
      $email = $this->session->userdata('email');
      if( !empty( $email) ){
        echo gravatar( $email, 128 );
      }

   }




}

/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
