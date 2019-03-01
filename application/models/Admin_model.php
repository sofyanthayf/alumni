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

  public function aktivitasUser($stat)
  {
    $this->db->select('us.email, us.email, us.last_login, us.visits');
    $this->db->from('users us');
    if( $stat == 0 ){
      $this->db->select('al.namamhs nama, al.nimhs id, YEAR(tanggal_sk_yudisium) thnlulus');
      $this->db->join('alumni al', 'email', 'LEFT');
    } else {
      $this->db->select('cp.id id, cp.nama');
      $this->db->join('contact_person cp', 'email', 'LEFT');
    }
    $this->db->where('us.status', $stat);
    $this->db->where('us.visits >', '0');
    return $this->db->get()->result_array();
  }

  public function listNoJobs()
  {
    $amail = $this->listEmailNotif(1);
    $this->db->select('al.namamhs, al.nimhs, al.email, YEAR(al.tanggal_sk_yudisium) thn_lulus');
    $this->db->select('us.visits, us.last_login, mi.mitra');
    $this->db->from('alumni al');
    $this->db->join('users us', 'email', 'LEFT');
    $this->db->join('mitra_alumni mi', 'nimhs', 'LEFT');
    $this->db->where('us.visits >', '0', false);
    $this->db->where('mi.mitra IS NULL', null, false);

    if( !empty($amail) ) $this->db->where_not_in('al.email', $amail);

    $this->db->order_by('us.last_login', 'ASC');

    return $this->db->get()->result_array();
  }

  public function listNoRefs()
  {
    $amail = $this->listEmailNotif(2);
    $this->db->select('al.namamhs, al.nimhs, al.email, us.visits, us.last_login');
    $this->db->select('ma.mitra, mi.nama_perusahaan, ni.id_penilaian, YEAR(al.tanggal_sk_yudisium) thn_lulus');
    $this->db->join('users us', 'email', 'LEFT');
    $this->db->join('mitra_alumni ma', 'nimhs','LEFT');
    $this->db->join('mitra mi', 'ma.mitra=mi.id_mitra','LEFT');
    $this->db->join('penilaian_alumni ni', 'al.nimhs=ni.nimhs AND ma.mitra=ni.id_mitra','LEFT');
    $this->db->from('alumni al');
    $this->db->where('us.visits >', '0', false);
    $this->db->where('ma.status_kerja <>', '9', false);
    $this->db->where('ma.mitra IS NOT NULL', null, false);
    $this->db->where('ma.tanggal_akhir IS NULL', null, false);
    $this->db->where('ni.id_penilaian IS NULL', null, false);

    if( !empty($amail) ) $this->db->where_not_in('al.email', $amail);

    // $this->db->order_by('us.last_login', 'ASC');

    return $this->db->get()->result_array();
  }

  public function listEmailNotif($tipe)
  {
    $this->db->select('email');
    $this->db->where('tipe_notif', $tipe);
    $this->db->where('DATE(tanggal_notif) > DATE_SUB(CURDATE(), INTERVAL 7 DAY)', null,  false);
    $query = $this->db->get('notifikasi_alumni');
    $amail = array_map (function($value){
                        return $value['email'];
                      } , $query->result_array());
    return $amail;
  }


}

?>
