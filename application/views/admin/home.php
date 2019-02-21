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

        <h3><i class="ion-android-checkmark-circle"></i> Request Validasi</h3>
        <table class="table">
          <thead>
            <th>Lulusan</th>
            <th>Jumlah Request</th>
            <th>Accepted</th>
            <th>Registered</th>
          </thead>
          <tbody>
            <?php foreach ($requestValid as $key => $value): ?>
              <tr>
                <td><?=$value['thn_lulus']?></td>
                <td><?=$value['jml_lulusan']?></td>
                <td><?=$value['accepted']?></td>
                <td><?=$value['registered']?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        Total Request
        <table class="table">
          <thead>
            <th>Jumlah Request</th>
            <th>Accepted</th>
            <th>Registered</th>
            <th>Rejected</th>
            <th>Unidentified</th>
          </thead>
          <tbody>
            <?php foreach ($requestValidasi as $key => $value): ?>
              <tr>
                <td><?=$value['jml_request']?></td>
                <td><?=$value['accepted']?></td>
                <td><?=$value['registered']?></td>
                <td><?=$value['rejected']?></td>
                <td><?=$value['unident']?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="5"></td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>

  </div>
</section>
