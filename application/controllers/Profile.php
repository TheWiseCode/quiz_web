<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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

    public function update_applicant($uid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Myaccount', $user_p)) {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        if ($this->user_model->update_profile_applicant($uid)) {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-success'>" .
                $this->lang->line('data_updated_successfully') .
                ' </div>'
            );
        } else {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-danger'>" .
                $this->lang->line('error_to_update_data') .
                ' </div>'
            );
        }
        redirect('profile/');
    }

    public function update_user($uid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Myaccount', $user_p)) {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        $rules = 0;
        $this->load->library('form_validation');
        $udata = $this->user_model->get_user($uid);
        if ($udata['email'] != $this->input->post('email')) {
            $rules = 1;
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[savsoft_users.email]');
        }
        if ($rules && $this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-danger'>" .
                validation_errors() .
                ' </div>'
            );
            redirect('profile/');
        } else {
            if ($this->user_model->update_profile_user($uid)) {
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-success'>" .
                    $this->lang->line('data_updated_successfully') .
                    ' </div>'
                );
            } else {
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-danger'>" .
                    $this->lang->line('error_to_update_data') .
                    ' </div>'
                );
            }
            redirect('profile/');
        }
    }

    public function index()
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (in_array('Myaccount', $user_p)) {
            $uid = $logged_in['uid'];
        } else {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        $data['uid'] = $uid;
        $data['title'] = $this->lang->line('my_account');
        // fetching user
        $data['result'] = $this->user_model->get_user($uid);
        $data['custom_form_user'] = $this->user_model->custom_form_user($uid);
        $data['custom_form'] = $this->user_model->custom_form('All');
        // fetching group list
        $data['nationalities'] = [];
        array_push($data['nationalities'], 'BOLIVIANO(A)');
        $nat = $this->lang->line('nationalities');
        usort($nat, function ($it1, $it2) {
            return $it1 > $it2;
        });
        $data['career_list'] = $this->user_model->get_career_all();
        $data['group_list'] = $this->user_model->group_list();

        $this->load->view('header', $data);
        if ($logged_in['su'] != '2') {
            $this->load->view('profile_user', $data);
        } else {
            $this->load->view('profile_applicant', $data);
        }
        $this->load->view('footer', $data);
    }
}