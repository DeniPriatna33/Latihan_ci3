<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_all extends CI_Model
{
    private $_table = "tbl_mahasiswa";

    public $id;
    public $nama;
    public $jurusan;

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'jurusan',
                'label' => 'Jurusan',
                'rules' => 'numeric'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->product_id = uniqid();
        $this->nama = $post["nama"];
        $this->jurusan = $post["jurusan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->jurusan = $post["jurusan"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}

/* End of file M_all.php */
