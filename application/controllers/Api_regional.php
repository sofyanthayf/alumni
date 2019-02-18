<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

/**
 * Layanan Back-end data/informasi regional
 */
class Api_regional extends REST_Controller {

  public function __construct($config = 'rest') {

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  	parent::__construct();

  	$this->load->model('regional_model');
  }

  public function kabkota_get()
  {
    $kode = null!==$this->get('id')?$this->get('id'):'';

    $kabkota = $this->regional_model->kabkota( $kode );
    $this->response( [ "kabkota" => $kabkota ] , 200  );
  }

  public function propinsi_get()
  {
    $kode = null!==$this->get('id')?$this->get('id'):'';

    $propinsi = $this->regional_model->propinsi( $kode );
    $this->response( [ "propinsi" => $propinsi ] , 200  );
  }

  public function desakelurahan_get()
  {
    $kode = $this->get('id');
    $desakelurahan = $this->regional_model->desakelurahan( $kode );
    $this->response( [ "desakelurahan" => $desakelurahan ] , 200  );
  }

  public function wilayah_get()
  {
    $kode = $this->get('id');
    $wilayah = $this->regional_model->tempattinggal( $kode );
    $this->response( [ "wilayah" => $wilayah ] , 200  );
  }


}
