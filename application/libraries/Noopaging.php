<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noopaging {
    public $i;
    public function __construct()
    {
       // $this->load->library('session');
    }
    
    public function paging($link,$pages){
        $this->i = 1;
        if ($pages > 1):


            $pagignation = '<div class="pagination"> 
                                <ul>';

            while ($this->i <= $pages):
                $pagignation .= '<li><a href="'.$link.'?page=' . $this->i . '">' . $this->i . '</a></li>';
                $this->i++;
            endwhile;


            $pagignation .= '</ul>
                
             </div>';
            
            return $pagignation;
        endif;
        
    }
    
    
    
    
    
}


