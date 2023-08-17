<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Crud_v1 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $query = $this->db->query("SELECT * FROM tbl_mahasiswa")->result();
        $data = array(
            'sub_judul'     => 'Crud V1 CI3',
            'sub_judul1'    => 'List',
            'query'         => $query,
            'isi'              => 'crud_v1/index',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function create()
    {
        $data = array(
            'sub_judul'     => 'Crud V1 CI3',
            'sub_judul1'    => 'Tambah',
            'isi'              => 'crud_v1/tambah',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function store()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
        );
        $this->db->insert('tbl_mahasiswa', $data);
        $this->session->set_flashdata("message", "Data Berhasil Disimpan.");
        redirect(base_url('crud/crud_v1'));
    }

    function delete_data($id)
    {
        $this->db->delete('tbl_mahasiswa', array('id' => $id));
        $this->session->set_flashdata("message", "Data Berhasil Dihapus.");
        redirect(base_url('crud/crud_v1'));
    }

    function edit_data($id)
    {
        $get_edit = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE id = '$id'")->row();
        $data = array(
            'sub_judul'     => 'Crud V1 CI3',
            'sub_judul1'    => 'Edit',
            'get_edit'      => $get_edit,
            'isi'           => 'crud_v1/edit',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function update($id)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
        );
        $this->db->update('tbl_mahasiswa', $data, array('id' => $id));
        $this->session->set_flashdata("message", "Data Berhasil Dihapus.");
        redirect(base_url('crud/crud_v1'));
    }
}

/* End of file Crud_v1.php */
