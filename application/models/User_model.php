<?php

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login_alumni($email,$password)
  	{
  		$this->db->where('users.email', $email);
      $this->db->where('users.password', $password);
      $this->db->where('users.status', '0');
      $this->db->join('alumni', 'alumni.email = users.email', 'left');
      return $this->db->get('users')->row();
  	}

    public function login_mitra($email,$password)
  	{
      $this->db->where('users.email', $email);
      $this->db->where('users.password', $password);
      $this->db->where('users.status', '1');
      $this->db->join('contact_person', 'contact_person.email = users.email', 'left');
      return $this->db->get('users')->row();
  	}

    public function update_visits($email)
  	{
      $this->db->where('email', $email);
      $this->db->set('visits', 'visits+1', FALSE);
      $this->db->update('users');
  	}

    public function cek_password_lama($params)
  	{
      $this->db->where('email', $params['email']);
      $this->db->where('password', $params['password_lama']);
      return $this->db->get('users')->row();
  	}

    public function update_password($params)
    {
      $this->db->set('password', $params['password_baru']);
      $this->db->where('email', $params['email']);
      $this->db->update('users');
    }

    public function tambah_validasiAlumni($params)
  	{
      $this->db->insert('validasi_alumni',$params);
  	}

    public function cek_email($email)
  	{
      $this->db->where('email', $email);
      return $this->db->get('users')->row();
  	}

    public function reset_password($newp,$email)
    {
      $this->db->set('password', $newp);
      $this->db->where('email', $email);
      $this->db->update('users');
    }

}
