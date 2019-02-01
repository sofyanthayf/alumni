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
        <h3><b>Form Riwayat Kursus dan Pelatihan</b></h3>

        <form role="form" action="" method="post">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Pendidikan</label>
            <input type="text" name="pendidikan" class="form-control" id="pendidikan" placeholder="Pendidikan">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Institusi</label>
            <input type="text" name="institusi" class="form-control" id="institusi" placeholder="Institusi">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Kota</label>
            <input type="text" name="kota" class="form-control" id="kota" placeholder="Kota">
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


          <div class="form-group">
            <label for="exampleFormControlTextarea1">Program studi</label>
            <input type="text" name="prgstudi" class="form-control" id="prgstudi" placeholder="Program Studi">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Gelar</label>
            <input type="text" name="gelar" class="form-control" id="gelar" placeholder="Gelar">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Gelar Singkat</label>
            <input type="text" name="gelarsingkat" class="form-control" id="gelarsingkat" placeholder="Gelar Singkat">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Level</label>
            <input type="text" name="level" class="form-control" id="level" placeholder="Level">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Formal</label>
            <input type="text" name="formal" class="form-control" id="formal" placeholder="Formal">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Tanggal Mulai</label>
            <input type="date" name="tglmulai" class="form-control" id="tglmulai" placeholder="Tanggal Mulai">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Tanggal Lulus</label>
            <input type="date" name="tgllulus" class="form-control" id="tgllulus" placeholder="Tanggal Lulus">
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
