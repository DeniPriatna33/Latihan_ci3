    <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Multiple_v1 extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('all/M_all', 'ma');
        }

        public function index()
        {
        $query = $this->ma->getAll();
        $data = array(
            'sub_judul'     => 'Multiple V1 CI3',
            'sub_judul1'    => 'List',
            'query'         => $query,
            'isi'              => 'multiple_v1/index',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'sub_judul'     => 'Multiple V1 CI3',
            'sub_judul1'    => 'List',
            'isi'              => 'multiple_v1/add',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function store()
    {
        $result = array();
        foreach ($_POST['nama'] as $key => $val) {
            $result[] = array(
                'nama' => $_POST['nama'][$key],
                'jurusan' => $_POST['jurusan'][$key]
            );
        }
        $this->db->insert_batch('tbl_mahasiswa', $result);
    }

    function delete_all()
    {
        $id = $_POST['id'];
        $this->db->where_in('id', $id);
        $this->db->delete('tbl_mahasiswa');
        redirect_back();
    }
}

/* End of file Multiple_v1.php */
