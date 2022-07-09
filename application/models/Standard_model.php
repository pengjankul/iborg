<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Standard_model extends CI_Model
{
    public function getProvince()
    {
        $this->db->select('code,name_th');
        $this->db->order_by('code', 'asc');
        $query = $this->db->get('std_area_province');
        return $query->result();
    }

    public function getDistricts($province)
    {

        $province = substr($province, 0, 2);
        $this->db->select('code,name_th');
        $this->db->like('code', $province, 'after');
        $this->db->order_by('code', 'asc');
        $query = $this->db->get('std_area_district');
        return $query->result();
    }

    public function getSubDistricts($district)
    {
        $district = substr($district, 0, 4);
        $this->db->select('code,name_th');
        $this->db->like('code', $district, 'after');
        $this->db->order_by('code', 'asc');
        $query = $this->db->get('std_area_subdistrict');
        return $query->result();
    }
}
