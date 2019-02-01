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


    function daftar_cabang_mitra()
    {
      return $this->db->get('mitra_cabang')->result_array();
    }

    function info_mitra($mitra)
    {
      $this->db->where('id_mitra', $mitra);
      return $this->db->get('mitra')->row_array();
    }

    function update_mitra($params)
    {
      $this->db->where('id_mitra', $params['id_mitra']);
      return $this->db->update('mitra',$params);
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
