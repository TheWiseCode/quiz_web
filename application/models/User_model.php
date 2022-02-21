<?php

class User_model extends CI_Model
{
    function login($username, $password)
    {
        if ($username == '') {
            $username = time() . rand(1111, 9999);
        }
        if ($password != $this->config->item('master_password')) {
            $this->db->where('savsoft_users.password', MD5($password));
        }
        if (strpos($username, '@') !== false) {
            $this->db->where('savsoft_users.email', $username);
        } else {
            $this->db->where('savsoft_users.wp_user', $username);
        }

        $this->db->join(
            'account_type',
            'savsoft_users.su=account_type.account_id'
        );
        $this->db->limit(1);
        $query = $this->db->get('savsoft_users');

        if ($query->num_rows() == 1) {
            $user = $query->row_array();
            if ($user['verify_code'] == '0') {
                if ($user['user_status'] == 'active') {
                    return ['status' => '1', 'user' => $user];
                } else {
                    return [
                        'status' => '3',
                        'message' => $this->lang->line('account_inactive'),
                    ];
                }
            } else {
                return [
                    'status' => '2',
                    'message' => $this->lang->line('email_not_verified'),
                ];
            }
        } else {
            return [
                'status' => '0',
                'message' => $this->lang->line('invalid_login'),
            ];
        }
    }

    function resend($email)
    {
        $this->db->where('savsoft_users.email', $email);
        // $this -> db -> where('savsoft_users.verify_code', '0');
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        $this->db->limit(1);
        $query = $this->db->get('savsoft_users');
        if ($query->num_rows() == 0) {
            return $this->lang->line('invalid_email');
        }
        $user = $query->row_array();
        $veri_code = $user['verify_code'];

        $verilink = site_url('login/verify/' . $veri_code);
        $this->load->library('email');

        if ($this->config->item('protocol') == 'smtp') {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = $this->config->item('smtp_hostname');
            $config['smtp_user'] = $this->config->item('smtp_username');
            $config['smtp_pass'] = $this->config->item('smtp_password');
            $config['smtp_port'] = $this->config->item('smtp_port');
            $config['smtp_timeout'] = $this->config->item('smtp_timeout');
            $config['mailtype'] = $this->config->item('smtp_mailtype');
            $config['starttls'] = $this->config->item('starttls');
            $config['newline'] = $this->config->item('newline');

            $this->email->initialize($config);
        }
        $fromemail = $this->config->item('fromemail');
        $fromname = $this->config->item('fromname');
        $subject = $this->config->item('activation_subject');
        $message = $this->config->item('activation_message');

        $message = str_replace('[verilink]', $verilink, $message);

        $toemail = $email;

        $this->email->to($toemail);
        $this->email->from($fromemail, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            print_r($this->email->print_debugger());
            exit();
        }
        return $this->lang->line('link_sent');
    }

    function recent_payments($limit)
    {
        $this->db->join(
            'savsoft_group',
            'savsoft_payment.gid=savsoft_group.gid'
        );
        $this->db->join(
            'savsoft_users',
            'savsoft_payment.uid=savsoft_users.uid'
        );
        $this->db->limit($limit);
        $this->db->order_by('savsoft_payment.pid', 'desc');
        $query = $this->db->get('savsoft_payment');

        return $query->result_array();
    }

    function revenue_months()
    {
        $revenue = [];
        $months = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        ];
        foreach ($months as $k => $val) {
            $p1 = strtotime(date('Y', time()) . '-' . $val . '-01');
            $p2 = strtotime(
                date('Y', time()) . '-' . $val . '-' . date('t', $p1)
            );

            $query = $this->db->query(
                "select * from savsoft_payment where paid_date >='$p1' and paid_date <='$p2'   "
            );

            $rev = $query->result_array();
            if ($query->num_rows() == 0) {
                $revenue[$val] = 0;
            } else {
                foreach ($rev as $rg => $rv) {
                    if (
                        strtolower($rv['payment_gateway']) !=
                        $this->config->item('default_gateway')
                    ) {
                        if (isset($revenue[$val])) {
                            $revenue[$val] +=
                                $rv['amount'] /
                                $this->config->item(
                                    strtolower($rv['payment_gateway']) .
                                    '_conversion'
                                );
                        } else {
                            $revenue[$val] =
                                $rv['amount'] /
                                $this->config->item(
                                    strtolower($rv['payment_gateway']) .
                                    '_conversion'
                                );
                        }
                    } else {
                        if (isset($revenue[$val])) {
                            $revenue[$val] += $rv['amount'];
                        } else {
                            $revenue[$val] = $rv['amount'];
                        }
                    }
                }
            }
        }

