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
        <h3><b>Form Input Data Perusahaan dan kantor Cabang</b></h3>

        <form role="form" action="" method="post">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Id Mitra</label>
            <input type="text" name="idmitra" class="form-control" id="idmitra" placeholder="id Mitra">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan">
          </div>

          <div class="form-group">
            <label>Brand</label>
            <select class="form-control" id="brand" name="brand">
            <option value='0'>--pilih--</option>
            <?php
            foreach ($brand as $bnd) {
              echo "<option value='$bnd[text]'></option>";
            }
            ?>
          </select>
        </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Status</label>
            <input type="number" name="status" class="form-control" id="status" placeholder="status">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Bidang Usaha</label>
            <input type="number" name="bdgusaha" class="form-control" id="bdgusaha" placeholder="Bidang Usaha">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat Kantor Pusat</label>
            <input type="text" name="alamatkantorpusat" class="form-control" id="alamatkantorpusat" placeholder="Alamat Kantor pusat">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Kota Kantor Pusat</label>
            <input type="number" name="kotakantorpusat" class="form-control" id="kotakantorpusat" placeholder="Kota Kantor pusat">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Dalam Kota</label>
            <input type="text" name="inkota" class="form-control" id="inkota" placeholder="Dalam Kota">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Dalam Negara</label>
            <input type="text" name="innegara" class="form-control" id="innegara" placeholder="Dalam Negara">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Nomor Telepone Kantor Pusat</label>
            <input type="number" name="teleponkantorpusat" class="form-control" id="teleponkantorpusat" placeholder="Telepon Kantor Pusat">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Kode Pos</label>
            <input type="number" name="kdpos" class="form-control" id="kdpos" placeholder="Kode Pos">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Webside</label>
            <input type="text" name="webside" class="form-control" id="webside" placeholder="Webside">
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
