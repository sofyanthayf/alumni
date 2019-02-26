<?php

class Alumni_model extends CI_Model {

  private $alumnus;

  public function __construct() {
      parent::__construct();
      $this->load->model('regional_model');
      $this->load->model('testimoni_model');
  }

  public function getDataSertifikat($nimhs){
     $this->db->select('sertifikat_alumni.id_sertifikat,sertifikat_alumni.judul_sertifikat,sertifikat_alumni.nomor_sertifikat,sertifikat_alumni.tanggal_sertifikat,sertifikat_alumni.tanggal_expire');
     $this->db->select('bidang_keahlian.keahlian, sertifikat_alumni.lembaga_penerbit');
     $this->db->from('sertifikat_alumni');
     $this->db->join('bidang_keahlian', 'sertifikat_alumni.bidang_keahlian = bidang_keahlian.kode');
     $this->db->where('nimhs',$nimhs);
     $query = $this->db->get();

     return $query->result_array();
  }

  public function GetDataPendFormal($nimhs){
     // $this->db->select('pendidikan_alumni.gelar_singkat,pendidikan_alumni.institusi,pendidikan_alumni.program_studi,pendidikan_alumni.tanggal_mulai,pendidikan_alumni.tanggal_lulus');
     // $this->db->from('pendidikan_alumni');
     // $this->db->where('nimhs',$nimhs);
     // $this->db->where('formal =', '1');
     // $query = $this->db->get();

     $pformal = array();

     // salah satu pendidikan formal alumni adalah pada STMIK KHARISMA Makassar, otomatis :)
     $pformal[] = array(
                    'id_pendidikan' => '',
                    'institusi' => 'STMIK KHARISMA',
                    'kota' => 'Makassar',
                    'program_studi' => 'Program '.
                                        $this->mylib->program_studi[ $this->alumnus['prodi'] ]['program']." ".
                                        $this->mylib->program_studi[ $this->alumnus['prodi'] ]['nama'],
                    'gelar' => $this->mylib->program_studi[ $this->alumnus['prodi'] ]['gelar'],
                    'gelar_singkat' => $this->mylib->program_studi[ $this->alumnus['prodi'] ]['gelarsingkat'],
                    'level' => $this->mylib->program_studi[ $this->alumnus['prodi'] ]['program'],
                    'formal' => '1',
                    'tanggal_mulai' => $this->alumnus['tanggal_masuk'],
                    'tanggal_lulus' => $this->alumnus['tanggal_sk_yudisium']
                   );

     $this->db->where('nimhs',$nimhs);
     $this->db->where('formal', '1');
     $this->db->order_by('tanggal_mulai', 'ASC');
     $query = $this->db->get('pendidikan_alumni');


     return array_merge( $pformal, $query->result_array() );
  }

  public function GetDataPendNonFormal($nimhs){
     // $this->db->select('pendidikan_alumni.gelar_singkat,pendidikan_alumni.institusi,pendidikan_alumni.program_studi,pendidikan_alumni.tanggal_mulai,pendidikan_alumni.tanggal_lulus');
     // $this->db->from('pendidikan_alumni');
     $this->db->where('nimhs',$nimhs);
     $this->db->where('formal', '2');
     $this->db->order_by('tanggal_lulus', 'desc');
     $query = $this->db->get('pendidikan_alumni');

     return $query->result_array();
  }

  public function GetDataRiwayatPekerjaan($nimhs){
     // $this->db->select('mitra.nama_perusahaan,mitra_alumni.jabatan,bidang_keahlian.keahlian,mitra_alumni.tanggal_awal,mitra_alumni.tanggal_akhir');
     $this->db->select('mitra.nama_perusahaan, mitra_alumni.cabang_mitra, mitra_cabang.nama_cabang');
     $this->db->select('mitra_alumni.mitra, mitra_alumni.divisi,mitra_alumni.jabatan,bidang_keahlian.keahlian,mitra_alumni.tanggal_awal,mitra_alumni.tanggal_akhir');
     $this->db->from('mitra_alumni');
     $this->db->join('bidang_keahlian', 'mitra_alumni.bidang_keahlian = bidang_keahlian.kode');
     $this->db->join('mitra', 'mitra_alumni.mitra = mitra.id_mitra');
     $this->db->join('mitra_cabang', 'mitra_alumni.cabang_mitra = mitra_cabang.id_cabang', 'LEFT');
     $this->db->where('nimhs',$nimhs);
     $this->db->order_by('tanggal_awal','desc');

     $query = $this->db->get();

     return $query->result_array();
  }

