<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output data/informasi perusahaan mitra
 * pengguna alumni
 */
class Mitra extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('mitra_model');
  }

  public function formeditcontactperson()
  {
    if (isset($_POST['simpan']))
    {
      $params = array(
        'email' => $this->session->userdata('email'),
        'nama' => strtoupper($this->input->post('nama')),
        'nomor_hp' => $this->input->post('nomor_hp'),
        'mitra' => $this->input->post('mitra'),
        'cabang_mitra' => $this->input->post('cabang_mitra'),
        'divisi' => $this->input->post('divisi')
      );
      $this->mitra_model->update_contactperson($params);
      $this->session->set_flashdata('msg', 'Data berhasil di-edit!');
    }
    //$this->session->set_userdata('email','test@google.com');
    $email = $this->session->userdata('email');

    $data['datacontact'] = $this->mitra_model->formeditcontactperson($email);
    $data['datamitra'] = $this->mitra_model->daftar_mitra();
    $data['datacabangmitra'] = $this->mitra_model->daftar_cabang_mitra();

    $this->load->template('mitra/form_edit_contact_person',$data);
  }

  public function formeditperusahaan()
  {
    if (isset($_POST['simpan']))
    {
      $params = array(
        'id_mitra' => $this->session->userdata('mitra'),
        'nama_perusahaan' => $this->input->post('nama_perusahaan'),
        'brand' => $this->input->post('brand'),
        'alamat_kantor_pusat' => $this->input->post('alamat_kantor_pusat'),
        'telepon_kantor_pusat' => $this->input->post('telepon_kantor_pusat'),
        'kodepos' => $this->input->post('kodepos'),
        'website' => $this->input->post('website')
      );
      $this->mitra_model->update_mitra($params);
      $this->session->set_flashdata('msg', 'Data berhasil di-edit!');
    }
    //$this->session->set_userdata('mitra','1547623316');
    $mitra = $this->session->userdata('mitra');
    $data['datamitra'] = $this->mitra_model->info_mitra($mitra);
    $this->load->template('mitra/form_edit_perusahaan', $data);
  }

  public function formeditkantorcabang()
  {
    $this->load->template('mitra/form_edit_kantor_cabang');
  }
}