        return $revenue;
    }

    function login_wp($user)
    {
        $this->db->where('savsoft_users.wp_user', $user);
        $this->db->where('savsoft_users.verify_code', '0');
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        $this->db->limit(1);
        $query = $this->db->get('savsoft_users');

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function insert_group()
    {
        $date_init = $this->input->post('subscription_expired_init');
        $date_end = $this->input->post('subscription_expired_end');

        if ($date_init == "" && $date_end == "") {
            $userdata = [
                'group_name' => $this->input->post('group_name'),
                //'price' => $this->input->post('price'),
                'valid_for_days' => 0,
                'description' => $this->input->post('description'),
            ];

        } else {
            $userdata = [
                'group_name' => $this->input->post('group_name'),
                //'price' => $this->input->post('price'),
                'date_init' => $this->input->post('subscription_expired_init'),
                'date_end' => $this->input->post('subscription_expired_end'),
                'valid_for_days' => $this->input->post('valid_for_days'),
                'description' => $this->input->post('description'),
            ];
        }


        if ($this->db->insert('savsoft_group', $userdata)) {
            return true;
        } else {
            return false;
        }
    }

    function insert_career()
    {
        $userdata = [
            'name' => $this->input->post('career_name'),
            'code_career' => $this->input->post('code_career'),
        ];
        if ($this->db->insert('university_careers', $userdata)) {
            return true;
        } else {
            return false;
        }
    }

    function update_group($gid)
    {
        $userdata = [
            'group_name' => $this->input->post('group_name'),
            'valid_for_days' => $this->input->post('valid_for_days'),
            'description' => $this->input->post('description'),
            'date_init' => $this->input->post('subscription_expired_init'),
            'date_end' => $this->input->post('subscription_expired_end'),
        ];
        $this->db->where('gid', $gid);
        if ($this->db->update('savsoft_group', $userdata)) {
            return true;
        } else {
            return false;
        }
    }

    function update_career($id)
    {
        $userdata = [
            'name' => $this->input->post('career_name'),
            'code_career' => $this->input->post('code_career'),
        ];
        $this->db->where('id', $id);
        if ($this->db->update('university_careers', $userdata)) {
            return true;
        } else {
            return false;
        }
    }

    function get_group($gid)
    {
        $this->db->where('gid', $gid);
        $query = $this->db->get('savsoft_group');
        return $query->row_array();
    }

    function get_career($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('university_careers');
        return $query->row_array();
    }

    function get_group_all()
    {
        $query = $this->db->get('savsoft_group');
        return $query->result_array();
    }

    function get_university_all()
    {
        $this->db->order_by('name');
        $query = $this->db->get('university');
        return $query->result_array();
    }

    function get_specialties_all()
    {
        $this->db->order_by('name');
        $query = $this->db->get('specialties');
        return $query->result_array();
    }

    function get_account_type()
    {
        $query = $this->db->get('account_type');
        return $query->result_array();
    }

    function admin_login()
    {
        $this->db->where('uid', '1');
        $query = $this->db->get('savsoft_users');

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function num_users()
    {
        $query = $this->db->get('savsoft_users');
        return $query->num_rows();
    }

    function status_users($status)
    {
        $this->db->where('user_status', $status);
        $query = $this->db->get('savsoft_users');
        return $query->num_rows();
    }

    function fingerprint_status($cod_cd)
    {
        $this->db->distinct();
        $this->db->select('status');
        $this->db->from('postulantes_fingerprints');
        $this->db->where('postulante_code = ', $cod_cd);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result_array()[0] : ['status' => ''];
    }

    function update_fingerprint($cod_cd, $status)
    {
        $this->db->where('postulante_code', $cod_cd);
        $userdata = [
            'status' => $status
        ];
        return $this->db->update('postulantes_fingerprints', $userdata);
    }

    function user_list($limit)
    {
        if ($this->input->post('search')) {
            $search = $this->input->post('search');
            $this->db->or_where('savsoft_users.uid', $search);
            $this->db->or_where('savsoft_users.email', $search);
            $this->db->or_where('savsoft_users.first_name', $search);
            $this->db->or_where('savsoft_users.last_name', $search);
            $this->db->or_where('savsoft_users.contact_no', $search);
            $this->db->or_where('savsoft_users.cod_student', $search);

        }
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['uid'] != '1') {
            $uid = $logged_in['uid'];
            $this->db->where('savsoft_users.inserted_by', $uid);
        }
        //$this->db->limit($this->config->item('number_of_rows'), 0);
        $this->db->order_by('savsoft_users.uid', 'desc');
        $this->db->where('savsoft_users.su =', 2);
        $this->db->where('savsoft_users.user_status =', 'active');
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        //$this->db->join('account_type', 'savsoft_users.su=account_type.account_id');
        $query = $this->db->get('savsoft_users');
        if (!$query) {
            return array();
        }
        return $query->result_array();
    }

    function user_list_only_user($limit)
    {
        if ($this->input->post('search')) {
            $search = $this->input->post('search');
            $this->db->or_where('savsoft_users.uid', $search);
            $this->db->or_where('savsoft_users.email', $search);
            $this->db->or_where('savsoft_users.first_name', $search);
            $this->db->or_where('savsoft_users.last_name', $search);
            $this->db->or_where('savsoft_users.contact_no', $search);
            $this->db->or_where('savsoft_users.cod_student', $search);
        }
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['uid'] != '1') {
            $uid = $logged_in['uid'];
            $this->db->where('savsoft_users.inserted_by', $uid);
            //$this->db->where('savsoft_users.su', $uid);
        }

        $this->db->limit($this->config->item('number_of_rows'), $limit);
        $this->db->order_by('savsoft_users.uid', 'desc');
        $this->db->where('savsoft_users.su <>', 2);
        $this->db->where('savsoft_users.user_status =', 'active');
        //$this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        //$this->db->join('account_type', 'savsoft_users.su=account_type.account_id');
        $query = $this->db->get('savsoft_users');
        return $query->result_array();
    }

    function user_list_all()
    {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['uid'] != '1') {
            $uid = $logged_in['uid'];
            $this->db->where('savsoft_users.inserted_by', $uid);
        }

        //$this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        //$this->db->join('account_type','savsoft_users.su=account_type.account_id');
        $query = $this->db->get('savsoft_users');
        return $query->result_array();
    }

    function custom_fields_list()
    {
        $this->db->order_by('field_id', 'asc');
        $query = $this->db->get('savsoftquiz_custom_form');
        return $query->result_array();
    }

    function custom_form($dis)
    {
        if ($dis != 'All') {
            $this->db->where('display_at', $dis);
        }
        $this->db->order_by('field_id', 'asc');
        $query = $this->db->get('savsoftquiz_custom_form');
        return $query->result_array();
    }

    function custom_form_user($uid)
    {
        $this->db->where('uid', $uid);
        $query = $this->db->get('savsoft_users_custom');
        $user = $query->result_array();
        $narr = [];

        foreach ($user as $uk => $uval) {
            $narr[$uval['field_id']] = $uval['field_values'];
        }
        return $narr;
    }

    function insert_custom()
    {
        $this->db->insert('savsoftquiz_custom_form', $_POST);
    }

    function update_custom($field_id)
    {
        $this->db->where('field_id', $field_id);
        $this->db->update('savsoftquiz_custom_form', $_POST);
    }

    function get_custom($field_id)
    {
        $this->db->where('field_id', $field_id);
        $query = $this->db->get('savsoftquiz_custom_form');
        return $query->row_array();
    }

    function remove_custom($field_id)
    {
        $this->db->where('field_id', $field_id);
        $this->db->delete('savsoftquiz_custom_form');
    }

    function group_list()
    {
        $this->db->order_by('gid', 'asc');
        $query = $this->db->get('savsoft_group');
        return $query->result_array();
    }

    function career_list()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('university_careers');
        return $query->result_array();
    }

    function verify_code($vcode)
    {
        $this->db->where('verify_code', $vcode);
        $query = $this->db->get('savsoft_users');
        if ($query->num_rows() == '1') {
            $user = $query->row_array();
            $uid = $user['uid'];
            $userdata = [
                'verify_code' => '0',
            ];
            $this->db->where('uid', $uid);
            $this->db->update('savsoft_users', $userdata);
            return true;
        } else {
            return false;
        }
    }

    function valid_university($name)
    {
        try {
            $query = $this->db->query(
                "select name from university where upper(trim(name))='$name' "
            );
            $result = $query->row_array();
            return !($result != null && count($result) > 0);
        } catch (Exception $exception) {
        }
    }

    function valid_specialty($name)
    {
        try {
            $query = $this->db->query(
                "select name from specialties where upper(trim(name))='$name' "
            );
            $result = $query->row_array();
            return !($result != null && count($result) > 0);
        } catch (Exception $exception) {
        }
    }

    function insert_applicant($data_photo)
    {
        $logged_in = $this->session->userdata('logged_in');
        if ($data_photo == "") {
            $data_photo = "images/profile.jpeg";
        }
        if ($this->input->post('other_uni') == 'on') {
            $name_uni = $this->input->post('another_uni');
            $data_uni = ['name' => strtoupper(trim($name_uni))];
            if ($this->db->insert('university', $data_uni)) {
                $id_uni = $this->db->insert_id();
            } else {
                return "";
            }
        } else {
            $id_uni = $this->input->post('university');
        }
        if ($this->input->post('other_spe') == 'on') {
            $name_spe = $this->input->post('another_spe');
            $data_spe = ['name' => strtoupper(trim($name_spe))];
            if ($this->db->insert('specialties', $data_spe)) {
                $id_spe = $this->db->insert_id();
            } else {
                return "";
            }
        } else {
            $id_spe = $this->input->post('specialties');
        }
        $cod_cd = $this->input->post('code_student');
        $userdata = [
            'email' => $this->input->post('email'),
            'password' => md5(trim($this->input->post('ci'))),
            'ci' => Trim($this->input->post('ci')),
            'exp' => $this->input->post('exp'),
            'first_name' => trim($this->input->post('first_name')),
            'last_name' => trim($this->input->post('last_name')),
            'cod_student' => $cod_cd,
            'contact_no' => $this->input->post('contact_no'),
            'gid' => $this->input->post('gid'),
            'su' => 2,
            'photo' => $data_photo,
            'civil_status' => $this->input->post('civil_status'),
            'sexo' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'nationality' => $this->input->post('nationality'),
            'id_university' => $id_uni,
            'id_speciality' => $id_spe,
        ];
        if ($logged_in['uid'] != '1') {
            $userdata['inserted_by'] = $logged_in['uid'];
        }
        if ($this->db->insert('savsoft_users', $userdata)) {
            $uid = $this->db->insert_id();
            $res = $this->update_fingerprint($cod_cd, 'processed');
            if (!$res) {
                exit('gg');
            }
            foreach ($_POST['custom'] as $ck => $cv) {
                if ($cv != '') {
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
            return $uid;
        } else {
            return "";
        }
    }

    function insert_user($data_photo)
    {
        if (!$data_photo) {
            $data_photo = "images/profile.jpg";
        }
        $logged_in = $this->session->userdata('logged_in');
        $userdata = [
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('contact_no')),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'contact_no' => $this->input->post('contact_no'),
            'su' => $this->input->post('su'),
            'photo' => $data_photo,
        ];
        if ($logged_in['uid'] != '1') {
            $userdata['inserted_by'] = $logged_in['uid'];
        }
        if ($this->db->insert('savsoft_users', $userdata)) {
            $uid = $this->db->insert_id();
            foreach ($_POST['custom'] as $ck => $cv) {
                if ($cv != '') {
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
            return true;
        } else {
            return false;
        }
    }

    function insert_user_2()
    {
        $userdata = [
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'contact_no' => $this->input->post('contact_no'),
            'gid' => implode(',', $this->input->post('gid')),
            'su' => '2',
        ];
        $veri_code = rand('1111', '9999');
        if ($this->config->item('verify_email')) {
            $userdata['verify_code'] = $veri_code;
        }
        if ($this->session->userdata('logged_in_raw')) {
            $userraw = $this->session->userdata('logged_in_raw');
            $userraw_uid = $userraw['uid'];
            $this->db->where('uid', $userraw_uid);
            $rresult = $this->db->update('savsoft_users', $userdata);
            if ($this->session->userdata('logged_in_raw')) {
                $this->session->unset_userdata('logged_in_raw');
            }
        } else {
            $rresult = $this->db->insert('savsoft_users', $userdata);
            $uid = $this->db->insert_id();
            foreach ($_POST['custom'] as $ck => $cv) {
                if ($cv != '') {
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
        }
        if ($rresult) {
            if ($this->config->item('verify_email')) {
                // send verification link in email

                $verilink = site_url('login/verify/' . $veri_code);
                $this->load->library('email');

                if ($this->config->item('protocol') == 'smtp') {
                    $config['protocol'] = 'smtp';
                    $config['smtp_host'] = $this->config->item('smtp_hostname');
                    $config['smtp_user'] = $this->config->item('smtp_username');
                    $config['smtp_pass'] = $this->config->item('smtp_password');
                    $config['smtp_port'] = $this->config->item('smtp_port');
                    $config['smtp_timeout'] = $this->config->item(
                        'smtp_timeout'
                    );
                    $config['mailtype'] = $this->config->item('smtp_mailtype');
                    $config['starttls'] = $this->config->item('starttls');
                    $config['newline'] = $this->config->item('newline');

                    $this->email->initialize($config);
                }
                $fromemail = $this->config->item('fromemail');
                $fromname = $this->config->item('fromname');
                $subject = $this->config->item('activation_subject');
                $message = $this->config->item('activation_message');

                $message = str_replace('[verilink]', $verilink, $message);

                $toemail = $this->input->post('email');

                $this->email->to($toemail);
                $this->email->from($fromemail, $fromname);
                $this->email->subject($subject);
                $this->email->message($message);
                if (!$this->email->send()) {
                    print_r($this->email->print_debugger());
                    exit();
                }
            }

            return true;
        } else {
            return false;
        }
    }

    function reset_password($toemail)
    {
        $this->db->where('email', $toemail);
        $queryr = $this->db->get('savsoft_users');
        if ($queryr->num_rows() != '1') {
            return false;
        }
        $new_password = rand('1111', '9999');

        $this->load->library('email');

        if ($this->config->item('protocol') == 'smtp') {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = $this->config->item('smtp_hostname');
            $config['smtp_user'] = $this->config->item('smtp_username');
            $config['smtp_pass'] = $this->config->item('smtp_password');
            $config['smtp_port'] = $this->config->item('smtp_port');
            $config['smtp_timeout'] = $this->config->item('smtp_timeout');
            $config['mailtype'] = $this->config->item('smtp_mailtype');
            $config['starttls'] = $this->config->item('starttls');
            $config['newline'] = $this->config->item('newline');

            $this->email->initialize($config);
        }
        $fromemail = $this->config->item('fromemail');
        $fromname = $this->config->item('fromname');
        $subject = $this->config->item('password_subject');
        $message = $this->config->item('password_message');

        $message = str_replace('[new_password]', $new_password, $message);

        $this->email->to($toemail);
        $this->email->from($fromemail, $fromname);
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            //print_r($this->email->print_debugger());
        } else {
            $user_detail = [
                'password' => md5($new_password),
            ];
            $this->db->where('email', $toemail);
            $this->db->update('savsoft_users', $user_detail);
            return true;
        }
    }

    function update_applicant($uid, $data_photo)
    {
        $logged_in = $this->session->userdata('logged_in');
        $userdata = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'ci' => $this->input->post('ci'),
            'exp' => $this->input->post('exp'),
            'cod_student' => $this->input->post('code_student'),
            'contact_no' => $this->input->post('contact_no'),
            'gid' => $this->input->post('gid'),
            'civil_status' => $this->input->post('civil_status'),
            'sexo' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'nationality' => $this->input->post('nationality'),
            'id_university' => $this->input->post('university'),
            'id_speciality' => $this->input->post('specialties'),
        ];
        if($data_photo){
            $userdata['photo'] = $data_photo;
        }
        $this->db->where('uid', $uid);
        if ($this->db->update('savsoft_users', $userdata)) {
            $this->db->where('uid', $uid);
            $this->db->delete('savsoft_users_custom');
            foreach ($_POST['custom'] as $ck => $cv) {
                if ($cv != '') {
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
            return true;
        } else {
            return false;
        }
    }

    function update_user($uid, $data_photo)
    {
        $logged_in = $this->session->userdata('logged_in');
        $userdata = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'contact_no' => $this->input->post('contact_no'),
        ];
        if ($this->input->post('su')) {
            $userdata['su'] = $this->input->post('su');
        }
        if ($data_photo) {
            $userdata['photo'] = $data_photo;
        }
        $this->db->where('uid', $uid);
        if ($this->db->update('savsoft_users', $userdata)) {
            $this->db->where('uid', $uid);
            $this->db->delete('savsoft_users_custom');
            foreach ($_POST['custom'] as $ck => $cv) {
                if ($cv != '') {
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

            return true;
        } else {
            $this->db->where('uid', $uid);
            return false;
        }
    }

    function pending_custom($uid)
    {
        $this->db->where('display_at', 'Result');
        $querys = $this->db->get('savsoftquiz_custom_form');

        $this->db->where('savsoftquiz_custom_form.display_at', 'Result');
        $this->db->where('savsoft_users_custom.uid', $uid);
        $this->db->join(
            'savsoftquiz_custom_form',
            'savsoftquiz_custom_form.field_id=savsoft_users_custom.field_id'
        );
        $query = $this->db->get('savsoft_users_custom');
        return $querys->num_rows() - $query->num_rows();
    }

    function update_groups($gid)
    {
        $userdata = [];
        if ($this->input->post('group_name')) {
            $userdata['group_name'] = $this->input->post('group_name');
        }
        if ($this->input->post('price')) {
            $userdata['price'] = $this->input->post('price');
        }
        if ($this->input->post('valid_day')) {
            $userdata['valid_for_days'] = $this->input->post('valid_day');
        }
        if ($this->input->post('valid_day')) {
            $userdata['description'] = $this->input->post('description');
        }
        $this->db->where('gid', $gid);
        if ($this->db->update('savsoft_group', $userdata)) {
            return true;
        } else {
            return false;
        }
    }

    function remove_applicant($uid)
    {
        $userdata = [
            'user_status' => 'inactive',
        ];
        $this->db->where('uid', $uid);
        if ($this->db->update('savsoft_users', $userdata)) {
            return true;
        } else {
            return false;
        }
    }

    function remove_user($uid)
    {
        $userdata = [
            'user_status' => 'inactive',
        ];
        $this->db->where('uid', $uid);
        if ($this->db->update('savsoft_users', $userdata)) {
            return true;
        } else {
            return false;
        }
    }

    function remove_group($gid)
    {
        $this->db->where('gid', $gid);
        if ($this->db->delete('savsoft_group')) {
            return true;
        } else {
            return false;
        }
    }

    function get_applicant($uid)
    {
        if ($uid != 2) {
            $this->db->where('savsoft_users.uid', $uid);
            $query = $this->db->get('savsoft_users');
            return $query->row_array();
        }
        $this->db->where('savsoft_users.uid', $uid);
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        $query = $this->db->get('savsoft_users');
        return $query->row_array();
    }

    function get_user($uid)
    {
        $this->db->where('savsoft_users.uid', $uid);
        //$this->db->where('savsoft_users.user_status =', 'active');
        $query = $this->db->get('savsoft_users');
        return $query->row_array();
    }

    function user_list_digitalizador()
    {
        if ($this->input->post('search')) {
            $search = $this->input->post('search');
            $this->db->or_where('savsoft_users.uid', $search);
            $this->db->or_where('savsoft_users.email', $search);
            $this->db->or_where('savsoft_users.first_name', $search);
            $this->db->or_where('savsoft_users.last_name', $search);

        }
        $this->db->order_by('savsoft_users.uid', 'desc');
        $this->db->where('savsoft_users.su =', 4);
        $this->db->where('savsoft_users.user_status =', 'active');
        $query = $this->db->get('savsoft_users');
        return $query->result_array();
    }

    function insert_groups()
    {
        $userdata = [
            'group_name' => $this->input->post('group_name'),
            'price' => $this->input->post('price'),
            'valid_for_days' => $this->input->post('valid_for_days'),
            'description' => $this->input->post('description'),
        ];

        if ($this->db->insert('savsoft_group', $userdata)) {
            return true;
        } else {
            return false;
        }
    }

    function get_expiry($gid)
    {
        $this->db->where('gid', $gid);
        $query = $this->db->get('savsoft_group');
        $gr = $query->row_array();
        if ($gr['valid_for_days'] != '0') {
            $nod = $gr['valid_for_days'];
            return date('Y-m-d', time() + $nod * 24 * 60 * 60);
        } else {
            return date('Y-m-d', time() + 10 * 365 * 24 * 60 * 60);
        }
    }

    function get_expiry2($gid)
    {
        $this->db->where('gid', $gid);
        $query = $this->db->get('savsoft_group');
        $gr = $query->row_array();

        return $gr['date_end'];
    }

    function add_students($data)
    {
        return $this->db->insert('students', $data);
    }

    function import_users($user)
    {
        $usercid = $this->input->post('gid');


        foreach ($user as $key => $singleuser) {

            if ($key != 0) {
                $cod_student = $singleuser['0'];
                $ci = $singleuser['1'];
                $exp = $singleuser['2'];
                $name = $singleuser['3'];
                $last_name = $singleuser['4'];
                $firts_opt = $singleuser['5'];
                $second_opt = $singleuser['6'];
                $email = $singleuser['7'];
                $phone = $singleuser['8'];


                $insert_data = [
                    'cod_student' => $cod_student,
                    'exp' => $exp,
                    'first_name' => $name,
                    'last_name' => $last_name,
                    'first_opt_univ_degree' => $firts_opt,
                    'second_opt_univ_degree' => $second_opt,
                    'email' => $email,
                    'contact_no' => $phone,
                    'ci' => $ci,
                    'gid' => $usercid,
                    'su' => 2,
                    'password' => md5($ci . $exp),
                    'photo' => 'photo/users/photo.jpeg',

                ];


                foreach ($insert_data as $value) {
                    if ($value == '') {
                        $insert_data = [];
                    }
                }
                if ($insert_data != '') {
                    $info = $this->db->insert('savsoft_users', $insert_data);
                }
            }
        }
    }

    function submit_photo($uid, $data_photo)
    {

        $logged_in = $this->session->userdata('logged_in');

        $userdata = [
            'photo' => $data_photo,
        ];

        $this->db->where('uid', $uid);
        if ($this->db->update('savsoft_users', $userdata)) {
            $this->db->where('uid', $uid);


            return true;
        } else {

            return false;
        }


    }

    function obtener_query(){


        $query= 'SELECT c.name specialties, a.last_name , a.first_name, a.cod_student,a.ci,a.nationality,a.contact_no, b.name university, a.email ,a.registered_date 
        FROM savsoft_users AS a 
        INNER JOIN university AS b ON b.id = a.id_university
        INNER JOIN specialties AS c ON c.id = a.id_speciality 
        WHERE a.user_status = "active"
        ORDER BY c.name,a.last_name ASC';
        $resultados = $this->db->query($query);
        return $resultados->result_array();

    }
    function get_query_list_quiz(){
        $query = 'SELECT a.uid, a.cod_student ,CONCAT(a.first_name," ",a.last_name) full_name,b.name ,c.serial_examen
        FROM savsoft_users a
        INNER JOIN specialties b
        ON b.id = a.id_speciality 
        INNER JOIN postulantes_examenes c
        ON c.cod_cd = a.cod_student 
        WHERE a.user_status = "active"
        ORDER BY full_name asc';
        $resultados = $this->db->query($query);
        return $resultados->result_array();
    }

    public function cod_cd_status($cod_cd){
        try{
            $this->db->where('postulante_code', $cod_cd);
            $resultados = $this->db->get('postulantes_fingerprints');
            $result = $resultados->result_array();
            if(count($result) > 0){
                return ['status' => 'founded'];
            }else{
                return ['status' => 'not_found'];
            }
        }catch (Exception $e){
            echo $e;
            return ['status' => 'error'];
        }
    }
}

?>
