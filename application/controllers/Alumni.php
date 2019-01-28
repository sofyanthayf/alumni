<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output data/informasi dan detail alumni
 */
class Alumni extends CI_Controller {

  public function dataalumni()
  {
    $this->load->template('alumni/dataalumni');
  }
}
