    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Form Isian Loker</h2>
        </div>
      </div>

      <div class="container">

        <?php if($this->session->flashdata('msg')) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fa fa-check"></i><?= $this->session->flashdata('msg'); ?>
        </div>
        <?php } ?>

        <div class="form">
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-group">
              <input type="text" name="mitra" class="form-control" id="mitra" value="<?= $loker['nama_perusahaan'] ?>" readonly/>
            </div>
            <div class="form-group">
              <input type="text" name="contactPerson" class="form-control" id="contactPerson" placeholder="Contact Person" />
            </div>
            <div class="form-group">
              <input type="text" class="form-control datepicker" name="tglAwal" id="tglAwal" placeholder="Tgl. Awal"/>
            </div>
            <div class="form-group">
              <input type="text" class="form-control datepicker" name="tglAkhir" id="tglAkhir" placeholder="Tgl. Akhir"/>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="deskripsi" rows="5" placeholder="Deskripsi"></textarea>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="keahlian" id="keahlian" placeholder="Bidang Keahlian" />
            </div>
            <div class="text-center"><button type="submit" name="submit">Submit</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>
