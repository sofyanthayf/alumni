<html>
  <head>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/jquery.min.js') ?>"></script>

    <style type="text/css">
      table,th,td {
        border: 1px solid #C6C6C6;
      }
    </style>

  </head>

<body>
  <div class="container">
    <div class="row">

      <div class="col-sm-3 col-md-3">
        </br> </br>
        <img src= <?php echo $foto ?> width='200px'>
      </div>

      <!-- identitas -->

      <div class="col-sm-6 col-md-6">
        <div class="panel panel-default">
        </br> </br>
        <b>DATA DIRI</b>

          <table class="table">
            <?php foreach ($datadiri as $key):; ?>
            <tr>
              <td class="datafields" width='150px'> Nama Lengkap:</td>
              <td> <?php echo $key->namamhs; ?> </td>
            </tr>

            <tr>
              <td class="datafields" width='150px'> Tempat, Tanggal Lahir:</td>
              <td> <?php echo $key->tplahir; echo ", "; echo date("d-m-Y", strtotime($key->tglahir)); ?> </td>
            </tr>

            <tr>
              <td class="datafields" width='150px'> Alamat:</td>
              <td> <?php echo $key->alamat_rumah; ?> </td>
            </tr>

            <tr>
              <td class="datafields" width='150px'> No. HP:</td>
              <td> <?php echo $key->telepon; ?> </td>
            </tr>

            <tr>
              <td class="datafields" width='150px'> Jenis Kelamin:</td>
              <td> <?php echo $this->mylib->jenis_kelamin[$key->sex]; ?> </td>
            </tr>

            <tr>
              <td class="datafields" name="agama" width='150px'> Agama:</td>
              <td> <?php echo $this->mylib->agama[$key->agama]; ?> </td>
            </tr>

            <tr>
              <td class="datafields" width='150px'> Email:</td>
              <td> <?php echo $key->email; ?> </td>
            </tr>

            <?php endforeach; ?>
            </table>

            </br>

            <!-- pengalaman kerja -->
            <b>PENGALAMAN KERJA</b>

            <table class="table table-hover">
              <?php foreach ($riwayatpekerjaan as $key):; ?>
               <tr>
                 <td width="150px" rowspan="3"> <?php echo date("Y", strtotime($key->tanggal_awal)); ?>  - <?php
                  if ($key->tanggal_akhir == ''){
                    echo "Sekarang";
                  } else {
                    echo date("Y", strtotime($key->tanggal_akhir));
                  }; ?> </td>
                 <td>Perusahaan : <?php echo $key->nama_perusahaan; ?></td>
               </tr>
               <tr>
                 <td>Jabatan : <?php echo $key->jabatan; ?></td>
               </tr>
               <tr>
                 <td>Bidang : <?php echo $key->keahlian; ?></td>
               </tr>
             <?php endforeach; ?>

            </table>
            <form class="form-group pull-right" action="">
              <button type="submit" name="add" value="Simpan" class="btn btn-primary">Tambah</button>
            </form>

          </br> </br>
            <!-- riwayat pendidikan formal -->
            <b>RIWAYAT PENDIDIKAN FORMAL</b>

            <style type="text/css">
              table,th,td {
                border: 1px solid #C6C6C6;
              }
            </style>

            <table class="table table-hover">
              <?php foreach ($pendidikanformal as $key):; ?>
               <tr>
                 <td width="150px" rowspan="4"> <?php echo $key->gelar_singkat; ?> </td>
                 <td>Institusi : <?php echo $key->institusi; ?></td>
               </tr>

               <tr>
                 <td>Program Studi : <?php echo $key->program_studi; ?> </td>
               </tr>

               <tr>
                 <td>Tanggal Mulai : <?php echo date("d-m-Y", strtotime($key->tanggal_mulai)); ?> </td>
               </tr>

               <tr>
                 <td>Tanggal Lulus : <?php echo date("d-m-Y", strtotime($key->tanggal_lulus)); ?> </td>
               </tr>

             <?php endforeach ?>

            </table>

            <form class="form-group pull-right" action="<?php  echo base_url(); ?>alumni/pendidikan">
              <button type="submit" name="add" value="Simpan" class="btn btn-primary">Tambah</button>
            </form>

          </br> </br>
            <!-- riwayat pendidikan nonformal -->
            <b>RIWAYAT PENDIDIKAN NONFORMAL</b>

            <style type="text/css">
              table,th,td {
                border: 1px solid #C6C6C6;
              }
            </style>

            <table class="table table-hover">
              <?php foreach ($pendidikannonformal as $key):; ?>
               <tr>
                 <td width="150px" rowspan="4"> <?php echo $key->gelar_singkat; ?> </td>
                 <td>Institusi : <?php echo $key->institusi; ?></td>
               </tr>

               <tr>
                 <td>Program Studi : <?php echo $key->program_studi; ?> </td>
               </tr>

               <tr>
                 <td>Tanggal Mulai : <?php echo date("d-m-Y", strtotime($key->tanggal_mulai)); ?> </td>
               </tr>

               <tr>
                 <td>Tanggal Lulus : <?php echo date("d-m-Y", strtotime($key->tanggal_lulus)); ?> </td>
               </tr>

             <?php endforeach; ?>

            </table>

            <form class="form-group pull-right" action="<?php  echo base_url(); ?>alumni/pendidikan">
              <button type="submit" name="add" value="Simpan" class="btn btn-primary">Tambah</button>
            </form>

          </br> </br>
            <!-- sertifikasi -->
            <b>SERTIFIKASI</b>

            <style type="text/css">
              table,th,td {
                border: 1px solid #C6C6C6;
              }
            </style>

            <table class="table table-hover">
              <?php foreach ($record as $key):; ?>
               <tr>
                 <td width="150px" rowspan="2"> <?php echo date("d-m-Y", strtotime($key->tanggal_sertifikat)); ?> </td>
                 <td>Judul : <?php echo $key->judul_sertifikat; ?></td>
               </tr>
               <td>Bidang Keahlian : <?php echo $key->keahlian; ?></td>
             <?php endforeach; ?>

            </table>

            <form class="form-group pull-right" action="<?php  echo base_url(); ?>alumni/sertifikat">
              <button type="submit" name="add" value="Simpan" class="btn btn-primary">Tambah</button>
            </form>

        </div>

      </div>

      <div class="col-sm-3 col-md-3">
        </br> </br>
        <div onClick="window.location='<?php echo site_url("alumni/cetakcv");?>'" class="fa fa-print" style="font-size:16px;color:red"></div>
      </div>

    </div>

  </div>
</body>


</html>
