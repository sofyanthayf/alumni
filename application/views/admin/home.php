<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        <?php $this->load->view('/admin/nav'); ?>
      </div>


      <div class="col-lg-6 content">
        <h2>Aktivitas Alumni</h2>

        <h3>
          <i class="ion-android-checkmark-circle"></i>
          Kunjungan Alumni &nbsp; <span id="totalvisit" class="badge badge-primary"></span>
        </h3>

        <table class="table">
          <thead>
            <th>Lulusan</th>
            <th>Jumlah Alumni Visit</th>
            <th>Rata-rata Visit</th>
          </thead>
          <tbody>
            <?php
              $total = 0;
              foreach ($visit as $key => $value): ?>
              <tr>
                <td><?=$value['thn_lulus']?></td>
                <td><?=$value['jml_lulusan']?></td>
                <td><?=round($value['avg_visit'],1)?></td>
              </tr>
            <?php
              $total += $value['jml_lulusan'];
              endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>

  </div>
</section>

<script type="text/javascript">
  var totalvisit = <?=$total?>;

  $(function(){
    $("#totalvisit").html( totalvisit );

    setTimeout(function() {
        location.reload();
      }, 60000);

  });

</script>
