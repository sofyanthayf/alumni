<?php
class Regional_model extends CI_Model {

  private $alumnus;

  public function __construct() {
      parent::__construct();
  }

  public function tempattinggal($id_desakelurahan)
  {
    if( empty($id_desakelurahan) ) return null;

    $this->db->select('ds.id id_desakelurahan, ds.name nama_desakelurahan');
    $this->db->select('kc.id id_kecamatan, kc.name nama_kecamatan');
    $this->db->select('kt.id id_kabkota, kt.name nama_kabkota');
    $this->db->select('pr.id id_propinsi, pr.nama nama_propinsi');
    $this->db->select('kp.kodepos');
    $this->db->from('regional_desa ds');
    $this->db->join('regional_kecamatan kc', 'kc.id=ds.district_id', 'LEFT');
    $this->db->join('regional_kabkota kt', 'kt.id=kc.regency_id', 'LEFT');
    $this->db->join('regional_propinsi pr', 'pr.id=kt.province_id', 'LEFT');
    $this->db->join('regional_kodepos kp', 'kp.id_desa=ds.id', 'LEFT');
    $this->db->where('ds.id', $id_desakelurahan);

    return $this->db->get()->row_array();
  }

  public function desakelurahan($id='')
  {
    $this->db->select('id id_desakelurahan, name nama_desakelurahan, district_id id_kecamatan');
    if( $id != '' ){
      $this->db->like('id', $id );
    }
    $query = $this->db->get('regional_desa');
    return $query->result_array();
  }

  public function kecamatan($id='')
  {
    $this->db->select('id id_kecamatan, name nama_kecamatan, regency_id id_kabkota');
    if( $id == '' ){
      return $this->db->get('regional_kecamatan')->result_array();
    } else {
      $this->db->where('id', $id);
      return $this->db->get('regional_kecamatan')->row_array();
    }
  }

  public function kabkota($id='')
  {
    $this->db->select('id id_kabkota, name nama_kabkota, province_id id_propinsi');
    if( $id == '' ){
      return $this->db->get('regional_kabkota')->result_array();
    } else {
      $this->db->where('id', $id);
      return $this->db->get('regional_kabkota')->row_array();
    }
  }

  public function propinsi($id='')
  {
    $this->db->select('id id_propinsi, nama nama_propinsi');
    if( $id == '' ){
      return $this->db->get('regional_propinsi')->result_array();
    } else {
      $this->db->where('id', $id);
      return $this->db->get('regional_propinsi')->row_array();
    }
  }



}




?>
