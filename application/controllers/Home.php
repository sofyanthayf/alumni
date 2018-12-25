<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page alumni.kharisma.ac.id
 */
class Home extends CI_Controller {

	public function index()
	{
		$this->load->template('homepage');
	}


}
