<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        <?php $this->load->view('/admin/nav'); ?>

      </div>

      <div class="col-lg-8 content">
        <h2>Notifikasi Alumni</h2>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Alumni Tanpa Data Pekerjaan
          <span class="badge badge-primary small"><?=count($list_nojobs)?></span>
        </h3>
        
        <table class="table small">
          <thead>
            <tr>
              <th>Alumni</th>
              <th>Email</th>
              <th>Visits</th>
              <th>Last</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($list_nojobs as $key => $value): ?>
              <tr>
                <td><?=$value['namamhs']?></td>
                <td><?=$value['email']?></td>
                <td><?=$value['visits']?></td>
                <td><?=$value['last_login']?></td>
                <td>
                  <a href="/admin/sendnotif/<?=$value['nimhs']?>/1">
                    <img src="/assets/img/email16.png">
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
            <tr><td colspan="5"></td></tr>
          </tbody>
        </table>

        <br>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Alumni Tanpa Referensi Sejawat
          <span class="badge badge-primary small"><?=count($list_nojobs)?></span>
        </h3>
        <table class="table small">
          <thead>
            <tr>
              <th>Alumni</th>
              <th>Email</th>
              <th>Mitra</th>
              <th>Visits</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <img src="/assets/img/email16.png">
              </td>
            </tr>
            <tr><td colspan="5"></td></tr>
          </tbody>

        </table>


      </div>

    </div>

  </div>
</section><!-- #about -->
