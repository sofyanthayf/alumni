<section id="contact" class="wow">
  <div class="container">

    <div class="form row">

      <div class="col-md-3">
      </div>

      <div class="col-md-6">

        <div class="section-header">
          <h2>Ganti Password</h2>
        </div>

        <?php if($this->session->flashdata('pass_ok')) { ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i> <?= $this->session->flashdata('pass_ok'); ?>
          </div>
          <?php
        } elseif($this->session->flashdata('pass_error')) {
          ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-ban"></i> <?= $this->session->flashdata('pass_error'); ?>
          </div>
        <?php } ?>

        <form action="" method="post" role="form">
          <div class="form-group">
            <label>Password Lama :</label>
            <input type="password" class="form-control" name="password_lama" required>
          </div>
          <div class="form-group">
            <label>Password Baru :</label>
            <input type="password" class="form-control" name="password_baru" required>
          </div>
          <div class="form-group">
            <label>Konfirmasi Password Baru :</label>
            <input type="password" class="form-control" name="password_baru2" required>
          </div>
          <div class="text-right"><button type="submit" name="submit">Submit</button></div>
        </form>

      </div>
    </div>
  </div>

</section><!-- #contact -->
