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

          <?php $year = 2019; ?>

            <div class="btn btn-light text-center">
              <h5 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#sub_<?=$year?>"><?=$year?></a>
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

                <div class="btn btn-light text-center">
                  <h5 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#sub_<?=$year?>"><?=$year?></a>
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
                        <a href="#" onclick="listalumni('<?=$value['tgl_yudisium']?>')">
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
      </div>

      <div class="col-lg-9 content">
        <h2>Daftar Alumni</h2>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Yudisium Tanggal:
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

function listalumni( tgyudisium ) {
  $.get("/api_alumni/listalumni/t/"+tgyudisium, function(data){
    // console.log(data.alumni);
    var disp = '';
    $.each(data.alumni, function (index, value) {
      disp += '<div class="photogrid">';
      disp += '<div class="photogrid pic">';

      if( value.mitra !== '' ){
        disp += '<span class="mitra-badge">';
        disp += '<a href="/mitra/' + value.mitra + '" title="' + value.namamitra + '">';
        disp += '<img src="' + value.logomitra + '"></a></span>';
      }

      disp += '<a href="/alumni/' + value.nimhs + '"><img src="' + value.foto + '" style="position:relative; width:100%"></a>';
      disp += '</div>';
      disp += '<div class="photogrid details">' + value.namamhs + '</div>'

      disp += '</div>';
    });
    $("#displayalumni").html(disp);
  });
}

</script>
