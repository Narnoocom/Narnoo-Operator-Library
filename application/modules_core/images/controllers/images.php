<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Images extends MX_Controller {

    private $userId;

    public function __construct() {
        parent::__construct();

        $this->authenticate->loggedIn($this->session->userdata('logged_in'));

        $this->load->library('narnooapi');

        $this->load->library('narnooapi_operator_v2');

        $this->load->library('noopaging');
        $this->load->library('fastcache');
        $this->load->model('members_model');
        $this->userId = $this->session->userdata('userId');
        $this->load->helper('error');
    }

    public function index() {

        // if album set get album images user can only see images in this album....
      //  $album = $this->members_model->getMemberAlbum($this->userId);
        $details['business'] = $this->config->item('business_name');
        if (!isset($_GET['page'])):
            $page = 1;
        else:
            $page = $_GET['page'];
        endif;

        //check cache first = images_1
        $images = $this->fastcache->get('images_'.$page);

        if(empty($images)):
            $images = $this->narnooapi_operator_v2->getImages( $page );
            //update cache
            if( !empty($images->success) ){
                $this->fastcache->set('images_'.$page,$images,14400);
            }

        endif;

        $details['images'] = $images;

        $profile = $this->members_model->getDetails($this->userId);
        //isAdmin
        $details['isAdmin'] = $profile->level;
        //access controls
        $details['access'] = $profile->privilege;

        if($this->session->userdata('type') == 1){
          $details['jsscripts']['loads']  = '<script type="text/javascript" src="'.cdn_url('assets/js/common-media.js').'"></script>';
          $this->template->load('user_master_tpl', 'members/user_image_grid', $details);
        } else {
            $this->template->load('main_tpl', 'images_grid_tpl', $details);
        }

    }


    public function details( $id ){

            $this->load->helper('time');
            if(empty($id)){
                $this->session->set_flashdata('error', 'access_error');
                redirect('images');
            }

            $image = $this->fastcache->get('image_'.$id);
            if (empty( $image ) ) {
                $image = $this->narnooapi_operator_v2->getSingleImage($id);

                $this->fastcache->set('image_'.$id, $image, 14000);
            }
            $details['id']          = $id;
            $details['image']       = $image;
            $details['business']    = $this->config->item('business_name');


            if( empty( $details['image']->success ) ){
              $this->session->set_flashdata('error', 'image_error');
              redirect('images');
            }

            if($this->session->userdata('type') == 1){

                $details['jsscripts']['loads']  = '<script type="text/javascript" src="'.cdn_url('assets/js/common-media.js').'"></script>';
                $this->template->load('user_master_tpl', 'members/user_image',$details);

            }else{
                $this->template->load('main_tpl', 'view_image_tpl',$details);
            }

    }


}

/* End of file images.php */
/* Location: ./application/widgets/imagescontrollers/images.php */
