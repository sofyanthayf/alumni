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
        <h3><b>Form Contact Person</b></h3>

        <?php if($this->session->flashdata('msg')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i><?= $this->session->flashdata('msg'); ?>
      </div>
      <?php } ?>



          <form role="form" action="" method="post">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Nama Lengkap</label>
              <input type="text" name="nama" value="<?= $datacontact['nama']; ?>" class="form-control" id="namalengkap" placeholder="Nama Lengkap">
            </div>



          <div class="form-group">
            <label for="exampleFormControlTextarea1">Nomor Hp</label>
            <input type="number" name="nomor_hp" class="form-control" id="nomor_hp" value="<?= $datacontact['nomor_hp']; ?>" placeholder="Nomor Hp">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $datacontact['email']; ?>" placeholder="email">
          </div>

          <div class="form-group">
            <label>Pilih Perusahaan Mitra :</label>
            <select class="form-control" name="mitra">
              <option value="<?= $datacontact['mitra']; ?>" selected><?= $datacontact['nama_perusahaan']; ?></option>
              <?php foreach($datamitra as $dm) { ?>
                <option value="<?= $dm['id_mitra'] ?>"><?= $dm['nama_perusahaan'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Pilih Cabang Mitra :</label>
            <select class="form-control" name="cabang_mitra">
              <option value="<?= $datacontact['cabang_mitra']; ?>" selected><?= $datacontact['nama_cabang']; ?></option>
              <?php foreach($datacabangmitra as $dcm) { ?>
                <option value="<?= $dcm['id_cabang'] ?>"><?= $dcm['nama_cabang'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Divisi</label>
            <input type="text" name="divisi" class="form-control" id="divisi" value="<?= $datacontact['divisi']; ?>" placeholder="divisi">
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
