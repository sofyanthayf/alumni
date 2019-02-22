<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api_admin extends REST_Controller {
  public function __construct($config = 'rest') {

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  	parent::__construct();

  	$this->load->model('admin_model');
  }

  public function useractivity_get()
  {
    $users = $this->admin_model->aktivitasUser( $this->get('stat') );
    $this->response( [ "users" => $users ] , 200  );
  }



}

?>
