<?php

class Mylib
{

  public $visi_stmik;
  public $agama;
  public $jenis_kelamin;
  public $program_studi;
  public $level_pendidikan;
  public $level_gaji;
  public $jeniskarya;
  public $login_error;
  public $badan_usaha;
  public $status_kerja;
  public $daftar_kota;
  public $bidang_keahlian;
  public $status_validasi;

  function __construct() {
      $this->CI =& get_instance();
      $this->db = $this->CI->db;
      $this->email = $this->CI->email;

      $this->initvars();
  }

  private function initvars($value='')
  {
    $this->visi_stmik = "MENJADI PERGURUAN TINGGI YANG UNGGUL DALAM BIDANG DIGITAL ENTREPRENEUR'";

    $this->agama = [ '1' => 'Islam', '2' => 'Kristen', '3' => 'Katholik', '4' => 'Hindu', '5' => 'Buddha' ];

    $this->jenis_kelamin = [ 'L' => 'Laki-laki' , 'P' => 'Perempuan' ];

    $this->program_studi = array(
          '55201'=>array('program'=>'Sarjana', 'nama'=>'Teknik Informatika', 'gelar'=>'Sarjana Komputer', 'gelarsingkat'=>'S.Kom.'),
          '55401'=>array('program'=>'Diploma Tiga', 'nama'=>'Teknik Informatika', 'gelar'=>'Ahli Madya Komputer', 'gelarsingkat'=>'A.Md.Kom.'),
          '56601'=>array('program'=>'Diploma Satu', 'nama'=>'Teknik Komputer', 'gelar'=>'Ahli Pratama Komputer', 'gelarsingkat'=>'A.P.Kom.'),
          '57201'=>array('program'=>'Sarjana', 'nama'=>'Sistem Informasi', 'gelar'=>'Sarjana Komputer', 'gelarsingkat'=>'S.Kom.'),
          '57401'=>array('program'=>'Diploma Tiga', 'nama'=>'Manajemen Informatika', 'gelar'=>'Ahli Madya Komputer', 'gelarsingkat'=>'A.Md.Kom.'),
          '57601'=>array('program'=>'Diploma Satu', 'nama'=>'Manajemen Informatika', 'gelar'=>'Ahli Pratama Komputer', 'gelarsingkat'=>'A.P.Kom.')
         );

    $this->level_pendidikan = array(
              array( 'level'=>'Sarjana', 'program'=>'Program Sarjana' ),
              array( 'level'=>'Master', 'program'=>'Program Master/Magister' ),
              array( 'level'=>'Doktor', 'program'=>'Program Doktor' ),
              array( 'level'=>'Profesi', 'program'=>'Pendidikan Profesi' ),
              array( 'level'=>'Dinas', 'program'=>'Pendidikan Kedinasan' )
         );

    $this->level_gaji = array(
              1 => '<= Rp 3.000.000',
              2 => '> Rp 3.000.000 , dan <= Rp 5.000.000',
              3 => '> Rp 5.000.000 , dan <= Rp 10.000.000',
              4 => '> Rp 10.000.000 , dan <= Rp 15.000.000',
              5 => '> Rp 15.000.000 , dan <= Rp 20.000.000',
              6 => '> Rp 20.000.000',
            );

    $this->login_error = array(
            1 => "Email atau Password tidak valid"
          );

    $this->jeniskarya = array(
              1 => 'Artikel',
              2 => 'Makalah/Paper',
              3 => 'Speech/presentasi',
              4 => 'Buku',
              5 => 'Produk'
          );

    $this->badan_usaha = array(
              0 => 'Pemerintah',
              1 => 'Militer (TNI/POLRI)',
              2 => 'BUMN',
              3 => 'BUMD',
              4 => 'Swasta',
              8 => 'Asing',
              9 => 'Non Badan Hukum'
          );

    $this->status_kerja = array(
              1 => 'Karyawan tetap',
              2 => 'Karyawan kontrak',
              3 => 'Freelance/Agen',
              9 => 'Owner/Wirausaha'
            );

    $this->kriteria_penilaian = array(
                                    1 => 'Etika',
                                    2 => 'Keahlian pada Bidang Ilmunya',
                                    3 => 'Kemampuan Berbahasa Asing',
                                    4 => 'Penggunaan Teknologi Informasi',
                                    5 => 'Kemampuan Berkomunikasi',
                                    6 => 'Kerjasama',
                                    7 => 'Pengembangan Diri',
                                    8 => 'Kedisiplinan'
                                );

    $this->daftar_kota = $this->daftarKota();
    $this->bidang_keahlian = $this->daftarKeahlian();

    $this->status_validasi = array(
              0 => 'pengajuan validasi',
              1 => 'data/riwayat perkuliahan tidak ditemukan',
              2 => 'masih perlu data tambahan',
              3 => 'email terdaftar sebagai contact person mitra',
              7 => 'tercatat belum lulus',
              8 => 'email sudah terdaftar, hanya lupa password',
              9 => 'disetujui'
          );
  
  }


  private function daftarKota($prop='')
  {
    if( $prop != '' ){
      $this->db->where('province_id' , $prop );
    }
    $query = $this->db->get('regional_kabkota');
    return $query->result_array();
  }

  public function daftarKeahlian()
  {
    $query = $this->db->get('bidang_keahlian');
    return $query->result_array();
  }


  public function sendEmail($maildata, $tampilvisi=true)
  {
    $this->email->from('layananalumni@kharisma.ac.id', 'Layanan Alumni STMIK KHARISMA');
    $this->email->to($maildata['to']);
    $this->email->set_mailtype('html');
    $this->email->subject($maildata['subject']);

    $data['tampilkanvisi'] = $tampilvisi;
    $data['pesan'] = $maildata['message'];

    $this->email->message( $this->CI->load->view('emails/mail_template', $data, true) );

    if( $this->email->send() ) {
      return true;
    } else {
      $mail_err = '';
			foreach ( $this->email->get_debugger_messages() as $debugger_message ) $mail_err .= $debugger_message;

      return $mail_err;
    }
  }

}

?>
