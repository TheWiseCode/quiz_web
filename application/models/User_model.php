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
                if ($user['user_status'] == 'Active') {
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

    function get_account_type()
    {
        $query = $this->db->get('account_type');
        return $query->result_array();
    }

    function get_career_all()
    {
        $query = $this->db->get('university_careers');
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

    function applicant_list($limit)
    {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['uid'] != '1') {
            $uid = $logged_in['uid'];
            $this->db->where('savsoft_users.inserted_by', $uid);
        }
        $this->db->limit($this->config->item('number_of_rows'), $limit);
        $this->db->order_by('savsoft_users.uid', 'desc');
        $this->db->where('savsoft_users.su =', 2);
        $this->db->where('savsoft_users.user_status =', 'active');
        $this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        $query = $this->db->get('savsoft_users');
        if (!$query) {
            return [];
        }
        return $query->result_array();
    }

    function user_list($limit)
    {
        $this->db->limit($this->config->item('number_of_rows'), $limit);
        $this->db->order_by('savsoft_users.uid', 'desc');
        $this->db->where('savsoft_users.su <>', 2);
        $this->db->where('savsoft_users.user_status =', 'Active');
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
        $userdata['inserted_by'] = $logged_in['uid'];
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

    function update_user($uid, $data_photo)
    {
        $userdata = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'su' => $this->input->post('su'),
            'contact_no' => $this->input->post('contact_no')
        ];
        if ($data_photo) {
            $userdata['photo'] = $data_photo;
        }
        $this->db->where('uid', $uid);;
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

    function insert_user_login()
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

    function insert_applicant($data_photo)
    {
        $logged_in = $this->session->userdata('logged_in');
        if (!$data_photo) {
            $data_photo = "images/profile.jpg";
        }
        $userdata = [
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('ci')),
            'ci' => $this->input->post('ci'),
            'exp' => $this->input->post('exp'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'cod_student' => $this->input->post('code_student'),
            'first_opt_univ_degree' => $this->input->post('first_career'),
            'second_opt_univ_degree' => $this->input->post('second_career'),
            'contact_no' => $this->input->post('contact_no'),
            'gid' => $this->input->post('gid'),
            'subscription_expired' => null,
            'su' => 2,
            'photo' => $data_photo,
            'civil_status' => $this->input->post('civil_status'),
            'sexo' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'nationality' => $this->input->post('nationality')
        ];
        if ($logged_in['uid'] != '1') {
            $userdata['inserted_by'] = $logged_in['uid'];
        }
        if ($this->db->insert('savsoft_users', $userdata)) {
            $uid = $this->db->insert_id();
            if ($logged_in['uid'] == '1') {
                $su = $this->input->post('su');
                $seq = $this->db->query(
                    "select * from account_type where account_id='$su' "
                );
                $seqr = $seq->row_array();
                $acp = explode(',', $seqr['users']);
                if (in_array('List_all', $acp)) {
                    $this->db->query(
                        " update savsoft_users set inserted_by=uid where uid='$uid' "
                    );
                }
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

    function update_applicant($uid, $photo)
    {
        $userdata = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'ci' => $this->input->post('ci'),
            'exp' => $this->input->post('exp'),
            'cod_student' => $this->input->post('code_student'),
            'first_opt_univ_degree' => $this->input->post('first_career'),
            'second_opt_univ_degree' => $this->input->post('second_career'),
            'contact_no' => $this->input->post('contact_no'),
            'gid' => $this->input->post('gid'),
            'civil_status' => $this->input->post('civil_status'),
            'sexo' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'nationality' => $this->input->post('nationality')
        ];
        if ($photo) {
            $userdata['photo'] = $photo;
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

    function update_profile_applicant($uid, $photo)
    {
        $userdata = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'ci' => $this->input->post('ci'),
            'exp' => $this->input->post('exp'),
            'cod_student' => $this->input->post('code_student'),
            'first_opt_univ_degree' => $this->input->post('first_career'),
            'second_opt_univ_degree' => $this->input->post('second_career'),
            'contact_no' => $this->input->post('contact_no'),
            'gid' => $this->input->post('gid'),
            'civil_status' => $this->input->post('civil_status'),
            'sexo' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'nationality' => $this->input->post('nationality'),
        ];
        if($this->input->post('new_password'))
        {
            $userdata['password'] = md5($this->input->post('new_password'));
        }
        if($photo){
            $userdata['photo'] = $photo;
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

    function update_profile_user($uid, $photo)
    {
        $userdata = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'contact_no' => $this->input->post('contact_no'),
            
        ];
        if($this->input->post('new_password'))
        {
            $userdata['password'] = md5($this->input->post('new_password'));
        }
        if ($photo) {
            $userdata['photo'] = $photo;
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
        $userdata = ['user_status' => 'inactive',];
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
            'user_status' => 'Inactive',
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

    function get_user($uid)
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

    function get_user_admin($uid)
    {

        $this->db->where('savsoft_users.uid', $uid);
        //$this->db->join('savsoft_group', 'savsoft_users.gid=savsoft_group.gid');
        $query = $this->db->get('savsoft_users');
        return $query->row_array();
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
    function add_students($data)
    {
        return $this->db->insert('students', $data);
    }
    function get_id_code_career($cod_career)
    {

        $this->db->where('university_careers.code_career', $cod_career);
        $query = $this->db->get('university_careers');
        return $query->row_array();
    }
    function add_career ($data)
    {
        $this->db->insert('university_careers', $data);
        return  $this->db->insert_id();
       
      
    }
    function import_users($user)
    {
        $index=1;
        $is_vacio_value = false;
        $list_invalid=[];
        $usercid = $this->input->post('gid');
        $date_first;
        $date_second;
        //$prim = trim($singleuser['6']);

        foreach ($user as $key => $singleuser) {
            

            if ($key != 0) {
                	
                $index = $index + 1;
                	
                $cod_student = trim($singleuser['0']);
                $ci = trim($singleuser['1']);
                $exp = trim($singleuser['2']);
                $name = trim($singleuser['3']);
                $last_name = trim($singleuser['4']);
                $firts_opt = trim($singleuser['5']);
                $code_first = trim($singleuser['6']);
                $second_opt = trim($singleuser['7']);
                $code_second = trim($singleuser['8']);
                $email = trim($singleuser['9']);
                $phone = trim($singleuser['10']);
                
                if($code_first != "" && $code_second != "" && $firts_opt != "" && $second_opt != "" )
                {
                    $id_first_career = $this->get_id_code_career($code_first);	
                    $id_second_career = $this->get_id_code_career($code_second);
                    
                    if($id_first_career == [])
                    {
                        $data_career1 = [
                            'name' => $firts_opt,
                            'code_career' => $code_first,
                        ];
                        $firts_opt = $this->add_career($data_career1);
                        //$firts_opt = $date_first['id'];
                    }
                    else{
                        $firts_opt = $id_first_career['id'];
                    
                    }
                    if($id_second_career == [])
                    {
                        
                        $data_career2 = [
                            'name' => $second_opt,
                            'code_career' => $code_second,
                        ];
                        $second_opt = $this->add_career($data_career2);
                        
                        //$second_opt = $date_second['id'];
                        
                    }
                    else{
                        $second_opt = $id_second_career['id'];
                    }
                }else{
                    $is_vacio_value = true;
                }


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
                        $is_vacio_value = true;
                    }
                }

                if($is_vacio_value)
                {
                    $data_empty = $this->data_empty($insert_data,$code_first,$code_second);
                    $date_invalid = [
                        'index' => $index,
                        'data' => $data_empty,
                    ];
                    if(!$this->is_all_empty($insert_data,$code_first,$code_second))
                    {	
                        array_push($list_invalid, $date_invalid);
                    }

                }
                if (!$is_vacio_value) {
                    $query= 'SELECT savsoft_users.cod_student 
                    FROM savsoft_users
                    WHERE cod_student ='. $insert_data['cod_student'];
                    $resultados = $this->db->query($query);
                    $date= $resultados->row_array();
                    
                    if($date == "")
                    {
                        $info = $this->db->insert('savsoft_users', $insert_data);
                        
                    }
                }
                
            }
            $is_vacio_value = false;
        }
        return $list_invalid;
    }
    function is_all_empty($cad,$code_first,$code_second)
    {

        foreach ($cad as $key => $value) {
            if($key != 'gid' && $key != 'su' && $key != 'password' && $key != 'photo')
            {
                if(!empty($value))
                {
                    return false;
                }
            }
        }
        if($code_first != "")
        {
            return false;
        }
        if($code_second != "")
        {
            return false;
        }

        return true;
    }
    function data_empty($cad,$code_first,$code_second)
    {
        $cad_whit_empty=[];
        foreach ($cad as $key => $value) {
            if(empty($value)){
                $cad_whit_empty += [$key => $value];
            }
        }
        if($code_first == "")
        {
            $cad_whit_empty += ['code_first' => ""];
        }
        if($code_second == "")
        {
            $cad_whit_empty += ['code_second' => ""];
        }
        

        return  $cad_whit_empty;
    }
   

    function cargar_archivo($with_code = false)
    {
        $cd = '';
        if ($with_code) {
            $cd = $this->input->post('code_student');
            if ($cd == null) {
                $cd = '';
                return null;
            } else {
                $cd .= '_';
            }
        }
        $p = $_FILES['wizard_picture'];
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

?>
