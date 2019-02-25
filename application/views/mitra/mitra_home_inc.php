
<section id="mitra" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Mitra</h2>
      <p>Terima kasih kepada para mitra sekaligus stakeholder, pengguna lulusan STMIK KHARISMA Makassar,
         yang telah mempercayakan kinerja tim, proses bisnis dan kinerja perusahaannya kepada lulusan-lulusan
         terbaik dari STMIK KHARISMA Makassar
       </p>
    </div>

    <div class="owl-carousel clients-carousel">

    <?php
    // >>>>> proses berikut ini telah dipindahkan ke mitra_model >>>>>>
    // var_dump($daftarmitra);
      // foreach ($daftarmitra as $mitra) {
        // $fotomitrajpg = '/assets/img/mitra/' . $mitra['mitra'] . ".jpg";
        // $fotomitrapng = '/assets/img/mitra/' . $mitra['mitra'] . ".png";
        //
        // if( file_exists( FCPATH . $fotomitrajpg ) ) {
        //   // echo $fotomitrajpg->result_array;
        //   echo '<img src="'.$fotomitrajpg.'" alt="" class="mitra-img">';
        // } else if ( file_exists( FCPATH . $fotomitrapng ) )  {
        //   // echo $fotomitrapng->result_array;
        //   echo '<img src="'.$fotomitrapng.'" alt="" class="mitra-img">';
        // }
      // }

      foreach ($daftarmitra as $mitra) {
        if( !empty($mitra['logo']) ){
    ?>
      <span  class="mitra-img-container">
        <a href="/mitra/<?=$mitra['mitra']?>" title="<?=$mitra['nama_perusahaan']?>">
          <img src="<?=$mitra['logo']?>" alt="<?=$mitra['nama_perusahaan']?>" class="mitra-img">
        </a>
      </span>
    <?php
        }
      }
    ?>
    </div>

  </div>
</section><!-- #clients -->
