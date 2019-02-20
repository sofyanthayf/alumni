<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output serta autentikasi user
 */
class Admin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('alumni_model');

    $this->session->admin = true;

    if($this->session->who != 'ad') redirect('/');
  }

  public function index()
  {

  }

  public function validasi_alumni( $requestid='' )
  {
    // $data['public'] = true;

    if($requestid == ''){
      $data['waitinglist'] = $this->admin_model->validasiWaitingList();
    } else {
      $data['requestid'] = $requestid;
      $data['request'] = $this->admin_model->validasiRequest($requestid);
      $data['prakira'] = $this->admin_model->prakiraAlumni( $data['request'] );
    }
    $this->load->template('admin/validasialumni', $data);

  }

  public function submit_validasi()
  {
    $data['request'] = $this->admin_model->validasiRequest($this->input->post('requestid'));
    $data['status'] = $this->input->post('raccept');
    $data['nimhs'] = $this->input->post('nimhs');
    $data['validasi'] = $this->input->post('validasi');

    $data['newp'] = random_string('alnum', 10);

    if( $data['validasi'] == 8 || $data['validasi'] == 9 ){
      $stat = 'Diterima';
    } else {
      $stat = 'Ditolak';
    }

    // update database hanya jika status = 9
    if( $data['validasi'] == 9 ){
      $userdata = array(
              'email' => $data['request']['email'],
              'status' => 0,
              'password' => md5( $data['newp'] ),
            );
      $insert = $this->alumni_model->prosesInsert('users',$userdata);

      $alumnidata = array( 'email' => $data['request']['email'] );
      $where = array( 'nimhs'=> $data['nimhs'] );
      $update = $this->alumni_model->prosesUpdate('alumni',$alumnidata, $where);
    }

    $requestdata = array(
                      'validasi' => $data['validasi'],
                      'tgl_validasi' => date('Y-m-d'),
                      'validator' => $this->session->uid
                    );
    $requestwhere = array( 'id' => $data['request']['id'] );
    $update = $this->alumni_model->prosesUpdate('validasi_alumni',$requestdata, $requestwhere);


    // kirim email
    $maildata['to'] = $data['request']['email'];
    $maildata['subject'] = "Status Validasi Alumni ".$stat;
    $maildata['message'] = $this->load->view('emails/statusvalidasi', $data, true);
    $sent = $this->mylib->sendEmail( $maildata );

    //redirect
    redirect('/admin/validasialumni');
  }




}

?>
