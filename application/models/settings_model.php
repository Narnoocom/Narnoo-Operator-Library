<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class settings_model extends CI_Model {
    /*
     * Table name: settings
     *
     * get opening page settings

     */

    // Add member to database - array $data
    public function getTerms() {

        $query = $this
                ->db
                ->select('settings.disclaimer,settings.editDate,members.contact')
                ->from('settings')
                ->join('members','members.id = settings.members_id')
                ->limit(1)
                ->get();


        if ($query->num_rows() >= 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getMenu() {

        $query = $this
                ->db
                ->limit(1)
                ->get('menu');


        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function saveDisclaimer($data) {
        $this->db->where('id',1);
        $this->db->update('settings', $data);
    }

    public function updateMenu($data) {
        $this->db->where('id',1);
        $this->db->update('menu', $data);
    }

}
