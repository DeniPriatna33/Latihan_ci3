<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_v1 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ajax_v1/M_ajax_v1', 'mm');
    }

    public function index()
    {
        $data = array(
            'sub_judul'     => 'Crud Ajax CI3',
            'sub_judul1'    => 'list',
            'isi'              => 'ajax_v1/index',
            # persiapan untuk data script
            'script' => [
                'script/script_ajax_v1.php',
            ],
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function tampil_mahasiswa()
    {
        $mahasiswa = $this->mm->tampil_mahasiswa();
        $data = array(
            'sub_judul' => 'List Crud Ajax CI3',
            'mahasiswa' => $mahasiswa,
        );
        $this->load->view('ajax_v1/data_mahasiswa', $data);
    }

    public function create()
    {
        $aksi = $this->input->post('aksi');
        $data = array(
            'aksi' => $aksi
        );
        $this->load->view('ajax_v1/create', $data);
    }

    public function simpan_mahasiswa()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
        );
        // print_r($data);die;
        $this->db->insert('tbl_mahasiswa', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $get_edit = $this->mm->get_edit($id);
        $data = array(
            'get_edit' => $get_edit
        );
        $this->load->view('ajax_v1/edit', $data);
    }

    public function update_mahasiswa()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
        );
        // print_r($data);die;
        $this->db->where('id', $id);
        $this->db->update('tbl_mahasiswa', $data);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $get_edit = $this->mm->get_edit($id);
        $data = array(
            'get_edit' => $get_edit
        );
        $this->load->view('ajax_v1/delete', $data);
    }

    public function delete_data()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('tbl_mahasiswa');
    }
}

/* End of file Ajax_v1.php */
