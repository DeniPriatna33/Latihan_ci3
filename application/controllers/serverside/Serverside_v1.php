<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Serverside_v1 extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();
        // Load member model
        $this->load->model('m_serverside/M_serverside_v1', 'ms');
    }

    function index()
    {
        // Load the member list view
        $data = array(
            'sub_judul'     => 'Serverside V1 CI3',
            'sub_judul1'    => 'List',
            'isi'              => 'serverside_v1/index',
            # persiapan untuk data script
            'script' => [
                'script/script_serverside_v1.php',
            ],
        );
        $this->load->view('layout/wrapper', $data);
    }

	

    function ajax_list()
    {
        header('Content-Type: application/json');
        $list = $this->ms->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $dt) {
            $no++;
            $row = array();
            //row pertama akan kita gunakan untuk btn edit dan delete
            $edit = '<a class="btn btn-warning btn-sm" onclick="edit_n(&apos;' . $dt->id . '&apos;)"><i class="fa fa-edit"></i> </a>';
            $delete = '<a class="btn btn-danger btn-sm" onclick="delete_n(&apos;' . $dt->id . '&apos;)"><i class="fa fa-trash"></i> </a>';
            $row[] = $no;
            $row[] = $dt->nama;
            $row[] = $dt->jurusan;
            $row[] = $edit . ' ' . $delete;

            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->ms->count_all(),
            "recordsFiltered" => $this->ms->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

	function get_id(){
		$id = $this->input->post('id');
		$list = $this->ms->get_datatables_id($id);
		echo json_encode($list);
	}

    function delete_data()
    {
        $id = $this->input->post('id');
        $query_delete = $this->ms->delete_data($id);
        echo $query_delete;
    }

	function updated_data() {
		$id = $this->input->post('id');
		$data = array(
			'nama'      => $this->input->post('nama'),
			'jurusan'   => $this->input->post('jurusan')
		);

		$save = $this->ms->update_data($id, $data);
		echo json_encode($save);
	}

    public function insert_dummy()
    {
        //3ribu mahasiswa
        $jumlah_data = 3000;
        for ($i = 1; $i <= $jumlah_data; $i++) {
            $data   =   array(
                "nama"      =>  "Mahasiswa ke" . $i,
                "jurusan"    =>  "Alamat mahasiswa ke" . $i,
            );
            //insert ke tabel mahasiswa
            $this->db->insert('tbl_mahasiswa', $data);
        }
        //flashdata untuk pesan success
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $jumlah_data . ' Data Mahasiswa berhasil disimpan. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect("serverside/Serverside_v1");
    }
}

/* End of file Serverside_v1.php */
