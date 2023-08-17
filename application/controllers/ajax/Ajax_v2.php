<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_v2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ajax_v2/m_ajax_v2', 'm2');
    }

    public function index()
    {
        $data = array(
            'sub_judul'     => 'Crud Ajax CI3',
            'sub_judul1'    => 'list',
            'isi'              => 'ajax_v2/index',
            # persiapan untuk data script
            'script' => [
                'script/script_ajax_v2.php',
            ],
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function tampil_data()
    {
        $data = $this->m2->get_data();
        echo json_encode($data);
    }

    public function tampil_data_id()
    {
        $id = $this->input->post('id');
        $data = $this->m2->get_dataID($id);
        echo json_encode($data);
    }

    public function tambah_data()
    {
        $data = array(
            'nama'      => $this->input->post('nama'),
            'jurusan'   => $this->input->post('jurusan')
        );

        $save = $this->m2->insert_data($data);
        echo json_encode($save);
    }

    public function ubah_data()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama'      => $this->input->post('nama'),
            'jurusan'   => $this->input->post('jurusan')
        );

        $save = $this->m2->update_data($id, $data);
        echo json_encode($save);
    }

    public function hapus_data()
    {
        $id = $this->input->post('id');
        $data = $this->m2->delete_data($id);
        echo json_encode($data);
    }

 
}

/* End of file Ajax_v2.php */
