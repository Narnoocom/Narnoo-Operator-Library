<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analytics {

    //save download
    // get download for month
    // get download for member
    
    public function __construct() {
        $this->object = & get_instance();
    }

    public function setStatistic($member_id, $media_id, $type) {

        $data = array(
            'members_id' => $member_id,
            'media_id' => $media_id,
            'media_type' => $type
        );

        $query = $this->object
                ->db
                ->insert('statistics', $data);
    }

    /*
     * Get the TOTAL number of downloads for the month.
     */

    public function monthDownloadTotal($month, $year) {

        $details = $this->object
                ->db
                ->from('statistics')
                ->where('MONTH(date)', $month)
                ->where('YEAR(date)', $year)
                ->get();

        return $details->num_rows();
    }
    
    /*
     * Get the TOTAL number of downloads for the month.
     */

    public function monthDownloadTotalUser($user,$month, $year) {

        $details = $this->object
                ->db
                ->from('statistics')
                ->where('MONTH(date)', $month)
                ->where('YEAR(date)', $year)
                ->where('members_id',$user)
                ->get();

        return $details->num_rows();
    }

    /*
     * Get the TOTAL number of downloads for the month per day. count(CustID)
     */

    public function monthDownloadDays($month, $year) {

        $details = $this->object
                ->db
                ->select('DAY(date) as day, count(id) as count')
                ->from('statistics')
                ->where('MONTH(date)', $month)
                ->where('YEAR(date)', $year)
                ->group_by('DAY(date)')
                ->get();

        if ($details->num_rows > 0) {

            return $details->result_array();
        }
        return false;
    }
    /*
     * Get the TOTAL number of downloads for the month per day. count(CustID)
     */

    public function monthDownloadDaysUser($user,$month, $year) {

        $details = $this->object
                ->db
                ->select('DAY(date) as day, count(id) as count')
                ->from('statistics')
                ->where('MONTH(date)', $month)
                ->where('YEAR(date)', $year)
                ->where('members_id',$user)
                ->group_by('DAY(date)')
                ->get();

        if ($details->num_rows > 0) {

            return $details->result_array();
        }
        return false;
    }
    
     /*
     * Get the TOTAL number of downloads for the month per day. count(CustID)
     

    public function monthDownloadDaysUser($member_id, $month, $year) {

        $details = $this->object
                ->db
                ->from('statistics')
                ->where('members_id', $member_id)
                ->where('MONTH(date)', $month)
                ->where('YEAR(date)', $year)
                ->order_by('DAY(date)', 'asc')
                ->get();

        if ($details->num_rows > 0) {

            return $details->result_array();
        }
        return false;
    }*/
    
    public function monthDownloadsMedia($month,$year){
        
        $details = $this->object
                ->db
                ->select('media_type, count(id) as count')
                ->from('statistics')
                ->where('MONTH(date)', $month)
                ->where('YEAR(date)', $year)
                ->group_by('media_type')
                ->get();

        if ($details->num_rows > 0) {

            return $details->result_array();
        }
        return false;
        
    }
    public function monthDownloadsMediaUser($user,$month,$year){
        
        $details = $this->object
                ->db
                ->select('media_type, count(id) as count')
                ->from('statistics')
                ->where('MONTH(date)', $month)
                ->where('YEAR(date)', $year)
                ->where('members_id', $user)
                ->group_by('media_type')
                ->get();

        if ($details->num_rows > 0) {

            return $details->result_array();
        }
        return false;
        
    }
    //this is for statistics
    public function monthDownloadsUsers($month,$year){
        
        $details = $this->object
                ->db
                ->select('members.id,members.contact, count(statistics.id) as count')
                ->from('statistics')
                ->join('members','members.id=statistics.members_id')
                ->where('MONTH(date)', $month)
                ->where('YEAR(date)', $year)
                ->group_by('members_id')
                ->get();

        if ($details->num_rows > 0) {

            return $details->result_array();
        }
        return false;
        
    }
    
    public function monthDownloadsTopMedia($month,$year){
        
        $details = $this->object
                ->db
                ->select('media_id, media_type, count(id) as count')
                ->from('statistics')
                ->where('MONTH(date)', $month)
                ->where('YEAR(date)', $year)
                ->group_by('media_id')
                ->order_by('count(id)', 'DESC')
                ->limit(5)
                ->get();

        if ($details->num_rows > 0) {

            return $details->result_array();
        }
        return false;
        
    }
    
    public function monthDownloadsTopMediaUser($user,$month,$year){
        
        $details = $this->object
                ->db
                ->select('media_id, media_type, count(id) as count')
                ->from('statistics')
                ->where('MONTH(date)', $month)
                ->where('YEAR(date)', $year)
                ->where('members_id',$user)
                ->group_by('media_id')
                ->order_by('count(id)', 'DESC')
                ->get();

        if ($details->num_rows > 0) {

            return $details->result_array();
        }
        return false;
        
    }

   
}

// end analytics script