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
        <h3><b>Riwayat Pekerjaan</b></h3>

        <form role="form" action="" method="post">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Nim Mahasiswa</label>
            <input type="number" name="nimmhs" class="form-control" id="nimmhs" placeholder="Nim Mahasiswa">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Mitra</label>
            <input type="text" name="mitra" class="form-control" id="mitra" placeholder="Mitra">
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
            <label for="exampleFormControlTextarea1">Divisi</label>
            <input type="text" name="divisi" class="form-control" id="divisi" placeholder="divisi">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Jabatan</label>
            <input type="text" name="Jabatan" class="form-control" id="jabatan" placeholder="jabatan">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Responbility</label>
            <input type="text" name="responbility" class="form-control" id="responbility" placeholder="responbility">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">level Gaji</label>
            <input type="text" name="gaji" class="form-control" id="gaji" placeholder="Level Gaji">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Email Hrd</label>
            <input type="email" name="emailhrd" class="form-control" id="emailhrd" placeholder="Email Hrd">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Email Atasan</label>
            <input type="email" name="emailatasan" class="form-control" id="emailatasan" placeholder="Email Atasan">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Email Sejawat 1</label>
            <input type="email" name="emailsejawat1" class="form-control" id="emailsejawat1" placeholder="Email Sejawat 1">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Email Sejawat 2</label>
            <input type="email" name="emailsejawat2" class="form-control" id="emailsejawat2" placeholder="Email Sejawat 2">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Tanggal Awal</label>
            <input type="date" name="tglawal" class="form-control" id="tglawal" placeholder="Tanggal Awal">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Tanggal Akhir</label>
            <input type="date" name="tglakhir" class="form-control" id="tglakhir" placeholder="Tanggal Akhir">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Owner</label>
            <input type="text" name="owner" class="form-control" id="owner" placeholder="owner">
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
