<?php

class Alumni_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function jumlahAlumni( $prodi = '' )
    {
      if( $prodi != ''){
        $this->db->where( 'prodi', $prodi );
      }

      $this->db->select('COUNT(*) jumlah');  // sama dengan 'COUNT(*) AS jumlah'
                                             // 'AS jumlah' adalah operasi rename untuk menentukan
                                             // nama field dari output yang akan dihasilkan
      $query = $this->db->get('alumni');

      /*
       saat dieksekusi, query akan menjadi:
         "SELECT COUNT(*) jumlah FROM alumni"
       atau:
         "SELECT COUNT(*) jumlah FROM alumni WHERE prodi='$prodi'"  (jika $prodi ditentukan)

       hasilnya adalah:

          jumlah  --> nama field
          ------
            1457  --> contoh hasil COUNT(*)

      */

      // return $query->row_array();   // akan memberikan array( 'jumlah' => 1457 ) sebagai nilai return
      return $query->row_array()['jumlah'];  // akan memberikan 1457 sebagai nilai return
    }



}
