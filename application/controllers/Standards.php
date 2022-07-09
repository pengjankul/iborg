<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standards extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Standard_model", "std");
    }

    public function getDistricts()
    {
        $province = $this->input->get('province');
        $result = $this->std->getDistricts($province);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function getSubDistricts()
    {
        $province = $this->input->get('province');
        $result = $this->std->getSubDistricts($province);
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
}
