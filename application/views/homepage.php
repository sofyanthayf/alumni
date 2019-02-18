
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-content">
      <h2><span><?=$jumlah_alumni?></span> Alumni<br>Untuk Indonesia</h2>

      <div>
        <a href="/alumni/login" class="btn-get-started scrollto">Alumni KHARISMA</a>
        <a href="/mitra/login" class="btn-projects scrollto">Mitra KHARISMA</a>
      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('/assets/img/intro-carousel/1.jpg');"></div>
      <div class="item" style="background-image: url('/assets/img/intro-carousel/2.jpg');"></div>
      <div class="item" style="background-image: url('/assets/img/intro-carousel/3.jpg');"></div>
      <div class="item" style="background-image: url('/assets/img/intro-carousel/4.jpg');"></div>
      <div class="item" style="background-image: url('/assets/img/intro-carousel/5.jpg');"></div>
    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="/assets/img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
            <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>

            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>

          </div>
        </div>

      </div>
    </section><!-- #about -->

		<!--==========================
      ALUMNI Section
    ============================-->
		<?php
				$this->load->view('alumni/alumni_home_inc.php');
		 ?>

    <!--==========================
      TESTIMONI Section
    ============================-->
		<?php
				$this->load->view('testimoni/testimoni_home_inc.php');
		 ?>

		 <!--==========================
       MITRA Section
     ============================-->
 		<?php
 				$this->load->view('mitra/mitra_home_inc.php');
 		 ?>

		<!--==========================
		  LOKER Section
		============================-->
		<?php
				$this->load->view('loker/loker_home_inc.php');
		 ?>


    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Untuk informasi, komunikasi dan upaya untuk menjalin kerjasama terkait dengan
             pelayanan dan informasi alumni, silahkan menghubungi kami:
           </p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat Kampus</h3>
              <address>Jl. Baji Ateka no.20, Makassar 90134, Sulawesi Selatan INDONESIA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telepon</h3>
              <p><a href="tel:+155895548855">+62 411 871555</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-android-globe"></i>
              <h3>Web Site</h3>
              <p><a href="http://www.kharisma.ac.id">www.kharisma.ac.id</a></p>
            </div>
          </div>

        </div>
      </div>

      <div class="container mb-4">
 				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1986.801931184157!2d119.4117627001611!3d-5.167250038345989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d63ec571e31%3A0x601270777e3f8020!2sSTMIK+KHARISMA+Makassar!5e0!3m2!1sen!2sid!4v1545468921369" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>
