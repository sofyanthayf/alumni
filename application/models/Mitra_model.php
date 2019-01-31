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

    function daftar_mitra()
    {
      return $this->db->get('mitra')->result_array();
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

}
