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
        <h3><b>Form Input Riwayat Pendidikan</b></h3>

      <form role="form" action="<?php echo site_url('alumni/insert_pendidikan') ?>" method="post">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Nama Institusi</label>
          <input type="text" name="institusi" class="form-control" id="institusi" placeholder="Nama Perguruan Tinggi atau Lembaga Training">
        </div>

        <div class="form-group">
          <label>Kabupaten/Kota</label>
          <select class="form-control" id="kota" name="kota">
            <option value='0'>--pilih--</option>
            <?php
            foreach ($kota as $kt) {
              echo "<option value='$kt[name]'>$kt[name]</option>";
            }
            ?>
          </select>
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
          <label for="exampleFormControlTextarea1">Program Studi</label>
          <input type="text" name="progstudi" class="form-control" id="progstudi" placeholder="Nama Program Studi atau Judul Training">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Gelar</label>
          <input type="text" name="gelar" class="form-control" id="gelar" placeholder="Gelar yang Diperoleh">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Gelar Singkat</label>
          <input type="text" name="gelarsingkat" class="form-control" id="gelarsingkat" placeholder="Gelar Singkat">
        </div>

        <div class="form-group">
          <label>Level</label>
          <select class="form-control" id="level_cat[]" name="level_cat[]">
            <option value='0'>--pilih--</option>
            <option value="Sarjana">Sarjana</option>
            <option value="Master">Master</option>
            <option value="Doktor">Doktor</option>
          </select>
        </div>

        <div class="form-group">
          <label for="" class="control-label col-xs-2">Jenis
            <?php echo $this->lang->line('jenis_ctgry'); ?>
          </label>
        <div class="col-md-6">
          <table>
            <td>
              <tr><input type="radio" name="jenis_cat[]" value="1"> Formal</tr> &nbsp;&nbsp;&nbsp;
              <tr><input type="radio" name="jenis_cat[]" value="2"> Non Formal</tr>
            </td>
          </table>
        </div>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Tanggal Mulai</label>
          <input type="date" name="tglmulai" class="form-control" id="tglmulai" placeholder="Tanggal Mulai Pendidikan">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Tanggal Lulus</label>
          <input type="date" name="tgllulus" class="form-control" id="tgllulus" placeholder="Tanggal Lulus Pendidikan">
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
