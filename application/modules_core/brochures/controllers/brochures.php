<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brochures extends MX_Controller {

    private $userId;

    public function __construct()
       {
            parent::__construct();

            $this->authenticate->loggedIn($this->session->userdata('logged_in'));

            $this->load->library('narnooapi');
            $this->load->library('noopaging');
            $this->load->library('narnooapi_operator_v2');

            $this->load->library('fastcache');

            $this->load->model('members_model');
            $this->userId = $this->session->userdata('userId');
       }

   public function index(  ){

     if (!isset($_GET['page'])){
            $page = 1;
        }else{
            $page = $_GET['page'];
      }

      $details['brochures'] = $this->fastcache->get('brochures_'.$page);

      if( empty( $details['brochures'] ) ){

        $details['brochures'] = $this->narnooapi_operator_v2->getBrochures( $page );
        //only set if successfull...
        if(!empty($details['brochures']->success)){
          $this->fastcache->set('brochures_'.$page,$details['brochures'],14400);
        }

      }

      //profile manager
      $profile = $this->members_model->getDetails($this->userId);
      //isAdmin
      $details['isAdmin'] = $profile->level;

      //access controls
      $details['access'] = $profile->privilege;

      if( $this->session->userdata('type') == 1 ){
        $this->template->load('user_master_tpl', 'members/user_brochure_grid', $details);
      }else{
        $this->template->load('main_tpl','brochures_grid_tpl',$details);
      }

   }


   public function type( $type ){

     if(empty($type)){
        redirect('brochures');
     }

     if (!isset($_GET['page'])){
            $page = 1;
        }else{
            $page = $_GET['page'];
      }

      //$details['brochures'] = $this->fastcache->get('brochures_type_'.$type.'/'.$page);

      if( empty( $details['brochures'] ) ){

        $details['brochures'] = $this->narnooapi_operator_v2->getBrochuresType( ucfirst( $type ),$page );
        //only set if successfull...
        if(!empty($details['brochures']->success)){
          $this->fastcache->set('brochures_type_'.$type.'/'.$page,$details['brochures'],14400);
        }

      }

      //profile manager
      $profile = $this->members_model->getDetails($this->userId);
      //isAdmin
      $details['isAdmin'] = $profile->level;

      //access controls
      $details['access'] = $profile->privilege;

      if( $this->session->userdata('type') == 1 ){
        $this->template->load('user_master_tpl', 'members/user_brochure_grid', $details);
      }else{
        $this->template->load('main_tpl','brochures_grid_tpl',$details);
      }

   }

   public function details( $id ){


    $this->load->helper('time');
    $details['business'] = $this->config->item('business_name');

        if(empty($id)){
            redirect('brochures');
        }

        $details['id'] = $id;

        $brochure = $this->fastcache->get('brochure_' . $id);

        if(empty($brochure)){
            $details['brochure'] = $this->narnooapi_operator_v2->getBrochureDetails( $id );
            //update cache
            //only set if successfull...
            if(!empty($details['brochure']->success)){
              $this->fastcache->set('brochures_' . $id, $details['brochure'], 600);
            }
        }else{
             $details['brochure'] = $brochure;

        }

        if($this->session->userdata('type') == 1){

            $this->template->load('user_master_tpl', 'members/user_brochure', $details);

        }else{

            $this->template->load('main_tpl', 'view_brochure_tpl', $details);
        }

   }

}

/* End of file images.php */
/* Location: ./application/widgets/imagescontrollers/images.php */
