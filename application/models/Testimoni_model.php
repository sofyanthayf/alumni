<?php

class Testimoni_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTestimoni($email)
    {
      $this->db->where('email', $email);
      return $this->db->get('testimoni')->row_array();
    }


}
