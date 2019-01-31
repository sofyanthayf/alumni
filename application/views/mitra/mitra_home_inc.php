<section id="mitra" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Mitra</h2>
      <p>Terima kasih kepada para mitra sekaligus stakeholder, pengguna lulusan STMIK KHARISMA Makassar,
         yang telah mempercayakan kinerja tim, proses bisinis dan kinerja perusahaannya kepada lulusan-lulusan
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
        echo
        '<img src="'.$fotomitrajpg.'" alt="" class="mitra-img">'
        ;
      } else if ( file_exists( FCPATH . $fotomitrapng ) )  {
        // echo $fotomitrapng->result_array;
        echo '<img src="'.$fotomitrapng.'" alt="" class="mitra-img">'
        ;
      }

    }

        ?>


      <!-- <img src="/assets/img/mitra/1547623300.jpg" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623301.png" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623302.jpg" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623303.png" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623304.jpg" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623305.png" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623306.jpg" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623307.jpg" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623308.png" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623309.jpg" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623310.jpg" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623311.jpg" alt="" class="mitra-img">
      <img src="/assets/img/mitra/1547623313.png" alt="" class="mitra-img"> -->
    </div>

  </div>
</section><!-- #clients -->
