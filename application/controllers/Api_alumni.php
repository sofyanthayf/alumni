<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

/**
 * Layanan Back-end data/informasi dan detail alumni
 */
class Api_alumni extends REST_Controller {
  public function __construct($config = 'rest') {

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  	parent::__construct();

  	$this->load->model('user_model');
  }

  public function emailvalid_get()
  {
    $m = $this->get('m');
    $m = str_replace( '__dot__', '.', $m );
    $m = str_replace( '__at__', '@', $m );

    $email = array();
    $email['address'] = $m;
    $email['registered'] = $this->user_model->validasiWaitingList( $email['address'] );

    $this->response( [ "email" => $email ] , 200  );
  }



}
