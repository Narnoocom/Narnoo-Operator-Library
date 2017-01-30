<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Members extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->authenticate->loggedIn($this->session->userdata('logged_in'));
        $this->authenticate->authen_admin($this->session->userdata('type'));
        $this->load->library('narnooapi');
        $this->load->model('members_model');
    }

    public function index() {
        $this->load->library('jquery_pagination');


        $config['base_url'] = base_url() . 'index.php/members/pageMembers';
        $config['total_rows'] = $this->members_model->countPageMembers();
        $config['per_page'] = 25;
        $config['div'] = '#ajax-pager';

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $details['info'] = $this->members_model->getMembers($config['per_page'], $page);
        $this->jquery_pagination->initialize($config);
        $details["links"] = $this->jquery_pagination->create_links();


        $this->template->load('main_tpl', 'admin/members_list_tpl', $details);
    }

    public function pageMembers() {
        $this->load->library('jquery_pagination');

        $config['base_url'] = base_url() . 'index.php/members/pageMembers';
        $config['total_rows'] = $this->members_model->countPageMembers();
        $config['per_page'] = 25;
        $config['div'] = '#ajax-pager';

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $details['info'] = $this->members_model->getMembers($config['per_page'], $page);

        $this->jquery_pagination->initialize($config);
        $details["links"] = $this->jquery_pagination->create_links();


        $this->load->view('pager_members_list_tpl', $details);
    }

    public function details($id) {


        $this->load->library('narnooapi');
        $this->load->helper('time');



        $details['info'] = $this->members_model->getDetails($id);

        if ($details['info']->level == 1):


            //$album = $this->members_model->getMemberAlbum($id);
            //$album_setup = $this->narnooapi->getAlbums();
            if ( !empty( $album ) ):

               /* $html = '<span class="text-info">This member is currently only allowed to view the images within the <strong>' . $album->album_name . '</strong> album.</span>';

                $html .= '<h3>Change Album:</h3> <select id="album_update" name="album_update">
                         <option></option>
                        <option value="none">none</option>';


                foreach ($album_setup->operator_albums as $rows):
                    $html .= '<option value="' . $rows->album_name . '">' . $rows->album_name . '</option>';
                endforeach;

                $html .= '</select>';

                $details['albums'] = $html;
            //$details['memb_album_id'] = $album->member_id;*/

            else:

              /*  $album_setup = $this->narnooapi->getAlbums();

                $html = '<span class="text-info">This will only allow the member to view images contained in the album. </span> 
                    <select id="album_name" name="album_name">
                        <option></option>
                        <option value="none">none</option>';


                foreach ($album_setup->operator_albums as $rows):
                    $html .= '<option value="' . $rows->album_name . '">' . $rows->album_name . '</option>';
                endforeach;

                $html .= '</select>';

                //$details['albums'] = $html;*/



            endif;
        endif;



        $this->template->load('main_tpl', 'admin/members_details_tpl', $details);
    }

    public function add() {

        $this->template->load('main_tpl', 'admin/members_add_tpl');
    }

    public function save() {

        $this->load->helper('password');
        $name       = $this->input->post('name');
        $business   = $this->input->post('business');
        $email      = $this->input->post('email');
        $country    = $this->input->post('country');
        $type       = $this->input->post('type');
        $access     = $this->input->post('access');
        $notify     = $this->input->post('emailCheck');
        

        $data_member = array(
            'contact' => $name,
            'business_name' => $business,
            'email' => $email,
            'country' => $country,
            'level' => $type,
            'privilege' => $access
        );

        $member_id = $this->members_model->saveDetails($data_member);
        $p_word = get_random_password(6, 10, TRUE, FALSE);
        $data_login = array(
            'members_id' => $member_id,
            'username' => $email,
            'password' => $p_word
        );

        if (isset($notify)):
        //sent varable to email user...
        $this->load->library('email');

        $this->email->from($this->config->item('business_email'), $this->config->item('business_name'));
        $this->email->to(trim($email));
        $this->email->subject('New Media Login Details');
        $this->email->message("Dear " . trim($name) . ",\n\nPlease see below login details to access the media library for ".$this->config->item('business_name').".\n\nYour username is: ". trim($email) . "\nYour new password is: ". $p_word . "\n\nFeel free to login now at ".$this->config->item('medialibrary_url')." and download our resources. Please contact the our office via ".$this->config->item('business_email')." if you have any problems.\n\nRegards,\n" . $this->config->item('business_name'));

        $this->email->send();



        endif;

        $this->members_model->saveLogin($data_login);
    }

    public function delete() {
        $this->authenticate->authen_ajax($this->input->is_ajax_request());
        $id = $this->input->post('i');

        $this->members_model->deleteMember($id);

        echo 'success';
    }

    public function archived() {
        $this->load->library('jquery_pagination');
        $config['base_url'] = base_url() . 'index.php/members/pageArchived';
        $config['total_rows'] = $this->members_model->countPageArchiveMembers();
        $config['per_page'] = 25;
        $config['div'] = '#ajax-pager';

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $details['info'] = $this->members_model->getArchivedMembers($config['per_page'], $page);

        $this->jquery_pagination->initialize($config);
        $details["links"] = $this->jquery_pagination->create_links();

        $this->template->load('main_tpl', 'admin/members_delete_list_tpl', $details);
    }

    public function pageArchived() {
        $this->load->library('jquery_pagination');
        $config['base_url'] = base_url() . 'index.php/members/pageArchived';
        $config['total_rows'] = $this->members_model->countPageArchiveMembers();
        $config['per_page'] = 25;
        $config['div'] = '#ajax-pager';

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $details['info'] = $this->members_model->getArchivedMembers($config['per_page'], $page);

        $this->jquery_pagination->initialize($config);
        $details["links"] = $this->jquery_pagination->create_links();

        $this->template->load('main_tpl', 'admin/members_delete_list_tpl', $details);
    }

    public function restore() {
        $this->authenticate->authen_ajax($this->input->is_ajax_request());
        $id = $this->input->post('i');

        $this->members_model->restoreMember($id);

        echo 'success';
    }

    public function privilege() {
        $this->authenticate->authen_ajax($this->input->is_ajax_request());
        $id = $this->input->post('i');
        $access = $this->input->post('p');

        $this->members_model->setPrivilege($id, $access);

        //set session data
        $newdata = array(
            'access' => $access
        );

        $this->session->set_userdata($newdata);

        echo 'success';
    }

    public function suspend() {
        $this->authenticate->authen_ajax($this->input->is_ajax_request());

        $id = $this->input->post('i');
        $t = $this->input->post('t');
        $this->members_model->setSuspend($id, $t);
    }

    public function album() {
        $this->authenticate->authen_ajax($this->input->is_ajax_request());

        $id = $this->input->post('i');
        $album = $this->input->post('a');

        $data = array(
            'member_id' => $id,
            'album_name' => $album
        );


        $this->members_model->setAlbum($data);


        echo 'success';
    }

    public function albumUpdate() {
        $this->authenticate->authen_ajax($this->input->is_ajax_request());

        $id = $this->input->post('i');
        $album = $this->input->post('a');

        if ($album !== 'none'):
            $data = array(
                'album_name' => $album
            );

            $this->members_model->updateAlbum($id, $data);

            echo 'success';

        else:

            $this->members_model->deleteAlbum($id);

            echo 'deleted';

        endif;
    }

    public function getAlbums() {
        $this->authenticate->authen_ajax($this->input->is_ajax_request());
        $album_setup = $this->narnooapi->getAlbums();

        $html = '<select id="album_update" name="album_update">
                        <option value="none">None</option>';


        foreach ($album_setup->operator_albums as $rows):
            $html .= '<option value="' . $rows->album_name . '">' . $rows->album_name . '</option>';
        endforeach;

        $html .= '</select>';

        echo $html;
    }

}

/* End of file members.php */
/* Location: ./application/widgets/imagescontrollers/members.php */
