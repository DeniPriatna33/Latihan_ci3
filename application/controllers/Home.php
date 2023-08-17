<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('all/M_all', 'all');
    }

    public function index()
    {
        $query = $this->all->getAll();
        $data = array(
            'sub_judul'     => 'Home',
            'sub_judul1'    => 'list',
            'query'    => $query,
            'isi'              => 'home/index'
        );
        $this->load->view('layout/wrapper', $data);
    }

    function edit_data()
    {
        $data = array(
            'sub_judul'     => 'Home',
            'sub_judul1'    => 'list',
            'isi'              => 'home/edit'
        );
        $this->load->view('layout/wrapper', $data);
    }
}

/* End of file Home.php */
