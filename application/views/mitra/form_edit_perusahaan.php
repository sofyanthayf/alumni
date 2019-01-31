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
        <h3><b>Form Perusahaan</b></h3>

        <?php if($this->session->flashdata('msg')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i><?= $this->session->flashdata('msg'); ?>
      </div>
      <?php } ?>



          <form role="form" action="" method="post">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Nama Perusahaan</label>
              <input type="text" name="nama_perusahaan"  class="form-control" id="nama_perusahaan" value="<?= $datamitra['nama_perusahaan'] ?>" placeholder="Nama Perusahaan">
            </div>



          <div class="form-group">
            <label for="exampleFormControlTextarea1">Brand</label>
            <input type="text" name="brand" class="form-control" id="brand" value="<?= $datamitra['brand'] ?>" placeholder="Brand">
          </div>


          <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat Kantor Pusat</label>
            <input type="text" name="alamat_kantor_pusat" class="form-control" id="alamat_kantor_pusat" value="<?= $datamitra['alamat_kantor_pusat'] ?>" placeholder="Alamat Kantor Pusat">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Telepon Kantor Pusat</label>
            <input type="number" name="telepon_kantor_pusat" class="form-control" id="telepon_kantor_pusat" value="<?= $datamitra['telepon_kantor_pusat'] ?>" placeholder="Telepon Kantor pusat">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Kode Pos</label>
            <input type="number" name="kodepos" class="form-control" id="kodepos" value="<?= $datamitra['kodepos'] ?>" placeholder="Kode Pos">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Website</label>
            <input type="text" name="website" class="form-control" id="website" value="<?= $datamitra['website'] ?>" placeholder="Website">
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
