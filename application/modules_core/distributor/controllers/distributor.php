<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Distributor extends MX_Controller {
    
    public function __construct()
       {
            parent::__construct();
            
            $this->load->library('distributorapi');
       }
 
   public function index(  )
   {  
      $details['info'] = $this->distributorapi->getImages();
      
      
      print_r($details['info']); 
     
       
   }
   
   
   
}
 
/* End of file images.php */
/* Location: ./application/widgets/imagescontrollers/images.php */
