<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output serta autentikasi user
 */
class Cli extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('alumni_model');
    $this->load->model('mitra_model');
  }

  public function test($value='')
  {
    echo 'Hello, ' . $value . PHP_EOL;
  }


}

?>
