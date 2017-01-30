<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statistics extends MX_Controller {

    private $userId;
    private $html_users;
    private $html_media;
    private $html_top5;

    public function __construct() {
        parent::__construct();
        $this->authenticate->loggedIn($this->session->userdata('logged_in'));
        $this->authenticate->authen_admin($this->session->userdata('type'));
        $this->load->library('analytics');
        $this->userId = $this->session->userdata('userId');
        $this->load->helper('date');
    }

    public function index() {
        if(isset($_GET['month'])):
            $month = $_GET['month'];
            $days = days_in_month($month);
            else:
            $month = date('m');
            $datestring = "%d";
            $days = mdate($datestring);
        endif;
        if(isset($_GET['year'])):
            $month = $_GET['year'];
            else:
            $year = date('Y');
        endif;
        $details['month'] = $month;
        $details['year'] = $year;
        
        
        
        
        
        $dayStats = array();

        $result = $this->analytics->monthDownloadDays($month, $year);
        $dwn_media = $this->analytics->monthDownloadsMedia($month, $year);
        $dwn_users = $this->analytics->monthDownloadsUsers($month, $year);
        $media_top = $this->analytics->monthDownloadsTopMedia($month, $year);
        $details['monthCount'] = $this->analytics->monthDownloadTotal($month, $year);


        /*         * ****************************************************************************
         * GET DAILY DOWNLOADS 
         * ***************************************************************************** */
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

        /*         * ****************************************************************************
         * GET MEDIA DOWNLOADS 
         * ***************************************************************************** */

        if ($dwn_media):
            $this->html_media = '[';

            foreach ($dwn_media as $row2):

                $this->html_media .= '{ label: "' . $row2['media_type'] . '", data: ' . $row2['count'] . '},';

            endforeach;

            $trimed_media = rtrim($this->html_media, ',');

            $trimed_media .= ']';

        else:

            $trimed_media = '[{ label: "No downloads", data: 100}]';

        endif;

        $details['media_downloads'] = $trimed_media;


        /*         * ****************************************************************************
         * GET USER DOWNLOADS 
         * ***************************************************************************** */
        if ($dwn_users):


            $this->html_users = '<table class="table table-striped table-bordered">
            <thead>
            <th>Member</th>
            <th>Downloads</th>
            </thead>
            <tbody>';
            foreach ($dwn_users as $row):

                $this->html_users .= '<tr>
                            <td><a href='.site_url('/statistics/user/'.$row['id'].'/'.$row['contact']).'>' . $row['contact'] . '</a></td>
                            <td>' . $row['count'] . '</td>
                            </tr>';
            endforeach;

            $this->html_users .= '</tbody>
                             </table>';

        else:
            $this->html_users = '<table class="table table-striped table-bordered">
            <thead>
            <th>Member</th>
            <th>Downloads</th>
            </thead>
            <tbody>';


            $this->html_users .= '<tr>
                            <td colspan ="2">There are no results</td>
                            </tr>';


            $this->html_users .= '</tbody>
                             </table>';
        endif;

        $details['user_downloads'] = $this->html_users;

        /*         * ****************************************************************************
         * GET TOP 5 DOWNLOADS
         * ***************************************************************************** */

        if ($media_top):
            $this->html_top5 = '<table class="table table-striped table-bordered">
            <thead>
            <th>Media Type</th>
            <th>Media ID</th>
            <th>Downloads</th>
            </thead>
            <tbody>';
            foreach ($media_top as $row3):

                $this->html_top5 .= '<tr>
                            <td>' . $row3['media_type'] . '</td>
                            <td>' . $row3['media_id'] . '</td>
                            <td>' . $row3['count'] . '</td>
                            </tr>';

            endforeach;
            $this->html_top5 .= '</tbody>
                             </table>';

            $details['top'] = $this->html_top5;

        else:
            $this->html_top5 = '<table class="table table-striped table-bordered">
            <thead>
            <th>Media Type</th>
            <th>Media ID</th>
            <th>Downloads</th>
            </thead>
            <tbody>';
            

                $this->html_top5 .= '<tr>
                            <td colspan="3">There are no results</td>
                            </tr>';

          
            $this->html_top5 .= '</tbody>
                             </table>';

            $details['top'] = $this->html_top5;
        endif;
        $this->template->load('main_tpl', 'admin/statistics_tpl', $details);
    }
    
    
    public function user($id) {
        if(isset($_GET['month'])):
            $month = $_GET['month'];
            $days = days_in_month($month);
            else:
            $month = date('m');
            $datestring = "%d";
            $days = mdate($datestring);
        endif;
        if(isset($_GET['year'])):
            $month = $_GET['year'];
            else:
            $year = date('Y');
        endif;
        
        $details['contact'] = urldecode($this->uri->segment(4));
        $details['month'] = $month;
        $details['year'] = $year;

        $dayStats = array();

        $result = $this->analytics->monthDownloadDaysUser($id,$month, $year);
        $dwn_media = $this->analytics->monthDownloadsMediaUser($id,$month, $year);
        $dwn_users = $this->analytics->monthDownloadsUsers($month, $year);
        $media_top = $this->analytics->monthDownloadsTopMediaUser($id,$month, $year);
        $details['monthCount'] = $this->analytics->monthDownloadTotalUser($id,$month, $year);


        /*         * ****************************************************************************
         * GET DAILY DOWNLOADS 
         * ***************************************************************************** */
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

        /*         * ****************************************************************************
         * GET MEDIA DOWNLOADS 
         * ***************************************************************************** */

        if ($dwn_media):
            $this->html_media = '[';

            foreach ($dwn_media as $row2):

                $this->html_media .= '{ label: "' . $row2['media_type'] . '", data: ' . $row2['count'] . '},';

            endforeach;

            $trimed_media = rtrim($this->html_media, ',');

            $trimed_media .= ']';

        else:

            $trimed_media = '[{ label: "No downloads", data: 100}]';

        endif;

        $details['media_downloads'] = $trimed_media;


        /*         * ****************************************************************************
         * GET USER DOWNLOADS 
         * ***************************************************************************** */
        if ($dwn_users):


            $this->html_users = '<table class="table table-striped table-bordered">
            <thead>
            <th>Member</th>
            <th>Downloads</th>
            </thead>
            <tbody>';
            foreach ($dwn_users as $row):

                $this->html_users .= '<tr>
                            <td>' . $row['contact'] . '</td>
                            <td>' . $row['count'] . '</td>
                            </tr>';
            endforeach;

            $this->html_users .= '</tbody>
                             </table>';

        else:
            $this->html_users = '<table class="table table-striped table-bordered">
            <thead>
            <th>Member</th>
            <th>Downloads</th>
            </thead>
            <tbody>';


            $this->html_users .= '<tr>
                            <td colspan ="2">There are no results</td>
                            </tr>';


            $this->html_users .= '</tbody>
                             </table>';
        endif;

        $details['user_downloads'] = $this->html_users;

        /*         * ****************************************************************************
         * GET TOP 5 DOWNLOADS
         * ***************************************************************************** */

        if ($media_top):
            $this->html_top5 = '<table class="table table-striped table-bordered">
            <thead>
            <th>Media Type</th>
            <th>Media ID</th>
            <th>Downloads</th>
            </thead>
            <tbody>';
            foreach ($media_top as $row3):

                $this->html_top5 .= '<tr>
                            <td>' . $row3['media_type'] . '</td>
                            <td>' . $row3['media_id'] . '</td>
                            <td>' . $row3['count'] . '</td>
                            </tr>';

            endforeach;
            $this->html_top5 .= '</tbody>
                             </table>';

            $details['top'] = $this->html_top5;

        else:
            $this->html_top5 = '<table class="table table-striped table-bordered">
            <thead>
            <th>Media Type</th>
            <th>Media ID</th>
            <th>Downloads</th>
            </thead>
            <tbody>';
            

                $this->html_top5 .= '<tr>
                            <td colspan="3">There are no results</td>
                            </tr>';

          
            $this->html_top5 .= '</tbody>
                             </table>';

            $details['top'] = $this->html_top5;
        endif;
        $this->template->load('main_tpl', 'admin/statistics_user_tpl', $details);
    }

}

/* End of file statistics.php */
/* Location: ./application/widgets/statistics/controllers/statistics.php */
