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
          <i class="ion-android-checkmark-circle"></i>
          <?=isset($pendidikan)?'Edit Data Pendidikan':'Tambah Riwayat Pendidikan'?>
          <?=$type==2?' Non-formal (Kursus/Pelatihan)':''?>
        </h3>

        <form id="formpd" action="/alumni/<?=isset($pendidikan)?'updatependidikan':'tambahpendidikan'?>" method="post">

          <?php
            if( isset($pendidikan) ) {
          ?>
              <input type="hidden" name="id" value="<?=$pendidikan['id_pendidikan']?>">

              <div class="text-right">
                <a href="/alumni/hapuspendidikan/<?=$pendidikan['id_pendidikan']?>" title="Hapus data ini" id="clickhapus">
                  <img src="/assets/img/delete16.png" alt="Update"> Hapus
                </a>
              </div>
          <?php
            }

            if( $type == 1 ) {
          ?>

          <div class="form-group">
            <label for="level">Program Pendidikan</label>
            <select class="form-control" id="level" name="level">
              <option value=''>--pilih--</option>
              <?php
                foreach ($this->mylib->level_pendidikan as $key => $value):
                  $select = (isset($pendidikan) && $pendidikan['level']==$value['level'])?'SELECTED':'' ;
                ?>
                <option value="<?=$value['level']?>" <?=$select?>><?=$value['program']?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <?php
              }
            ?>

          <div class="form-group">
            <label for="progstudi"><?=$type==2?'Nama Program Pelatihan':'Program Studi'?></label>
            <input type="text" name="progstudi" class="form-control" id="progstudi"
                   <?=isset($pendidikan)?'value="'.$pendidikan['program_studi'].'"':''?>>
          </div>

          <div class="form-group">
            <label for="institusi">Nama Institusi</label>
            <input type="text" name="institusi" class="form-control" id="institusi"
                   placeholder="<?=$type==2?'nama lembaga pelatihan':'nama perguruan tinggi'?>"
                   <?=isset($pendidikan)?'value="'.$pendidikan['institusi'].'"':''?>>
          </div>

          <div class="form-group">
            <?php
              $selectdn = (isset($pendidikan) && ($pendidikan['negara']=='ID' || empty($pendidikan['negara'])) )?'CHECKED':'' ;
              $selectln = (isset($pendidikan) && $pendidikan['negara']!='ID' && !empty($pendidikan['negara']) )?'CHECKED':'' ;
             ?>
            <input type="radio" name="dnln" id="selectdn" value="D" <?=$selectdn?>> Dalam Negeri &nbsp;
            <input type="radio" name="dnln" id="selectln" value="L" <?=$selectln?>> Luar Negeri
          </div>

          <div class="form-group" id="pilihkabkota">
            <label>Kabupaten/Kota</label>
            <select class="form-control" id="kotaid" name="kotaid">
              <option value=''>--pilih--</option>
              <?php
              foreach ($kota as $kt) {
                $kselect = (isset($pendidikan) && $pendidikan['kota']==$kt['name'])?'SELECTED':'' ;
                echo "<option value='$kt[name]' $kselect>$kt[name]</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group" id="inputkotaln" style="display:none;">
            <label for="kotaln">Kota</label>
            <input type="text" class="form-control" id="kotaln" name="kotaln"
                   <?=isset($pendidikan)?'value="'.$pendidikan['kota'].'"':''?>>
          </div>

          <div class="form-group" id="entrinegara" style="display:none;">
            <label for="negara">Negara</label>
            <select class="form-control" id="negara" name="negara">
              <option value=''>--pilih--</option>
              <?php
              foreach ($negara as $ngr) {
                $nselect = (isset($pendidikan) && $pendidikan['negara']==$ngr['code'])?'SELECTED':'' ;
                echo "<option value='$ngr[code]' $nselect>$ngr[country]</option>";
              }
              ?>
            </select>
          </div>

          <?php
          if( $type == 1 ){
          ?>
          <div class="form-group">
            <label for="gelar">Gelar</label>
            <input type="text" name="gelar" class="form-control" id="gelar"
                   placeholder="gelar/sebutan lengkap"
                   <?=isset($pendidikan)?'value="'.$pendidikan['gelar'].'"':''?>>
          </div>

          <div class="form-group">
            <label for="gelarsingkat">Singkatan Gelar</label>
            <input type="text" name="gelarsingkat" class="form-control" id="gelarsingkat"
                   placeholder="singkatan gelar"
                   <?=isset($pendidikan)?'value="'.$pendidikan['gelar_singkat'].'"':''?>>
          </div>
          <?php
              }
          ?>

          <input type="hidden" name="jenis" value="<?=$type?>">
          <!-- <div class="form-group">
            <label for="" class="control-label col-xs-2">Jenis</label>
            <div class="col-md-6">
              <table>
                <td>
                  <tr><input type="radio" name="jenis_cat[]" value="1"> Formal</tr> &nbsp;&nbsp;&nbsp;
                  <tr><input type="radio" name="jenis_cat[]" value="2"> Non Formal</tr>
                </td>
              </table>
            </div>
          </div> -->

          <div class="form-group">
            <label for="tglmulai">Tanggal Masuk</label>
            <input type="text" name="tglmulai" class="form-control datepicker" id="tglmulai"
                   placeholder="Tanggal Mulai Pendidikan"
                   <?=isset($pendidikan)?'value="'.date('d-m-Y',strtotime($pendidikan['tanggal_mulai'])).'"':''?>>
          </div>

          <div class="form-group">
            <label for="tgllulus">Tanggal Lulus</label>
            <input type="text" name="tgllulus" class="form-control datepicker" id="tgllulus"
                   placeholder="Tanggal Lulus Pendidikan"
                   <?=isset($pendidikan) && !empty($pendidikan['tanggal_lulus'])?
                       'value="'.date('d-m-Y',strtotime($pendidikan['tanggal_lulus'])).'"':''?>>
          </div>

          <div class="form-group pull-right">
            <button type="submit" name="add" value="Simpan" class="btn btn-primary">Simpan</button>

            <?php
              if( isset( $pendidikan) ){
            ?>
                <button id="tbcancel" class="btn btn-danger">Cancel</button>
            <?php
              } else {
            ?>
                <button type="reset" id="tbreset" class="btn btn-danger">Reset</button>
          <?php
              }
            ?>
          </div>
        </form>


      </div>
    </div>
  </div>

</section>

<script type="text/javascript">

$(function(){
  if( $('input[type=radio][name=dnln]:checked').val() == 'L' ){
    $("#entrinegara").show();
    $("#inputkotaln").show();
    $("#pilihkabkota").hide();
  }
});

$('input[type=radio][name=dnln]').change(function() {
    if (this.value == 'D') {
      $("#entrinegara").hide();
      $("#inputkotaln").hide();
      $("#pilihkabkota").show();
      $("#negara").val('ID');
    }
    else if (this.value == 'L') {
      $("#entrinegara").show();
      $("#inputkotaln").show();
      $("#pilihkabkota").hide();
    }
});

$("#tbcancel").click(function(){
  $('#formpd').reset();
  document.location.href='/alumni/<?=$this->session->uid?>';
});

$("#tbreset").click(function(){
  $('#formpd').reset();
  document.location.reload();
});


</script>
