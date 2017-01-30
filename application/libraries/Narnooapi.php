<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/************************************************
Copyright (C) 2012 Escape2.tv

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*************************************************/

include_once FCPATH.'application/libraries/narnoo/class-narnoo-request.php';
include_once FCPATH.'application/libraries/narnoo/class-operator-narnoo-request.php';
include_once FCPATH.'application/libraries/narnoo/utilities.php';


//LIVE ACCOUNT
define("ACCESS_KEY",'1336470987119');
define("SECRET_KEY",'3ef8c3e14a1e3836006aa0650282994fb03d9a67');

class Narnooapi {
    
    private $narnooClient;
    
    public function __construct()
    {
        $this->narnooClient = new OperatorNarnooRequest ();
        $this->narnooClient->setAuth(ACCESS_KEY,SECRET_KEY);
        $this->narnooClient->sandbox = false;
    }
    
    public function getImages($page = 1)
    {
        try {
            $results =  $this->narnooClient->getImages($page);
            return $results;
            } catch ( Exception $ex ) {
                 $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    public function getBrochures($page = 1)
    {
        try {
            $results =  $this->narnooClient->getBrochures($page);
            return $results;
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    public function getVideos($page = 1)
    {
        try {
            $results =  $this->narnooClient->getVideos($page);
            return $results;
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    public function getFollowers($page = 1)
    {
        try {
            $results =  $this->narnooClient->getDistributors($page);
            return $results;
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    public function getDescriptions($page = 1)
    {
        try {
            $results =  $this->narnooClient->getProductText($page);
            return $results;
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    public function getText($title)
    {
        try {
            $results =  $this->narnooClient->getProductTextWords($title);
            return $results;
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    
    public function getDetails()
    {
        try {
            $results =  $this->narnooClient->getDetails();
            return $results;
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    
    public function getAlbums($page = 1)
    {
        try {
            $results =  $this->narnooClient->getAlbums( $page );
            return $results;
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    
    public function getAlbumImages($title,$page = 1 )
    {
        try {
            $results =  $this->narnooClient->getAlbumImages($title,$page);
            return $results;
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    
    public function downloadImage($image_id)
    {
        try {
            $results =  $this->narnooClient->downloadImage($image_id);
            return uncdata( $results->download_image_link );
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    
    public function downloadVideo($video_id)
    {
        try {
            $results =  $this->narnooClient->downloadVideo($video_id);
            return uncdata( $results->download_video_stream_path );
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    public function downloadBrochure($brochure_id)
    {
        try {
            $results =  $this->narnooClient->downloadBrochure($brochure_id);
            return uncdata( $results->download_brochure_to_pdf_path );
            } catch ( Exception $ex ) {
                $error['error'] = $ex->getMessage();
                 return $error;
            }
    }
    
}



// end Narnoo API wrapper..
