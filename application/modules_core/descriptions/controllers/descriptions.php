<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Descriptions extends MX_Controller {

    private $userId;
    private $business;

    public function __construct() {
        parent::__construct();
        $this->authenticate->loggedIn( $this->session->userdata('logged_in') );
        $this->load->library('narnooapi_operator_v2');

        $this->load->library('noopaging');
        $this->load->library('fastcache');

        $this->userId   = $this->session->userdata('userId');
        $this->business = $this->config->item('business_name');

        $this->load->model('members_model');

        $this->load->helper('error');
    }

    public function index() {
        if (!isset($_GET['page'])):
            $page = 1;
        else:
            $page = $_GET['page'];
        endif;
      $details['business'] = $this->business;

      $details['descriptions'] = $this->fastcache->get('descriptions_'.$page);

      if( empty($details['descriptions']) ){
        $details['descriptions'] = $this->narnooapi_operator_v2->getDescriptions($page);
        $this->fastcache->set('descriptions_'.$page,$details['descriptions'],14400);
      }

      $profile = $this->members_model->getDetails($this->userId);
      //isAdmin
      $details['isAdmin'] = $profile->level;
      //access controls
      $details['access'] = $profile->privilege;


    /*  if(array_key_exists('error',$descriptions)):
         $details['descriptions'] = FALSE;
         $details['message'] = $descriptions['error'];
         else:
         $details['descriptions'] = $descriptions;
         $details['pagignation'] = $this->noopaging->paging(current_url(),$details['descriptions']->total_pages);
      endif; */

      if($this->session->userdata('type') == 1){
        $details['jsscripts']['loads']  = '<script type="text/javascript" src="'.cdn_url('assets/js/common-media.js').'"></script>';
        $this->template->load('user_master_tpl', 'members/user_descriptions', $details);
      } else {
          $this->template->load('main_tpl', 'description_list_tpl', $details);
      }

    }

    public function text($id) {

      if(empty($id)){
          $this->session->set_flashdata('error', 'access_error');
          redirect('descriptions');
      }

      $details['business'] = $this->business;

      $details['text'] = $this->fastcache->get('description_'.$id);
      if( empty( $details['text'] ) ){

        $details['text'] = $this->narnooapi_operator_v2->getText( $id );
        $this->fastcache->set('description_'.$id,$details['text'],14400);

      }


      if( empty( $details['text']->success ) ){
        $this->session->set_flashdata('error', 'description_error');
        redirect('descriptions');
      }

      if($this->session->userdata('type') == 1){

          $details['jsscripts']['loads']  = '<script type="text/javascript" src="'.cdn_url('assets/js/common-media.js').'"></script><script type="text/javascript" src="'.cdn_url('assets/js/clipboard.min.js').'"></script>';
          $details['jsscripts']['js']     = "<script>new Clipboard('.clipbtn');</script>";

          $this->template->load('user_master_tpl', 'members/user_description_text',$details);

      }else{
        $this->template->load('main_tpl', 'description_details', $details);
      }

    }

}

/* End of file images.php */
/* Location: ./application/widgets/imagescontrollers/images.php */
