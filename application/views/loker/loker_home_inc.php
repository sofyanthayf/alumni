
<section id="loker">
  <div class="container">
    <div class="section-header">
      <h2>Lowongan Kerja</h2>
      <p>Informasi lowongan kerja dari perusahaan-perusahaan Mitra STMIK KHARISMA Makassar</p>
    </div>

    <div class="row">

      <div class="col-lg-6">
      <?php foreach($loker as $l) { ?>

        <div class="box wow fadeInLeft">
          <div class="icon"><i class="fa fa-bar-chart"></i></div>
          <h4 class="title"><a href="apply_loker/<?= $l['id'] ?>"><?= $l['nama_perusahaan'] ?></a></h4>
          <p class="description"><?= $l['deskripsi'] ?></p>
        </div>

      <?php } ?>

      <p>Belum ada data</p>

    </div>
    </div>

  </div>
</section><!-- #services -->
