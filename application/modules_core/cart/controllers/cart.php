<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //controller can only be used by logged in users
    }

    /*
    Function in main template view to control the display of the shopping cart button
    * @params media type
    * @params media id
    */
    public function index(){

        //Fetch cookie
        $basket = $this->input->cookie('basket');

        if( !empty($basket) ){
            echo '<a class="btn-navbar" href="'. site_url('cart/view') .'" id="shopCartLink"><i class="fa fa-shopping-basket"></i></a>';
        }

    }

    /*
    Ajax add function to add items into the cart
    * @params media type
    * @params media id
    */
   public function add(){

    $type = $this->input->post('t');
    $id   = $this->input->post('i');

    if( empty($type) || empty($id) ){
        echo 'No direct access';
    }
    //Create New Cookie Information
    $store = array( $id  );

    //Fetch cookie
    $basket = $this->input->cookie('basket');


    if(empty($basket)){
        //create initial cookie
        $cookie = array(
            'name'   => 'basket',
            'value'  => serialize( $store ),
            'expire' => '86500',
            'path'   => '/'
        );

        $this->input->set_cookie( $cookie );


    }else{
        //update initial cookie

        $response = unserialize( $basket );

        if( in_array($id,$response) ){

            die('Item already in cart');

        }else{

            $store = array_merge( $response,$store );

            $cookie = array(
                'name'   => 'basket',
                'value'  => serialize( $store ),
                'expire' => '86500',
                'path'   => '/'
            );

            $this->input->set_cookie( $cookie );

        }

    }

    echo 'success';

   }


   /*
    Ajax add function to add items into the cart
    * @params media type
    * @params media id
    */
   public function grid_add(){

    $type = $this->input->post('t');
    $id   = $this->input->post('i');

    if( empty($type) || empty($id) ){
        echo 'No direct access';
    }
    //Create New Cookie Information
    $store = array( $id  );

    //Fetch cookie
    $basket = $this->input->cookie('basket');


    if(empty($basket)){
        //create initial cookie
        $cookie = array(
            'name'   => 'basket',
            'value'  => serialize( $store ),
            'expire' => '86500',
            'path'   => '/'
        );

        $this->input->set_cookie( $cookie );

        echo 'success';
        die();


    }else{
        //update initial cookie

        $response = unserialize( $basket );

        if( in_array($id,$response) ){



                $pos = array_search( $id,$response );

                unset($response[$pos]);

                if( count($response) == 0 ){

                    $this->load->helper('cookie');

                    delete_cookie('basket');

                }else{

                    $cookie = array(
                    'name'   => 'basket',
                    'value'  => serialize( $response ),
                    'expire' => '86500',
                    'path'   => '/'
                    );

                    $this->input->set_cookie( $cookie );

                }



                echo 'success';
                die();




        }else{

            $store = array_merge( $response,$store );

            $cookie = array(
                'name'   => 'basket',
                'value'  => serialize( $store ),
                'expire' => '86500',
                'path'   => '/'
            );

            $this->input->set_cookie( $cookie );

            echo 'success';
            die();

        }

    }



   }

   /*
    Ajax remove function to add items into the cart
    * @params media type
    * @params media id
    */
   public function remove(){

        $id        =  $this->input->post('i');
        $type      =  $this->input->post('t');

        if(empty($id) || empty($type)){
            die('No direct access');
        }

        //Fetch cookie
        $basket = $this->input->cookie('basket');

        if(empty($basket)){
            die('You have nothing in your cart');
        }

        $response = unserialize( $basket );

        if( in_array($id,$response) ){

                $pos = array_search( $id,$response );

                unset($response[$pos]);

                if( count($response) == 0 ){

                    $this->load->helper('cookie');

                    delete_cookie('basket');

                }else{

                    $cookie = array(
                    'name'   => 'basket',
                    'value'  => serialize( $response ),
                    'expire' => '86500',
                    'path'   => '/'
                    );

                    $this->input->set_cookie( $cookie );

                }



                echo 'success';

        } else {

            echo 'Item not in cart';

        }



   }

   public function button(){

        $id        =  $this->input->post('i');
        $type      =  $this->input->post('t');

        if(empty($id) || empty($type)){
            die('No direct access');
        }

         //Fetch cookie
        $basket = $this->input->cookie('basket');

        if(empty($basket)){
           echo '<li><a href="javascript:;" id="add-basket" title="Add to basket" data-id="'.$id.'" data-type="'.$type.'"><i class="fa fa-shopping-basket"></i></a></li>';
        }else{

             $response  = unserialize( $basket );

             if( in_array($id,$response) ){

                echo '<li><a href="javascript:;" id="remove-basket" title="Remove from basket" data-id="'.$id.'" data-type="'.$type.'" ><i class="fa fa-shopping-basket" style="color:#f27374"></i></a></li>';

             }else{

                echo '<li><a href="javascript:;" id="add-basket" title="Add to basket" data-id="'.$id.'" data-type="'.$type.'"><i class="fa fa-shopping-basket"></i></a></li>';

             }


        }


   }

   /*
    A view to display the items in the cart
    * @params media type
    * @params media id
    */
   public function view(){
    $this->load->library('narnooapi_operator_v2');

    if( $this->session->userdata('type') == 1 ){

            $basket = $this->input->cookie('basket');
            if( !empty($basket) ){

                $data       = unserialize( $basket );
                $images     = json_encode( $data );

                $details['images'] = $this->narnooapi_operator_v2->imageBasket( $images );

                $details['css']     = '<link href="'.cdn_url('css/custom.css').'" rel="stylesheet">';

                $this->template->load('user_master_tpl', 'members/user_cart_grid',$details);

            }else{
                 redirect('dashboard');
            }

    }else{
        redirect('dashboard');
    }

   }



}

/* End of file cart.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
