<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class favorite_model extends CI_Model{

    
    public function checkUserFavorite($user,$type,$id){
      $query = $this
                ->db
                ->where('user_id',$user)
                ->where('media_id',$id)
                ->where('media_type',$type)
                ->limit(1)
                ->get('media_fav_manager');
        
        if($query -> num_rows() == 1)
           {
             return TRUE;
           }
           else
           {
             return FALSE;
           }
    }


    public function getMediaCount( $type,$id ){

      $query = $this
                ->db
                ->where('media_id',$id)
                ->where('media_type',$type)
                ->limit(1)
                ->get('media_fav');
        
        if($query -> num_rows() == 1)
           {
             return $query->row()->count;
           }
           else
           {
             return FALSE;
           }

    }


    public function getFavorites($limit=50){

        $query = $this
                ->db
                ->order_by('count','DESC')
                ->limit($limit)
                ->get('media_fav');
        
        if($query -> num_rows() > 0)
           {
             return $query->result_array();
           }
           else
           {
             return FALSE;
           }

    }
    
    public function setUserFavorite( $data ){
      $this->db->insert('media_fav_manager',$data);
    }

    public function setMediaCount( $data ){
      $this->db->insert('media_fav',$data);
    }

    public function updateMediaCount( $id,$type,$data ){
      $this->db->where('media_id',$id);
      $this->db->where('media_type',$type);
      $this->db->update('media_fav',$data);
    }
    
    public function deleteUserFavorite($user,$id,$type){
        $this->db->where('user_id',$user);
        $this->db->where('media_id',$id);
        $this->db->where('media_type',$type);
        $this->db->delete('media_fav_manager');
        
    }
    
    
    
}


?>
