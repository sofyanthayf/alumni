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

	}

	public function index()
	{
		// ambil data dari Alumni_model melalui function jumlahAlumni()
		$data['jumlah_alumni'] = $this->alumni_model->jumlahAlumni();

		// passing data ke view homepage
		$this->load->template('homepage', $data);
	}


}
