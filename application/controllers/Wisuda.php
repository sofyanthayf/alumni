<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output serta autentikasi user
 */
class Wisuda extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('alumni_model');
    $this->load->model('event_model');

    $this->session->last_url = current_url();

    if( !isset($this->session->uid) ) redirect('/alumni/login');
    if( $this->session->who != 'al' ) redirect('/');
  }

  public function index()
  {
    $data['wisuda'] = $this->event_model->lastEvent('1');
    $this->session->wisuda = $data['wisuda']['id_event'];
    $this->load->template('wisuda/info_wisuda', $data);
  }

  public function mendaftar_wisuda()
  {
    $alumnus = $this->alumni_model->alumnus( $this->session->uid );
    $lastjob = $this->alumni_model->lastJob( $this->session->uid );
    $cpreferensi = $this->alumni_model->GetCPReferensi( $this->session->uid, $lastjob['mitra'], $lastjob['cabang_mitra'] );
    $bolehregistrasi = false;
    $bekerja = null;
    if( null !== $this->input->post('bekerja') ){
      $bekerja = $this->input->post('bekerja');
    }

    if( empty( $alumnus['pekerjaan'] ) ){
      if( $bekerja === null ){
        $this->load->template('wisuda/validasi_kerja');
      } elseif ($bekerja == '1') {
        redirect('/alumni/pekerjaan');
      } else {
        $this->registrasi();
      }
    } elseif ( empty($cpreferensi) ) {
      redirect('/alumni/referensi/'.$lastjob['mitra'] );
    } else {
      $this->registrasi();
    }

  }

  public function registrasi()
  {
    $data['peserta'] = $this->event_model->getPesertaEvent( $this->session->uid , $this->session->wisuda );
    if( empty( $data['peserta'] ) ){
      $peserta = array(
                  'id_registrasi' => date('U'),
                  'id_event' => $this->session->wisuda,
                  'uid' => $this->session->uid
                );
      $this->event_model->simpanPesertaEvent( $peserta );

      $data['peserta'] = $this->event_model->getPesertaEvent( $this->session->uid , $this->session->wisuda );
    }

    $this->load->template('wisuda/registered', $data);
  }



}
?>
