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
         $response = $this->http_operatorconnect->downloadImage($imageId);
         return $response;
    }


    public function downloadBrochure($bro_Id){
         $response = $this->http_operatorconnect->downloadBrochure($bro_Id);
         return $response;
    }


    public function downloadVideo($video_Id){
         $response = $this->http_operatorconnect->downloadVideo($video_Id);
         return $response;
    }

    public function getImages($pageno=1){
         $response = $this->http_operatorconnect->getImages($pageno);
         return $response;
    }

    public function getAlbums($cover=NULL,$pageno=1){
         $response = $this->http_operatorconnect->getAlbums($cover,$pageno);
         return $response;
    }

    public function getAlbumImages($id,$pageno=1){
         $response = $this->http_operatorconnect->getAlbumImages($id,$page=1);
         return $response;
    }


    public function getSingleImage( $image ){
         $response = $this->http_operatorconnect->getSingleImage( $image );
         return $response;
    }

    public function getVideos($pageno=NULL){
         $response = $this->http_operatorconnect->getVideos($pageno);
         return $response;
    }

    public function getVideoDetails($id){
         $response = $this->http_operatorconnect->video_details($id);
         return $response;
    }

    public function getBrochures($pageno=NULL){
         $response = $this->http_operatorconnect->getBrochures($pageno);
         return $response;
    }

    public function getBrochuresType( $bro_type,$pageno=NULL){
         $response = $this->http_operatorconnect->getBrochuresTypes($bro_type,$pageno);
         return $response;
    }

    public function getBrochureDetails($id){
         $response = $this->http_operatorconnect->brochure_details($id);
         return $response;
    }

    public function getDescriptions( $page = 1) {
         $response = $this->http_operatorconnect->getDescriptions($page);
         return $response;
    }

    public function getText( $title ) {
         $response = $this->http_operatorconnect->getDescriptionText( $title );
         return $response;
    }

    public function getDetails() {
         $response = $this->http_operatorconnect->account_get();
         return $response;
    }

    public function getActivity() {
         $response = $this->http_operatorconnect->activity();
         return $response;
    }

    public function imageBasket( $data ) {
         $response = $this->http_operatorconnect->imageBasket( $data );
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

    public function getDistributors($page=NULL) {
         $response = $this->http_operatorconnect->getDistributors();
         return $response;
    }
    /*
    * @date_modified: 11-08-16
    */
    public function getProducts() {
         $response = $this->http_operatorconnect->getProducts();
         return $response;
    }
    public function getProductDetails($uid) {
         $response = $this->http_operatorconnect->getProductDetails( $uid );
         return $response;
    }
    public function getProductMedia($uid) {
         $response = $this->http_operatorconnect->getProductMedia( $uid );
         return $response;
    }

}
