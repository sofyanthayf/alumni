<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output testimoni alumni dan perusahaan mitra
 */
class Testimoni extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('alumni_model');
    $this->load->model('testimoni_model');
  }

  public function index()
  {
    echo 'list testimoni';
  }

  public function tulis_testimoni()
  {
    $data['alumnus'] = $this->alumni_model->alumnus( $this->session->uid );
    $this->load->template('testimoni/formtestimoni', $data);
  }

  public function submit_testimoni()
  {
    $data = array(
              'id' => date('U'),
              'email' => $this->session->email,
              'status' => ( $this->session->who=='al' ? 0 : 1 ),
              'testimoni' => $this->input->post('testi')
            );
    $insert = $this->alumni_model->prosesInsert('testimoni',$data);
    redirect('/alumni/'.$this->session->uid,'refresh');
  }

  public function update_testimoni()
  {
    $where = array( 'id' => $this->input->post('idtestimoni') );
    $data = array( 'testimoni' => $this->input->post('testi') );

    $update = $this->alumni_model->prosesUpdate('testimoni',$data, $where);
    redirect('/alumni/'.$this->session->uid,'refresh');
  }


}
