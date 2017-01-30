<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Menu extends MX_Controller {
    
    public function __construct()
       {
            parent::__construct();
            //controller can only be used by logged in users
       }
 
   public function index(  )
   {  
      
      $this->load->view('admin_menu');
   }
   
   
   
   
}
 
/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
