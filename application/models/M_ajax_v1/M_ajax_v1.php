<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_ajax_v1 extends CI_Model
{
    public function tampil_mahasiswa()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->from('tbl_mahasiswa')->get()->result();
    }

    public function get_edit($id)
    {
        $this->db->where('id', $id);
        return $this->db->from('tbl_mahasiswa')->get()->row();
    }
}

/* End of file M_ajax_v1.php */
