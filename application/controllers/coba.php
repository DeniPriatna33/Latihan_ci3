<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

    public function index()
    {

        $parameter_uji = $_POST['parameter_uji'];

        $data_lab_2 = array(); #Insert Multiple
        foreach ($parameter_uji as $key => $dataparameter_uji) {
            array_push($data_lab_2, array(
                'parameter_uji'     => $dataparameter_uji,
                'pemerian'          => $_POST['pemerian'][$key],
                'ph'                => $_POST['ph'][$key],
                'berat_jenis'       => $_POST['berat_jenis'][$key],
                'viskositas'        => $_POST['viskositas'][$key],
                'kadar'             => $_POST['kadar'][$key],
                'uji_batas_mikroba' => $_POST['uji_batas_mikroba'][$key],
                'trial_obat_id'     => $trial_obat_id,
                'type'              => 'skala_lab_1',
                'created_at'        => date('Y-m-d H:i:s'),
                'created_by'        =>  $this->session->userdata('username');,
            ));
        }
        #$this->db->insert_batch('trial_obat_analisa_kadar_id', $data_lab_2);
        

        $data_lab_1 = array(
            
            'pemerian_ruahan'       => $this->input->post('pemerian_ruahan'),
            'berat_jenis_ruahan'    => $this->input->post('berat_jenis_ruahan'),
            'viskositas_ruahan'     => $this->input->post('viskositas_ruahan'),
            'ph_ruahan'             => $this->input->post('ph_ruahan'),
            'kadar_ruahan_id'       => $this->input->post('kadar_ruahan_id'),
            'pemerian_st'           => $this->input->post('pemerian_st'),
            'berat_jenis_st'        => $this->input->post('berat_jenis_st'),
            'viskositas_st'         => $this->input->post('viskositas_st'),
            'ph_st'                 => $this->input->post('ph_st'),
            'kadar_st_id'           => $this->input->post('kadar_st_id'),
            'trial_obat_id'         => $trial_obat_id,
            'type'                  => 'skala_lab_1',
            'created_at'            => date('Y-m-d H:i:s'),
		    'created_by'            => $this->session->userdata('username'),
        );
        #$result = $this->db->insert('trial_obat_analisa_kadar_id', $data_lab_1);

        // $_POST['trial_obat_laboratorium_id']
        // $_POST['titik_laboratorium_1']
        // $_POST['viskositas_laboratorium_1']
        // $_POST['torque_laboratorium_1']
        // $_POST['titik_laboratorium_2']
        // $_POST['viskositas_laboratorium_2']
        // $_POST['torque_laboratorium_2']
        // $_POST['trial_obat_id']
        // $_POST['created_at']
        // $_POST['updated_at']
        // $_POST['created_by']

        $titik_laboratorium_1 = $_POST['titik_laboratorium_1'];

        $data_laboratorium = array(); #Insert Multiple
        foreach ($laboratorium_1 as $key => $datalaboratorium_1) {
            array_push($data_laboratorium, array(
                'titik_laboratorium_1'          => $datalaboratorium_1,
                'viskositas_laboratorium_1'     => $_POST['viskositas_laboratorium_1'][$key],
                'torque_laboratorium_1'         => $_POST['torque_laboratorium_1'][$key],
                'titik_laboratorium_2'          => $_POST['titik_laboratorium_2'][$key],
                'viskositas_laboratorium_2'     => $_POST['viskositas_laboratorium_2'][$key],
                'torque_laboratorium_2'         => $_POST['torque_laboratorium_2'][$key],
                'trial_obat_id'                 => $trial_obat_id,
                'created_at'                    => date('Y-m-d H:i:s'),
                'created_by'                    =>  $this->session->userdata('username');,
            ));
        }
        
    }

}

/* End of file Coba.php */
