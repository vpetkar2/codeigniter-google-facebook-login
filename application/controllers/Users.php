<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Users_model', 'users');
        if (empty($this->session->id)) { redirect('/auth/login', 'refresh'); }
    }

    function index() {
        $data['user_data'] = $this->users->getRow($this->session->id);
        $this->load->view('welcome', $data);
    }

    function update_user() {

        $this->form_validation->set_rules('first_name', 'First Name', 'trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->users->uploadData($photo_data, "user_profile", "photo_path","","gif|jpg|png|jpeg");
        if(isset($photo_data["photo_err"]) and !empty($photo_data["photo_err"]))
        {
            $data["errors"]=$photo_data["photo_err"];
            $this->form_validation->set_rules("user_profile","User_profile","trim");
        }

        if($this->form_validation->run() == FALSE) 
        {
            $data['users'] = $this->users->getRow($this->session->id);
            if (!empty($data['users'])) {
                $data['id']=$this->session->user_id;
                $this->load->view('update_user', $data);   
            } else {
                redirect('users/index');
            }
        } else {
            $saveData['first_name'] = set_value('first_name');
            $saveData['last_name']  = set_value('last_name');
            $saveData['email']      = set_value('email');
            if(isset($photo_data["user_profile"]) && !empty($photo_data["user_profile"]))
            {
                $saveData["user_profile"] = $this->config->item('photo_url').$photo_data["user_profile"];
            }
            $this->users->updateData($saveData, $this->session->id);
            $this->session->set_flashdata('message', 'Users Updated Successfully!');
            redirect('users/index');
        }
    }

}