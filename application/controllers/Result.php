<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model("result_model");
        $this->load->model("social_model");
        $this->load->model("user_model");
        $this->lang->load('basic', $this->config->item('language'));
        // redirect if not loggedin

    }

    public function index($limit = '0', $status = '0')
    {

        if (!$this->session->userdata('logged_in')) {
            redirect('login');

        }
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['base_url'] != base_url()) {
            $this->session->unset_userdata('logged_in');
            redirect('login');
        }


        $logged_in = $this->session->userdata('logged_in');
        $setting_p = explode(',', $logged_in['results']);

        if (in_array('List', $setting_p) || in_array('List_all', $setting_p)) {

        } else {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }

        $data['limit'] = $limit;
        $data['status'] = $status;
        $data['title'] = $this->lang->line('resultlist');
        // fetching result list
        $data['result'] = $this->result_model->result_list($limit, $status);
        // fetching quiz list
        $data['quiz_list'] = $this->result_model->quiz_list();
        // group list
        $this->load->model("user_model");
        $data['group_list'] = $this->user_model->group_list();

        $this->load->view('header', $data);
        $this->load->view('result_list', $data);
        $this->load->view('footer', $data);
    }


    public function remove_result($rid, $open = '0')
    {

        if (!$this->session->userdata('logged_in')) {
            redirect('login');

        }
        $logged_in = $this->session->userdata('logged_in');
        $acp = explode(',', $logged_in['results']);
        if (!in_array('List_all', $acp)) {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }

        if ($open != 0) {
            $this->db->query("delete from savsoft_result where result_status='open'");
        }

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['base_url'] != base_url()) {
            $this->session->unset_userdata('logged_in');
            redirect('login');
        }
        $logged_in = $this->session->userdata('logged_in');
        $acp = explode(',', $logged_in['results']);
        if (!in_array('Remove', $acp)) {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }

        if ($this->result_model->remove_result($rid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " </div>");

        }
        redirect('result');


    }


    function generate_report()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');

        }
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['base_url'] != base_url()) {
            $this->session->unset_userdata('logged_in');
            redirect('login');
        }

        $logged_in = $this->session->userdata('logged_in');
        $acp = explode(',', $logged_in['results']);
        if (!in_array('List_all', $acp)) {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }

        $this->load->helper('download');

        $quid = $this->input->post('quid');
        $gid = $this->input->post('gid');
        //$result = $this->result_model->generate_report($quid, $gid);

        if ($gid != '0') {
            
            $where = "where a.uid = b.uid and c.gid =b.gid"." and b.gid=".$gid;
        }
        else
        {
            $where = "where a.uid = b.uid and c.gid =b.gid";
        }
        $result = $this->db->query("
        select a.rid ,a.quid ,c.group_name,b.*
        from savsoft_result as a
        inner join savsoft_users as b
        inner join savsoft_group as c 
   
        ".$where."
         group by b.uid 
        order by b.last_name 
        ");
        $result = $result->result_Array();	

        $lista_f = array();

        foreach ($result as $key => $val) {
            
            $lista_f[$val['uid']]=[];
            $lista_f[$val['uid']]["cod_student"]=$val['cod_student'];
            $lista_f[$val['uid']]["full_name"]=$val['last_name']." ". $val['first_name'];
            $lista_f[$val['uid']]["group_name"]=$val['group_name']; 

            $lista_f[$val['uid']]['materia']=[];   
            if ($quid != '0') {
                //$this->db->where('savsoft_users.gid', $gid);
                $where = "SELECT uid ,categories FROM savsoft_result WHERE uid =".$val['uid']." "."and quid =".$quid." "."  group by uid, categories";
            }
            else
            {
                $where = "SELECT uid ,categories FROM savsoft_result WHERE uid =".$val['uid']." "." group by uid, categories";
            }
            $result_d = $this->db->query($where);
            $result_d = $result_d->result_array();	
            
            foreach ($result_d as $key => $val) {
                $where="";
                $lista_f[$val['uid']]['materia'][$val['categories']]=[];
                if ($quid != '0') {
                    //$this->db->where('savsoft_users.gid', $gid);
                    $where =  "select  sq.quiz_name , sr.score_obtained 
                    from savsoft_result sr
                    inner join savsoft_quiz sq on sq.quid = sr.quid 
                    where categories ='" .$val['categories']."'"." ". " and uid =" .$val['uid']." and sq.quid=".$quid;
                }
                else
                {
                    $where = "select  sq.quiz_name , sr.score_obtained 
                    from savsoft_result sr
                    inner join savsoft_quiz sq on sq.quid = sr.quid 
                    where categories ='" .$val['categories']."'"." ". " and uid =" .$val['uid'];
                }
                $result_nota = $this->db->query(
                    $where
                );
                $result_notaf = $result_nota->result_array();
                foreach ($result_notaf as $key => $value) {
                    $lista_f[$val['uid']]['materia'][$val['categories']][$key]= $value;
                    $sum +=intval($value['score_obtained']);
                    $cont += 1;
                }
                if($quid == '0')
                {
                    $lista_f[$val['uid']]['materia'][$val['categories']]['promedio_m']= $sum/$cont;
                    $prom_f +=$sum/$cont;
                    $cont_f +=1; 
                    $sum=0;
                    $cont=0;
                }
                
            }
            if($quid == '0')
            {
                $lista_f[$val['uid']]['promedio_f']=$prom_f/$cont_f ; 
                $prom_f=0;
                $cont_f=0; 
            }
            
        }
      
        $b=true;
        foreach ($lista_f as $key => $val)
        {
            if($b)
            {
                foreach($val['materia'] as $key => $value)
                {

                    foreach($value as $key1 => $value2){
                        if($value2['quiz_name'] != "")
                        {
                            $name_quiz .=  $value2['quiz_name'] . ",";
                        }
                        else{
                            $name_quiz .=  "Promedio" . ",";
                        }
                        
                    }
                }
            }
            $b=false;
        }
        if ($quid == '0') {
            $name_quiz .= "Promedio Total";
        }
     
        $csvdata = $this->lang->line('cod_postulante') . "," . $this->lang->line('full_name') . "," . $this->lang->line('group_name') . "," . $name_quiz . "\r\n"; //. "," . $this->lang->line('score_obtained') . "," . $this->lang->line('promedio') .  "," . $this->lang->line('promedioT') . "\r\n";
        $cantM = 0;
        $promT =0;
        
        foreach ($lista_f as $rk => $val) {
            $csvdata .= $val['cod_student'] . "," . $val['full_name'] . "," . $val['group_name'];     //. "," . $val['categories'] . "," . $val['quiz_name'] . "," . $val['score_obtained'] ;
          
            foreach($val['materia'] as $key => $value)
            {	
                foreach($value as $key1 => $value2){

                    if($value2['score_obtained'] != "")
                    {
                        $csvdata .= ",".  $value2['score_obtained'];
                    }
                    else{
                        $csvdata .= ",".  $value2;
                    }
                    
                }
            }
            $csvdata .= ",".$val['promedio_f'];
            $csvdata .= "\r\n";
          
        }
        $filename = time() . '.csv';
        force_download($filename, $csvdata);

    }


    function view_result($rid)
    {
        if (!$this->session->userdata('logged_in')) {
            if (!$this->session->userdata('logged_in_raw')) {
                redirect('login');
            }
        }
        if (!$this->session->userdata('logged_in')) {
            $logged_in = $this->session->userdata('logged_in_raw');
        } else {
            $logged_in = $this->session->userdata('logged_in');
        }
        if ($logged_in['base_url'] != base_url()) {
            $this->session->unset_userdata('logged_in');
            redirect('login');
        }
        $logged_in = $this->session->userdata('logged_in');
        $setting_p = explode(',', $logged_in['results']);
        if (in_array('List', $setting_p) || in_array('List_all', $setting_p)) {

        } else {
                        $data['title'] = $this->lang->line('permission_denied');
            $this->load->view('header', $data);
            $this->load->view('errors/403', $data);
            $this->load->view('footer', $data);
            return;
        }

        // check any custom field pending to fill..

        $data['result'] = $this->result_model->get_result($rid);

        if (!in_array('List_all', $setting_p)) {
            if ($this->user_model->pending_custom($data['result']['uid']) >= 1) {
                redirect('user/edit_user_fill_custom/' . $data['result']['uid'] . '/' . $rid);
            }
        }
        $data['attempt'] = $this->result_model->no_attempt($data['result']['quid'], $data['result']['uid']);
        $data['title'] = $this->lang->line('result_id') . ' ' . $data['result']['rid'];
        if ($data['result']['view_answer'] == '1' || $logged_in['su'] == '1') {
            $this->load->model("quiz_model");
            $data['saved_answers'] = $this->quiz_model->saved_answers($rid);
            $data['questions'] = $this->quiz_model->get_questions($data['result']['r_qids']);
            $data['options'] = $this->quiz_model->get_options($data['result']['r_qids']);

        }
        // top 10 results of selected quiz
        $last_ten_result = $this->result_model->last_ten_result($data['result']['quid']);
        $value = array();
        $value[] = array('Quiz Name', 'Percentage (%)');
        foreach ($last_ten_result as $val) {
            $value[] = array($val['email'] . ' (' . $val['first_name'] . " " . $val['last_name'] . ')', intval($val['percentage_obtained']));
        }
        $data['value'] = json_encode($value);

        // time spent on individual questions
        $correct_incorrect = explode(',', $data['result']['score_individual']);
        $qtime[] = array($this->lang->line('question_no'), $this->lang->line('time_in_sec'));
        foreach (explode(",", $data['result']['individual_time']) as $key => $val) {
            if ($val == '0') {
                $val = 1;
            }
            if ($correct_incorrect[$key] == "1") {
                $qtime[] = array($this->lang->line('q') . " " . ($key + 1) . ") - " . $this->lang->line('correct') . " ", intval($val));
            } else if ($correct_incorrect[$key] == '2') {
                $qtime[] = array($this->lang->line('q') . " " . ($key + 1) . ") - " . $this->lang->line('incorrect') . "", intval($val));
            } else if ($correct_incorrect[$key] == '0') {
                $qtime[] = array($this->lang->line('q') . " " . ($key + 1) . ") -" . $this->lang->line('unattempted') . " ", intval($val));
            } else if ($correct_incorrect[$key] == '3') {
                $qtime[] = array($this->lang->line('q') . " " . ($key + 1) . ") - " . $this->lang->line('pending_evaluation') . " ", intval($val));
            }
        }
        $data['qtime'] = json_encode($qtime);
        $data['percentile'] = $this->result_model->get_percentile($data['result']['quid'], $data['result']['uid'], $data['result']['score_obtained']);


        $uid = $data['result']['uid'];
        $quid = $data['result']['quid'];


        $this->load->view('header', $data);
        if ($this->session->userdata('logged_in')) {
            $this->load->view('view_result', $data);
        } else {
            $this->load->view('view_result_without_login', $data);

        }
        $this->load->view('footer', $data);


    }


    function getscoresbysg($sg_id, $uid, $quid)
    {
        $data['members'] = $this->social_model->group_member($sg_id);
        $uids = array();
        foreach ($data['members'] as $k => $user) {
            $uids[] = $user['uid'];
        }
        $this->db->order_by('savsoft_result.score_obtained', 'desc');
        $this->db->where('savsoft_result.quid', $quid);
        $this->db->where_in('savsoft_result.uid', $uids);
        $this->db->join('savsoft_users', 'savsoft_users.uid=savsoft_result.uid');
        $query = $this->db->get("savsoft_result");
        $data['quiz'] = $query->result_array();

        $this->load->view('getscoresbysg', $data);

    }

    function generate_certificate($rid)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');

        }
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['base_url'] != base_url()) {
            $this->session->unset_userdata('logged_in');
            redirect('login');
        }
        if (!$this->config->item('dompdf')) {
            exit('DOMPDF library disabled in config.php file');

        }
        $data['result'] = $this->result_model->get_result($rid);
        if ($data['result']['gen_certificate'] == '0') {
            exit();
        }
        // save qr
        $enu = urlencode(site_url('login/verify_result/' . $rid));

        $qrname = "./upload/" . time() . '.jpg';
        $durl = "https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=" . $enu . "&choe=UTF-8";
        copy($durl, $qrname);


        $certificate_text = $data['result']['certificate_text'];
        $certificate_text = str_replace('{qr_code}', "<img src='" . $qrname . "'>", $certificate_text);
        $certificate_text = str_replace('{email}', $data['result']['email'], $certificate_text);
        $certificate_text = str_replace('{first_name}', $data['result']['first_name'], $certificate_text);
        $certificate_text = str_replace('{last_name}', $data['result']['last_name'], $certificate_text);
        $certificate_text = str_replace('{percentage_obtained}', $data['result']['percentage_obtained'], $certificate_text);
        $certificate_text = str_replace('{score_obtained}', $data['result']['score_obtained'], $certificate_text);
        $certificate_text = str_replace('{quiz_name}', $data['result']['quiz_name'], $certificate_text);
        $certificate_text = str_replace('{status}', $data['result']['result_status'], $certificate_text);
        $certificate_text = str_replace('{result_id}', $data['result']['rid'], $certificate_text);
        $certificate_text = str_replace('{generated_date}', date('Y-m-d H:i:s', $data['result']['end_time']), $certificate_text);

        $data['certificate_text'] = $certificate_text;
        // $this->load->view('view_certificate',$data);
        $this->load->library('pdf');
        $this->pdf->load_view('view_certificate', $data);
        $this->pdf->render();
        $filename = date('Y-M-d_H:i:s', time()) . ".pdf";
        $this->pdf->stream($filename);


    }


    function preview_certificate($quid)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');

        }
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['base_url'] != base_url()) {
            $this->session->unset_userdata('logged_in');
            redirect('login');
        }

        $this->load->model("quiz_model");

        $data['result'] = $this->quiz_model->get_quiz($quid);
        if ($data['result']['gen_certificate'] == '0') {
            exit();
        }
        // save qr
        $enu = urlencode(site_url('login/verify_result/0'));
        $tm = time();
        $qrname = "./upload/" . $tm . '.jpg';
        $durl = "https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=" . $enu . "&choe=UTF-8";
        copy($durl, $qrname);
        $qrname2 = base_url('/upload/' . $tm . '.jpg');


        $certificate_text = $data['result']['certificate_text'];
        $certificate_text = str_replace('{qr_code}', "<img src='" . $qrname2 . "'>", $certificate_text);
        $certificate_text = str_replace('{result_id}', '1023', $certificate_text);
        $certificate_text = str_replace('{generated_date}', date('Y-m-d H:i:s', time()), $certificate_text);

        $data['certificate_text'] = $certificate_text;
        $this->load->view('view_certificate_2', $data);


    }

}
