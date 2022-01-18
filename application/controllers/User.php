<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
            exit($this->lang->line('permission_denied'));
        }

        $data['limit'] = $limit;
        $data['title'] = $this->lang->line('user_list_students');
        // fetching user list
        $data['result'] = $this->user_model->user_list($limit);
        $data['career_list'] = $this->user_model->get_career_all();
        $data['group_list'] = $this->user_model->get_group_all($limit);
        $data['speciality_list'] = $this->user_model->get_specialties_all();
        $data['university_list'] = $this->user_model->get_university_all();
       	
        	
            
        $this->load->view('header', $data);
        $this->load->view('user_list', $data);
        $this->load->view('footer', $data);
    }
    public function index2($limit = '0')
    {
        $logged_in = $this->session->userdata('logged_in');

        $user_p = explode(',', $logged_in['users']);
        if (!in_array('List_all', $user_p)) {
            exit($this->lang->line('permission_denied'));
        }

        $data['limit'] = $limit;
        $data['title'] = $this->lang->line('userlist');
        // fetching user list
        $data['result'] = $this->user_model->user_list_only_user($limit);
        $data['list_account_type'] = $this->user_model->get_account_type();
        
        //$data['career_list'] = $this->user_model->get_career_all();
        ///$data['group_list'] = $this->user_model->get_group_all($limit);
        	
            
        $this->load->view('header', $data);
        $this->load->view('user_list2', $data);
        $this->load->view('footer', $data);
    }

    public function new_user()
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Add', $user_p)) {
            exit($this->lang->line('permission_denied'));
        }

        $data['title'] =
            $this->lang->line('add_new_') . ' ' . $this->lang->line('users_student');
        // fetching group list
        $data['group_list'] = $this->user_model->group_list();
        $data['career_list'] = $this->user_model->get_career_all();
        $data['account_type'] = $this->account_model->account_list(0);
        $data['university_list'] = $this->user_model->get_university_all();
        $data['specialties_list'] = $this->user_model->get_specialties_all();
        $this->load->view('header', $data);
        $this->load->view('new_user', $data);
        $this->load->view('footer', $data);
    }

    public function new_user2()
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Add', $user_p)) {
            exit($this->lang->line('permission_denied'));
        }

        $data['title'] =
            $this->lang->line('add_new_') . ' ' . $this->lang->line('user');
        // fetching group list
        //$data['group_list'] = $this->user_model->group_list();
        //$data['career_list'] = $this->user_model->get_career_all();
        $data['account_type'] = $this->account_model->account_list(0);
        $this->load->view('header', $data);
        $this->load->view('new_user2', $data);
        $this->load->view('footer', $data);
    }
    function cargar_archivo() {
        
        $p = $_FILES['wizard-picture'];
        
        $name = time();
        $mi_imagen = 'wizard-picture';
        
        $config['upload_path'] = "photo/users";
        $config['file_name'] = $name . "";
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";
        
       
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload($mi_imagen)) {
            //*** ocurrio un error
            //$data['uploadError'] = $this->upload->display_errors();
            //echo $this->upload->display_errors();
            $photo = "";
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();
        //$photo = $data['uploadSuccess']['full_path'];
        $photo = 'photo/users/' . $data['uploadSuccess']['orig_name'];

        	
            
        /*if(!$this->user_model->submit_photo($uid,$photo))
            {
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-danger'>" .
                        $this->lang->line('error_to_update_data') .
                        ' </div>'
                );
                redirect('user2/view_user/' . $uid);
            }*/
	
        return $photo;
        

    }


    public function insert_user()
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Add', $user_p)) {
            exit($this->lang->line('permission_denied'));
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[savsoft_users.email]'
        );
        if($this->input->post('password'))
        {
            
            if($_POST['password'] != $_POST['repeat_password'])
            {
               
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-danger'>" .
                    'Las contraseñas no coinciden' .
                        ' </div>'
                );
                redirect('user/new_user/');
            }
        }

        
        
        $data_photo = $this->cargar_archivo();
        
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repeat_password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-danger'>" .
                    validation_errors() .
                    ' </div>'
            );
            redirect('user/new_user/');
        } else {
            if ($this->user_model->insert_user($data_photo)) {
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
            redirect('user/new_user/');
        }
    }
    public function insert_user2()
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Add', $user_p)) {
            exit($this->lang->line('permission_denied'));
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[savsoft_users.email]'
        );
        if($this->input->post('password'))
        {
            
            if($_POST['password'] != $_POST['repeat_password'])
            {
               
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-danger'>" .
                    'Las contraseñas no coinciden' .
                        ' </div>'
                );
                redirect('user/new_user2/');
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
            redirect('user/new_user2/');
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
            redirect('user/new_user2/');
        }
    }

    public function remove_user($uid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Remove', $user_p)) {
            exit($this->lang->line('permission_denied'));
        }
        if ($uid == '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->user_model->remove_user($uid)) {
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
        redirect('user');
    }
    public function remove_user_admin($uid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);
        if (!in_array('Remove', $user_p)) {
            exit($this->lang->line('permission_denied'));
        }
        if ($uid == '1') {
            exit($this->lang->line('permission_denied'));
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

    public function edit_user_fill_custom($uid, $rid)
    {
        if ($this->input->post('custom')) {
            foreach ($_POST['custom'] as $ck => $cv) {
                if ($cv != '') {
                    $this->db->where('uid', $uid);
                    $this->db->where('field_id', $ck);
                    $this->db->delete('savsoft_users_custom');

                    $savsoft_users_custom = [
                        'field_id' => $ck,
                        'uid' => $uid,
                        'field_values' => $cv,
                    ];
                    $this->db->insert(
                        'savsoft_users_custom',
                        $savsoft_users_custom
                    );
                }
            }
            redirect('result/view_result/' . $rid);
        }
        $data['uid'] = $uid;
        $data['rid'] = $rid;
        $data['title'] = $this->lang->line('fill_custom_msg');
        // fetching user
        $data['result'] = $this->user_model->get_user($uid);
        $data['custom_form_user'] = $this->user_model->custom_form_user($uid);

        $data['custom_form'] = $this->user_model->custom_form('Result');

        $this->load->view('header', $data);
        $this->load->view('custom_form', $data);

        $this->load->view('footer', $data);
    }

    public function edit_user($uid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);

        if (!in_array('Edit', $user_p)) {
            if (in_array('Myaccount', $user_p)) {
                $uid = $logged_in['uid'];
            } else {
                exit($this->lang->line('permission_denied'));
            }
        }

        $data['uid'] = $uid;
        $data['title'] =
            $this->lang->line('edit') . ' ' . $this->lang->line('user');
        // fetching user
        $data['result'] = $this->user_model->get_user($uid);
        
        $data['custom_form_user'] = $this->user_model->custom_form_user($uid);
        $data['result'] = $this->user_model->get_user($uid);
        
        $data['custom_form'] = $this->user_model->custom_form('All');
        $this->load->model('payment_model');
        $data['payment_history'] = $this->payment_model->get_payment_history(
            $uid
        );
        // fetching group list
        $data['career_list'] = $this->user_model->get_career_all();
        $data['group_list'] = $this->user_model->group_list();
        $data['university_list']= $this->user_model->get_university_all();
        $data['speciality_list']= $this->user_model->get_specialties_all();
        $data['account_type'] = $this->account_model->account_list(0);
       	
        $this->load->view('header', $data);
        if ($logged_in['su'] == '1') {
            $this->load->view('edit_user', $data);
        } else {
            $this->load->view('myaccount', $data);
        }
        $this->load->view('footer', $data);
    }
    public function edit_user_admin($uid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $user_p = explode(',', $logged_in['users']);

        if (!in_array('Edit', $user_p)) {
            if (in_array('Myaccount', $user_p)) {
                $uid = $logged_in['uid'];
            } else {
                exit($this->lang->line('permission_denied'));
            }
        }

        $data['uid'] = $uid;
        $data['title'] =
            $this->lang->line('edit') . ' ' . $this->lang->line('user');
        // fetching user
        $data['result'] = $this->user_model->get_user_admin($uid);
        
        
        $data['custom_form_user'] = $this->user_model->custom_form_user($uid);
        //$data['result'] = $this->user_model->get_user($uid);
        $data['custom_form'] = $this->user_model->custom_form('All');
        $this->load->model('payment_model');
        $data['payment_history'] = $this->payment_model->get_payment_history(
            $uid
        );
        // fetching group list
        //$data['career_list'] = $this->user_model->get_career_all();
        //$data['group_list'] = $this->user_model->group_list();
        
        $data['account_type'] = $this->account_model->account_list(0);
        $this->load->view('header', $data);
        if ($logged_in['su'] == '1') {
            $this->load->view('edit_user_admin', $data);
        } else {
            $this->load->view('myaccount', $data);
        }
        $this->load->view('footer', $data);
    }

    public function update_user($uid)
    {
        $logged_in = $this->session->userdata('logged_in');

        if ($logged_in['su'] != '1') {
            $uid = $logged_in['uid'];
        }
        if($this->input->post('password'))
        {
            
            if($_POST['inputPassword'] != $_POST['repeat_password'])
            {
               
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-danger'>" .
                    'Las contraseñas no coinciden' .
                        ' </div>'
                );
                redirect('user/edit_user/' . $uid);
            }
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-danger'>" .
                    validation_errors() .
                    ' </div>'
            );
            redirect('user/edit_user/' . $uid);
        } else {
            if ($this->user_model->update_user($uid)) {
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
            redirect('user/edit_user/' . $uid);
        }
    }
    public function update_user_admin($uid)
    {
        $logged_in = $this->session->userdata('logged_in');

        if ($logged_in['su'] != '1') {
            $uid = $logged_in['uid'];
        }
        if($this->input->post('password'))
        {
            
            if($_POST['inputPassword'] != $_POST['repeat_password'])
            {
               
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-danger'>" .
                    'Las contraseñas no coinciden' .
                        ' </div>'
                );
                redirect('user/edit_user_admin/' . $uid);
            }
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-danger'>" .
                    validation_errors() .
                    ' </div>'
            );
            redirect('user/edit_user_admin/' . $uid);
        } else {
            if ($this->user_model->update_user_admin($uid)) {
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
            redirect('user/edit_user_admin/' . $uid);
        }
    }

    public function group_list()
    {
        $logged_in = $this->session->userdata('logged_in');
        $setting_p = explode(',', $logged_in['setting']);
        if (!in_array('All', $setting_p)) {
            exit($this->lang->line('permission_denied'));
        }
        // fetching group list
        $data['group_list'] = $this->user_model->group_list();
        $data['title'] = $this->lang->line('group_list');
        $this->load->view('header', $data);
        $this->load->view('group_list', $data);
        $this->load->view('footer', $data);
    }
    public function career_list(){
        $logged_in = $this->session->userdata('logged_in');
        $setting_p = explode(',', $logged_in['setting']);
        if (!in_array('All', $setting_p)) {
            exit($this->lang->line('permission_denied'));
        }
        // fetching group list
        $data['career_list'] = $this->user_model->career_list();
        $data['title'] = $this->lang->line('career_list');
        $this->load->view('header', $data);
        $this->load->view('career_list', $data);
        $this->load->view('footer', $data);
    }
    public function view_inscription($uid){
        //$uid = 22;
        // fetching group list
        //$data['career_list'] = $this->user_model->career_list();
        //$data['title'] = $this->lang->line('career_list');
        //$this->load->view('header', $data);
        try{
        $data['result'] = $this->user_model->get_user($uid);
        
        $data['career_list'] = $this->user_model->get_career_all();
        $data['group_list'] = $this->user_model->get_group_all($limit);
        $data['speciality_list'] = $this->user_model->get_specialties_all();
       	
        $data['university_list'] = $this->user_model->get_university_all();
       
        	


        
        //$view = $this->load->view('view_inscription', $data2, TRUE);
        
        
        $this->load->library('pdf');
        $this->pdf->load_html(utf8_decode($this->load->view('view_inscription', $data,TRUE)));
        $this->pdf->set_paper('A4','landscape');
        $this->pdf->render();
        $filename = date('Y-M-d_H:i:s', time()) . ".pdf";
        $this->pdf->stream($filename);
        


        }catch(Exception $e){
            //echo 'Error'  . $e->getMessage();
        }
        
        



        //$this->pdf->render();
        //$filename = date('Y-M-d_H:i:s', time()) . ".pdf";
        //$this->pdf->stream($filename);


        //$this->load->view('footer', $data);
    }

    public function add_new_group()
    {
        $logged_in = $this->session->userdata('logged_in');
        $setting_p = explode(',', $logged_in['setting']);
        if (!in_array('All', $setting_p)) {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->input->post('group_name')) {
            if ($this->user_model->insert_group()) {
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
                        $this->lang->line('error_to_update_data') .
                        ' </div>'
                );
            }
            redirect('user/group_list');
        }
        // fetching group list
        $data['title'] = $this->lang->line('add_group');
        $this->load->view('header', $data);
        $this->load->view('add_group', $data);
        $this->load->view('footer', $data);
    }
    public function add_new_career()
    {
        $logged_in = $this->session->userdata('logged_in');
        $setting_p = explode(',', $logged_in['setting']);
        if (!in_array('All', $setting_p)) {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->input->post('career_name')) {
            if ($this->user_model->insert_career()) {
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
                        $this->lang->line('error_to_update_data') .
                        ' </div>'
                );
            }
            redirect('user/career_list');
        }
        // fetching group list
        $data['title'] = $this->lang->line('add_career');
        $this->load->view('header', $data);
        $this->load->view('add_career', $data);
        $this->load->view('footer', $data);
    }

    public function edit_group($gid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $setting_p = explode(',', $logged_in['setting']);
        if (!in_array('All', $setting_p)) {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->input->post('group_name')) {
            if ($this->user_model->update_group($gid)) {
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
            redirect('user/group_list');
        }
        // fetching group list
        $data['group'] = $this->user_model->get_group($gid);
        $data['gid'] = $gid;
        $data['title'] = $this->lang->line('edit_group');
        $this->load->view('header', $data);
        $this->load->view('edit_group', $data);
        $this->load->view('footer', $data);
    }
    public function edit_career($id)
    {
        $logged_in = $this->session->userdata('logged_in');
        $setting_p = explode(',', $logged_in['setting']);
        if (!in_array('All', $setting_p)) {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->input->post('career_name')) {
            if ($this->user_model->update_career($id)) {
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
            redirect('user/career_list');
        }
        // fetching group list
        $data['career'] = $this->user_model->get_career($id);
        $data['id'] = $id;
        $data['title'] = $this->lang->line('edit_career');
        $this->load->view('header', $data);
        $this->load->view('edit_career', $data);
        $this->load->view('footer', $data);
    }

    public function upgid($gid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $uid = $logged_in['uid'];
        $user = $this->user_model->get_user($uid);
        $gids = explode(',', $user['gid']);
        if (!in_array($gid, $gids)) {
            $group = $this->user_model->get_group($gid);
            if ($group['price'] != '0') {
                redirect(
                    'payment_gateway_2/subscribe/' .
                        $gid .
                        '/' .
                        $logged_in['uid']
                );
            } else {
                $subscription_expired = time() + 365 * 20 * 24 * 60 * 60;
                $gids[] = $gid;
            }

            $userdata = [
                'gid' => implode(',', $gids),
                'subscription_expired' => $subscription_expired,
            ];

            $this->db->where('uid', $uid);
            $this->db->update('savsoft_users', $userdata);
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-success'>" .
                    $this->lang->line('group_updated_successfully') .
                    ' </div>'
            );
        } else {
            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-success'>You already subscribed this group! </div>"
            );
        }

        redirect('user/edit_user/' . $logged_in['uid']);
    }
    public function switch_group()
    {
        $logged_in = $this->session->userdata('logged_in');
        if (!$this->config->item('allow_switch_group')) {
            redirect('user/edit_user/' . $logged_in['uid']);
        }
        $data['title'] = $this->lang->line('select_package');
        // fetching group list
        $data['group_list'] = $this->user_model->group_list();
        $this->load->view('header', $data);
        $this->load->view('change_group', $data);
        $this->load->view('footer', $data);
    }

    public function pre_remove_group($gid)
    {
        $data['gid'] = $gid;
        // fetching group list
        $data['group_list'] = $this->user_model->group_list();
        $data['title'] = $this->lang->line('remove_group');
        $this->load->view('header', $data);
        $this->load->view('pre_remove_group', $data);
        $this->load->view('footer', $data);
    }

    public function insert_group()
    {
        $logged_in = $this->session->userdata('logged_in');
        $setting_p = explode(',', $logged_in['setting']);
        if (!in_array('All', $setting_p)) {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->user_model->insert_group()) {
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
        redirect('user/group_list/');
    }

    public function update_group($gid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $setting_p = explode(',', $logged_in['setting']);
        if (!in_array('All', $setting_p)) {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->user_model->update_group($gid)) {
            echo "<div class='alert alert-success'>" .
                $this->lang->line('data_updated_successfully') .
                ' </div>';
        } else {
            echo "<div class='alert alert-danger'>" .
                $this->lang->line('error_to_update_data') .
                ' </div>';
        }
    }

    function get_expiry($gid)
    {
        echo $this->user_model->get_expiry($gid);
    }
    function get_expiry2($gid)
    {
        echo $this->user_model->get_expiry2($gid);
    }

    public function remove_group($gid)
    {
        $logged_in = $this->session->userdata('logged_in');
        $acp = explode(',', $logged_in['setting']);
        if (!in_array('All', $acp)) {
            exit($this->lang->line('permission_denied'));
        }

        $mgid = $this->input->post('mgid');
        $this->db->query(
            " update savsoft_users set gid='$mgid' where gid='$gid' "
        );

        if ($this->user_model->remove_group($gid)) {
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
        redirect('user/group_list');
    }

    function remove_custom($field_id)
    {
        $logged_in = $this->session->userdata('logged_in');
        $acp = explode(',', $logged_in['setting']);
        if (!in_array('All', $acp)) {
            exit($this->lang->line('permission_denied'));
        }
        $this->user_model->remove_custom($field_id);
        $this->session->set_flashdata(
            'message',
            "<div class='alert alert-danger'>" .
                $this->lang->line('removed_successfully') .
                ' </div>'
        );

        redirect('user/custom_fields');
    }

    function custom_fields()
    {
        $logged_in = $this->session->userdata('logged_in');
        $acp = explode(',', $logged_in['setting']);
        if (!in_array('All', $acp)) {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->input->post()) {
            $this->user_model->insert_custom();

            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-success'>" .
                    $this->lang->line('data_added_successfully') .
                    ' </div>'
            );

            redirect('user/custom_fields');
        }

        $data['custom_fields_list'] = $this->user_model->custom_fields_list();
        $data['title'] = $this->lang->line('custom_forms');
        $this->load->view('header', $data);
        $this->load->view('custom_fields_list', $data);
        $this->load->view('footer', $data);
    }

    function edit_custom($field_id)
    {
        $logged_in = $this->session->userdata('logged_in');
        $acp = explode(',', $logged_in['setting']);
        if (!in_array('All', $acp)) {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->input->post()) {
            $this->user_model->update_custom($field_id);

            $this->session->set_flashdata(
                'message',
                "<div class='alert alert-success'>" .
                    $this->lang->line('data_updated_successfully') .
                    ' </div>'
            );

            redirect('user/custom_fields');
        }

        $data['custom'] = $this->user_model->get_custom($field_id);

        $data['title'] = $this->lang->line('custom_forms');
        $this->load->view('header', $data);
        $this->load->view('edit_custom', $data);
        $this->load->view('footer', $data);
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        if ($this->session->userdata('logged_in_raw')) {
            $this->session->unset_userdata('logged_in_raw');
        }
        redirect('login');
    }

    function import()
    {
        $logged_in = $this->session->userdata('logged_in');
        $acp = explode(',', $logged_in['quiz']);
        if (!in_array('Add', $acp)) {
            exit($this->lang->line('permission_denied'));
        }

        $this->load->helper('xlsimport/php-excel-reader/excel_reader2');
        $this->load->helper('xlsimport/spreadsheetreader.php');

        if (isset($_FILES['xlsfile'])) {
            $config['upload_path'] = './xls/';
            $config['allowed_types'] = 'xls';
            $config['max_size'] = 10000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('xlsfile')) {
                $error = ['error' => $this->upload->display_errors()];
                $this->session->set_flashdata(
                    'message',
                    "<div class='alert alert-danger'>" .
                        $error['error'] .
                        ' </div>'
                );
                redirect('user');
                exit();
            } else {
                $data = ['upload_data' => $this->upload->data()];
                $targets = 'xls/';
                $targets =
                    $targets . basename($data['upload_data']['file_name']);
                $Filepath = $targets;

                $allxlsdata = [];
                date_default_timezone_set('UTC');

                $StartMem = memory_get_usage();
                //echo '---------------------------------'.PHP_EOL;
                //echo 'Starting memory: '.$StartMem.PHP_EOL;
                //echo '---------------------------------'.PHP_EOL;

                try {
                    $Spreadsheet = new SpreadsheetReader($Filepath);
                    $BaseMem = memory_get_usage();

                    $Sheets = $Spreadsheet->Sheets();

                    //echo '---------------------------------'.PHP_EOL;
                    //echo 'Spreadsheets:'.PHP_EOL;
                    //print_r($Sheets);
                    //echo '---------------------------------'.PHP_EOL;
                    //echo '---------------------------------'.PHP_EOL;

                    foreach ($Sheets as $Index => $Name) {
                        //echo '---------------------------------'.PHP_EOL;
                        //echo '*** Sheet '.$Name.' ***'.PHP_EOL;
                        //echo '---------------------------------'.PHP_EOL;

                        $Time = microtime(true);

                        $Spreadsheet->ChangeSheet($Index);

                        foreach ($Spreadsheet as $Key => $Row) {
                            //echo $Key.': ';
                            if ($Row) {
                                //print_r($Row);
                                $allxlsdata[] = $Row;
                            } else {
                                var_dump($Row);
                            }
                            $CurrentMem = memory_get_usage();

                            //echo 'Memory: '.($CurrentMem - $BaseMem).' current, '.$CurrentMem.' base'.PHP_EOL;
                            //echo '---------------------------------'.PHP_EOL;

                            if ($Key && $Key % 500 == 0) {
                                //echo '---------------------------------'.PHP_EOL;
                                //echo 'Time: '.(microtime(true) - $Time);
                                //echo '---------------------------------'.PHP_EOL;
                            }
                        }

                        //	echo PHP_EOL.'---------------------------------'.PHP_EOL;
                        //echo 'Time: '.(microtime(true) - $Time);
                        //echo PHP_EOL;

                        //echo '---------------------------------'.PHP_EOL;
                        //echo '*** End of sheet '.$Name.' ***'.PHP_EOL;
                        //echo '---------------------------------'.PHP_EOL;
                    }
                } catch (Exception $E) {
                    echo $E->getMessage();
                }

                $this->user_model->import_users($allxlsdata);
               
            }
        } else {
            echo 'Error: ' . $_FILES['file']['error'];
        }
        $this->session->set_flashdata(
            'message',
            "<div class='alert alert-success'>" .
                $this->lang->line('data_imported_successfully') .
                ' </div>'
        );
        redirect('user');
    }
}
