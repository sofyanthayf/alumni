<?php

class Alumni_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

  public function getDataSertifikat($nimhs){
     $this->db->select('sertifikat_alumni.judul_sertifikat,sertifikat_alumni.tanggal_sertifikat,bidang_keahlian.keahlian');
     $this->db->from('sertifikat_alumni');
     $this->db->join('bidang_keahlian', 'sertifikat_alumni.bidang_keahlian = bidang_keahlian.kode');
     $this->db->where('nimhs',$nimhs);
     $query = $this->db->get();

     return $query->result();
  }

  public function GetDataPendFormal($nimhs){
     $this->db->select('pendidikan_alumni.gelar_singkat,pendidikan_alumni.institusi,pendidikan_alumni.program_studi,pendidikan_alumni.tanggal_mulai,pendidikan_alumni.tanggal_lulus');
     $this->db->from('pendidikan_alumni');
     $this->db->where('nimhs',$nimhs);
     $this->db->where('formal =', '1');
     $query = $this->db->get();

     return $query->result();
  }

  public function GetDataPendNonFormal($nimhs){
     $this->db->select('pendidikan_alumni.gelar_singkat,pendidikan_alumni.institusi,pendidikan_alumni.program_studi,pendidikan_alumni.tanggal_mulai,pendidikan_alumni.tanggal_lulus');
     $this->db->from('pendidikan_alumni');
     $this->db->where('nimhs',$nimhs);
     $this->db->where('formal =', '2');
     $query = $this->db->get();

     return $query->result();
  }

  public function GetDataRiwayatPekerjaan($nimhs){
     $this->db->select('mitra.nama_perusahaan,mitra_alumni.jabatan,bidang_keahlian.keahlian,mitra_alumni.tanggal_awal,mitra_alumni.tanggal_akhir');
     $this->db->from('mitra_alumni');
     $this->db->join('bidang_keahlian', 'mitra_alumni.bidang_keahlian = bidang_keahlian.kode');
     $this->db->join('mitra', 'mitra_alumni.mitra = mitra.id_mitra');
     $this->db->where('nimhs',$nimhs);

     $query = $this->db->get();

     return $query->result();
  }

  public function GetDataDiri($nimhs){
     $this->db->select('alumni.namamhs,alumni.tplahir,alumni.tglahir,alumni.alamat_rumah,alumni.telepon,alumni.sex,alumni.agama,alumni.email');
     $this->db->from('alumni');
     $this->db->where('nimhs',$nimhs);
     $query = $this->db->get();

     return $query->result();
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
    $insert = $this->db->insert('pendidikan_alumni',$data);
    return $insert;
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


}
