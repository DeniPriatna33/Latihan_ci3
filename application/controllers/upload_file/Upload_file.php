<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_file extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
		// Load member model
		$this->load->model('M_upload_file/M_upload_file', 'mu');
	}

	function index()
	{
		$data = array(
			'sub_judul'     => 'Upload File CI3',
			'sub_judul1'    => 'List',
			'isi'           => 'upload_file/index',
			# persiapan untuk data script
			'script' => [
				'script/script_upload_file.php',
			],
		);
		$this->load->view('layout/wrapper', $data);
	}

	function list_data(){
		$list_mahasiswa = $this->mu->get_data();
		echo json_encode($list_mahasiswa);
	}

	function tambah_data(){
		$new_name = time() .'_'. $_FILES["nama_file"]['name'];
		$config['upload_path']          = FCPATH . 'assets/upload/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $new_name;
		$config['overwrite']            = true;
		$config['max_size']             = 2024; // 1MB
		$config['max_width']            = 2080;
		$config['max_height']           = 2080;
		// $config['encrypt_name'] 		= TRUE;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload("nama_file")) {
			$data = array('upload_data' => $this->upload->data());

			$data = array(
				'nama_file'      => $data['upload_data']['file_name'],
				'keterangan'   => $this->input->post('keterangan'),
				'created_at'   => date('Y-m-d H:i:s'),
			);

			$save = $this->mu->insert_data($data);
			echo json_encode($save);

		}else{
			$error = array('error' => $this->upload->display_errors());
		}
	}
	

}

/* End of file Upload_file.php */
