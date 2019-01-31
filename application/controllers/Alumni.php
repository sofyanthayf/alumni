<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output data/informasi dan detail alumni
 */
class Alumni extends CI_Controller {

  function __construct(){
    parent::__construct();

      $this->load->model('alumni_model');


      $con=new mysqli($this->db->hostname,$this->db->username,$this->db->password,$this->db->database);
      if($con->connect_error){
          echo 'Connection Faild: '.$con->connect_error;
          }else{
              $sql="select * from alumni where email like '%$email%'";

              $res=$con->query($sql);

              while($row=$res->fetch_assoc()){
                  $nimhs = $row["nimhs"];
              }
            }

      $newdata = array
      (
         'email'     => $email,
         'nimhs' => $nimhs,
      );

      $this->session->set_userdata($newdata);

      if(!isset($_SESSION))
      {
         session_start();
      }

  }


	public function pendidikan() {
		$data['kota']=$this->alumni_model->kota();

	  $data['negara']=$this->alumni_model->negara();

    $this->load->template('alumni/pendidikan_view',$data);

  }


  public function cv() {

    $nimhs = $_SESSION["nimhs"];

    $angkatan = substr($nimhs,3,2);
    $prodi = substr($nimhs, 0,3);


    $filenama = 'assets/img/alumni/'.$angkatan. '/' .$prodi. '/' .$nimhs. '.jpg';

    if (file_exists(FCPATH.$filenama)) {
      $data['foto'] = base_url().$filenama;
    } else {
        $data['foto'] = 'https://siska.kharisma.ac.id//assets//img//foto//mhs//'.$angkatan.'/'.$prodi.'//'.$nimhs.'.jpg';

    };

    $this->load->model('Alumni_model');
    $data['datadiri'] = $this->Alumni_model->GetDataDiri($nimhs);
    $data['record'] = $this->Alumni_model->GetDataSertifikat($nimhs);
    $data['pendidikanformal'] = $this->Alumni_model->GetDataPendFormal($nimhs);
    $data['pendidikannonformal'] = $this->Alumni_model->GetDataPendNonFormal($nimhs);
    $data['riwayatpekerjaan'] = $this->Alumni_model->GetDataRiwayatPekerjaan($nimhs);

    $this->load->template('alumni/cv_view',$data);

  }

	public function insert_pendidikan() {

      $date = date_create();

      if (isset($_POST['add'])) {
        $data1 = implode(',',$_POST['level_cat']);
      };

      if (isset($_POST['add'])) {
        $data2 = implode(',',$_POST['jenis_cat']);
      };


	    $data = array('id_pendidikan' => date_timestamp_get($date),
                    'nimhs' => $_SESSION["nimhs"],
                    'institusi' => $this->input->post('institusi',true),
	                  'kota' => $this->input->post('kota',true),
	                  'negara' => $this->input->post('negara',true),
	                  'program_studi' => $this->input->post('progstudi',true),
	                  'gelar' => $this->input->post('gelar',true),
	                  'gelar_singkat' => $this->input->post('gelarsingkat',true),
                    'level' => $data1,
                    'formal' => $data2,
	                  'tanggal_mulai' => $this->input->post('tglmulai',true),
	                  'tanggal_lulus' => $this->input->post('tgllulus',true));

	    $insert = $this->alumni_model->prosesInsert('pendidikan_alumni',$data);

      echo '<script>alert("You Have Successfully updated this Record!");</script>';

      redirect('Alumni/pendidikan','refresh');
    }

  private function pdfrender( $file ){
    $this->pdf->render();
    $this->pdf->stream( $file, array('Attachment'=>0) );
  }

  private function pdfoutput( $path ){
      $this->pdf->render();
      file_put_contents( $path, $this->pdf->output());
  }

  public function cetakcv(){

    $nimhs = $_SESSION["nimhs"];

    $angkatan = substr($nimhs,3,2);
    $prodi = substr($nimhs, 0,3);


    $filenama = 'assets/img/alumni/'.$angkatan. '/' .$prodi. '/' .$nimhs. '.jpg';

    if (file_exists(FCPATH.$filenama)) {
      $data['foto'] = base_url().$filenama;
    } else {
        $data['foto'] = 'https://siska.kharisma.ac.id//assets//img//foto//mhs//'.$angkatan.'/'.$prodi.'//'.$nimhs.'.jpg';

    };

    $this->load->model('Alumni_model');
    $data['record'] = $this->Alumni_model->GetDataSertifikat($nimhs);
    $data['pendidikanformal'] = $this->Alumni_model->GetDataPendFormal($nimhs);
    $data['pendidikannonformal'] = $this->Alumni_model->GetDataPendNonFormal($nimhs);
    $data['riwayatpekerjaan'] = $this->Alumni_model->GetDataRiwayatPekerjaan($nimhs);
    $data['datadiri'] = $this->Alumni_model->GetDataDiri($nimhs);

    // $this->load->view('alumni/cetakcv_view',$data);

    // $this->output->set_content_type('application/pdf')->set_output(file_get_contents(
		$this->pdf->load_view('alumni/cetakcv_view',$data);
    $this->pdfrender('CV_'.$nimhs.'.pdf');


  }

}
