<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Hmvc extends MX_Controller {
    
    public function __construct()
       {
            parent::__construct();
            //controller can only be used by logged in users
       }
 
   public function index(  )
   {  
      $detail['info'] = "Hello World Dynamic";
       
       $this->template->load('main_tpl','view11',$detail);
       //$this->load->view('hmvc_view');
   }
   
}
 
/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
