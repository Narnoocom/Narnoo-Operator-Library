<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MX_Controller {

    public function __construct()
       {
            parent::__construct();
            $this->authenticate->loggedIn( $this->session->userdata('logged_in') );
            $this->load->library('fastcache');
       }

       public function index() {
        if ($this->session->userdata('type') == 1):
            $this->load->model('settings_model');
            //Check menu cache
            $menu_cache = $this->fastcache->get('menu');
            //Cache empty
            if(empty($menu_cache)){
              $menu_options = $this->settings_model->getMenu();
              if(!empty($menu_options)){
                //set cache
                $this->fastcache->set('menu',$menu_options,0);
              }

            }

            if(empty($menu_options)){

              $this->load->view('user_menu_tpl');

            }else{


              //process brochures
              if( !empty($menu_options->brochure) ){

                $brochure_options = json_decode( $menu_options->brochure );


                /*
                <ul>
                  <li><a href="<?=site_url('brochures/type/promotional')?>">Promotional</a></li>
                  <li><a href="<?=site_url('brochures/type/map')?>">Maps</a></li>
                  <li><a href="<?=site_url('brochures/type/inforgraphic')?>">Inforgraphics</a></li>
                  <li><a href="<?=site_url('brochures/type/guide')?>">Guides</a></li>
                  <li><a href="<?=site_url('brochures/type/itinerary')?>">Itineraries</a></li>
                </ul>
                */
                $bro_html = '<ul>';
                foreach ($brochure_options as $bro_op) {

                  $bro_html .= '<li><a href="' . site_url('brochures/type/'.$bro_op) . '">'.ucfirst($bro_op).'</a></li>';

                }
                $bro_html .= '</ul>';
                $details['brochures'] = $bro_html;


              }

              $this->load->view('user_menu_tpl',$details);
            }




        elseif ($this->session->userdata('type') == 2):
            $this->load->view('admin_menu');
        endif;
    }




}

/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
