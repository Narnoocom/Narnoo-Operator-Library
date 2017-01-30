<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //controller can only be used by logged in users
        $this->authenticate->loggedIn( $this->session->userdata('logged_in') );
        $this->load->library('narnooapi_operator_v2');
        $this->load->library('fastcache');
    }

    /*
    Return the operator products.
    *
    *
    */
    public function index(){

        //check cache first = products
        $details['products'] = $this->fastcache->get('products');

        if( empty( $details['products'] ) ):
            $details['products'] = $this->narnooapi_operator_v2->getProducts();
            //update cache
            if( !empty($details['products']->success) ){
                $this->fastcache->set('products',$details['products'],14400);
            }

        endif;

        $this->template->load('user_master_tpl', 'members/user_product_list', $details);

    }

    /*
    Return the operator product details.
    * @params product id
    *
    */
   public function details( $uid ){
     if(empty($uid)){
       redirect('product');
     }

     //check cache first = products
     $details['product'] = $this->fastcache->get('product_'.$uid);

     if( empty( $details['product'] ) ):
         $details['product'] = $this->narnooapi_operator_v2->getProductDetails( $uid );
         //update cache
         if( !empty($details['product']->success) ){
             $this->fastcache->set('product_'.$uid,$details['product'],14400);
         }

     endif;

     $details['css'] = '<link rel="stylesheet" href="'.cdn_url('css/video/progression-player.css').'" /><link rel="stylesheet" href="'.cdn_url('css/video/progression-player.css').'" />';

          $details['jsscripts']['loads'] = '<!-- VIDEO -->
          <script src="'.cdn_url('css/build/mediaelement-and-player.min.js').'"></script>';
          $details['jsscripts']['js'] = "<script>
          $('.progression-single').mediaelementplayer({
              startVolume: 0.5, // initial volume when the player starts
              features: ['playpause','current','progress','duration','tracks','volume','fullscreen']
              });
          </script>";

     $this->template->load('user_master_tpl', 'members/user_product_details', $details);

   }




}

/* End of file cart.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
