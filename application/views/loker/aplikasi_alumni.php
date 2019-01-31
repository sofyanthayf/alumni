<section id="contact" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Form aplikasi Alumni</h2>
    </div>
  </div>

  <div class="container">

    <div class="form">
      <form action="" method="post" role="form" class="contactForm">
        <div class="form-group">
          <input type="text" name="mitra" class="form-control" id="mitra" value="<?= $loker['nama_perusahaan'] ?>" readonly/>
        </div>
        <div class="form-group">
          <input type="text" name="contactPerson" class="form-control" id="contactPerson" value="<?= $loker['contact_person'] ?>" readonly/>
        </div>
        <div class="form-group">
          <input type="text" class="form-control datepicker" name="tglAwal" id="tglAwal" placeholder="Tgl. Awal" value="<?= substr($loker['tanggal_mulai'],0,10) ?>" readonly/>
        </div>
        <div class="form-group">
          <input type="text" class="form-control datepicker" name="tglAkhir" id="tglAkhir" placeholder="Tgl. Akhir" value="<?= substr($loker['tanggal_akhir'],0,10) ?>" readonly/>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="deskripsi" rows="5" placeholder="Deskripsi" readonly><?= $loker['deskripsi'] ?></textarea>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="keahlian" id="keahlian" placeholder="Bidang Keahlian" value="<?= $loker['bidang_keahlian'] ?>" readonly/>
        </div>
        <div class="form-group text-center">
          <input type="checkbox" required> Saya ingin mendaftar pada lowongan kerja ini.
        </div>
        <div class="text-center"><button type="submit" name="submit">Submit</button></div>
      </form>
    </div>

  </div>
</section><!-- #contact -->

</main>
