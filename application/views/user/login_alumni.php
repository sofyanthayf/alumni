<section id="contact" class="wow fadeInUp">
  <div class="container">

    <div class="form row">

      <div class="col-md-3">

      </div>

      <div class="col-md-6">
        <div class="section-header">
          <h2>Login Alumni</h2>
        </div>
        <?php if($this->session->flashdata('loginAlumni')) { ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fa fa-ban"></i> <?= $this->session->flashdata('loginAlumni');?>
        </div>
        <?php } ?>
        <form action="" method="post" role="form">
          <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required/>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" required/>
          </div>
          <div class="text-right">
            <button type="submit" name="login" style="width:200px">Login</button><br><br>
            <a href="lupa_password"><small>Lupa Password</small></a><br>
            <a href="validasi_alumni"><small>Validasi Alumni</small></a>
          </div>
        </form>
      </div>

    </div>
  </div>
</section><!-- #contact -->
