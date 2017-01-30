<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Download extends MX_Controller {

    private $userId;

    public function __construct() {
        parent::__construct();
        $this->authenticate->loggedIn($this->session->userdata('logged_in'));
        $this->load->library('narnooapi');
        $this->load->library('analytics');
        $this->load->library('narnooapi_operator_v2');
        $this->userId = $this->session->userdata('userId');
    }

    public function image($id) {


        if(empty($id)){
            die('No direct access');
        }

        $link = $this->narnooapi_operator_v2->downloadImage($id);

        redirect($link->download_image_file);
        //$this->analytics->setStatistic($this->userId, $id, 'image');
        //echo '<img src="' . $link . '" />';

        //print_r($link);
    }

    public function brochure($id) {

        if(empty($id)){
            die('No direct access');
        }

        $link = $this->narnooapi_operator_v2->downloadBrochure($id);

        redirect($link->download_brochure_file);


       /* $link = $this->narnooapi->downloadBrochure($id);
        $this->analytics->setStatistic($this->userId, $id, 'brochure');
        $file_name = str_replace('&amp;', '&', $link);
       
            header('Content-Type: application/pdf'); //<-- send mime-type header
            header('Content-Disposition: inline; filename="' . $file_name . '";'); //<-- sends filename header
            readfile($file_name); //<--reads and outputs the file onto the output buffer
            die(); //<--cleanup
            exit; //and exit*/
        
    }

    public function video($id) {
        
        if(empty($id)){
            die('No direct access');
        }

        $link = $this->narnooapi_operator_v2->downloadVideo($id);
        $this->analytics->setStatistic($this->userId, $id, 'video');

        redirect($link->download_original_file);


       // $this->processDownload($link, 'video');
    }

    private function processDownload($link, $media_type) {
        //create a correct link
        $file_name = str_replace('&amp;', '&', $link);
        //create download headers	
        header('Content-Description: File Transfer');
        header('Content Type: application/force-download');

        header('Content-Transfer-Encoding: binary');
        if ($media_type == "image") {
            header("Content-Disposition: attachment; filename=\"image.jpg\";");
        } else if ($media_type == "video") {
            header("Content-Disposition: attachment; filename=\"video.mp4\";");
        } else if ($media_type == "brochure") {
            header("Content-Disposition: attachment; filename=\"brochure.pdf\";");
        }
        //download bytes from remote server, and flush into current response.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $file_name);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); //not necessary unless the file redirects (like the PHP example we're using here)
        $content = curl_exec($ch);
        curl_close($ch);
        exit;
    }

}

/* End of file download.php */
/* Location: ./application/widgets/download/controllers/download.php */
