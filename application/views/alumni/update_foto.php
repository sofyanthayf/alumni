<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 member">
        <div class="container text-center">
          <img src="<?=$alumnus['foto']?>" alt="" style="max-width:250px;">
        </div>
      </div>

      <div class="col-lg-6 content">
        <h2><?=$alumnus['namamhs']?></h2>

        <form action="/alumni/uploadfoto" id="uploadfoto" method="post" enctype="multipart/form-data">
        <h3>
          <i class="ion-android-checkmark-circle"></i> Upload Foto Terbaru:
        </h3>

        <p class="text-primary">
          Upload pas foto berwarna terbaru Anda dengan penampilan formal <br>
          (format JPG atau PNG, ukuran file maksimal 1 MB)
        </p>

        <table class="table">
          <tr>
            <td class="datafields" width='100px'>File Foto:</td>
            <td>
              <input type="file" class="form-control" id="filefoto" name="filefoto" accept="image/x-png,image/jpeg">
            </td>
          </tr>
          <tr>
            <td></td>
            <td class="text-right">
              <button class="btn-primary" type="submit" id="btsubmit" disabled> Upload Foto </button>
            </td>
          </tr>
        </table>
        </form>

      </div>
    </div>
  </div>
</section><!-- #about -->

<script type="text/javascript">
  $("#filefoto").bind('change', function(){
    var size = this.files[0].size/1024;
    if( size > 1000 ){
      alert( 'Ukuran file foto '+ size.toFixed(1) +'KB, \nlebih besar dari batas mksimal 1MB (1024KB)' );
      $("#btsubmit").prop('disabled', true);
    } else {
      $("#btsubmit").prop('disabled', false);
    }
  });

  $("#btsubmit").click(function(){
    $("#uploadfoto").submit();
  });
</script>
