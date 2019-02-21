<section id="alumni" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Alumni Baru</h2>
      <p>
        Selamat bergabung para alumni baru STMIK KHARISMA Makassar
        (Yudisium tanggal: <?= date( 'd-m-Y', strtotime($last_yudisum) ) ?>)
      </p>
    </div>
    <div class="row">

      <div class="owl-carousel clients-carousel">

        <?php
        foreach($daftar_alumni_baru as $key):;
        // foreach($fotoalumni as $key):;
        // $nimhs =  $key->nimhs;
        //
        // $angkatan = substr($nimhs,3,2);
        // $prodi = substr($nimhs, 0,3);
        //
        // >>>>>>> PROSES INI TELAH DIPINDAHKAN KE Alumni_model
        //  $filenama = 'assets/img/alumni/'.$angkatan. '/' .$prodi. '/' .$nimhs. '.jpg';
        //
        //  // $filenama = '/assets/img/alumni/16/520/52016003.jpg';
        //
        //  if (file_exists(FCPATH.$filenama)) {
        //    $link = base_url().$filenama;
        //  } else {
        //      $link = 'https://siska.kharisma.ac.id/assets/img/foto/mhs/'.$angkatan.'/'.$prodi.'/'.$nimhs.'.jpg';
        //  };
        //
        ?>

        <div class="member">
          <div class="pic" style="position:relative;">
            <?php if (!empty($key['mitra'])): ?>
              <span class="mitra-badge">
                <a href="/mitra/<?=$key['mitra']?>" title="<?=$key['namamitra']?>">
                  <img src="<?=$key['logomitra']?>">
                </a>
              </span>
            <?php endif; ?>
            <a href="/alumni/<?=$key['nimhs']?>">
              <img src="<?=$key['foto']?>">
            </a>
          </div>

          <div class="details"><?=$key['namamhs']?></div>

          <div class="social-media text-right" style="position:relative;">
            <?php
            if( !empty($key['scholar']) ){
              echo '<a href="'.$key['scholar'].'" title="Google Scholar"
              target="_blank"><i class="ai ai-fw ai-google-scholar"></i></a>';
            }
            if( !empty($key['linkedin']) ){
              echo '<a href="'.$key['linkedin'].'" title="LinkedIn"
              target="_blank"><i class="fa fa-fw fa-linkedin-square"></i></a>';
            }
            if( !empty($key['facebook']) ){
              echo '<a href="'.$key['facebook'].'" title="Facebook"
              target="_blank"><i class="fa fa-fw fa-facebook-square"></i></a>';
            }
            ?>
          </div>
        </div>

       <?php endforeach; ?>

      </div>

    </div>

  </div>
</section><!-- #alumni -->
