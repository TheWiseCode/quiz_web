<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserNew extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('account_model');
        $this->lang->load('basic', $this->config->item('language'));
        // redirect if not loggedin
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['base_url'] != base_url()) {
            $this->session->unset_userdata('logged_in');
            redirect('login');
        }
    }

    public function index($limit = '0')
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('List_all', $user_p)) {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('List_all', $user_p)) {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        $data['limit'] = $limit;
        $data['title'] = $this->lang->line('userlist');
        // fetching user list
        $data['result'] = $this->user_model->user_list($limit);
        $data['list_account_type'] = $this->user_model->get_account_type();
        //$data['career_list'] = $this->user_model->get_career_all();
        ///$data['group_list'] = $this->user_model->get_group_all($limit);
        $this->load->view('header', $data);
        $this->load->view('applicant_list', $data);
        $this->load->view('footer', $data);
    }

    public function new_user(){
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Add', $user_p)) {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        $data['title'] = $this->lang->line('add_new_') . ' ' . $this->lang->line('user');
        $data['account_type'] = $this->account_model->account_list(0);
        $this->load->view('header', $data);
        $this->load->view('new_user2', $data);
        $this->load->view('footer', $data);
    }

    public function insert_user()
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Add', $user_p)) {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[savsoft_users.email]'
        );
        if ($this->input->post('password')) {

            if ($_POST['password'] != $_POST['repeat_password']) {

                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-danger'>" .
                    'Las contraseñas no coinciden' .
                    ' </div>'
                );
                redirect('user/create/');
            }
        }
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repeat_password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-danger'>" .
                validation_errors() .
                ' </div>'
            );
            redirect('user/create/');
        } else {
            if ($this->user_model->insert_user_user()) {
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-success'>" .
                    $this->lang->line('data_added_successfully') .
                    ' </div>'
                );
            } else {
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-danger'>" .
                    $this->lang->line('error_to_add_data') .
                    ' </div>'
                );
            }
            redirect('user/create/');
        }
    }

    public function remove_user($uid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Remove', $user_p)) {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        if ($uid == '1') {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }

        if ($this->user_model->remove_user_admin($uid)) {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-success'>" .
                $this->lang->line('removed_successfully') .
                ' </div>'
            );
        } else {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-danger'>" .
                $this->lang->line('error_to_remove') .
                ' </div>'
            );
        }
        redirect('user/index2');
    }

    public function profile(){

    }

    public function update_profile(){

    }

    public function edit_user(){

    }

    public function update_user(){

    }
}