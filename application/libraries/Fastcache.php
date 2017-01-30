<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


include_once FCPATH.'application/libraries/cache/phpfastcache.php';

class Fastcache {
    
    private $cacher;
    
    public function __construct()
    {
        $this->cacher = new phpFastCache();
    }
    
    public function set($keyword,$data,$time=600){
        
        $this->cacher->set($keyword,$data,$time);
        
    }

    public function get($keyword){
        
       $result = $this->cacher->get($keyword);
       return $result;
    }
    
    public function delete($keyword){
        
        $this->cacher->delete($keyword);
        
    }
    
    public function stats(){
        
        $result = $this->cacher->stats();
       return $result;
    }
}