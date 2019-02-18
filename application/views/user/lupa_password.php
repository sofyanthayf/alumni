<section id="contact" class="wow">
  <div class="container">

    <div class="form row">

      <div class="col-md-3">

      </div>

      <div class="col-md-6">
        <div class="section-header">
          <h2>Lupa Password</h2>
        </div>
        <?php if($this->session->flashdata('msg_ok')) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fa fa-check"></i> <?= $this->session->flashdata('msg_ok'); ?>
        </div>
      <?php
        } elseif($this->session->flashdata('msg_error')) {
      ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fa fa-ban"></i> <?= $this->session->flashdata('msg_error'); ?>
        </div>
        <?php } ?>
        <form action="/lupapassword" method="post" role="form">
          <div class="form-group">
            <label>Email :</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required/>
          </div>
          <div class="text-right">
            <button type="submit" name="reset" style="width:200px">Reset Password</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</section><!-- #contact -->
