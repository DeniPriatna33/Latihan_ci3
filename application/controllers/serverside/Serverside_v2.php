<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Serverside_v2 extends CI_Controller
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
            'sub_judul'     => 'Serverside V2 CI3',
            'sub_judul1'    => 'List',
            'isi'              => 'serverside_v2/index',
			# persiapan untuk data script
			'script' => [
				'script/script_serverside_v2.php',
			],
        );
        $this->load->view('layout/wrapper', $data);
    }

	public function ajax_list()
	{
		## Read value
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$rowperpage = $this->input->post('length'); // Rows display per page
		$searchValue = strtolower($this->input->post('search')); // Search value
		
		$ambildata = $this->db->select("*")
			->from("tbl_mahasiswa")
			->order_by('id', 'ASC')
			->group_start()
			->like('LOWER(nama)', $searchValue)
			->or_like('LOWER(jurusan)', $searchValue)
			->group_end()
			->limit($rowperpage, $start)
			->get()
			->result();

		$totalRecords =$this->db->select("*")
			->from("tbl_mahasiswa")
			->order_by('id', 'ASC')
			->group_start()
			->like('LOWER(nama)', $searchValue)
			->or_like('LOWER(jurusan)', $searchValue)
			->group_end()
			->limit($rowperpage, $start)
			->get()
			->result();

		$totalRecords = count($totalRecords);

		$totalRecords_filter =$this->db->select("*")
			->from("tbl_mahasiswa")
			->order_by('id', 'ASC')
			->group_start()
			->like('LOWER(nama)', $searchValue)
			->or_like('LOWER(jurusan)', $searchValue)
			->group_end()
			->limit($rowperpage, $start)
			->get()
			->result();

		$totalRecords_filter = count($totalRecords_filter);

		$query = array();
		$no = $start;

		foreach ($ambildata as $r) {
			$no++;
			$query[] = array(
				'no' => $no,
				'nama' => (isset($r->nama)) ? $r->nama : '',
				'jurusan' => (isset($r->jurusan)) ? $r->jurusan : '',
				'aksi' => 'AA',
			);
		}

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords_filter,
			"iTotalDisplayRecords" => $totalRecords,
			"aaData" => isset($query) ? $query : [],
		);

		echo json_encode($response);
		return;
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
}

/* End of file Serverside_v1.php */
