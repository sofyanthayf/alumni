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
  	$this->load->model('alumni_model');
  	$this->load->model('mitra_model');
  }

  public function emailwaiting_get()
  {
    $m = $this->get('m');
    $m = str_replace( '__dot__', '.', $m );
    $m = str_replace( '__at__', '@', $m );

    $email = array();
    $email['address'] = $m;
    $email['waiting'] = $this->user_model->validasiWaitingList( $email['address'] );

    $this->response( [ "email" => $email ] , 200  );
  }

  public function emailregistered_get()
  {
    $m = $this->get('m');
    $m = str_replace( '__dot__', '.', $m );
    $m = str_replace( '__at__', '@', $m );

    $email = array();
    $email['address'] = $m;
    $email['registered'] = $this->user_model->validasiEmailCP( $email['address'] );

    $this->response( [ "email" => $email ] , 200  );
  }

  public function listalumni_get()
  {
    // $tgl_yudisium = $this->get('t');
    // $alumni = $this->alumni_model->alumni( array( 'tanggal_sk_yudisium'=> $tgl_yudisium ) );

    if( null !== $this->get('t') ){
      $alumni = $this->alumni_model->alumni( array( 'tanggal_sk_yudisium'=> $this->get('t') ) );
    }

    if( null !== $this->get('k') ){
      $key = $this->get('k');
      $alumni = $this->alumni_model->alumni( "nimhs LIKE '%".$key."%' OR namamhs LIKE '%".$key."%'"  );
    }

    $this->response( [ "alumni" => $alumni ] , 200  );
  }



}
