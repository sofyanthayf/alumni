<html>
  <head>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/jquery.min.js') ?>"></script>

  </head>

  <body>
   <div class="container">
    <div class="row">
      <div class="col-md-6">

      </br> </br>
        <h3><b>Form Kantor Cabang</b></h3>

        <?php if($this->session->flashdata('msg')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i><?= $this->session->flashdata('msg'); ?>
      </div>
      <?php } ?>



          <form role="form" action="" method="post">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Nama Cabang</label>
              <input type="text" name="nama_cabang"  class="form-control" id="namacabang" value="<?= $datakcp['nama_cabang'] ?>" placeholder="Nama Cabang">
            </div>



          <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat Cabang</label>
            <input type="text" name="alamat_cabang" class="form-control" id="alamat_cabang" placeholder="Alamat Cabang">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Kota Cabang</label>
            <input type="text" name="kota_cabang" class="form-control" id="kota_cabang" placeholder="Kota Cabang">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Telepon Cabang</label>
            <input type="number" name="telepon_cabang" class="form-control" id="telepon_cabang" placeholder="Telepon Cabang">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Kode Pos</label>
            <input type="number" name="kodepos" class="form-control" id="kodepos" placeholder="Kode Pos">
          </div>

          <div class="form-group pull-right">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
          </div>

      </form>

      </div>

    </div>

  </div>
  </body>

</html>
