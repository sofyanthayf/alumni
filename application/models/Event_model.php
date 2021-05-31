<?php

class Event_model extends CI_Model {

  private $alumnus;

  public function __construct() {
      parent::__construct();
      $this->load->model('regional_model');
      $this->load->model('alumni_model');
  }

  public function lastEvent( $type, $active = true )
  {
    $this->db->where( 'klas_event', $type );
    if( !$active ){
      $this->db->where('status', '9');
    } else {
      $this->db->where('status <>', '9');
    }
    $this->db->limit(1);
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get('event')->row_array();
  }

  public function getEventById( $id_event )
  {
    return $this->db->get('event')
           ->where( 'id_event', $id_event )
           ->row_array();
  }

  public function getPesertaEvent($uid, $id_event)
  {
    return $this->db
           ->join('event', 'id_event', 'LEFT')
           ->where( 'uid', $uid )
           ->where( 'id_event', $id_event )
           ->get('event_register')
           ->row_array();
  }

  public function simpanPesertaEvent($data)
  {
    $insert = $this->alumni_model->prosesInsert('event_register', $data);
  }

}
