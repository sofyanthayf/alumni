<?php

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($email, $stat)
  	{
  		$this->db->where('users.email', $email);
      $this->db->where('users.status', $stat);

      if( $stat == 0 ) $this->db->join('alumni', 'alumni.email=users.email', 'LEFT');
      if( $stat == 1 ) $this->db->join('contact_person', 'contact_person.email=users.email', 'LEFT');
      if( $stat == 9 ) $this->db->join('admin', 'admin.email=users.email', 'LEFT');

      return $this->db->get('users')->row();
  	}

    public function login_alumni($email)
  	{
  		$this->db->where('users.email', $email);
      $this->db->where('users.status', '0');
      $this->db->join('alumni', 'alumni.email=users.email', 'LEFT');
      return $this->db->get('users')->row();
  	}

    public function login_mitra($email)
  	{
      $this->db->where('users.email', $email);
      $this->db->where('users.status', '1');
      $this->db->join('contact_person', 'contact_person.email=users.email', 'LEFT');
      return $this->db->get('users')->row();
  	}

    public function login_admin($email)
  	{
      $this->db->where('users.email', $email);
      $this->db->where('users.status', '9');
      $this->db->join('admin', 'admin.email=users.email', 'LEFT');
      return $this->db->get('users')->row();
  	}

    public function update_visits($email, $ipaddr)
  	{
      $this->db->where('email', $email);
      $this->db->set('visits', 'visits+1', FALSE);
      $this->db->set('last_ipaddr', $ipaddr);
      $this->db->update('users');
  	}

    public function cek_password_lama($params)
  	{
      $this->db->where('email', $params['email']);
      $this->db->where('password', $params['password_lama']);
      return $this->db->get('users')->row();
  	}

    public function update_password($params)
    {
      $this->db->set('password', $params['password_baru']);
      $this->db->where('email', $params['email']);
      $this->db->update('users');
    }

    public function tambah_validasiAlumni($params)
  	{
      $this->db->insert('validasi_alumni',$params);
  	}

    public function cek_email($email)
  	{
      $this->db->where('email', $email);
      return $this->db->get('users')->row();
  	}

    public function reset_password($newp,$email)
    {
      $this->db->set('password', $newp);
      $this->db->where('email', $email);
      $this->db->update('users');
    }


    public function emailIsAlumni( $email )
    {
      $this->db->where('email', $email);
      $query = $this->db->get('alumni');

      if( $query->num_rows() > 0 ){
        return 1;
      }
      return 0;
    }

    public function emailValid($email)
    {
      // $this->CI->load->library('unirest');
      // $response = $this->unirest->get($url, $headers = array());
      // $response = $this->unirest->post($url, $headers = array(), $body = NULL);
      // $response = $this->unirest->put($url, $headers = array(), $body = NULL);
      // $response = $this->unirest->patch($url, $headers = array(), $body = NULL);
      // $response = $this->unirest->delete($url, $headers = array());

      // $url = "https://email-checker.p.rapidapi.com/verify/v1?email=sofyan.thayf%40kharisma.ac.id";
      // $key = "3a9760dacmsh493b2c02bc77616p1fc1ecjsn8d5432be551";

      // $response = Unirest\Request::post("https://zozor54-email-checker-v1.p.rapidapi.com/emailValidate",
      //   array(
      //     "X-RapidAPI-Key" => "f3a9760dacmsh493b2c02bc77616p1fc1ecjsn8d5432be5515",
      //     "Content-Type" => "application/x-www-form-urlencoded"
      //   ),
      //   array(
      //     "email" => "sofyanthayf@gmail.com"
      //   )
      // );
      // $url = getenv( 'RAPID_API_MAIL_CHECKER_URL' ) . urlencode( $email );
      // var_dump($url);
      $response = $this->unirest->post( "https://zozor54-email-checker-v1.p.rapidapi.com/emailValidate",
                                        array( "X-RapidAPI-Key" => "f3a9760dacmsh493b2c02bc77616p1fc1ecjsn8d5432be5515",
                                               "Content-Type" => "application/x-www-form-urlencoded" ),
                                        array( "email" => $email ) );
      return $response;
    }

    public function validasiWaitingList( $email )
    {
      $this->db->where('email', $email);
      $this->db->where('validasi', 0);
      $query = $this->db->get('validasi_alumni');
      if( $query->num_rows() > 0 ){
        return 1;
      }
      return 0;
    }

    public function validasiEmailCP( $email )
    {
      $this->db->where('email', $email);
      $this->db->where('status', 1);
      $query = $this->db->get('users');
      if( $query->num_rows() > 0 ){
        return 1;
      }
      return 0;
    }


}