  // public function GetDataDiri($nimhs){
  //    $this->db->select('alumni.namamhs,alumni.tplahir,alumni.tglahir,alumni.alamat_rumah,alumni.telepon,alumni.sex,alumni.agama,alumni.email');
  //    $this->db->from('alumni');
  //    $this->db->where('nimhs',$nimhs);
  //    $query = $this->db->get();
  //
  //    return $query->result();
  // }

  function negara() {
    $this->db->order_by('country','ASC');
    $country_list = $this->db->get('country_list');

    return $country_list->result_array();
  }

  function kota() {
    $this->db->order_by('name','ASC');
    $regional_kabkota = $this->db->get('regional_kabkota');

    return $regional_kabkota->result_array();
  }

  function prosesInsert($table_name,$data) {
    // $insert = $this->db->insert('pendidikan_alumni',$data);
    $insert = $this->db->insert($table_name,$data);
    return $insert;
  }

  function prosesUpdate( $table_name, $data, $where) {
    $this->db->where( $where );
    $update = $this->db->update($table_name,$data);
    return $update;
  }

  function prosesDelete( $table_name, $where) {
    $this->db->where( $where );
    $delete = $this->db->delete($table_name);
    return $delete;
  }


  function bdgkeahlian() {
    $this->db->order_by('keahlian','ASC');
    $bidang_keahlian = $this->db->get('bidang_keahlian');

    return $bidang_keahlian->result_array();
  }


  public function GetFoto(){
    $this->db->select('tanggal_sk_yudisium,nimhs,namamhs');
    $this->db->from('alumni');
    $this->db->where('tanggal_sk_yudisium = (SELECT MAX(tanggal_sk_yudisium) from alumni )');
    $query = $this->db->get();

    return $query->result();
  }



  // --------------  cretaed by Sofyan Thayf ----------------------------

  /**
  * function: alumni()
  * menghasilkan daftar alumni berdasarkan $kriteria
  * @param $kriteria = array( 'field1'=>'...', 'field2'=>'...', ... )
  */
  public function alumni( $kriteria = '' )
  {
    if( $kriteria == '' ){
      $this->db->where( 'tanggal_sk_yudisium', $this->lastYudisium() );
    } else {
      $this->db->where( $kriteria );
    }
    $query = $this->db->get('alumni');
    $alumni = $query->result_array();

    $a = 0;
    foreach ($alumni as $key => $value) {
      $alumnus = $this->alumnus( $alumni[$a]['nimhs'] );
      foreach ($alumnus['pekerjaan'] as $key => $value) {
        if(empty($value['tanggal_akhir'])){
          $alumni[$a]['mitra'] = $value['mitra'];
          $alumni[$a]['namamitra'] = $value['nama_perusahaan'];
          $alumni[$a]['logomitra'] = $this->mitra_model->logo_mitra($value['mitra']);
        }
      }
      $alumni[$a]['foto'] = $this->foto_alumnus( $alumni[$a]['nimhs'] );
      $a++;
    }

    return $alumni;
  }

  public function alumnus( $nimhs )
  {
    $this->db->where( 'nimhs', $nimhs );
    $query = $this->db->get('alumni');

    if( $query->num_rows() > 0 ){
      $this->alumnus = $query->row_array();

      $this->alumnus['namamhs'] = $this->tambahgelar( $this->alumnus['namamhs'], $nimhs );
      $this->alumnus['tempat_tinggal'] = $this->regional_model->tempattinggal($this->alumnus['distrik_rumah']);
      $this->alumnus['foto'] = $this->foto_alumnus( $nimhs );
      $this->alumnus['pendidikan_formal'] = $this->GetDataPendFormal($nimhs);
      $this->alumnus['pendidikan_nonformal'] = $this->GetDataPendNonFormal($nimhs);
      $this->alumnus['pekerjaan'] = $this->GetDataRiwayatPekerjaan($nimhs);
      $this->alumnus['sertifikasi'] = $this->GetDataSertifikat($nimhs);
      $this->alumnus['karya'] = $this->getKarya($nimhs);
      $this->alumnus['testimoni'] = $this->testimoni_model->getTestimoni( $this->session->email );

      return $this->alumnus;
    }
    return false;
  }

  public function updatealumnus( $data, $nimhs )
  {
    $this->db->where('nimhs', $nimhs);
    $this->db->update('alumni', $data);
  }

  private function foto_alumnus( $nimhs )
  {
    $angkatan = substr($nimhs,3,2);
    $prodi = substr($nimhs, 0,3);
    $filefotojpg = '/assets/img/alumni/'.$angkatan. '/' .$prodi. '/' .$nimhs. '.jpg';
    $filefotopng = '/assets/img/alumni/'.$angkatan. '/' .$prodi. '/' .$nimhs. '.png';
    if( file_exists( FCPATH . $filefotojpg ) ) {
      $foto = $filefotojpg ;
    } else if ( file_exists( FCPATH . $filefotopng ) )  {
      $foto = $filefotopng;
    } else {
      $foto = 'https://siska.kharisma.ac.id/assets/img/foto/mhs/'.$angkatan.'/'.$prodi.'/'.$nimhs.'.jpg';
    }
    return $foto;
  }

