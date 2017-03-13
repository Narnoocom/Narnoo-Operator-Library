<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends MX_Controller {

    private $userId;

    public function __construct() {
        parent::__construct();
        $this->authenticate->loggedIn($this->session->userdata('logged_in'));
        $this->authenticate->authen_admin($this->session->userdata('type'));
        $this->load->model('settings_model');
        $this->load->library('narnooapi');
        $this->userId = $this->session->userdata('userId');
        $this->load->library('fastcache');
        $this->load->library('narnooapi_operator_v2');
    }

    public function message() {
        $this->load->helper('time');
        $details['info'] = $this->settings_model->getTerms();

        $this->template->load('main_tpl', 'admin/settings_openpage_tpl', $details);
    }

    public function login_message() {
        $this->load->helper('time');
        $details['info'] = $this->settings_model->getTerms();

        $this->template->load('main_tpl', 'admin/settings_public_tpl', $details);
    }

    public function about() {

        //check cache first = account
      $details['info'] = $this->fastcache->get('account');

      if( empty( $details['info'] ) ){
          $details['info'] = $this->narnooapi_operator_v2->getDetails();
          //update cache
          $this->fastcache->set('account',$details['info'],14400);
      }
      $this->template->load('main_tpl', 'admin/settings_about_tpl', $details);
    }

    public function saveDisclaimer() {
        $this->authenticate->authen_ajax($this->input->is_ajax_request());
        $this->load->helper('date');
        $text = $this->input->post('t');
        $datestring = "%Y-%m-%d %h:%i";
        $time = time();

        $date = mdate($datestring, $time);

        $data = array(
            'disclaimer' => $text,
            'members_id' => $this->userId,
            'editDate' => $date
        );

        $this->settings_model->saveDisclaimer($data);
    }

    public function do_save_message() {
        $this->authenticate->authen_ajax($this->input->is_ajax_request());
        $this->load->helper('date');
        $text = $this->input->post('t');
        $datestring = "%Y-%m-%d %h:%i";
        $time = time();

        $date = mdate($datestring, $time);

        $data = array(
            'welcome'     => $text,
            'members_id'  => $this->userId,
            'editDate'    => $date
        );

        $this->settings_model->saveDisclaimer($data);
    }


    public function menu(){

        $menu_options = $this->settings_model->getMenu();
        /*
        <label class="checkbox" for="brochure-4">
          <input type="checkbox" name="itinerary" id="brochure-4" value="1">
          Itinerary
        </label>
        */
        if( !empty($menu_options->brochure) ){

          $brochure_options = json_decode( $menu_options->brochure );

          $bro_options = '<label class="checkbox" for="brochure-0">
            <input type="checkbox" name="promotional" id="brochure-0" value="1"';
            if(in_array("promotional", $brochure_options)){
              $bro_options .= ' checked ';
            }
          $bro_options .=';>
            Promotional
          </label>
          <label class="checkbox" for="brochure-1">
            <input type="checkbox" name="map" id="brochure-1" value="1"';
            if(in_array("map", $brochure_options)){
              $bro_options .= ' checked ';
            }
          $bro_options .=';>
            Map
          </label>
          <label class="checkbox" for="brochure-2">
            <input type="checkbox" name="infographic" id="brochure-2" value="1"';
            if(in_array("infographic", $brochure_options)){
              $bro_options .= ' checked ';
            }
          $bro_options .=';>
            Infographic
          </label>
          <label class="checkbox" for="brochure-3">
            <input type="checkbox" name="guide" id="brochure-3" value="1"';
            if(in_array("guide", $brochure_options)){
              $bro_options .= ' checked ';
            }
          $bro_options .=';>
            Guides
          </label>
          <label class="checkbox" for="brochure-4">
            <input type="checkbox" name="itinerary" id="brochure-4" value="1"';
            if(in_array("itinerary", $brochure_options)){
              $bro_options .= ' checked ';
            }
          $bro_options .=';>
            Itinerary
          </label>';

        } else {

          $bro_options ='<label class="checkbox" for="brochure-0">
            <input type="checkbox" name="promotional" id="brochure-0" value="1">
            Promotional
          </label>
          <label class="checkbox" for="brochure-1">
            <input type="checkbox" name="map" id="brochure-1" value="1">
            Map
          </label>
          <label class="checkbox" for="brochure-2">
            <input type="checkbox" name="infographic" id="brochure-2" value="1">
            Infographic
          </label>
          <label class="checkbox" for="brochure-3">
            <input type="checkbox" name="guide" id="brochure-3" value="1">
            Guides
          </label>
          <label class="checkbox" for="brochure-4">
            <input type="checkbox" name="itinerary" id="brochure-4" value="1">
            Itinerary
          </label>';
        }

        $details['jsscripts']['js'] = "<script>
          $('#menu-submit').on('submit', function(e){
            e.preventDefault();

             $.post('". site_url('settings/savemenu/') ."', $( '#menu-submit' ).serialize(), function(data) {
               alert(data);
             });


          });
          </script>";

        $details['brochure_options']  = $bro_options;

        $this->template->load('main_tpl', 'admin/settings_menu_tpl', $details);

    }

    public function savemenu(){
      $this->load->library('fastcache');
      $mod_date  = date('d-m-y H:m:i');
      //get possibile input posts
      $p = $this->input->post('promotional');
      $m = $this->input->post('map');
      $i = $this->input->post('infographic');
      $g = $this->input->post('guide');
      $t = $this->input->post('itinerary');

      $brochure_menu_options = array();

      if(!empty($p)){
        array_push($brochure_menu_options,'promotional');
      }
      if(!empty($m)){
        array_push($brochure_menu_options,'map');
      }
      if(!empty($i)){
        array_push($brochure_menu_options,'infographic');
      }
      if(!empty($g)){
        array_push($brochure_menu_options,'guide');
      }
      if(!empty($t)){
        array_push($brochure_menu_options,'itinerary');
      }

      $save_brochure = json_encode($brochure_menu_options);

      $save_information = array(
        'date_modified'  => $mod_date,
        'brochure'        => $save_brochure
      );

      $this->settings_model->updateMenu( $save_information );
      $this->fastcache->delete('menu');


      echo 'Menu saved';

    }


}

/* End of file images.php */
/* Location: ./application/widgets/imagescontrollers/images.php */
