<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* * **********************************************
  Copyright (C) 2012 Escape2.tv

  Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

  The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

 * *********************************************** */

include_once FCPATH . 'application/libraries/narnoo/class-narnoo-request.php';
include_once FCPATH . 'application/libraries/narnoo/class-distributor-operator-narnoo-request.php';
include_once FCPATH . 'application/libraries/narnoo/utilities.php';


//LIVE ACCOUNT
define("ACCESS_KEY", '1348647548659');
define("SECRET_KEY", 'e9c219eed37713ff334dc217d33f0a69371b7989');

class Operatorapi {

    private $narnooClient;

    public function __construct() {
        $this->narnooClient = new DistributorOperatorMediaNarnooRequest ();
        $this->narnooClient->setAuth(ACCESS_KEY, SECRET_KEY);
        $this->narnooClient->sandbox = false;
    }

    public function getImages($op_id, $page = 1) {
        try {
            $results = $this->narnooClient->getImages($op_id, $page);
            return $results;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getBrochures($op_id, $page = 1) {
        try {
            $results = $this->narnooClient->getBrochures($op_id, $page);
            return $results;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getVideos($op_id, $page = 1) {
        try {
            $results = $this->narnooClient->getVideos($op_id, $page);
            return $results;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getDescriptions($op_id, $page = 1) {
        try {
            $results = $this->narnooClient->getProductText($op_id, $page);
            return $results;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getText($op_id, $title) {
        try {
            $results = $this->narnooClient->getProductTextWords($op_id, $title);
            return $results;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getDetails($op_id) {
        try {
            $results = $this->narnooClient->singleOperatorDetail($op_id);
            return $results;
        } catch (Exception $ex) {
            return $ex;
        }
    }

}

// end Narnoo API wrapper..
