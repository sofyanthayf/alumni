<section id="about" class="wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 about-img text-center">
        <img src="<?=$mitra['logo']?>" alt="" class="mitra-img" style="margin-left:auto">
      </div>

      <div class="col-lg-7 content">
        <h2><?=$mitra['nama_perusahaan']?></h2>

        <form class="form" action="/contactperson/update" method="post">
          <h3>
            <i class="ion-android-checkmark-circle"></i> Update Data Contact Person
          </h3>

          <table class="table">
            <tr>
              <td class="datafields" width="160">Nama Lengkap*:</td>
              <td>
                <input type="text" class="form-control" name="nama"
                       value="<?=$cp['nama']?>" required>
              </td>
            </tr>
            <tr>
              <td class="datafields">Divisi*:</td>
              <td>
                <input type="text" class="form-control" name="divisi"
                       value="<?=$cp['divisi']?>" required>
              </td>
            </tr>
            <tr>
              <td class="datafields">Jabatan*:</td>
              <td>
                <input type="text" class="form-control" name="jabatan"
                       value="<?=$cp['jabatan']?>" required>
              </td>
            </tr>
            <tr>
              <td class="datafields">Nomor HP:</td>
              <td>
                <input type="text" class="form-control" name="nomorhp" value="<?=$cp['nomor_hp']?>">
              </td>
            </tr>
            <tr>
              <td class="text-right" colspan="2">
                <input type="submit" class="btn btn-primary" name="" value=" Update ">
              </td>
            </tr>
          </table>
        </form>

      </div>
    </div>

  </div>
</section><!-- #about -->
