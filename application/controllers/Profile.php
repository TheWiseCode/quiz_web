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
            $data_photo = $this->cargar_archivo(true);
            if ($this->user_model->update_profile_applicant($uid, $data_photo)) {
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
            $data_photo = $this->cargar_archivo();
            if ($this->user_model->update_profile_user($uid, $data_photo)) {
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

    function cargar_archivo($with_code = false)
    {
        $cd = '';
        if ($with_code) {
            $cd = $this->input->post('code_student') . '_';
        }
        $name = $cd . date('dmY_His', time());
        $mi_imagen = 'wizard_picture';
        $config['upload_path'] = "photo/users";
        $config['file_name'] = $name . "";
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "20000";
        $config['max_height'] = "20000";
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($mi_imagen)) {
            return null;
        }
        $data['uploadSuccess'] = $this->upload->data();
        $photo = 'photo/users/' . $data['uploadSuccess']['orig_name'];
        return $photo;
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
            //$this->load->view('camera_test', $data);
        } else {
            $this->load->view('profile_applicant', $data);
        }
        $this->load->view('footer', $data);
    }
}