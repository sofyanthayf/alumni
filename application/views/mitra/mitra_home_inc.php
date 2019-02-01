
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
      foreach ($daftarmitra as $mitra) {
        $fotomitrajpg = 'assets/img/mitra/' . $mitra['mitra'] . ".jpg";
        $fotomitrapng = 'assets/img/mitra/' . $mitra['mitra'] . ".png";

        if( file_exists( FCPATH . $fotomitrajpg ) ) {
          // echo $fotomitrajpg->result_array;
          echo '<img src="'.$fotomitrajpg.'" alt="" class="mitra-img">';
        } else if ( file_exists( FCPATH . $fotomitrapng ) )  {
          // echo $fotomitrapng->result_array;
          echo '<img src="'.$fotomitrapng.'" alt="" class="mitra-img">';
        }
      }

    ?>
    </div>

  </div>
</section><!-- #clients -->
