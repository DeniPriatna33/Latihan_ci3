<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_ajax_v2 extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tbl_mahasiswa')->result();
    }

    public function get_dataID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tbl_mahasiswa')->row();
    }

    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_mahasiswa');
    }

    public function insert_data($data)
    {
        $this->db->insert('tbl_mahasiswa', $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_mahasiswa', $data);
    }
}

/* End of file M_ajax_v2.php */
