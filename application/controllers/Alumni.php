<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output data/informasi dan detail alumni
 */
class Alumni extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('alumni_model');
    $this->load->model('mitra_model');
    $this->load->model('testimoni_model');

      //
      // $con=new mysqli($this->db->hostname,$this->db->username,$this->db->password,$this->db->database);
      // if($con->connect_error){
      //     echo 'Connection Faild: '.$con->connect_error;
      //     }else{
      //         $sql="select * from alumni where email like '%$email%'";
      //
      //         $res=$con->query($sql);
      //
      //         while($row=$res->fetch_assoc()){
      //             $nimhs = $row["nimhs"];
      //         }
      //       }
      //
      // $newdata = array
      // (
      //    'email'     => $email,
      //    'nimhs' => $nimhs,
      // );
      //
      // $this->session->set_userdata($newdata);
      //
      // if(!isset($_SESSION))
      // {
      //    session_start();
      // }

  }

  public function index()
  {
    $data['public'] = true;
    $data['last_yudisium'] = $this->alumni_model->lastYudisium();
    $data['list_yudisium'] = $this->alumni_model->listYudisium();
    $this->load->template( 'alumni/list_alumni', $data);
  }

  // modified
	public function pendidikan( $type, $idpendidikan = '' ) {

		$data['kota']=$this->alumni_model->kota();
	  $data['negara']=$this->alumni_model->negara();

    //added by Sofyan Thayf
    $data['alumnus'] = $this->alumni_model->alumnus( $this->session->uid );
    $data['type'] = $type;

    if( $idpendidikan != '') {
      $data['pendidikan'] = $this->alumni_model->getDataPendidikan( $idpendidikan );
    }

    $this->load->template('alumni/pendidikan_view',$data);

  }


  // public function cv() {
  //
  //   $nimhs = $_SESSION["nimhs"];
  //
  //   $angkatan = substr($nimhs,3,2);
  //   $prodi = substr($nimhs, 0,3);
  //
  //
  //   $filenama = 'assets/img/alumni/'.$angkatan. '/' .$prodi. '/' .$nimhs. '.jpg';
  //
  //   if (file_exists(FCPATH.$filenama)) {
  //     $data['foto'] = base_url().$filenama;
  //   } else {
  //       $data['foto'] = 'https://siska.kharisma.ac.id//assets//img//foto//mhs//'.$angkatan.'/'.$prodi.'//'.$nimhs.'.jpg';
  //
  //   };
  //
  //   $this->load->model('Alumni_model');
  //   $data['datadiri'] = $this->Alumni_model->GetDataDiri($nimhs);
  //   $data['record'] = $this->Alumni_model->GetDataSertifikat($nimhs);
  //   $data['pendidikanformal'] = $this->Alumni_model->GetDataPendFormal($nimhs);
  //   $data['pendidikannonformal'] = $this->Alumni_model->GetDataPendNonFormal($nimhs);
  //   $data['riwayatpekerjaan'] = $this->Alumni_model->GetDataRiwayatPekerjaan($nimhs);
  //
  //   $this->load->template('alumni/cv_view',$data);
  //
  // }


  // public function insert_pendidikan() {
  //     $date = date_create();
  //     if (isset($_POST['add'])) {
  //       $data1 = implode(',',$_POST['level_cat']);
  //     };
  //     if (isset($_POST['add'])) {
  //       $data2 = implode(',',$_POST['jenis_cat']);
  //     };
	//     $data = array('id_pendidikan' => date_timestamp_get($date),
  //                   'nimhs' => $_SESSION["nimhs"],
  //                   'institusi' => $this->input->post('institusi',true),
	//                   'kota' => $this->input->post('kota',true),
	//                   'negara' => $this->input->post('negara',true),
	//                   'program_studi' => $this->input->post('progstudi',true),
	//                   'gelar' => $this->input->post('gelar',true),
	//                   'gelar_singkat' => $this->input->post('gelarsingkat',true),
  //                   'level' => $data1,
  //                   'formal' => $data2,
	//                   'tanggal_mulai' => $this->input->post('tglmulai',true),
	//                   'tanggal_lulus' => $this->input->post('tgllulus',true));
	//     $insert = $this->alumni_model->prosesInsert('pendidikan_alumni',$data);
  //     echo '<script>alert("You Have Successfully updated this Record!");</script>';
  //     redirect('Alumni/pendidikan','refresh');
  // }

  // modified by Sofyan Thayf
	public function insert_pendidikan() {

      // $date = date_create();

      // if (isset($_POST['add'])) {
      //   $data1 = implode(',',$_POST['level_cat']);
      // };
      //
      // if (isset($_POST['add'])) {
      //   $data2 = implode(',',$_POST['jenis_cat']);
      // };

	    $data = array('id_pendidikan' => date('U'),
                    'nimhs' => $this->session->uid,
                    'institusi' => $this->input->post('institusi',true),
	                  'kota' => ($this->input->post('dnln')=='D'?$this->input->post('kotaid',true):$this->input->post('kotaln',true)),
	                  'negara' => $this->input->post('negara',true),
	                  'program_studi' => $this->input->post('progstudi',true),
	                  'gelar' => $this->input->post('gelar',true),
	                  'gelar_singkat' => $this->input->post('gelarsingkat',true),
                    'level' => $this->input->post('level',true),
                    'formal' => $this->input->post('jenis',true),
                    'tanggal_mulai' => date('Y-m-d',strtotime($this->input->post('tglmulai',true))),
                    'tanggal_lulus' => (!empty($this->input->post('tgllulus')) && $this->input->post('tgllulus')!='0000-00-00')?
                                        date('Y-m-d',strtotime($this->input->post('tgllulus',true))):null
                  );

	    $insert = $this->alumni_model->prosesInsert('pendidikan_alumni',$data);

      // echo '<script>alert("You Have Successfully updated this Record!");</script>';

      redirect('/alumni/'.$this->session->uid,'refresh');
    }

  private function pdfrender( $file ){
    $this->pdf->render();
    $this->pdf->stream( $file, array('Attachment'=>0) );
  }

  private function pdfoutput( $path ){
      $this->pdf->render();
      file_put_contents( $path, $this->pdf->output());
  }

  // public function cetakcv(){
  //
  //   $nimhs = $_SESSION["nimhs"];
  //
  //   $angkatan = substr($nimhs,3,2);
  //   $prodi = substr($nimhs, 0,3);
  //
  //
  //   $filenama = 'assets/img/alumni/'.$angkatan. '/' .$prodi. '/' .$nimhs. '.jpg';
  //
  //   if (file_exists(FCPATH.$filenama)) {
  //     $data['foto'] = base_url().$filenama;
  //   } else {
  //       $data['foto'] = 'https://siska.kharisma.ac.id//assets//img//foto//mhs//'.$angkatan.'/'.$prodi.'//'.$nimhs.'.jpg';
  //
  //   };
  //
  //   $this->load->model('Alumni_model');
  //   $data['record'] = $this->Alumni_model->GetDataSertifikat($nimhs);
  //   $data['pendidikanformal'] = $this->Alumni_model->GetDataPendFormal($nimhs);
  //   $data['pendidikannonformal'] = $this->Alumni_model->GetDataPendNonFormal($nimhs);
  //   $data['riwayatpekerjaan'] = $this->Alumni_model->GetDataRiwayatPekerjaan($nimhs);
  //   $data['datadiri'] = $this->Alumni_model->GetDataDiri($nimhs);
  //
  //   // $this->load->view('alumni/cetakcv_view',$data);
  //
  //   // $this->output->set_content_type('application/pdf')->set_output(file_get_contents(
	// 	$this->pdf->load_view('alumni/cetakcv_view',$data);
  //   $this->pdfrender('CV_'.$nimhs.'.pdf');
  //
  //
  // }

  public function dataalumni()
  {
    $this->load->template('alumni/dataalumni');
  }


  // created by Sofyan Thayf

  function detailalumni( $nimhs, $pdf = '' )
  {
    $data['public'] = true;
    $data['alumnus'] = $this->alumni_model->alumnus( $nimhs );

    if( $pdf != 'pdf' ){

      $this->load->template('alumni/cv_view',$data);

    } else {

    	$this->pdf->load_view('alumni/cvpdf_view',$data);
      $this->pdfrender('CV_'.$nimhs.'_'.date('Ymd').'.pdf');

    }
  }

  public function updatealumnus()
  {
    $data_alumni = array(
                      'tplahir' => $this->input->post('tp_lahir'),
                      'tglahir' => (!empty($this->input->post('tgl_lahir'))?date('Y-m-d', strtotime($this->input->post('tgl_lahir'))):null),
                      'sex' => $this->input->post('jkel'),
                      'agama' => $this->input->post('pagama'),
                      'alamat_rumah' => $this->input->post('alamat'),
                      'distrik_rumah' => $this->input->post('iddesakelurahan'),
                      'kodepos' => $this->input->post('kodepos'),
                      'telepon' => $this->input->post('notelp'),
                      'telepon2' => $this->input->post('notelp2'),
                      'website' => $this->input->post('urlwebsite'),
                      'facebook' => $this->input->post('urlfacebook'),
                      'linkedin' => $this->input->post('urllinkedin'),
                      'scholar' => $this->input->post('urlscholar'),
                    );

    $this->alumni_model->updatealumnus( $data_alumni, $this->session->uid );

    redirect( '/alumni/'.$this->session->userdata('uid') );

  }

  public function update_pendidikan() {

      $data = array('nimhs' => $this->session->uid,
                    'institusi' => $this->input->post('institusi',true),
                    'kota' => ($this->input->post('dnln')=='D'?$this->input->post('kotaid',true):$this->input->post('kotaln',true)),
                    'negara' => $this->input->post('negara',true),
                    'program_studi' => $this->input->post('progstudi',true),
                    'gelar' => $this->input->post('gelar',true),
                    'gelar_singkat' => $this->input->post('gelarsingkat',true),
                    'level' => $this->input->post('level',true),
                    'formal' => $this->input->post('jenis',true),
                    'tanggal_mulai' => date('Y-m-d',strtotime($this->input->post('tglmulai',true))),
                    'tanggal_lulus' => (!empty($this->input->post('tgllulus')) && $this->input->post('tgllulus')!='0000-00-00')?
                                        date('Y-m-d',strtotime($this->input->post('tgllulus',true))):null
                  );
      $where = array( 'id_pendidikan' => $this->input->post('id') );
      $update = $this->alumni_model->prosesUpdate('pendidikan_alumni',$data, $where);

      redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function hapus_pendidikan($id) {
      $where = array( 'id_pendidikan' => $id );
      $delete = $this->alumni_model->prosesDelete('pendidikan_alumni', $where);

      redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function sertifikasi( $idsertifikasi = '' ) {

		$data['kota']=$this->alumni_model->kota();
	  $data['negara']=$this->alumni_model->negara();
	  $data['bdgkeahlian']=$this->alumni_model->bdgkeahlian();

    //added by Sofyan Thayf
    $data['alumnus'] = $this->alumni_model->alumnus( $this->session->uid );

    if( $idsertifikasi != '') {
      $data['sertifikasi'] = $this->alumni_model->getDataSertifikasi( $idsertifikasi );
    }

    $this->load->template('alumni/sertifikat_view',$data);

  }

  public function insert_sertifikasi()
  {
    $data = array(
              'id_sertifikat' => date('U'),
              'nimhs' => $this->session->uid,
              'nomor_sertifikat' => $this->input->post('nosertif'),
              'tanggal_sertifikat' => (!empty($this->input->post('tglsertif')) && $this->input->post('tglsertif')!='0000-00-00')?
                                  date('Y-m-d',strtotime($this->input->post('tglsertif',true))):null ,
              'tanggal_expire' => (!empty($this->input->post('tglexpire')) && $this->input->post('tglexpire')!='0000-00-00')?
                                  date('Y-m-d',strtotime($this->input->post('tglexpire',true))):null ,
              'judul_sertifikat' => $this->input->post('judulsertif'),
              'bidang_keahlian' => $this->input->post('bdgkeahlian'),
              'lembaga_penerbit' => $this->input->post('lembaga'),
              'negara' => $this->input->post('negara')
          );
    $insert = $this->alumni_model->prosesInsert('sertifikat_alumni',$data);
    redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function update_sertifikasi()
  {
    $data = array(
              'nimhs' => $this->session->uid,
              'nomor_sertifikat' => $this->input->post('nosertif'),
              'tanggal_sertifikat' => (!empty($this->input->post('tglsertif')) && $this->input->post('tglsertif')!='0000-00-00')?
                                  date('Y-m-d',strtotime($this->input->post('tglsertif',true))):null ,
              'tanggal_expire' => (!empty($this->input->post('tglexpire')) && $this->input->post('tglexpire')!='0000-00-00')?
                                  date('Y-m-d',strtotime($this->input->post('tglexpire',true))):null ,
              'judul_sertifikat' => $this->input->post('judulsertif'),
              'bidang_keahlian' => $this->input->post('bdgkeahlian'),
              'lembaga_penerbit' => $this->input->post('lembaga'),
              'negara' => $this->input->post('negara')
          );

    $where = array( 'id_sertifikat' => $this->input->post('id') );
    $update = $this->alumni_model->prosesUpdate('sertifikat_alumni',$data, $where);
    redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function hapus_sertifikasi($id) {
      $where = array( 'id_sertifikat' => $id );
      $delete = $this->alumni_model->prosesDelete('sertifikat_alumni', $where);

      redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function karya( $idkarya = '' ) {

    $data['alumnus'] = $this->alumni_model->alumnus( $this->session->uid );

    if( $idkarya != '') {
      $data['karya'] = $this->alumni_model->getDataKarya( $idkarya );
    }

    $this->load->template('alumni/karya_dan_publikasi',$data);

  }

  public function insert_karya()
  {
    $data = array(
              'id_karya' => date('U'),
              'nimhs' => $this->session->uid,
              'judul' => $this->input->post('judul'),
              'forum' => $this->input->post('media'),
              'edisi' => $this->input->post('edisi'),
              'tanggal_rilis' => (!empty($this->input->post('tglterbit')) && $this->input->post('tglterbit')!='0000-00-00')?
                                    date('Y-m-d',strtotime($this->input->post('tglterbit',true))):null ,
              'publisher' => $this->input->post('publisher'),
              'jenis' => $this->input->post('jenis'),
              'url' => $this->input->post('linkurl')
          );
    $insert = $this->alumni_model->prosesInsert('karya_alumni',$data);
    redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function update_karya()
  {
    $data = array(
              'nimhs' => $this->session->uid,
              'judul' => $this->input->post('judul'),
              'forum' => $this->input->post('media'),
              'edisi' => $this->input->post('edisi'),
              'tanggal_rilis' => (!empty($this->input->post('tglterbit')) && $this->input->post('tglterbit')!='0000-00-00')?
                                    date('Y-m-d',strtotime($this->input->post('tglterbit',true))):null ,
              'publisher' => $this->input->post('publisher'),
              'jenis' => $this->input->post('jenis'),
              'url' => $this->input->post('linkurl')
          );

    $where = array( 'id_karya' => $this->input->post('id') );
    $update = $this->alumni_model->prosesUpdate('karya_alumni',$data, $where);
    redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function hapus_karya($id) {
      $where = array( 'id_karya' => $id );
      $delete = $this->alumni_model->prosesDelete('karya_alumni', $where);

      redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function pekerjaan( $mitra='', $cabang='' ) {

    $data['alumnus'] = $this->alumni_model->alumnus( $this->session->uid );
    $data['industri'] = $this->mitra_model->daftarIndustri();
    $data['negara']=$this->alumni_model->negara();

    if( $mitra != '' ) {
      $data['pekerjaan'] = $this->alumni_model->GetDataPekerjaan( $this->session->uid, $mitra, $cabang );
      $data['referensi'] = $this->alumni_model->GetCPReferensi( $this->session->uid, $mitra, $cabang );
      $data['logomitra'] = $this->mitra_model->logo_mitra( $mitra );
    }

    $this->load->template('alumni/pekerjaan_view',$data);

  }

  public function insert_pekerjaan()
  {

    $id_mitra = !empty($this->input->post('id_mitra')) ? $this->input->post('id_mitra') : date('U');
    $id_cabang = !empty($this->input->post('id_cabang')) ? $this->input->post('id_cabang') : '';

    // tambah perusahaan mitra
    if( empty( $this->input->post('id_mitra') ) ){
      $datakp = array(
                'id_mitra' => $id_mitra,
                'nama_perusahaan' => $this->input->post('perusahaan'),
                'brand' => $this->input->post('brand'),
                'statusbh' => $this->input->post('statusbh'),
                'bidang_usaha' => $this->input->post('industri'),
                'alamat_kantor_pusat' => $this->input->post('alamatkp'),
                'kota_kantor_pusat' => $this->input->post('kotakp'),
                'ln_kota' => $this->input->post('kotaln'),
                'ln_negara' => $this->input->post('negaraln'),
                'telepon_kantor_pusat' => $this->input->post('teleponkp'),
                'kodepos_kantor_pusat' => $this->input->post('kodeposkp'),
                'website' => $this->input->post('website')
              );
        $insertkp = $this->alumni_model->prosesInsert('mitra',$datakp);
    }

    // tambah kantor cabang
    if( empty( $this->input->post('id_cabang') ) && $this->input->post('isoncabang') == 1 ){
      $id_cabang = date('U') + 1;
      $datakc = array(
                'id_mitra' => $id_mitra,
                'id_cabang' => $id_cabang ,
                'nama_cabang' => $this->input->post('namakc'),
                'alamat_cabang' => $this->input->post('alamatkc'),
                'kota_cabang' => $this->input->post('kotakc'),
                'telepon_cabang' => $this->input->post('teleponkc'),
                'kodepos_cabang' => $this->input->post('kodeposkc')
              );
     $insertkc = $this->alumni_model->prosesInsert('mitra_cabang',$datakc);
    }

    // simpan data pekerjaan
    $datapk = array(
                'nimhs' => $this->session->uid,
                'mitra' => $id_mitra,
                'cabang_mitra' => $id_cabang,
                'divisi' => $this->input->post('divisikerja'),
                'pangkat_golongan' => $this->input->post('pangkatgol'),
                'jabatan' => $this->input->post('jabatan'),
                'bidang_keahlian' => $this->input->post('bidangahli'),
                'responsibility' => $this->input->post('responsibility'),
                'level_gaji' => $this->input->post('levelgaji'),
                'status_kerja' => $this->input->post('statuskerja'),
                'tanggal_awal' => date('Y-m-d', strtotime($this->input->post('tglmulaikerja'))),
                'tanggal_akhir' => ( !empty($this->input->post('tglakhirkerja')) && $this->input->post('tglakhirkerja')!='0000-00-00' ) ?
                                      date('Y-m-d', strtotime($this->input->post('tglakhirkerja'))):null
              );

    if( empty( $this->alumni_model->getDataPekerjaan($this->session->uid, $id_mitra, $id_cabang) )){
      $insertpk = $this->alumni_model->prosesInsert('mitra_alumni',$datapk);
    }

    // jika masih bekerja, tambahkan contact person
    if( empty($this->input->post('tglakhirkerja')) ){
      redirect('/alumni/referensi/'.$id_mitra.'/'.$id_cabang);
    } else {
      redirect('/alumni/'.$this->session->uid,'refresh');
    }
  }

  public function update_pekerjaan()
  {
    $where = array();
    $where['nimhs'] = $this->session->uid;
    $where['mitra'] = $this->input->post('id_mitra');

    if ( !empty( $this->input->post('id_cabang') )) {
      $where['cabang_mitra'] = $this->input->post('id_cabang');
    }

    $datapk = array(
                'divisi' => $this->input->post('divisikerja'),
                'pangkat_golongan' => $this->input->post('pangkatgol'),
                'jabatan' => $this->input->post('jabatan'),
                'bidang_keahlian' => $this->input->post('bidangahli'),
                'responsibility' => $this->input->post('responsibility'),
                'level_gaji' => $this->input->post('levelgaji'),
                'status_kerja' => $this->input->post('statuskerja'),
                'tanggal_awal' => date('Y-m-d', strtotime($this->input->post('tglmulaikerja'))),
                'tanggal_akhir' => ( !empty($this->input->post('tglakhirkerja')) && $this->input->post('tglakhirkerja')!='0000-00-00' ) ?
                                      date('Y-m-d', strtotime($this->input->post('tglakhirkerja'))):null
              );

    $update = $this->alumni_model->prosesUpdate('mitra_alumni', $datapk, $where);

    // jika masih bekerja, tambahkan contact person jika belum ada
    $ref = $this->alumni_model->GetCPReferensi( $this->session->uid, $where['mitra'], (isset($where['cabang_mitra'])?$where['cabang_mitra']:'') );
    if( empty($this->input->post('tglakhirkerja')) && empty($ref) ){
      redirect( '/alumni/referensi/'.$where['mitra'].'/'.$where['cabang_mitra'] );
    } else {
      redirect('/alumni/'.$this->session->uid,'refresh');
    }
  }

  public function hapus_pekerjaan( $mitra, $cabang='') {
      $where = array();
      $where['nimhs'] = $this->session->uid;
      $where['mitra'] = $mitra;

      if ($cabang != '') {
        $where['cabang_mitra'] = $cabang;
      }

      $delete = $this->alumni_model->prosesDelete('mitra_alumni', $where);
      redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function tambah_referensi( $mitra, $cabang='' )
  {
    $data['alumnus'] = $this->alumni_model->alumnus( $this->session->uid );
    $data['mitra'] = $mitra;
    $data['logomitra'] = $this->mitra_model->logo_mitra( $mitra );
    $data['cabang'] = $cabang;
    $this->load->template('alumni/referensi_view',$data);
  }

  public function simpan_referensi()
  {
    $alumnus = $this->alumni_model->alumnus( $this->session->uid );
    $cpmitra = $this->input->post('mitra');
    $cpcabang = $this->input->post('cabang');

    foreach ($alumnus['pekerjaan'] as $key => $value) {
      if( $value['mitra']==$cpmitra && $value['cabang_mitra']==$cpcabang ){
        $perusahaan = $value['nama_perusahaan'];
        $divisialumni = $value['divisi'];
        $cabangalumni = $value['nama_cabang'];
      }
    }
    // untuk 3 contact person
    for($r=1 ; $r<=3 ; $r++){

      if( !empty($this->input->post('email_p'.$r)) && !empty($this->input->post('nama_p'.$r)) ){

        $cpemail = $this->input->post('email_p'.$r);
        $pass = random_string('alnum', 10);

        $id_penilaian = date('U') + 5 + $r;
        $link = 'referensi/'.$id_penilaian.$cpmitra;

        // echo $cpemail." - ".$pass." - ".$link."<br>";

        // jika contact person belum pernah terdaftar
        if( !$this->mitra_model->cpRegistered( $cpemail, $cpmitra ) ){

          $datacp = array(
            'id' => date('U')+$r,
            'mitra' => $cpmitra,
            'cabang_mitra' => $this->input->post('cabang'),
            'email' => $cpemail,
            'nama' => $this->input->post('nama_p'.$r),
            'sex' => $this->input->post('jkel_p'.$r),
            'nomor_hp' => $this->input->post('telp_p'.$r),
            'divisi' => $this->input->post('divisi_p'.$r),
            'jabatan' => $this->input->post('jabatan_p'.$r)
          );

          $datausr = array(
            'email' => $cpemail,
            'status' => 1,
            'password' => md5( $pass )
          );

          $insertcp = $this->alumni_model->prosesInsert('contact_person', $datacp);
          $insertusr = $this->alumni_model->prosesInsert('users', $datausr);
        }

        $dataref = array(
          'id_penilaian' => $id_penilaian,
          'email_contactperson' => $cpemail,
          'id_mitra' => $cpmitra,
          'id_cabang' => $this->input->post('cabang'),
          'nimhs' => $this->session->uid
        );
        $insertref = $this->alumni_model->prosesInsert('penilaian_alumni',$dataref);


        // kirim email
        $contact['email'] = $cpemail;
        $contact['pass'] = $pass;
        $contact['link'] = base_url().$link;
        $contact['nama'] = $this->input->post('nama_p'.$r);
        $contact['jabatan'] = $this->input->post('jabatan_p'.$r);
        $contact['perusahaan'] = $perusahaan;
        $contact['sex'] = $this->input->post('jkel_p'.$r);
        $contact['alumni'] = $alumnus['namamhs'];
        $contact['divisialumni'] = $divisialumni;
        $contact['cabangalumni'] = $cabangalumni;

        $maildata['to'] = $cpemail;
        $maildata['subject'] = "Referensi Karyawan";
        $maildata['message'] = $this->load->view('emails/mohonpenilaian', $contact, true);;

        $sent = $this->mylib->sendEmail( $maildata );

      }

    }

    redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function update_foto()
  {
    $data['alumnus'] = $this->alumni_model->alumnus( $this->session->uid );
    $this->load->template('alumni/update_foto', $data);
  }

  public function upload_foto()
  {
    $th = substr($this->session->uid,3,2);
    $pr = substr($this->session->uid, 0,3);
    $ext = pathinfo($_FILES['filefoto']['name'], PATHINFO_EXTENSION);
    $path = './assets/img/alumni/';

    if ( !file_exists( $path.'/'.$th ) ) mkdir( $path.'/'.$th , 0755, true);
    if ( !file_exists( $path.'/'.$th.'/'.$pr ) ) mkdir( $path.'/'.$th.'/'.$pr , 0755, true );

    $file = $this->session->uid.".".$ext;
    move_uploaded_file( $_FILES['filefoto']['tmp_name'], './assets/img/alumni/'.$th.'/'.$pr.'/'.$file );

    redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function testmail()
  {
    $contact['email'] = "sofyan.thayf@kharisma.ac.id";
    $contact['pass'] = "ABcdeFGhiJ";
    $contact['link'] = base_url().'referensi';
    $contact['nama'] = 'Mohammad Sofyan Thayf';
    $contact['sex'] = 'L';
    $contact['alumni'] = 'Melinda, S.Kom.';
    $contact['divisi'] = 'Customer Services';

    $maildata['to'] = "sofyan.thayf@kharisma.ac.id";
    $maildata['subject'] = "Test Email";
    $maildata['message'] = $this->load->view('emails/mohonpenilaian', $contact, true);
    echo $this->mylib->sendEmail( $maildata );

  }

}
