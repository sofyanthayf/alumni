<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Layanan Front-end input dan output serta autentikasi user
 */
class User extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->helper('string');
  }

  // >>>>>>>>>>>>>>> Maaf, it works tetapi  terlalu rumit >>>>>>>>>>>>>>
  // >> session->flashdata terlalu cepat hilangnya
	// public function login_alumni()
	// {
	// 	$email = $this->input->post('email');
  //   $password = md5($this->input->post('password'));
  //   if (isset($_POST['login']))
  //   {
  //     $login = $this->user_model->login_alumni($email,$password);
  //     if($login)
  //     {
  //       $session = array (
  //         'isLogin' => TRUE,
  //         'whoLogin' => 'alumni',
  //         'prodi' => $login->prodi,
  //         'nimhs' => $login->nimhs,
  //         'namamhs' => $login->namamhs,
  //         'telepon' => $login->telepon,
  //         'telepon2' => $login->telepon2,
  //         'alamat_rumah' => $login->alamat_rumah,
  //         'distrik_rumah' => $login->distrik_rumah,
  //         'email' => $login->email,
  //         'email2' => $login->email2,
  //         'facebook' => $login->facebook,
  //         'linkedin' => $login->linkedin,
  //         'gplus' => $login->gplus,
  //         'tplahir' => $login->tplahir,
  //         'tglahir' => $login->tglahir,
  //         'sex' => $login->sex,
  //         'agama' => $login->agama,
  //         'gol_darah' => $login->gol_darah,
  //         'smtmulai' => $login->smtmulai,
  //         'tanggal_masuk' => $login->tanggal_masuk,
  //         'sekolah_asal' => $login->sekolah_asal,
  //         'tahunkur' => $login->tahunkur,
  //         'kompetensi' => $login->kompetensi,
  //         'status' => $login->status,
  //         'tanggal_lulus' => $login->tanggal_lulus,
  //         'ipk' => $login->ipk,
  //         'nomor_sk_yudisium' => $login->nomor_sk_yudisium,
  //         'tanggal_sk_yudisium' => $login->tanggal_sk_yudisium,
  //         'judul_tugas_akhir' => $login->judul_tugas_akhir,
  //         'nomor_ijazah' => $login->nomor_ijazah,
  //         'tanggal_ijazah' => $login->tanggal_ijazah,
  //         'tanggal_wisuda' => $login->tanggal_wisuda,
  //         'modified_date' => $login->modified_date
  //       );
  //       $this->session->set_userdata($session);
  //       $this->user_model->update_visits($email);
  //       redirect('/');
  //     }
  //     else
  //     {
  //       $this->session->set_flashdata('loginAlumni', 'Email / Password salah !');
  //       $this->load->template('user/login_alumni');
  //     }
  //   }
  //   else
  //   {
  //     $session = $this->session->userdata('isLogin');
  //     if($session == FALSE)
  //     {
  //       $this->load->template('user/login_alumni');
  //     }
  //     else
  //     {
  //       redirect('/');
  //     }
  //   }
	// }

  // public function login_mitra()
	// {
	// 	$email = $this->input->post('email');
  //   $password = md5($this->input->post('password'));
  //   if (isset($_POST['login']))
  //   {
  //     $login = $this->user_model->login_mitra($email,$password);
  //     if($login)
  //     {
  //       $session = array (
  //         'isLogin' => TRUE,
  //         'whoLogin' => 'mitra',
  //         'email' => $login->email,
  //         'nama' => $login->nama,
  //         'nomor_hp' => $login->nomor_hp,
  //         'mitra' => $login->mitra,
  //         'cabang_mitra' => $login->cabang_mitra,
  //         'divisi' => $login->divisi
  //       );
  //       $this->session->set_userdata($session);
  //       $this->user_model->update_visits($email);
  //       redirect('/');
  //     }
  //     else
  //     {
  //       $this->session->set_flashdata('loginMitra', 'Email / Password salah !');
  //       $this->load->template('user/login_mitra');
  //     }
  //   }
  //   else
  //   {
  //     $session = $this->session->userdata('isLogin');
  //     if($session == FALSE)
  //     {
  //       $this->load->template('user/login_mitra');
  //     }
  //     else
  //     {
  //       redirect('/');
  //     }
  //   }
	// }

  public function logout()
	{
		$this->session->sess_destroy();
    redirect('/');
	}

  public function ganti_password()
  {
		if (isset($_POST['submit']))
    {
      $params = array(
        'email' => $this->session->userdata('email'),
				'password_lama' => md5($this->input->post('password_lama')),
				'password_baru' => md5($this->input->post('password_baru')),
				'password_baru2' => md5($this->input->post('password_baru2'))
      );
      $cek_pass_lama = $this->user_model->cek_password_lama($params);
			if($cek_pass_lama)
			{
				if($params['password_baru'] == $params['password_baru2'])
				{
					$this->user_model->update_password($params);
					$this->session->set_flashdata('pass_ok', 'Password berhasil di-ganti!');
				}
				else
				{
					$this->session->set_flashdata('pass_error', 'Konfirmasi Password Baru tidak sesuai!');
				}
			}
			else
			{
				$this->session->set_flashdata('pass_error', 'Password Lama salah!');
			}
    }
		$this->load->template('user/ganti_password');
	}

  public function validasi_alumni()
	{
    if (isset($_POST['email']))
    {
      $params = array(
        'id' => strtotime("now"),
        'email' => $this->input->post('email'),
        'nimhs' => $this->input->post('nimhs'),
        'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
        'program_studi' => $this->input->post('program_studi'),
        'tahun_masuk' => $this->input->post('tahun_masuk'),
        'tahun_wisuda' => $this->input->post('tahun_wisuda'),
        'nomor_ijazah' => $this->input->post('nomor_ijazah'),
        'pembimbing_skripsi' => $this->input->post('pembimbing_skripsi'),
        'judul_skripsi' => strtoupper($this->input->post('judul_skripsi')),
        'validasi' => '0'
      );
      $this->user_model->tambah_validasiAlumni($params);
    }

    $data['public'] = true;
    $this->load->template('user/validasi_alumni', $data);
	}

  public function lupa_password()
  {

    if (isset($_POST['reset']))
    {
      $email = $this->input->post('email');
      $cek_email = $this->user_model->cek_email($email);
      if($cek_email)
      {
        $data['newp'] = random_string('alnum', 10);
        $this->user_model->reset_password( md5( $data['newp'] ) , $email );
        $this->session->set_flashdata('msg_ok', 'Password baru telah dikirim ke e-mail Anda');

        $maildata['to'] = $email;
        $maildata['subject'] = "Reset Password";
        $maildata['message'] = $this->load->view('emails/resetpassword', $data, true);;

        $sent = $this->mylib->sendEmail( $maildata );

      }
      else
      {
        $this->session->set_flashdata('msg_error', 'Email tidak terdaftar');
      }
    }

    $frdata['public'] = true;
    $this->load->template('user/lupa_password', $frdata);
  }


  // added by Sofyan Thayf

  public function form_login_alumni( $stat = 0 )
  {
    if( isset( $this->session->uid ) ) redirect('/alumni/'.$this->session->uid);

    $data['public'] = true;
    $data['status'] = $stat;
    $this->load->template('user/login_alumni', $data);
  }

  public function form_login_cpmitra( $stat = 0 )
  {
    if( isset( $this->session->uid ) ) redirect('/contactperson');

    $data['public'] = true;
    $data['status'] = $stat;
    $this->load->template('user/login_mitra', $data);
  }


  public function login_alumni()
  {
    $email = $this->input->post('email');
    $password = md5( $this->input->post('password') );
    $ipaddr = $this->input->ip_address();

    $userlogin = $this->user_model->logi( $email, 0 );
    if( $userlogin ){

      if( $userlogin->password != $password ) redirect( '/alumni/login/1');

      $user = array( 'uid' => $userlogin->nimhs,
                     'email' => $userlogin->email,
                     'who' => 'al'
                );

      $this->session->set_userdata( $user );
      $this->user_model->update_visits($email, $ipaddr);
      redirect( '/alumni/'.$this->session->userdata('uid') );

    } else {
      redirect( '/alumni/login/1');
    }
  }

  public function login_cpmitra()
  {
    $email = $this->input->post('email');
    $password = md5( $this->input->post('password') );
    $ipaddr = $this->input->ip_address();

    $userlogin = $this->user_model->login( $email, 1 );

    if( $userlogin ){

      if( $userlogin->password != $password ) redirect( '/mitra/login/1');

      $user = array( 'uid' => $userlogin->id,
                     'email' => $userlogin->email,
                     'who' => 'cp'
                );
      $this->session->set_userdata( $user );
      $this->user_model->update_visits($email, $ipaddr);

      if( isset( $this->session->koderef ) ){
        redirect('/referensi/'.$this->session->koderef );
      } else {
        redirect( '/contactperson');
      }

    } else {
      redirect( '/mitra/login/1');
    }
  }


  public function form_login_admin( $stat = 0 )
  {
    if( isset( $this->session->uid ) ) redirect('/admin');

    $data['public'] = true;
    $data['status'] = $stat;
    $this->load->template('admin/login_admin', $data);
  }

  public function login_admin()
  {
    $email = $this->input->post('email');
    $password = md5( $this->input->post('password') );
    $ipaddr = $this->input->ip_address();

    $userlogin = $this->user_model->login( $email, 9 );
    if( $userlogin ){

      if( $userlogin->password != $password ) redirect( '/admin/login/1');

      $user = array( 'uid' => $userlogin->nidn,
                     'email' => $userlogin->email,
                     'who' => 'ad'
                );

      $this->session->set_userdata( $user );
      $this->user_model->update_visits($email, $ipaddr);
      redirect( '/admin');

    } else {
      redirect( '/admin/login/1');
    }
  }


  public function form_lupapassword($stat=0)
  {
    $data['status'] = $stat;
    $data['public'] = true;
    $this->load->template('user/lupa_password', $data);
  }
}
