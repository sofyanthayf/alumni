<section id="alumni" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Alumni Baru</h2>
      <p>Selamat bergabung para alumni baru STMIK KHARISMA Makassar</p>
    </div>
    <div class="row">

      <div class="owl-carousel clients-carousel">

        <?php foreach($fotoalumni as $key):; ?>
        <?php
        $nimhs =  $key->nimhs;

        $angkatan = substr($nimhs,3,2);
        $prodi = substr($nimhs, 0,3);


         $filenama = 'assets/img/alumni/'.$angkatan. '/' .$prodi. '/' .$nimhs. '.jpg';

         // $filenama = '/assets/img/alumni/16/520/52016003.jpg';

         if (file_exists(FCPATH.$filenama)) {
           $link = base_url().$filenama;
         } else {
             $link = 'https://siska.kharisma.ac.id//assets//img//foto//mhs//'.$angkatan.'/'.$prodi.'//'.$nimhs.'.jpg';
         };

        ?>

        <div class="member">
          <div class="pic"><img src=" <?php echo $link; ?> " width='150px' height='250px'></div>
          <div class="details">
            <?php echo $key->namamhs ?>
          </div>
        </div>

       <?php endforeach; ?>

      </div>

    </div>

  </div>
</section><!-- #alumni -->
