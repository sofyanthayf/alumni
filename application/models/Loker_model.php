<?php

class Loker_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function tambahLoker($params) {
        $this->db->insert('lowongan_kerja',$params);
    }

    function get_loker($id)
    {
      $this->db->where('lowongan_kerja.id', $id);
      $this->db->join('mitra','mitra.id_mitra = lowongan_kerja.mitra');
      return $this->db->get('lowongan_kerja')->row_array();
    }

    function updateLoker($params)
    {
      $this->db->where('id', $params['id']);
      return $this->db->update('lowongan_kerja',$params);
    }

    function get_nama_perusahaan($id_mitra)
    {
      $this->db->where('id_mitra',$id_mitra);
      return $this->db->get('mitra')->row_array();
    }

    function list_loker_home()
    {
      $this->db->order_by('lowongan_kerja.id','DESC');
      $this->db->limit(4);
      $this->db->join('mitra','mitra.id_mitra = lowongan_kerja.mitra');
      return $this->db->get('lowongan_kerja')->result_array();
    }

    function list_loker()
    {
      $this->db->order_by('lowongan_kerja.id','DESC');
      $this->db->join('mitra','mitra.id_mitra = lowongan_kerja.mitra');
      return $this->db->get('lowongan_kerja')->result_array();
    }

}
