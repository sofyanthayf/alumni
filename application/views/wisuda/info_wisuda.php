<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        <?php $this->load->view('/wisuda/nav'); ?>
      </div>


      <div class="col-lg-6 content">
        <h2><?=$wisuda['nama_event'].' '.date('Y', strtotime($wisuda['tanggal']))?></h2>

        <table class="table">
          <tbody>
            <tr>
              <td class="datafields">Hari:</td>
              <td><?= $this->mylib->nama_hari[ date('w', strtotime($wisuda['tanggal'])) ] ?></td>
            </tr>
            <tr>
              <td class="datafields">Tanggal:</td>
              <td><?= date('d-m-Y', strtotime($wisuda['tanggal'])) ?></td>
            </tr>
            <tr>
              <td class="datafields">Tempat:</td>
              <td><?= $wisuda['venue'] ?></td>
            </tr>
            <tr>
              <td class="datafields">Biaya:</td>
              <td>
                Rp <?= number_format($wisuda['biaya'], 0) ?><br>
                <div class="small">
                  (<?= $this->mylib->terbilang( $wisuda['biaya'] ) ?> Rupiah. )
                </div>
              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <a href="/wisuda/registrasi">
                  <button type="button" class="btn btn-primary">Mendaftar Wisuda</button>
                </a>
              </td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>

  </div>
</section>
