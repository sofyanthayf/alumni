<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output data/informasi perusahaan mitra
 * pengguna alumni
 */
class Mitra extends CI_Controller {

  public function __construct() {
      parent::__construct();

      $this->load->model('mitra_model');
  }

  public function formPenilaianKinerja($nimhs)
  {  
    $mitra = $this->session->userdata('mitra');
    $data['mitraalumni'] =  $this->mitra_model->form_kinerja($mitra,$nimhs);

    $this->load->template('mitra/form_input_kinerja_karyawan', $data);
  }

  public function insert_penilaian()
  {
    $date=date_create();

    if (isset($_POST['simpan'])) {
      $nilai1 = implode(',',$_POST['nilaietika']);
    };

    if (isset($_POST['simpan'])) {
      $nilai2 = implode(',',$_POST['nilaikeahlian']);
    };

    if (isset($_POST['simpan'])) {
      $nilai3 = implode(',',$_POST['nilaibahasa']);
    };

    if (isset($_POST['simpan'])) {
      $nilai4 = implode(',',$_POST['nilaiteknologi']);
    };

    if (isset($_POST['simpan'])) {
      $nilai5 = implode(',',$_POST['nilaikomunikasi']);
    };

    if (isset($_POST['simpan'])) {
      $nilai6 = implode(',',$_POST['nilaikerjasama']);
    };

    if (isset($_POST['simpan'])) {
      $nilai7 = implode(',',$_POST['nilaipengembangandiri']);
    };

    $data = array('id_penilaian' => date_timestamp_get($date),
                  'email_contactperson' => $this->session->userdata('email'),
                  'id_mitra' => $this->session->userdata('mitra'),
                  'nimhs' => $this->input->post('nimhs',true),
                  'k1' => $nilai1,
                  'k2' => $nilai2,
                  'k3' => $nilai3,
                  'k4' => $nilai4,
                  'k5' => $nilai5,
                  'k6' => $nilai6,
                  'k7' => $nilai7,
                  'saran1' => $this->input->post('saran1',true),
                  'saran2' => $this->input->post('saran2',true)
                  );

    $insert = $this->mitra_model->prosesInsert('penilaian_alumni',$data);

    echo '<script>alert("You Have Successfully Updated This Record!");</script>';
  }
}
