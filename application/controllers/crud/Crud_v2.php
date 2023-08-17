<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Crud_v2 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $query = $this->db->query("SELECT * FROM tbl_mahasiswa")->result();
        $data = array(
            'sub_judul'     => 'Crud V2 CI3',
            'sub_judul1'    => 'List',
            'query'         => $query,
            'isi'              => 'crud_v2/index',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function store()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
        );
        $save = $this->db->insert('tbl_mahasiswa', $data);
        $this->session->set_flashdata("message", "Data Berhasil Disimpan.");
        redirect(base_url('crud/crud_v2'));
    }

    function delete_data($id)
    {
        $this->db->delete('tbl_mahasiswa', array('id' => $id));
        $this->session->set_flashdata("message", "Data Berhasil Dihapus.");
        redirect(base_url('crud/crud_v1'));
    }

    function update()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
        );
        $update = $this->db->update('tbl_mahasiswa', $data, array('id' => $id));
        $this->session->set_flashdata("message", "Data Berhasil Diupdate.");
        redirect(base_url('crud/crud_v2'));
    }
}

/* End of file Crud_v2.php */
