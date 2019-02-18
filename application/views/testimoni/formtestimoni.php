<section id="about" class="wow">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 member">

        <div class="container text-center">
          <img src="<?=$alumnus['foto']?>" alt="" style="max-width:250px;">
        </div>

      </div>

      <div class="col-md-6 content">
        <h2><?=$alumnus['namamhs']?></h2>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Testimoni Alumni
        </h3>

        <form class="formt" id="formtesti" action="/submittestimoni" method="post">
          <div class="text-primary">
            Tuliskan testimoni Anda tentang STMIK KHARISMA Makassar
          </div>

          <div class="form-group">
            <textarea class="form-control" name="testi" id="testi" rows="6"
                      placeholder="-- Tuliskan testimoni singkat Anda sebagai alumni --"
                      required><?= !empty($testimoni) ? $testimoni : '' ?></textarea>
          </div>
          <div class="small">
            maksimal <span id="maxc"></span> huruf
            <span id="ccounter" style="display:none;">
              (<span id="chars" class="text-danger"></span> huruf tersisa)
            </span>
          </div>

          <div class="text-right">
            <button class="btn-primary" type="submit" id="btsubmit" disabled> Simpan </button>
          </div>

        </form>

      </div>
    </div>
  </div>
</section>

<script type="text/javascript">

var chars = 0;
var maxc = 250

$(function(){
  $("#maxc").html( maxc );
  chars = $("#testi").val().length;
  dispCounter();
})

$("#testi").keyup(function(){
  text = $("#testi").val();
  chars = text.length;

  if( chars > maxc ){
    $("#testi").val( (text).substring(0, chars-1) );
    chars = maxc;
  }

  $("#chars").html( (maxc - chars) );
  dispCounter();
})

function dispCounter(){
  if( chars != 0 ){
    $("#ccounter").show();

    if( chars > 50 ) {
      $("#btsubmit").prop('disabled', false);
    } else {
      $("#btsubmit").prop('disabled', true);
    }

  } else {
    $("#ccounter").hide();
  }
}

$("#btsubmit").click(function(){
  $("#formtesti").submit();
});


</script>
