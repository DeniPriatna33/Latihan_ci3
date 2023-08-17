<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_upload_file extends CI_Model {

	public function get_data()
	{
		return $this->db->get('tbl_upload_file')->result();
	}

	public function get_dataID($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('tbl_upload_file')->row();
	}

	public function delete_data($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_upload_file');
	}

	public function insert_data($data)
	{
		$this->db->insert('tbl_upload_file', $data);
	}

	public function update_data($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_upload_file', $data);
	}

}

/* End of file Upload_file.php */
