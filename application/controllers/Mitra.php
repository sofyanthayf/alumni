<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output data/informasi perusahaan mitra
 * pengguna alumni
 */
class Mitra extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
		$this->load->model('mitra_model');
		$this->load->model('alumni_model');
		$this->load->model('testimoni_model');
	}

  // public function formPenilaianKinerja($nimhs)
  // {
  //   $mitra = $this->session->userdata('mitra');
  //   $data['mitraalumni'] =  $this->mitra_model->form_kinerja($mitra,$nimhs);
  //   $this->load->template('mitra/form_input_kinerja_karyawan', $data);
  // }

  // public function insert_penilaian()
  // {
  //   $date=date_create();
  //   if (isset($_POST['simpan'])) {
  //     $nilai1 = implode(',',$_POST['nilaietika']);
  //   };
  //   if (isset($_POST['simpan'])) {
  //     $nilai2 = implode(',',$_POST['nilaikeahlian']);
  //   };
  //   if (isset($_POST['simpan'])) {
  //     $nilai3 = implode(',',$_POST['nilaibahasa']);
  //   };
  //   if (isset($_POST['simpan'])) {
  //     $nilai4 = implode(',',$_POST['nilaiteknologi']);
  //   };
  //   if (isset($_POST['simpan'])) {
  //     $nilai5 = implode(',',$_POST['nilaikomunikasi']);
  //   };
  //   if (isset($_POST['simpan'])) {
  //     $nilai6 = implode(',',$_POST['nilaikerjasama']);
  //   };
  //   if (isset($_POST['simpan'])) {
  //     $nilai7 = implode(',',$_POST['nilaipengembangandiri']);
  //   };
  //   $data = array('id_penilaian' => date_timestamp_get($date),
  //                 'email_contactperson' => $this->session->userdata('email'),
  //                 'id_mitra' => $this->session->userdata('mitra'),
  //                 'nimhs' => $this->input->post('nimhs',true),
  //                 'k1' => $nilai1,
  //                 'k2' => $nilai2,
  //                 'k3' => $nilai3,
  //                 'k4' => $nilai4,
  //                 'k5' => $nilai5,
  //                 'k6' => $nilai6,
  //                 'k7' => $nilai7,
  //                 'saran1' => $this->input->post('saran1',true),
  //                 'saran2' => $this->input->post('saran2',true)
  //                 );
  //   $insert = $this->mitra_model->prosesInsert('penilaian_alumni',$data);
  //   echo '<script>alert("You Have Successfully Updated This Record!");</script>';
  // }


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


  // added by Sofyan Thayf:

  public function detailmitra( $id_mitra )
  {
    $data['public'] = true;

    $data['mitra'] = $this->mitra_model->info_mitra( $id_mitra );

    if( $this->session->who == 'ad' ) {
      $data['alumni'] = $this->mitra_model->alumniByMitra( $id_mitra );
    }

    $this->load->template( 'mitra/mitra_detail', $data );
  }

  public function edit_mitra( $id_mitra )
  {
    $data['public'] = true;

    $data['mitra'] = $this->mitra_model->info_mitra( $id_mitra );
    $data['industri'] = $this->mitra_model->daftarIndustri();
    $this->load->template( 'mitra/mitra_edit', $data );
  }

  public function simpanupdate_mitra()
  {
    $data = $this->input->post();
    $data['request_id'] = date('U');
    $data['request_cp'] = $this->session->uid;
    var_dump( $data );

    $insert = $this->mitra_model->prosesInsert('mitra_update', $data );
    redirect('/contactperson' );
  }

  public function update_logo( $id_mitra )
  {
    $data['mitra'] = $this->mitra_model->info_mitra( $id_mitra );
    $this->load->template( 'mitra/update_logo', $data );
  }

  public function upload_logo()
  {
    $ext = pathinfo($_FILES['filelogo']['name'], PATHINFO_EXTENSION);
    $path = './assets/img/mitra/';

    $file = $this->input->post('id_mitra') . "." . $ext;
    move_uploaded_file( $_FILES['filelogo']['tmp_name'], $path.$file );

    redirect('/mitra/usulanedit/'.$this->input->post('id_mitra') , 'refresh');
  }


  public function penilaian_kinerja($kode)
  {
    $id_referensi = substr($kode,0,10);
    $id_mitra = substr($kode,-10);

    $data['contactperson'] = $this->mitra_model->contactPersonByReferensi($id_referensi);

    //jika belum login, simpan data $kode dan arahkan ke form login
    if( !isset( $this->session->uid ) ){

      $this->session->koderef = $kode;
      redirect('/mitra/login');

    } elseif ( $data['contactperson']['id'] != $this->session->uid ) {
      // tidak berhak memberikan penilaian

      redirect('/contactperson' );

    } else {

      $data['alumnus'] = $this->alumni_model->alumnus( $data['contactperson']['nimhs'] );
      $data['pekerjaan'] = $this->alumni_model->GetDataPekerjaan( $data['contactperson']['nimhs'],
                                                                  $data['contactperson']['id_mitra'],
                                                                  $data['contactperson']['id_cabang'] );
      $data['logomitra'] = $this->mitra_model->logo_mitra( $data['contactperson']['id_mitra'] );

      $data['penilaian'] = $this->mitra_model->getPenilaian( $id_referensi );

      $this->load->template('mitra/form_input_kinerja_karyawan', $data);

    }

  }

  public function insert_penilaian()
  {
    $where = array( 'id_penilaian' => $this->input->post('ref_id',true) );

    $data = array();

    for($i=1 ; $i<=8 ; $i++ ){
      $data[ 'k'.$i ] = $this->input->post( 'nilai'.$i , true );
    }

    $data['saran1'] = $this->input->post('saran1',true);
    $data['saran2'] = $this->input->post('saran2',true);

    if( $this->input->post('publish')==1 ){
        $data['publish'] = 1;
        $data['tanggal_publish'] = date('Y-m-d');
    }

    $update = $this->mitra_model->prosesUpdate('penilaian_alumni', $data, $where);

    redirect('/contactperson','refresh');
  }


  public function detail_cp()
  {
    $data['cp'] = $this->mitra_model->cpRegisteredById( $this->session->uid );
    $data['mitra'] = $this->mitra_model->info_mitra( $data['cp']['mitra'] );

    if( !empty($data['cp']['cabang_mitra']) ){
      $data['cabang'] = $this->mitra_model->info_mitra( $data['cp']['cabang_mitra'] );
    }

    if( $data['cp']['id'] != $this->session->uid ){
      redirect("/");
    }

    $this->load->template('mitra/contact_person', $data);
  }

  public function edit_cp()
  {
    $data['cp'] = $this->mitra_model->cpRegisteredById( $this->session->uid );
    $data['mitra'] = $this->mitra_model->info_mitra( $data['cp']['mitra'] );

    if( $data['cp']['id'] != $this->session->uid ){
      redirect("/");
    }

    $this->load->template('mitra/cp_edit', $data);
  }

  public function update_cp()
  {
    $data = array(
              'nama' => $this->input->post('nama'),
              'jabatan' => $this->input->post('jabatan'),
              'divisi' => $this->input->post('divisi'),
              'nomor_hp' => $this->input->post('nomorhp'),
            );

    $where = array( 'id' => $this->session->uid );
    $update = $this->mitra_model->prosesUpdate('contact_person', $data, $where);

    redirect('/contactperson','refresh');
  }


}
