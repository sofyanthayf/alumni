<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 member">
        <div class="container text-center">
          <img src="<?=$mitra['logo']?>" alt="" class="mitra-img" style="margin-left:auto">
        </div>
      </div>

      <div class="col-lg-6 content">
        <h2><?=$mitra['nama_perusahaan']?></h2>

        <form action="/mitra/uploadlogo" id="uploadlogo" method="post" enctype="multipart/form-data">
        <h3>
          <i class="ion-android-checkmark-circle"></i> Upload Foto Terbaru:
        </h3>
          <input type="hidden" name="id_mitra" value="<?=$mitra['id_mitra']?>">

        <p class="text-primary">
          Upload logo perusahaan, dianjurkan ukuran lebar gambar maksimal 500 pixel <br>
          (format JPG atau PNG, ukuran file maksimal 1 MB)
        </p>

        <table class="table">
          <tr>
            <td class="datafields" width='100px'>File Logo:</td>
            <td>
              <input type="file" class="form-control" id="filelogo" name="filelogo" accept="image/x-png,image/jpeg">
            </td>
          </tr>
          <tr>
            <td></td>
            <td class="text-right">
              <button class="btn btn-primary" type="submit" id="btsubmit" disabled> Upload Logo </button>
              <a href="/mitra/usulanedit/<?=$mitra['id_mitra']?>">
                <button type="button" class="btn btn-danger" name="btcancel"> Batal </button>
              </a>

            </td>
          </tr>
        </table>
        </form>

      </div>
    </div>
  </div>
</section><!-- #about -->

<script type="text/javascript">
  $("#filelogo").bind('change', function(){
    var size = this.files[0].size/1024;
    if( size > 1000 ){
      alert( 'Ukuran file logo '+ size.toFixed(1) +'KB, \nlebih besar dari batas mksimal 1MB (1024KB)' );
      $("#btsubmit").prop('disabled', true);
    } else {
      $("#btsubmit").prop('disabled', false);
    }
  });

  $("#btsubmit").click(function(){
    $("#uploadlogo").submit();
  });
</script>
