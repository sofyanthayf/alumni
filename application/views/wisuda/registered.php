<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        <?php $this->load->view('/wisuda/nav'); ?>
      </div>


      <div class="col-lg-6 content">
        <h2>Registrasi Wisuda</h2>

        <p class="text-primary">
          Anda telah terdaftar sebagai Calon Wisudawan pada <strong><?= $peserta['nama_event'] ?></strong>,
          yang akan diselenggarkaan pada tanggal <strong><?= date('d-m-Y', strtotime( $peserta['tanggal'] )) ?></strong>
          bertempat di <?= $peserta['venue'] ?>.
        </p>

        <?php if ( $peserta['tanggal_bayar'] === null ): ?>
          <p>
            Silahkan menyelesaikan proses administrasi pada bagian pelayanan Keuangan STMIK KHARISMA Makassar
            sebelum tanggal batas akhir registrasi.
          </p>
          <p class="text-danger small">
            Jika terdapat perbedaan data administrasi, maka data yang valid adalah data berdasarkan
            bukti fisik transaksi yang dimiliki oleh bagian keuangan STMIK KHARISMA Makassar.
          </p>
        <?php endif; ?>

      </div>
    </div>

  </div>
</section>
