<?php

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

   
    public function index()
    {
        $data = array();
        $pid = $this->session->userdata('sesUserId');

        if ($pid != "") {
            // $this->packets->install('datepicker');

            // $data['times'] = $this->db->get('time_period')->result();
            // $data['holidays'] = $this->db->get('holiday')->result();
            

            // $v = date('YmdHis');
            // $this->template->javascript->add('assets/modules/main/index.js?v=' . $v);

            $this->setView('index', $data);
            $this->publish();
        } else {

            $this->load->view('login');
            // $this->setView('index', $data);
            // $this->publish();
        }
    
    }


}