  private function tambahgelar($nama, $nimhs)
  {
    $namagelar = $nama;

    $this->db->select('gelar_singkat, level');
    $this->db->where('nimhs', $nimhs);
    $this->db->where('formal', 1);
    $this->db->where('tanggal_lulus <>', 'null');
    $this->db->order_by('tanggal_lulus', 'ASC');
    $query = $this->db->get('pendidikan_alumni');

    foreach ($query->result_array() as $key => $value) {
      if( $value['level']=='Sarjana' ) $namagelar .= ", ".$value['gelar_singkat'] ;
    }

    foreach ($query->result_array() as $key => $value) {
      if( $value['level']=='Master' ) $namagelar .= ", ".$value['gelar_singkat'] ;
    }

    foreach ($query->result_array() as $key => $value) {
      if( $value['level']=='Doktor' && substr(strtolower($value['gelar_singkat']),0,1)=='p' ){
        $namagelar .= ", ".$value['gelar_singkat'] ;
      } elseif ($value['level']=='Doktor' && substr(strtolower($value['gelar_singkat']),0,1)=='d') {
        $namagelar = $value['gelar_singkat']." ".$namagelar ;
      }
    }
    return $namagelar;
  }

  public function getDataPendidikan($id)
  {
    $this->db->where('id_pendidikan',$id);
    $query = $this->db->get('pendidikan_alumni');

    return $query->row_array();
  }

  public function getDataSertifikasi($id)
  {
    $this->db->where('id_sertifikat',$id);
    $query = $this->db->get('sertifikat_alumni');

    return $query->row_array();
  }

  public function getKarya($nimhs)
  {
    $this->db->where('nimhs', $nimhs);
    $query = $this->db->get('karya_alumni');

    return $query->result_array();
  }

  public function getDataKarya($id)
  {
    $this->db->where('id_karya',$id);
    $query = $this->db->get('karya_alumni');

    return $query->row_array();
  }

  public function getDataPekerjaan($nimhs, $idmitra, $idcabang='')
  {
    $this->db->where('nimhs',$nimhs);
    $this->db->where('mitra',$idmitra);

    if( $idcabang != '' ){
      $this->db->where('cabang_mitra', $idcabang);
    }

    $this->db->from('mitra_alumni ma');
    $this->db->join('mitra mi', 'ma.mitra=mi.id_mitra', 'LEFT');
    $this->db->join('mitra_cabang mc', 'ma.cabang_mitra=mc.id_cabang', 'LEFT');
    $this->db->join('industri in', 'in.kode=mi.bidang_usaha', 'LEFT');
    $query = $this->db->get();

    return $query->row_array();
  }

  public function GetCPReferensi( $nimhs, $mitra, $cabang='')
  {
    $this->db->select('ac.nimhs, ac.id_mitra, ac.id_cabang, ac.email_contactperson');
    $this->db->from('penilaian_alumni ac');
    $this->db->from('contact_person cp', 'ac.email_contactperson=cp.email', 'LEFT');

    $this->db->where('nimhs',$nimhs);
    $this->db->where('mitra',$mitra);

    if( $cabang != '' ){
      $this->db->where('cabang_mitra', $cabang);
    }

    $query = $this->db->get();

    return $query->row_array();
  }

  public function jumlahAlumni( $prodi = '' )
  {
      if( $prodi != ''){
        $this->db->where( 'prodi', $prodi );
      }

      $this->db->select('COUNT(*) jumlah');  // sama dengan 'COUNT(*) AS jumlah'
                                             // 'AS jumlah' adalah operasi rename untuk menentukan
                                             // nama field dari output yang akan dihasilkan
      $query = $this->db->get('alumni');
      /*
       saat dieksekusi, query akan menjadi:
         "SELECT COUNT(*) jumlah FROM alumni"
       atau:
         "SELECT COUNT(*) jumlah FROM alumni WHERE prodi='$prodi'"  (jika $prodi ditentukan)

       hasilnya adalah:
          jumlah  --> nama field
          ------
            1457  --> contoh hasil COUNT(*)
      */
      // return $query->row_array();   // akan memberikan array( 'jumlah' => 1457 ) sebagai nilai return
      return $query->row_array()['jumlah'];  // akan memberikan 1457 sebagai nilai return
  }

  public function lastYudisium()
  {
    $sql = "SELECT MAX(tanggal_sk_yudisium) last_yudisum FROM alumni";
    $query = $this->db->query($sql);
    return $query->row_array()['last_yudisum'];
  }

}
