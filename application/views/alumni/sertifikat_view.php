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
        <h3><b>Form Input Sertifikat</b></h3>

        <form role="form" action="<?php echo site_url('alumni/insert_sertifikat') ?>" method="post">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Nomor Sertifikat</label>
            <input type="text" name="nosertif" class="form-control" id="nosertif" placeholder="Nomor Sertifikat">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Tanggal Sertifikat</label>
            <input type="date" name="tglsertif" class="form-control" id="tglsertif" placeholder="Tanggal Sertifikat">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Judul Sertifikat</label>
            <input type="text" name="judulsertif" class="form-control" id="judulsertif" placeholder="Judul Sertifikat">
          </div>

          <div class="form-group">
            <label>Bidang Keahlian</label>
            <select class="form-control" id="bdgkeahlian" name="bdgkeahlian">
              <option value='0'>--pilih--</option>
              <?php
              foreach ($bdgkeahlian as $bdg) {
                echo "<option value='$bdg[kode]'>$bdg[keahlian]</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Lembaga Penerbit</label>
            <input type="text" name="lembaga" class="form-control" id="lembaga" placeholder="Lembaga Penerbit Sertifikat">
          </div>

          <div class="form-group">
            <label>Negara</label>
            <select class="form-control" id="negara" name="negara">
            <option value='0'>--pilih--</option>
            <?php
            foreach ($negara as $ngr) {
              echo "<option value='$ngr[code]'>$ngr[country]</option>";
            }
            ?>
          </select>
        </div>

        <div class="form-group pull-right">
          <button type="submit" name="add" value="Simpan" class="btn btn-primary">Simpan</button>
          <button type="reset" name="reset" value="Reset" class="btn btn-danger" onclick="document.location.reload()">Reset</button>
        </div>

      </form>

      </div>

    </div>

  </div>
  </body>

</html>
