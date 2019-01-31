<section id="about" class="wow fadeInUp">
  Hello

  <?php

  if( isset( $this->session->nama_alumni ) ){
    echo $this->session->nama_alumni . " (" .  $this->session->tahun_lulus . ")";
  }

  ?>

</section>
