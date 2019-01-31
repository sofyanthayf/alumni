<?php

class Mitra_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function daftar_mitra()
    {
      $this->db->select('mitra');
      $query = $this->db->get('mitra_alumni');

      return $query->result_array();
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
      $insert = $this->db->insert('penilaian_alumni',$data);
      return $insert;
    }    

}
