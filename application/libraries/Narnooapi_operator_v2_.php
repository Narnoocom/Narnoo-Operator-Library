<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . '/libraries/narnoo/http/WebClient.php';
require_once APPPATH . '/libraries/narnoo/operator.php';

class Narnooapi_operator_v2 {
     public $http_operatorconnect;
     public $http_category;

    public function __construct()
    {
        $this->object =& get_instance();
        $this->http_operatorconnect = new Operator( $this->object->config->item('narnooapi') );

     }

    public function downloadImage($imageId){
         $response = $this->http_operatorconnect->downloadImage($imageId);//print_r( $response);die("kkk");
         return $response;
    }


    public function downloadBrochure($bro_Id){
         $response = $this->http_operatorconnect->downloadBrochure($bro_Id);//print_r( $response);die("kkk");
         return $response;
    }


    public function downloadVideo($video_Id){
         $response = $this->http_operatorconnect->downloadVideo($video_Id);//print_r( $response);die("kkk");
         return $response;
    }

    public function getImages($pageno=1){
         $response = $this->http_operatorconnect->getImages($pageno);//print_r( $response);die("kkk");
         return $response;
    }

    public function getAlbums($cover=NULL,$pageno=1){
         $response = $this->http_operatorconnect->getAlbums($cover,$pageno);
         return $response;
    }


    public function getSingleImage( $image ){
         $response = $this->http_operatorconnect->getSingleImage( $image );//print_r( $response);die("kkk");
         return $response;
    }

    public function getVideos($pageno=NULL){
         $response = $this->http_operatorconnect->getVideos($pageno);//print_r( $response);die("kkk");
         return $response;
    }

    public function getBrochures($pageno=NULL){
         $response = $this->http_operatorconnect->getBrochures($pageno);//print_r( $response);die("kkk");
         return $response;
    }

    public function getDescriptions( $page = 1) {
         $response = $this->http_operatorconnect->getDescriptions($page);//print_r( $response);die("kkk");
         return $response;
    }

    public function getText( $title) {
         $response = $this->http_operatorconnect->getDescriptionText($title);//print_r( $response);die("kkk");
         return $response;
    }

    public function getDetails() {
         $response = $this->http_operatorconnect->account();
         return $response;
    }
    public function getDistributors($page=NULL) {
         $response = $this->http_operatorconnect->getDistributors();
         return $response;
    }

    public function UploadImage($filePath,$id){
         $response = $this->http_operatorconnect->uploadImage($filePath,$id);
         return $response;
    }


    public function uploadVideo($filePath,$id){
         $response = $this->http_operatorconnect->uploadVideo($filePath,$id);//print_r( $response);die("kkk".$bro_id);
         return $response;
    }


    public function uploadbrochure($filePath,$id){
         $response = $this->http_operatorconnect->uploadbrochure($filePath,$id);//print_r( $response);die("kkk".$bro_id);
         return $response;
    }

}
