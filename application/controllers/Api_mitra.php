<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

/**
 * Layanan Back-end data/informasi perusahaan mitra pengguna alumni
 */
class Api_mitra extends REST_Controller {
  public function __construct($config = 'rest') {

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  	parent::__construct();

  	$this->load->model('mitra_model');
  	$this->load->model('user_model');
  }

  public function companylist_get()
  {
    $mitra = $this->mitra_model->daftarPerusahaan();
    if( !$mitra ){
      $this->response( 'No Data', 204  );
    } else {
      $this->response( [ "mitra" => $mitra ] , 200  );
    }
  }

  public function branchlist_get()
  {
    $id_mitra = $this->get('id');
    $branch = $this->mitra_model->daftar_cabang_mitra($id_mitra);
    if( !$branch ){
      $this->response( 'No Data', 204  );
    } else {
      $this->response( [ "cabang_mitra" => $branch ] , 200  );
    }
  }

  public function logomitra_get()
  {
    $id = $this->get('id');
    $logo = $this->mitra_model->logo_mitra( $id );
    $this->response( [ "logomitra" => $logo ] , 200  );
  }

  public function emailvalid_get()
  {
    $m = $this->get('m');
    $m = str_replace( '__dot__', '.', $m );
    $m = str_replace( '__at__', '@', $m );
    
    $email = array();
    $email['address'] = $m;
    $email['registered'] = $this->user_model->emailIsAlumni( $email['address'] );

    $this->response( [ "email" => $email ] , 200  );
  }


}
