<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("user_model");
        $this->load->model("account_model");
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

    function error_display()
    {
        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }
        foreach ($_FILES as $key => $value) {
            $data[$key] = $value;
        }
        $this->session->set_flashdata('data_temp', $data);
        redirect('applicant/create/');
    }

    public function index($limit = '0')
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['applicants']);
        if (!in_array('List_all', $user_p)) {
            $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        $data['limit'] = $limit;
        $data['title'] = $this->lang->line('applicant_list');
        // fetching user list
        $data['result'] = $this->user_model->applicant_list($limit);
        	
        $data['career_list'] = $this->user_model->get_career_all();
        $data['group_list'] = $this->user_model->get_group_all($limit);
        $this->load->view('header', $data);
        $this->load->view('applicant_list', $data);
        $this->load->view('footer', $data);
    }

    public function create()
    {
        try {
            if ($this->session->flashdata('data_temp') != null) {
                $data = $this->session->flashdata('data_temp');
            }
            $logged_in = $this->session->userdata('logged_in');
            $user_p = explode(',', $logged_in['applicants']);
            if (!in_array('Add', $user_p)) {
                $data['title'] = $this->lang->line('permission_denied');
                $this->load->view('header', $data);
                $this->load->view('errors/403', $data);
                $this->load->view('footer', $data);
                return;
            }
            $data['title'] = $this->lang->line('add_new_') . ' ' . $this->lang->line('users_student');
            $data['group_list'] = $this->user_model->group_list();
            $data['career_list'] = $this->user_model->get_career_all();
            $data['account_type'] = $this->account_model->account_list(0);
            $data['nationalities'] = $this->lang->line('nationalities');
            $query = $this->db->query(" select * from savsoftquiz_setting where setting_name='Fingerprint_on'");
            $result = $query->result_Array();

            $data['setting_fingerprint'] = $result['0']['setting_value'];
            usort($data['nationalities'], function ($it1, $it2) {
                return $it1 > $it2;
            });
            $data['nationalities'] = array_merge(['BOLIVANO(A)'], $data['nationalities']);
            $this->load->view('header', $data);
            $this->load->view('new_applicant', $data);
            $this->load->view('footer', $data);
        } catch (Exception $e) {
            $data['error'] = $e->getTrace();
            $this->load->view('header', $data);
            $this->load->view('new_applicant', $data);
            $this->load->view('footer', $data);
        }
    }

    public function insert()
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['applicants']);
        if (!in_array('Add', $user_p)) {
            $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ci', 'CI', 'required|is_unique[savsoft_users.ci]');
        $this->form_validation->set_rules('code_student', 'Codigo CD', 'required|is_unique[savsoft_users.cod_student]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[savsoft_users.email]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-danger'>" .
                validation_errors() .
                ' </div>'
            );
            $this->error_display();
        } else {
            $data_photo = $this->cargar_archivo();
            if ($this->user_model->insert_applicant($data_photo)) {
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-success'>" .
                    $this->lang->line('data_added_successfully') .
                    ' </div>'
                );
                redirect('applicant/create/');
            } else {
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-danger'>" .
                    $this->lang->line('error_to_add_data') .
                    ' </div>'
                );
                $this->error_display();
            }
        }
    }

    public function edit($uid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['applicants']);
        if (!in_array('Edit', $user_p)) {
            $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        $data['uid'] = $uid;
        $data['title'] = $this->lang->line('edit_applicant');
        // fetching user
        $data['result'] = $this->user_model->get_user($uid);
        $data['custom_form_user'] = $this->user_model->custom_form_user($uid);
        $data['custom_form'] = $this->user_model->custom_form('All');
        // fetching group list
        $data['nationalities'] = $this->lang->line('nationalities');
        usort($data['nationalities'], function ($it1, $it2) {
            return $it1 > $it2;
        });
        $data['nationalities'] = array_merge(['BOLIVANO(A)'], $data['nationalities']);
        $data['career_list'] = $this->user_model->get_career_all();
        $data['group_list'] = $this->user_model->group_list();
        $data['account_type'] = $this->account_model->account_list(0);
        $this->load->view('header', $data);
        $this->load->view('edit_applicant', $data);
        $this->load->view('footer', $data);
    }

    public function update($uid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['applicants']);
        if (!in_array('Edit', $user_p)) {
            $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }
        $rules = 0;
        $this->load->library('form_validation');
        $user_data = $this->user_model->get_user($uid);
        if ($user_data['ci'] != $this->input->post('ci')) {
            $rules = 1;
            $this->form_validation->set_rules('ci', 'CI', 'required|is_unique[savsoft_users.ci]');
        }
        if ($user_data['cod_student'] != $this->input->post('code_student')) {
            $rules = 1;
            $this->form_validation->set_rules('code_student', 'Codigo CD', 'required|is_unique[savsoft_users.cod_student]');
        }
        if ($user_data['email'] != $this->input->post('email')) {
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
            redirect('applicant/edit/' . $uid);
        } else {
            $data_photo = $this->cargar_archivo();
            if ($this->user_model->update_applicant($uid, $data_photo)) {
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
            redirect('applicant/edit/' . $uid);
        }
    }

    public function remove($uid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['applicants']);
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

        if ($this->user_model->remove_applicant($uid)) {
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
        redirect('applicant');
    }

    function cargar_archivo($with_code = false)
    {
        $cd = '';
        if ($with_code) {
            $cd = $this->input->post('code_student') . '_';
        }
        $name = date('dmY_His', time());;
        $mi_imagen = 'wizard_picture';
        $config['upload_path'] = "photo/users";
        $config['file_name'] = $cd . $name . "";
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
}