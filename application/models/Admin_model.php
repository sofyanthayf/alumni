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

      $nama = explode(" ", $data['nama_lengkap']);
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
              YEAR(a.tanggal_sk_yudisium) thn_lulus,
              COUNT(a.nimhs) jml_lulusan,
              AVG(u.visits) avg_visit
            FROM `users` u
            LEFT JOIN alumni a USING(email)
            WHERE visits > '0'
              AND u.status = '0'
              AND a.tanggal_sk_yudisium IS NOT NULL
            GROUP BY YEAR(a.tanggal_sk_yudisium)
            ORDER BY jml_lulusan DESC";
            
     return $this->db->query($sql)->result_array();
  }


}

?>
