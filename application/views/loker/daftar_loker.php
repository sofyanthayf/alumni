<section id="loker">
  <div class="container">
    <div class="section-header">
      <h2>Daftar Lowongan Kerja</h2>
    </div>

    <div class="row">

      <table id="tabel_loker" class="table table-striped table-bordered" width="100%">
        <thead>
          <tr>
            <th>Nama Perusahaan</th>
            <th>Tgl. Mulai</th>
            <th>Tgl. Akhir</th>
            <th>Bidang Keahlian</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($loker as $l){ ?>
          <tr>
            <td><a href="apply_loker/<?= $l['id'] ?>"><?= $l['nama_perusahaan'] ?></a></td>
            <td><?= substr($l['tanggal_mulai'],0,10) ?></td>
            <td><?= substr($l['tanggal_akhir'],0,10) ?></td>
            <td><?= $l['bidang_keahlian'] ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>

  </div>
</section><!-- #services -->
