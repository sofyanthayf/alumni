<section id="contact" class="wow fadeInUp">
  <div class="container">

    <div class="form">

      <div class="section-header">
        <h2>Form Validasi Alumni</h2>
      </div>

      <?php if($this->session->flashdata('msg_ok')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i> <?= $this->session->flashdata('msg_ok'); ?>
      </div>
      <?php } ?>

        <div class="form-group">
          <label>Email : <font color="red">*)</font></label>
          <input type="text" class="form-control" name="email" required>
        </div>
        <strong><u>Isi minimal 3 data dibawah :</u></strong>
        <div class="form-group">
          <label>NIM :</label>
          <input type="number" class="form-control" name="nim" onkeypress="if(this.value.length==8) return false;">
        </div>
        <div class="form-group">
          <label>Nama Lengkap :</label>
          <input type="text" class="form-control" name="nama_lengkap">
        </div>
        <div class="form-group">
          <label>Program Studi :</label>
          <select class="form-control" name="program_studi" id="program_studi">
          </select>
        </div>
        <div class="form-group">
          <label>Tahun Masuk :</label>
          <input type="number" class="form-control" name="tahun_masuk" onkeypress="if(this.value.length==4) return false;">
        </div>
        <div class="form-group">
          <label>Tahun Wisuda :</label>
          <input type="number" class="form-control" name="tahun_wisuda" onkeypress="if(this.value.length==4) return false;">
        </div>
        <div class="form-group">
          <label>Nomor Ijazah :</label>
          <input type="text" class="form-control" name="nomor_ijazah" maxlength="32">
        </div>
        <div class="form-group">
          <label>Pembimbing Skripsi :</label>
          <select class="form-control" name="pembimbing_skripsi" id="pembimbing_skripsi">
          </select>
        </div>
        <div class="form-group">
          <label>Judul Skripsi :</label>
          <input type="text" class="form-control" name="judul_skripsi">
        </div>
        <div class="text-right"><button type="submit" onclick="validasiAlumni()">Submit</button></div>

    </div>

  </div>

</section><!-- #contact -->
