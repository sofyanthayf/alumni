<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output serta autentikasi user
 */
class Wisuda extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('alumni_model');
    $this->load->model('mitra_model');

    $this->session->admin = true;

    if($this->session->who != 'ad') redirect('/');
  }

  public function index()
  {
  }


?>
