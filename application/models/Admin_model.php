<?php

class Admin_model extends CI_Model {

  private $alumnus;

  public function __construct() {
      parent::__construct();
  }

  public function validasiWaitingList($value='')
  {
    $this->db->where('validasi', 0);
    return $this->db->get('validasi_alumni')->result_array();
  }

  public function validasiRequest($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('validasi_alumni')->row_array();
  }


  public function prakiraAlumni($data)
  {
    // periksa apakah email sudah terdaftar?
    $this->db->where('email', $data['email'] );
    $query = $this->db->get('users');
    if( $query->num_rows() != 0 ){
      // jika ada berarti sudah terdaftar
      $user = $query->result_array();
      if( $user[0]['status']=='0') $user[0]['validasi'] = '8';  // sudah terdaftar
      if( $user[0]['status']=='1') $user[0]['validasi'] = '3';  // sudah terdaftar sebagai CP

    } else {
      $where = "email='".$data['email']."' ";
      if( !empty( $data['nimhs'] ) ){
        $where .= "OR nimhs='".$data['nimhs']."' ";
      };

      $nama = str_replace( ".", " ", $data['nama_lengkap'] );
      $nama = explode(" ", $nama );
      $n = 1;
      foreach ($nama as $value) {
        if( strlen($value) >= 3 ) {
          $where .= $n==1 ? "OR ( namamhs LIKE '$value%' " : "OR namamhs LIKE '$value%' ";
          // $where .= "OR namamhs LIKE '$value%' " ;
        }
        $n++;
      }
      $where .= ")";

      $this->db->where( $where );
      $query = $this->db->get('alumni');
      $user = $query->result_array();
      $u = 0;
      foreach ($user as $value) {
        $user[$u]['validasi'] = '0';  // 0 lanjutkan proses validasi
        $u++;
      }

    }
    return $user;

  }

  public function aktivitasAlumniByVisit()
  {
    $sql = "SELECT
              ANY_VALUE(IF(a.tanggal_sk_yudisium IS NOT NULL,YEAR(a.tanggal_sk_yudisium),'no-data')) thn_lulus,
              COUNT(a.nimhs) jml_lulusan,
              AVG(u.visits) avg_visit
            FROM `users` u
            LEFT JOIN alumni a USING(email)
            WHERE visits > '0'
              AND u.status = '0'
            GROUP BY YEAR(a.tanggal_sk_yudisium)
            ORDER BY thn_lulus DESC";

     return $this->db->query($sql)->result_array();
  }

  public function requestValidasiValid()
  {
    $sql = "SELECT
              ANY_VALUE(IF(a.tanggal_sk_yudisium IS NOT NULL,YEAR(a.tanggal_sk_yudisium),'no-data')) thn_lulus,
              COUNT(a.nimhs) jml_lulusan,
              SUM(IF(u.validasi=9,1,0)) accepted,
              SUM(IF(u.validasi=8,1,0)) registered
            FROM `validasi_alumni` u
            LEFT JOIN alumni a USING(email)
            GROUP BY YEAR(a.tanggal_sk_yudisium)
            ORDER BY thn_lulus DESC";

     return $this->db->query($sql)->result_array();
  }

  public function requestValidasiTotal()
  {
    $sql = "SELECT
              COUNT(*) jml_request,
              SUM(IF(u.validasi=9,1,0)) accepted,
              SUM(IF(u.validasi=8,1,0)) registered,
              SUM(IF(u.validasi<8 AND u.validasi>1,1,0)) rejected,
              SUM(IF(u.validasi=1,1,0)) unident
            FROM `validasi_alumni` u";

     return $this->db->query($sql)->result_array();
  }

}

?>
