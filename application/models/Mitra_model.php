<?php

class Mitra_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function formeditcontactperson($email)
    {
      $this->db->where('contact_person.email', $email);
      $this->db->join('mitra','mitra.id_mitra = contact_person.mitra');
      $this->db->join('mitra_cabang','mitra_cabang.id_cabang = contact_person.cabang_mitra');
      return $this->db->get('contact_person')->row_array();
    }

    function update_contactperson($params)
    {
      $this->db->where('email', $params['email']);
      return $this->db->update('contact_person',$params);
    }


    function daftar_cabang_mitra( $id_mitra = '' )
    {
      if( $id_mitra != ''){
        $this->db->where('id_mitra', $id_mitra);
      }
      return $this->db->get('mitra_cabang')->result_array();
    }

    function info_mitra($id_mitra)
    {
      $this->db->where('id_mitra', $id_mitra);
      $this->db->join('industri', 'mitra.bidang_usaha = industri.kode');  // join untuk dapatkan nama perusahaan

      // modified by Sofyan Thayf
      $query = $this->db->get('mitra');

      $mitra = $query->row_array();

      // lokasi (ada kondisi jika mitra adalah perusahaan asing)
      if( !empty( $mitra['ln_negara'] ) ) {
        $mitra['lokasi'] = $mitra['ln_kota'].", ".$mitra['ln_negara'];
      } else {
        $mitra['lokasi'] = $this->kota( $mitra['kota_kantor_pusat'] );
      }

      // logo
      $mitra['logo'] = $this->logo_mitra( $id_mitra ) ;

      // total alumni
      $mitra['total_alumni'] = $this->total_alumnimitra( $id_mitra ) ;

      // cabang dan jumlah alumni
      $cabang = $this->cabang_alumni( $id_mitra );
      if( $cabang ){
        $mitra['cabang'] = $cabang;
      }

      return $mitra;
      // return $this->db->get('mitra')->row_array();
    }

    public function info_cabang($id_cabang)
    {
      $this->db->where('id_cabang', $id_cabang);
      $query = $this->db->get('cabang_mitra');
      return $query->row_array();
    }

    public function update_mitra($params)
    {
      $this->db->where('id_mitra', $params['id_mitra']);
      return $this->db->update('mitra',$params);
    }


    public function daftar_mitra()
    {
      $this->db->distinct();    // agar tak berulang
      $this->db->select('mitra, nama_perusahaan');
      $this->db->join('mitra', 'mitra_alumni.mitra = mitra.id_mitra');  // join untuk dapatkan nama perusahaan
      $this->db->where(array('tanggal_akhir' => NULL));  // masih bekerja
      $query = $this->db->get('mitra_alumni');

      // added and modified by Sofyan Thayf
      $mitra = $query->result_array();

      // menambahkan file logo ke dalam daftar mitra
      $m = 0;
      foreach ($mitra as $key => $value) {
        $mitra[$m]['logo'] = $this->logo_mitra( $value['mitra'] ) ;
        $m++;
      }
      return $mitra;
    }

    public function form_kinerja($mitra,$nimhs)
    {
      $this->db->where('mitra_alumni.mitra',$mitra);
      $this->db->where('mitra_alumni.nimhs',$nimhs);
      $this->db->join('alumni','alumni.nimhs = mitra_alumni.nimhs');
      $this->db->join('mitra_cabang','mitra_cabang.id_cabang = mitra_alumni.cabang_mitra');

      $query = $this->db->get('mitra_alumni');

      return $query->row_array();
    }

    public function prosesInsert($table_name,$data)
    {
      $insert = $this->db->insert($table_name,$data);
      return $insert;
    }

    function prosesUpdate( $table_name, $data, $where) {
      $this->db->where( $where );
      $update = $this->db->update($table_name,$data);
      return $update;
    }


    // added by Sofyan Thayf

    public function cabang_alumni($id_mitra)
    {
      $sql = "SELECT
                al.cabang_mitra, COUNT(*) jml_alumni,
                IF(al.cabang_mitra IS NULL OR al.cabang_mitra='', 'Kantor Pusat', cb.nama_cabang) nama_cabang,
                cb.alamat_cabang, cb.kota_cabang, cb.telepon_cabang, cb.kodepos_cabang
              FROM `mitra_alumni` al LEFT JOIN mitra_cabang cb ON(al.cabang_mitra=cb.id_cabang)
              WHERE mitra=?
              GROUP BY cabang_mitra";

      $query = $this->db->query( $sql, $id_mitra );
      if( $query->num_rows() > 0){
        return $query->result_array();
      }

      return false;
    }

    public function total_alumnimitra($id_mitra)
    {
      $sql = "SELECT COUNT(*) jumlah FROM `mitra_alumni`
              WHERE mitra=?
              AND tanggal_akhir IS NULL";
      $query = $this->db->query( $sql, $id_mitra );

      return $query->row_array()['jumlah'];
    }

    public function logo_mitra( $id_mitra )
    {
      $logomitrajpg = '/assets/img/mitra/' . $id_mitra . ".jpg";
      $logomitrapng = '/assets/img/mitra/' . $id_mitra . ".png";
      if( file_exists( FCPATH . $logomitrajpg ) ) {
        $logo = $logomitrajpg ;
      } else if ( file_exists( FCPATH . $logomitrapng ) )  {
        $logo = $logomitrapng;
      } else {
        $logo = "";
      }

      return $logo;
    }

    private function kota( $kode_kota )
    {
      $this->db->where('id', $kode_kota);
      $query = $this->db->get('regional_kabkota');

      return $query->row_array()['name'];
    }

    public function daftarPerusahaan()
    {
      // $this->db->select('nama_perusahaan');
      $query = $this->db->get('mitra');
      if( $query->num_rows() > 0 ){
        return $query->result_array();
      }
      return false;
    }

    public function daftarIndustri()
    {
      $query = $this->db->get('industri');
      if( $query->num_rows() > 0 ){
        return $query->result_array();
      }
      return false;
    }

    public function cpRegistered( $cpemail, $cpmitra )
    {
      $this->db->where('email', $cpemail);
      $this->db->where('mitra', $cpmitra);

      $query = $this->db->get('contact_person');
      if( $query->num_rows() > 0 ){
        return $query->result_array();
      }

      return false;
    }

    public function cpRegisteredById( $idcp )
    {
      $this->db->where('id', $idcp);
      $query = $this->db->get('contact_person');
      if( $query->num_rows() > 0 ){
        return $query->row_array();
      }
      return false;
    }

    public function contactPersonByReferensi($id_referensi)
    {
      $this->db->from('penilaian_alumni ra');
      $this->db->join('contact_person cp', 'ra.email_contactperson=cp.email', 'LEFT');
      $this->db->where('id_penilaian', $id_referensi);
      $query = $this->db->get();

      return $query->row_array();
    }

    public function getPenilaian($id_referensi)
    {
      $this->db->where('id_penilaian', $id_referensi);
      $query = $this->db->get('penilaian_alumni');
      return $query->row_array();
    }

    public function alumniByMitra($id_mitra)
    {
      $this->db->where( 'mitra', $id_mitra );
      $this->db->join( 'alumni', 'nimhs', 'LEFT' );
      $query = $this->db->get('mitra_alumni');
      return $query->result_array();
    }

}
