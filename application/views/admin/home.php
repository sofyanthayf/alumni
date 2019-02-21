<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        <img src="/assets/img/mitra/1549001943.jpg" alt="" class="mitra-img">

        <?php $this->load->view('/admin/nav'); ?>
      </div>


      <div class="col-lg-6 content">
        <h2>Aktivitas Alumni</h2>

        <h3><i class="ion-android-checkmark-circle"></i> Kunjungan Alumni</h3>
        <table class="table">
          <thead>
            <th>Lulusan</th>
            <th>Jumlah Alumni Visit</th>
            <th>Rata-rata Visit</th>
          </thead>
          <tbody>
            <?php foreach ($visit as $key => $value): ?>
              <tr>
                <td><?=$value['thn_lulus']?></td>
                <td><?=$value['jml_lulusan']?></td>
                <td><?=round($value['avg_visit'],1)?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>

  </div>
</section>
