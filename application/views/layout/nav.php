<nav id="nav-menu-container">
  <ul class="nav-menu">
    <li class="menu-active"><a href="#body">Home</a></li>
    <li class="menu-has-children"><a href="">Alumni</a>
      <ul>
        <li><a href="#alumni">Alumni Baru</a></li>
        <li><a href="#testimonials">Testimoni</a></li>
      </ul>
    </li>
    <li><a href="#mitra">Mitra</a></li>
    <li><a href="#loker">Lowongan Kerja</a></li>

    <?php
      if( isset( $this->session->nama_alumni )){
     ?>

    <li><a href="/logout">Logout</a></li>

    <?php 
      }
     ?>
  </ul>
</nav><!-- #nav-menu-container -->
