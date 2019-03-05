<section id="about" class="wow">
  <div class="container">
    <div class="row">

      <div class="col-lg-3">

        <div class="text-center">
          <img src="/assets/img/mitra/1549001943.gif" alt="" class="mitra-img">
        </div>
        <br>

        <div class="panel-group" id="accordion">
          <div class="panel panel-default">

          <?php $year = date('Y', strtotime( $last_yudisium ) ); ?>

            <div class="btn btn-light  btn-block text-center">
              <h5 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion"
                   href="#sub_<?=$year?>"><?=$year!='1970'?$year:'no-data'?>
                </a>
              </h5>
            </div>

            <div id="sub_<?=$year?>" class="panel-collapse collapse in">
              <div class="panel-body">
                <table class="table">

            <?php

              foreach ($list_yudisium as $key => $value):
                $yy = date('Y', strtotime($value['tgl_yudisium']));
                if( $yy != $year ) {
                  $year = $yy;
            ?>

                    </table>
                  </div>
                </div>

                <div class="btn btn-light  btn-block text-center">
                  <h5 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#sub_<?=$year?>"><?=$year!='1970'?$year:'no-data'?>
                    </a>
                  </h5>
                </div>

                <div id="sub_<?=$year?>" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <table class="table">
            <?php
                }
            ?>

                    <tr>
                      <td class="text-center">
                        <a href="#" onclick="listalumniByTgl('<?=$value['tgl_yudisium']?>')">
                          <?=date('d-m-Y', strtotime($value['tgl_yudisium']))?>
                        </a>
                      </td>
                      <td class="text-center"><span class="badge badge-primary"><?=$value['jumlah']?></span></td>
                    </tr>


            <?php endforeach; ?>

                </table>
              </div>
            </div>

          </div>
        </div>

        <div class="text-danger text-center small">
          <p>
            Mohon maaf, <br>
            sebagian kecil data alumni belum <br>
            dilengkapi dengan Tanggal Yudisium <br>
            sehingga untuk sementara terkelompok <br>
            ke dalam kategori <strong>'no-data'</strong>.<br>
            Kami sedang berusaha melengkapinya
          </p>
        </div>
      </div>

      <div class="col-lg-9 content">
        <h2>Daftar Alumni</h2>

        <table width="100%">
          <tr>
            <td class="datafields">Search:</td>
            <td width="40%">
              <input type="text" id="txtsearch" class="form-control" placeholder="Nama atau NIM alumni">
            </td>
          </tr>
        </table>

        <h3>
          <i class="ion-android-checkmark-circle"></i> <span id="resultstate"></span>
        </h3>

        <div id="displayalumni"></div>

        <table class="table" id="tabelalumni">
          <tbody>
          </tbody>
        </table>

      </div>

    </div>

  </div>
</section><!-- #about -->

<script type="text/javascript">
var lastyudisium = '<?=$last_yudisium?>';
var bysearch = false;

$(function(){
  listalumniByTgl( lastyudisium );
});

$("#txtsearch").keyup(function(){

  if( $(this).val().length >= 3 ){
    bysearch = true;
    getAlumni( '/k/' + $(this).val() );
    $("#resultstate").html( "Search results for: <strong>'" + $(this).val() + "'</strong>" );
  }

  if( $(this).val().length == 0 ){
    listalumniByTgl( lastyudisium );
  }

});

function listalumniByTgl( tgyudisium ) {
  $("#resultstate").html( "Yudisium Tanggal: <strong>" + formatTgl(tgyudisium) + "</strong>");
  bysearch = false;
  getAlumni( '/t/' + tgyudisium );
}

function getAlumni( param ) {
  $.get( "/api_alumni/listalumni" + param, function(data){
    // console.log(data.alumni);
    var disp = '';
    $.each(data.alumni, function (index, value) {
      disp += '<div class="photogrid">';
      disp += '<div class="photogrid pic">';

      if( value.mitra !== undefined ){
        disp += '<span class="mitra-badge">';
        disp += '<a href="/mitra/' + value.mitra + '" title="' + value.namamitra + '">';
        disp += '<img src="' + value.logomitra + '"></a></span>';
      }

      disp += '<a href="/alumni/' + value.nimhs + '" target="_blank">';
      disp += '<img src="' + value.foto + '" onerror="imgError(this,\'' + value.sex + '\' );"></a>';
      disp += '</div>';
      disp += '<div class="photogrid details">' + value.namamhs;

      if(bysearch){
        disp += '<br>(lulus: ' + formatTgl(value.tanggal_sk_yudisium) + ')';
      }

      disp += '</div></div>'

    });
    $("#displayalumni").html(disp);
  });
}

function formatTgl( tanggal ){
  var date    = new Date(tanggal),
      yr      = date.getFullYear(),
      month   = date.getMonth()+1,
      // month   = date.getMonth()+1 < 10 ? '0' + date.getMonth()+1 : date.getMonth()+1,
      day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
      newDate = day + '-' + month + '-' + yr;
  return newDate;
}

function imgError(image, lp) {
    image.onerror = "";
    image.src = "/assets/img/alumni/nopic_" + lp + ".png";
    return true;
}

</script>
