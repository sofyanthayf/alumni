<?php

class Mylib
{

  public $agama;
  public $jenis_kelamin;

  function __construct() {
      $this->CI =& get_instance();

      // $this->visi_stmik = "MENJADI PERGURUAN TINGGI YANG UNGGUL DALAM BIDANG DIGITAL ENTREPRENEUR'";
      $this->initvars();
  }

  private function initvars($value='')
  {

    $this->agama = [ '1' => 'Islam', '2' => 'Kristen', '3' => 'Katholik', '4' => 'Hindu', '5' => 'Buddha' ];
    $this->jenis_kelamin= [ 'L' => 'Laki-laki' , 'P' => 'Perempuan' ];

  }




}

?>
