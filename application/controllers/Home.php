<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page alumni.kharisma.ac.id
 */
class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// libatkan file class Alumni_model.php , selanjutnya akan disebut sebagai '$this->alumni_model'
		$this->load->model('alumni_model');
		$this->load->model('loker_model');
		$this->load->model('mitra_model');
	}

	public function index()
	{
		$data['public'] = true;

		$data['jumlah_alumni'] = $this->alumni_model->jumlahAlumni();

		// $data['fotoalumni'] = $this->alumni_model->GetFoto();
		$data['daftar_alumni_baru'] = $this->alumni_model->alumni();

		$data['daftarmitra'] =  $this->mitra_model->daftar_mitra();

		$data['loker'] = $this->loker_model->list_loker_home();

		$data['last_yudisum'] = $this->alumni_model->lastYudisium();

		// passing data ke view homepage
		$this->load->template('homepage', $data);
	}

	public function credits()
	{
		$data['public'] = true;
		$this->load->template('credits', $data);
	}

}
