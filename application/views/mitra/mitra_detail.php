<section id="about" class="wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 about-img text-center">
        <img src="<?=$mitra['logo']?>" alt="" class="mitra-img">
      </div>

      <div class="col-lg-8 content">
        <h2><?=$mitra['nama_perusahaan']?></h2>
        <h3>
          industry: <strong><?=$mitra['bidang']?></strong><br>
          brand: <strong><?=$mitra['brand']?></strong><br>
          jumlah alumni bekerja: <strong><?=$mitra['total_alumni']?> alumni</strong>
        </h3>

        <ul>
          <li>
            <i class="ion-android-checkmark-circle"></i>
            Kantor Pusat: <?=$mitra['alamat_kantor_pusat'].", ".$mitra['lokasi']." ".
            $mitra['kodepos_kantor_pusat']?>
          </li>
          <li>
            <i class="ion-android-checkmark-circle"></i>
            Telepon: <?=$mitra['telepon_kantor_pusat']?>
          </li>
          <li>
            <i class="ion-android-checkmark-circle"></i>
            Website: <a href="http://<?=$mitra['website']?>" target="_blank">http://<?=$mitra['website']?></a>
          </li>


          <?php
            if( isset( $mitra['cabang']) ){
              ?>
              <li>
                <i class="ion-android-checkmark-circle"></i>Cabang / Unit Kerja:
                <ul>

                  <?php
                  foreach ($mitra['cabang'] as $key => $value) {
                    ?>
                    <li>&nbsp; &nbsp; &nbsp;<?=$value['nama_cabang']?> (<?=$value['jml_alumni']?> alumni)</li>
                    <?php
                  }
                  ?>

                </ul>
              </li>

              <?php
            }
           ?>

        </ul>

      </div>
    </div>

  </div>
</section><!-- #about -->
