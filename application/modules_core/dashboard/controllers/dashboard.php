<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MX_Controller {

    public function __construct() {
        parent::__construct();

        $this->authenticate->loggedIn($this->session->userdata('logged_in'));

        $this->load->model('members_model');
        $this->load->model('settings_model');
        $this->load->library('analytics');
        $this->load->helper('date');
        $this->load->library('fastcache');
        $this->load->library('narnooapi_operator_v2');

    }

    public function index() {


        $details['business']    = $this->config->item('business_name');
        $details['disclaimer']  = $this->settings_model->getTerms();

        if( empty($details['disclaimer'] ) ){
          $details['disclaimer'] = "Welcome to our media library!";
        }

        if ($this->session->userdata('type') == 1){

            //check cache first = account
            $details['account'] = $this->fastcache->get('account');

            if( empty( $details['account'] ) ){
               $details['account'] = $this->narnooapi_operator_v2->getDetails();
                //update cache
                $this->fastcache->set('account',$details['account'],14400);
            }

            $details['info']    = $this->settings_model->getTerms();

            $this->template->load('user_master_tpl', 'members/user_dashboard', $details);





        }elseif ($this->session->userdata('type') == 2){ //ADMIN USERS



            $details['memberCount'] = $this->members_model->countMembers(1);
            $details['info'] = $this->members_model->getMembers();
            $month = date('m');
            $year = date('Y');
            $datestring = "%d";
            $days = mdate($datestring);
            $dayStats = array();
            $result = $this->analytics->monthDownloadDays($month, $year);

            if ($result):





                for ($x = 1; $x <= $days; $x++): // loop through for days of month.

                    $dayStats[$x] = 0;
                    foreach ($result as $row):
                        if ($row['day'] == $x):

                            $dayStats[$x] = $row['count'];

                        endif;

                    endforeach;

                endfor;
                $i = 1;
                $output = '[';
                foreach ($dayStats as $rows):

                    $output .= '[' . $i . ',' . $rows . '],';

                    $i++;
                endforeach;

                $trimed_output = rtrim($output, ',');

                $trimed_output .= ']';


                $details['stat_downloads'] = $trimed_output;

            else:

                $i = 1;
                $output = '[';
                for ($x = 1; $x <= $days; $x++):
                    $output .= '[' . $x . ',0],';
                endfor;

                $trimed_output = rtrim($output, ',');

                $trimed_output .= ']';


                $details['stat_downloads'] = $trimed_output;

            endif;




            $this->template->load('main_tpl', 'admin/dashboard_tpl', $details);

        };
    }

    public function check() {

        $this->authenticate->authen_ajax($this->input->is_ajax_request());

        //set session data
        $newdata = array(
            'checked' => 1
        );

        $this->session->set_userdata($newdata);

        echo 'Thank you!';
    }

}

/* End of file images.php */
/* Location: ./application/widgets/imagescontrollers/images.php */