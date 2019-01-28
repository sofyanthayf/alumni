<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output serta autentikasi user
 */
class User extends CI_Controller {

  public function logout()
  {
    session_destroy();
    redirect('/');
  }

  public function login()
  {
    $this->session->nama_alumni = 'Vienna Vanesha Ananda';
    $this->session->tahun_lulus = '2016';

    echo $this->session->nama_alumni;

    // redirect('/dalumni');
  }
}
