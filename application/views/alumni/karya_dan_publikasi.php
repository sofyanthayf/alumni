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
        <h3><b>Form Karya Dan Publikasi</b></h3>

        <form role="form" action="" method="post">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Nim</label>
            <input type="number" name="nimmhs" class="form-control" id="nimmhs" placeholder="Nim">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Nama Lengkap</label>
            <input type="text" name="namalengkap" class="form-control" id="namalengkap" placeholder="Nama Lengkap">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Nama Karya</label>
            <input type="text" name="namakarya" class="form-control" id="namakarya" placeholder="Nama Karya">
          </div>


          <div class="form-group">
            <label for="exampleFormControlTextarea1">Tanggal Terbit</label>
            <input type="date" name="tgglterbit" class="form-control" id="tgglterbit" placeholder="Tanggal Terbit">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Media</label>
            <input type="text" name="media" class="form-control" id="media" placeholder="Media">
          </div>

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
