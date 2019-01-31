<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output data/informasi lowongan kerja
 */
class Loker extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('Loker_model');
  }

  public function tambah()
  {
    if (isset($_POST['submit']))
    {
      $params = array(
        'mitra' => $this->session->userdata('mitra'),
        'contact_person' => $this->input->post('contactPerson'),
        'tanggal_mulai' => $this->input->post('tglAwal'),
        'tanggal_akhir' => $this->input->post('tglAkhir'),
        'deskripsi' => $this->input->post('deskripsi'),
        'bidang_keahlian' => $this->input->post('keahlian')
      );
      $this->Loker_model->tambahLoker($params);
      $this->session->set_flashdata('msg', 'Loker berhasil di-tambahkan!');
    }
    $data['loker'] = $this->Loker_model->get_nama_perusahaan($this->session->userdata('mitra'));
    $this->load->template('loker/form_isian_loker', $data);
  }

public function edit($id)
{
  if (isset($_POST['submit']))
  {
    $params = array(
      'id' => $id,
      'contact_person' => $this->input->post('contactPerson'),
      'tanggal_mulai' => $this->input->post('tglAwal'),
      'tanggal_akhir' => $this->input->post('tglAkhir'),
      'deskripsi' => $this->input->post('deskripsi'),
      'bidang_keahlian' => $this->input->post('keahlian')
    );
    $this->Loker_model->updateLoker($params);
    $this->session->set_flashdata('msg', 'Loker berhasil di-edit!');
  }
    $data['loker'] = $this->Loker_model->get_loker($id);
    $this->load->template('loker/form_edit_loker', $data);
}

public function aplikasi_alumni($id)
{
  $data['loker'] = $this->Loker_model->get_loker($id);
  $this->load->template('loker/aplikasi_alumni', $data);
}

public function list_loker()
{
  $data['loker'] = $this->Loker_model->list_loker();
  $this->load->template('loker/daftar_loker.php', $data);
}

}
