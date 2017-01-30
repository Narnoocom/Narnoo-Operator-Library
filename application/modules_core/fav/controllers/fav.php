<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fav extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //controller can only be used by logged in users
        $this->load->model('favorite_model');
    }

    /*
    Function in main template view to control the display of the shopping cart button
    * @params media type
    * @params media id
    */
    public function index(){

        redirect('dashboard');

    }

    /*
    Ajax add function to add items into the cart
    * @params media type
    * @params media id
    */
   public function add(){

    $type = $this->input->post('t');
    $id   = $this->input->post('i');
    $user = $this->session->userdata('userId');

    if( empty($type) || empty($id) || empty($user) ){
        echo 'No direct access';
    }


    $check = $this->favorite_model->checkUserFavorite( $user,$type,$id );

    if( empty($check) ){

        //set user manager store
        $user_store = array(
            'user_id'       => $user,
            'media_type'    => $type,
            'media_id'      => $id
        );

        $this->favorite_model->setUserFavorite( $user_store );

        //update count
        $count = $this->favorite_model->getMediaCount( $type,$id );
        if(empty($count)){

            $media_count = array(
                'media_id'      => $id,
                'media_type'    => $type,
                'count'         => 1
            );

            $this->favorite_model->setMediaCount( $media_count );
            echo 'success';
            die();

        }else{

            $media_count = array(
                'count' => $count+1
            );
            $this->favorite_model->updateMediaCount( $media_id,$type,$media_count );
            echo 'success';
            die();
        }



    }else{

        echo 'You have already add this as a favorite';
    }

    

   }

   /*
    Ajax remove function to add items into the cart
    * @params media type
    * @params media id
    */
   public function remove(){

        $type = $this->input->post('t');
        $id   = $this->input->post('i');
        $user = $this->session->userdata('userId');

        if( empty($type) || empty($id) || empty($user) ){
            echo 'No direct access';
        }

        $check = $this->favorite_model->checkUserFavorite( $user,$type,$id );

        if( empty($check) ){
            die('Not one of your favorites');
        }else{


            $count = $this->favorite_model->getMediaCount( $type,$id );

            if(!empty($count)){

                $media_count = array(
                'count' => $count-1
                );
                $this->favorite_model->updateMediaCount( $id,$type,$media_count );

            }

            $this->favorite_model->deleteUserFavorite($user,$id,$type);

            echo "success";



        }


        

        

   }

   public function button(){

        $id        =  $this->input->post('i');
        $type      =  $this->input->post('t');
        $user      =  $this->session->userdata('userId');

        if(empty($id) || empty($type) || empty($user) ){
            die('No direct access');
        }


        $check = $this->favorite_model->checkUserFavorite( $user,$type,$id );
        $count = $this->favorite_model->getMediaCount( $type,$id );

        if( empty($count) ){
            $total = 0;
        }else{
            $total = $count;
        }

        if( empty( $check ) ){ // user hasn't liked it.

            echo '<li><a href="javascript:;" id="add-favorite" title="Add to favorites" data-id="'.$id.'" data-type="'.$type.'"><i class="fa fa-heart" style="color:#818a91" ></i></a><span>';
            if($total !== 0 ) { echo $total; };
            echo '</span></li>';

        }else{

            echo '<li><a href="javascript:;" id="remove-favorite" title="Remove from favorites" data-id="'.$id.'" data-type="'.$type.'"><i class="fa fa-heart" ></i></a><span>';
            if($total !== 0 ) { echo $total; };
            echo '</span></li>';

        }

   }


   public function view(){  
        //$this->load->model('favorite_model');
    if( $this->session->userdata('type') == 1 ){

        $favorites = $this->favorite_model->getFavorites();

        if(!empty($favorites)){

            $images = array();

            if(!empty($favorites)){
                $this->load->library('narnooapi_v2');

                foreach($favorites as $fav){

                    array_push($images, $fav['media_id']);

                }

               $data = json_encode($images);

               $details['images'] = $this->narnooapi_v2->imageBasket( $data );

               $this->template->load('user_master_tpl', 'members/user_favorites_grid',$details);
                
            }


        }else{
            redirect('dashboard');
        }
        


   }else{
        redirect('dashboard');
   }
}

public function widget($num=9){

    if( $this->session->userdata('type') == 1 ){

        $favorites = $this->favorite_model->getFavorites( $num );

        if( !empty($favorites) ){

            $images = array();

            if(!empty($favorites)){

                $this->load->library('narnooapi_v2');

                foreach($favorites as $fav){

                    array_push($images, $fav['media_id']);

                }

               $data = json_encode($images);

               $images = $this->fastcache->get('images_favs');

               if( empty($details['images']) ){
                    $images = $this->narnooapi_v2->imageBasket( $data );
                    $this->fastcache->set('images_favs',$images,1000);
               }


               $html = '<!-- Shot -->';
               $c = 0;
               $num = $num - 1;
               foreach ($images->distributor_images as $row) {
                if($c <= $num){
                    $html .= '<div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="shot shot-small">
                        <div class="shot-preview">
                          <a class="img" href="' . site_url('images/details/'.$row->image_id ) . '"><img src="' . $row->xcrop_image_path . '" alt=""></a>
                        </div>
                      </div>
                    </div>
                    <!-- END Shot -->';
                }
                $c++;
               }

               echo $html;
               
                
            }


        }

   }


}

    

}

/* End of file cart.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */

