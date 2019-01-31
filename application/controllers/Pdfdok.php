<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfdok extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
      // $this->load->model('user_model');
	}

  public function index(){
      $this->pdf->load_view('pdf/pdftest');

      $this->pdf->render();
      $this->pdf->stream("test.pdf");
  }

  private function pdfrender( $file ){
      $this->pdf->render();
      $this->pdf->stream( $file, array('Attachment'=>0) );
  }

  private function pdfoutput( $path ){
      $this->pdf->render();
      file_put_contents( $path, $this->pdf->output());
  }


}
