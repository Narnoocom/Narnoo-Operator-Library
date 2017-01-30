<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //controller can only be used by logged in users
        $this->load->library('fastcache');
    }


    public function debug2() {

        echo 'hello ';
    }

    public function pageMedia(){

        $type       = $this->input->post('t');
        $page       = $this->input->post('p');

        if( empty($type) || empty($page) ){
            die('Need a media type or page number');
        }

        if($type == 1){
            $media              = 'image';
        }elseif ($type == 2) {
            $media              = 'brochure';
        }elseif ($type == 3) {
           $media               = 'video';
        }

        $response = $this->searchPage($media,$page);

        //print_r($response);
        //die();

        if(!empty($response)){

          if($type == 1){

            //IMAGES [START]
            $html =  '<!-- Start Page Shot -->';
            foreach ($response->operator_images as $row){
              $html .=  '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                  <div class="shot shot-small">
                    <div class="shot-preview">
                      <a href="'.site_url('images/details/'.$row->image_id ).'"><img src="'.$row->xcrop_image_path.'" alt=""></a>
                     <span class="basket" data-id="'.$row->image_id.'" data-type="1"></span>
                     </div>
                  </div>
                </div>';


             }
             $html .=  '<!--END page Shot -->';




             if($response->total_pages > 1){
                if($page < $response->total_pages){

                $pageHtml = '<!-- Paging Button [start] -->
                    <div class="row paging-more-btn">
                     <div class="text-center">
                      <a id="paging-more" class="btn btn-primary btn-round btn-lg" href="javascript:;"';
                      $pageHtml .=' data-type="'.$type.'" ';
                      $pageHtml .=' data-page="';
                      $pageHtml .= (int) $page+1;
                      $pageHtml .= '">Load More Images</a>
                     </div>
                    </div>
                    <div class="row  paging-more-loader" style="display:none">
                     <div class="text-center">
                      <img src="'.cdn_url('assets/img/loader.gif').'" />
                     </div>
                    </div>
                    <!-- Paging Button [end] -->';
                    }
                }


         $data['imageData']         = $html;
         if(!empty($pageHtml)){
            $data['pagingData']    = $pageHtml;
         }else{
            $data['pagingData']    = NULL;
         }
         //IMAGES [END]
      }elseif ($type == 2) {


        //BROCHURES [START]

        $html =  '<!-- Start Page Shot -->';
        foreach ($response->operator_brochures as $row){
          $html .=  '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
              <div class="shot shot-small">
                <div class="shot-preview">
                  <a href="'.site_url('brochures/details/'.$row->brochure_id ).'"><img src="'.$row->preview_image_path.'" alt=""></a>
                 <!-- <span class="basket" data-id="'.$row->brochure_id.'" data-type="2"></span> -->
                 </div>
              </div>
            </div>';


         }
         $html .=  '<!--END page Shot -->';




         if($response->total_pages > 1){
            if($page < $response->total_pages){

            $pageHtml = '<!-- Paging Button [start] -->
                <div class="row paging-more-btn">
                 <div class="text-center">
                  <a id="paging-more" class="btn btn-primary btn-round btn-lg" href="javascript:;"';
                  $pageHtml .=' data-type="'.$type.'"';
                  $pageHtml .=' data-page="';
                  $pageHtml .= (int) $page+1;
                  $pageHtml .= '">Load More Brochures</a>
                 </div>
                </div>
                <div class="row  paging-more-loader" style="display:none">
                 <div class="text-center">
                  <img src="'.cdn_url('assets/img/loader.gif').'" />
                 </div>
                </div>
                <!-- Paging Button [end] -->';
                }
            }


     $data['imageData']         = $html;
     if(!empty($pageHtml)){
        $data['pagingData']    = $pageHtml;
     }else{
        $data['pagingData']    = NULL;
     }
     //BROCHURES [END]





       }elseif ($type == 3) {


        //VIDEOS [START]
            $html =  '<!-- Start Page Shot -->';
            foreach ($response->operator_videos as $row){
              $html .=  '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                  <div class="shot shot-small">
                    <div class="shot-preview">
                      <a href="'.site_url('videos/view/'.$row->video_id ).'"><img src="'.$row->video_thumb_image_path.'" alt=""></a>
                     <!-- <span class="basket" data-id="'.$row->video_id.'" data-type="3"></span> -->
                     </div>
                  </div>
                </div>';


             }
             $html .=  '<!--END page Shot -->';




             if($response->total_pages > 1){
                if($page < $response->total_pages){

                $pageHtml = '<!-- Paging Button [start] -->
                    <div class="row paging-more-btn">
                     <div class="text-center">
                      <a id="paging-more" class="btn btn-primary btn-round btn-lg" href="javascript:;"';

                      $pageHtml .=' data-type="'.$type.'"';
                      $pageHtml .=' data-page="';
                      $pageHtml .= (int) $page+1;
                      $pageHtml .= '">Load More Videos</a>
                     </div>
                    </div>
                    <div class="row  paging-more-loader" style="display:none">
                     <div class="text-center">
                      <img src="'.cdn_url('assets/img/loader.gif').'" />
                     </div>
                    </div>
                    <!-- Paging Button [end] -->';
                    }
                }


         $data['imageData']     = $html;
         if(!empty($pageHtml)){
            $data['pagingData']    = $pageHtml;
         }else{
            $data['pagingData']    = NULL;
         }
         //VIDEOS [END]



       }

         echo json_encode($data);


     }




    }






    public function searchPage($type=NULL,$page=1) {

        $this->load->library('narnooapi_operator_v2');

        $t      = $type;
        $p      = $page;

        if(!empty($t)){


            if(!empty($p)){
                $page = $p;
            }else{
                $page = NULL;
            }


            if( $t == 'image' ){

                $result = $this->fastcache->get('images_' . $page);

                if(empty($result)){
                  $result = $this->narnooapi_operator_v2->getImages($page);
                  if(!empty( $result->success )){
                    $this->fastcache->set('images_' . $page, $result, 14400);
                  }

                }

            }elseif( $t == 'brochure' ){

                $result = $this->fastcache->get('brochures_' . $page);

                if(empty($result)){
                  $result =  $this->narnooapi_operator_v2->getBrochures($page);
                  $this->fastcache->set('brochures_' . $page, $result, 14400);
                }


            }elseif( $t == 'video' ){

                $result = $this->fastcache->get('videos_' . $page);

                if(empty($result)){
                  $result =  $this->narnooapi_operator_v2->getVideos($page);
                  $this->fastcache->set('videos_' . $page, $result, 14400);
                }


            }

          return $result;

        } else {
            exit('no direct access');
        }


    }

}

/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
