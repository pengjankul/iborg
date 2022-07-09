<?php

class Main extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('main_model');
        $this->load->library('session');
    }

    public function login()
    {
        $input = $this->input->post();
        $keeper = $this->input->post('keeper');
   
        $res = $this->main_model->login($input['username'], $input['password'], $keeper);
        
        if ($res['status']) {
            redirect('dashboard', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!!');
            // redirect('main/index', 'refresh');
            $this->load->view('login');
        }
    }

    public function logout()
    {
        
        $this->session->sess_destroy();
        redirect(base_url('main'));
    }


}
