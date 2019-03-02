<section id="about" class="wow">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 member">
        <div class="container text-center">
          <img src="<?=$alumnus['foto']?>" alt="" style="max-width:250px;">
          <br>&nbsp;<br>

          <div id="logoblank" style="display:none">
            <a href="/mitra/upload" title="upload file logo perusahaan">
              <img src="/assets/img/mitra/blank.png" class="mitra-img">
            </a>
          </div>

          <div id="logomitra">
            <?php if (isset($pekerjaan)): ?>
              <img src="<?=$logomitra?>" class="mitra-img">
            <?php endif; ?>
          </div>

        </div>

      </div>

      <div class="col-md-6 content">
        <h2><?=$alumnus['namamhs']?></h2>

        <h3>
          <i class="ion-android-checkmark-circle"></i>
          <?=isset($pekerjaan)?'Edit Data':'Tambah Riwayat'?> Pekerjaan
        </h3>

        <form class="formj" id="formjob" action="/alumni/<?=isset($pekerjaan)?'updatepekerjaan':'tambahpekerjaan'?>" method="post">
          <h3><i class="ion-android-checkmark-circle"></i> Tentang Perusahaan:</h3>

          <input type="hidden" id="id_mitra" name="id_mitra"
                 value="<?=isset($pekerjaan)?$pekerjaan['mitra']:''?>">
          <input type="hidden" id="id_cabang" name="id_cabang"
                 value="<?=isset($pekerjaan)?$pekerjaan['cabang_mitra']:''?>">

          <?php
            if( isset($pekerjaan) ) {
          ?>

              <div class="text-right">
                <a href="/alumni/hapuspekerjaan/<?=$pekerjaan['mitra']?>/<?=$pekerjaan['cabang_mitra']?>"
                   title="Hapus data ini" id="clickhapus">
                  <img src="/assets/img/delete16.png" alt="Update"> Hapus
                </a>
              </div>
          <?php
            }
          ?>

          <div class="form-group ui-widget">
            <label for="perusahaan"><strong>Nama Perusahaan*</strong></label>
            <input type="text" name="perusahaan" class="form-control" id="perusahaan"
                   placeholder="nama badan hukum perusahaan"
                   <?=isset($pekerjaan)?'value="'.$pekerjaan['nama_perusahaan'].'" readonly':' required'?>>
          </div>

          <div class="form-group">
            <label for="brand"><strong>Merk Dagang (Brand)</strong></label>
            <input type="text" name="brand" class="form-control" id="brand"
                   placeholder="merek dagang populer dari perusahaan"
                   <?=isset($pekerjaan)?'value="'.$pekerjaan['brand'].'" readonly':''?>>
          </div>

          <div class="form-group">
            <label for="industri"><strong>Bidang Usaha*</strong></label>
            <select name="industri" class="form-control" id="industri" <?=isset($pekerjaan) ?'disabled':'required'?>>
              <option value="">--pilih bidang usaha--</option>
              <?php
                foreach ($industri as $key => $value):
                  $bsel = isset($pekerjaan) && $pekerjaan['bidang_usaha']==$value['kode']?'SELECTED':'';
              ?>
                  <option value="<?=$value['kode']?>" <?=$bsel?>><?=$value['bidang']?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="statusbh"><strong>Status Perusahaan/Instansi*</strong></label>
            <select name="statusbh" class="form-control" id="statusbh"  <?=isset($pekerjaan) ?'disabled':'required'?>>
              <option value="">--pilih status--</option>
              <?php
                foreach ($this->mylib->badan_usaha as $key => $value):
                  $ssel = isset($pekerjaan) && $pekerjaan['statusbh']==$key?'SELECTED':'';
              ?>
                  <option value="<?=$key?>"<?=$ssel?>><?=$value?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="alamatkp"><strong>Alamat Kantor Pusat</strong></label>
            <input type="text" name="alamatkp" class="form-control" id="alamatkp"
                   placeholder="alamat kantor pusat"
                   <?=isset($pekerjaan)?'value="'.$pekerjaan['alamat_kantor_pusat'].'" readonly':''?>>
          </div>

          <div id="kotadn">

            <div class="form-group">
              <label for="kotakp"><strong>Kota Kantor Pusat</strong></label>
              <select name="kotakp" class="form-control" id="kotakp"  <?=isset($pekerjaan) ?'disabled':''?>>
                <option value="">--pilih kota--</option>
                <?php
                foreach ($this->mylib->daftar_kota as $key => $value):
                  $ksel = isset($pekerjaan) && $pekerjaan['kota_kantor_pusat']==$value['id']?'SELECTED':'';
                  ?>
                  <option value="<?=$value['id']?>"<?=$ksel?>><?=$value['name']?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>

          <div id="alamatln">

            <div class="form-group">
              <label for="kotaln"><strong>Kota Kantor Pusat*</strong></label>
              <input type="text" name="kotaln" class="form-control" id="kotaln"
                     placeholder="nama kota kantor pusat di luar negeri"
                     <?=isset($pekerjaan)?'value="'.$pekerjaan['kodepos_kantor_pusat'].'" readonly':''?>>
            </div>

            <div class="form-group" id="entrinegara">
              <label for="negaraln"><strong>Negara*</strong></label>
              <select class="form-control" id="negaraln" name="negaraln" <?=isset($pekerjaan) ?'disabled':''?>>
                <option value=''>--pilih--</option>
                <?php
                foreach ($negara as $ngr) {
                  $nselect = (isset($pekerjaan) && $pekerjaan['ln_negara']==$ngr['code'])?'SELECTED':'' ;
                  echo "<option value='$ngr[code]' $nselect>$ngr[country]</option>";
                }
                ?>
              </select>
            </div>

          </div>

          <div class="form-group">
            <label for="kodeposkp"><strong>Kode Pos Kantor Pusat</strong></label>
            <input type="text" name="kodeposkp" class="form-control" id="kodeposkp"
                   placeholder="kode pos kantor pusat"
                   <?=isset($pekerjaan)?'value="'.$pekerjaan['kodepos_kantor_pusat'].'" readonly':''?>>
          </div>

          <div class="form-group">
            <label for="teleponkp"><strong>Telepon Kantor Pusat</strong></label>
            <input type="text" name="teleponkp" class="form-control" id="teleponkp"
                   placeholder="telepon kantor pusat"
                   <?=isset($pekerjaan)?'value="'.$pekerjaan['telepon_kantor_pusat'].'" readonly':''?>>
          </div>

          <div class="form-group">
            <label for="website"><strong>Website</strong></label>
            <input type="text" name="website" class="form-control" id="website"
                   placeholder="alamat website perusahaan"
                   <?=isset($pekerjaan)?'value="'.$pekerjaan['website'].'" readonly':''?>>
          </div>

          <div class="form-group" id="dicabang">
              <input type="checkbox" id="isoncabang" name="isoncabang" value="1"
                    <?=(isset($pekerjaan) && !empty($pekerjaan['cabang_mitra']))?'checked disabled':''?>>
              Bertugas di kantor cabang
          </div>
          <br>

          <div id="infocabang" style="display:none;">
            <h3><i class="ion-android-checkmark-circle"></i> Tentang Kantor Cabang:</h3>

            <div class="form-group ui-widget">
              <label for="namakc"><strong>Nama Kantor Cabang*</strong></label>
              <input type="text" name="namakc" class="form-control" id="namakc"
                     placeholder="nama kantor cabang"
                     <?=isset($pekerjaan)?'value="'.$pekerjaan['nama_cabang'].'" readonly':''?>>

              <?php if ( isset($pekerjaan) && !empty($pekerjaan['cabang_mitra']) ): ?>
                <div class="text-info">
                  <p><small>(jika berubah kantor cabang, lakukan penambahan riwayat pekerjaan)</small></p>
                </div>
              <?php endif; ?>

            </div>

            <div class="form-group">
              <label for="alamatkp"><strong>Alamat Kantor Cabang</strong></label>
              <input type="text" name="alamatkc" class="form-control" id="alamatkc"
                     placeholder="alamat kantor cabang"
                     <?=isset($pekerjaan)?'value="'.$pekerjaan['alamat_cabang'].'" readonly':''?>>
            </div>

            <div class="form-group">
              <label for="kotakc"><strong>Kota Kantor Cabang*</strong></label>
              <select name="kotakc" class="form-control" id="kotakc"  <?=isset($pekerjaan) ?'disabled':''?>>
                <option value="">--pilih kota--</option>
                <?php
                  foreach ($this->mylib->daftar_kota as $key => $value):
                    $ksel = isset($pekerjaan) && $pekerjaan['kota_cabang']==$value['id']?'SELECTED':'';
                ?>
                    <option value="<?=$value['id']?>"<?=$ksel?>><?=$value['name']?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="kodeposkc"><strong>Kode Pos Kantor Cabang</strong></label>
              <input type="text" name="kodeposkc" class="form-control" id="kodeposkc"
                     placeholder="kode pos kantor cabang"
                     <?=isset($pekerjaan)?'value="'.$pekerjaan['kodepos_cabang'].'" readonly':''?>>
            </div>

            <div class="form-group">
              <label for="teleponkc"><strong>Telepon Kantor Cabang</strong></label>
              <input type="text" name="teleponkc" class="form-control" id="teleponkc"
                     placeholder="telepon kantor cabang"
                     <?=isset($pekerjaan)?'value="'.$pekerjaan['telepon_cabang'].'" readonly':''?>>
            </div>

          </div>
          <br>

          <h3><i class="ion-android-checkmark-circle"></i> Tentang Status Kerja:</h3>

          <div class="form-group">
            <label for="divisikerja"><strong>Divisi Kerja / Bagian</strong></label>
            <input type="text" name="divisikerja" class="form-control" id="divisikerja"
                   placeholder="nama divisi / bagian / unit kerja"
                   <?=isset($pekerjaan)?'value="'.$pekerjaan['divisi'].'"':''?> required>
          </div>

          <div class="form-group">
            <label for="pangkatgol"><strong>Pangkat / Golongan</strong></label>
            <input type="text" name="pangkatgol" class="form-control" id="pangkatgol"
                   placeholder="pangkat/golongan saat ini (bila ada)"
                   <?=isset($pekerjaan)?'value="'.$pekerjaan['pangkat_golongan'].'"':''?>>
          </div>

          <div class="form-group">
            <label for="jabatan"><strong>Jabatan</strong></label>
            <input type="text" name="jabatan" class="form-control" id="jabatan"
                   placeholder="jabatan saat ini"
                   <?=isset($pekerjaan)?'value="'.$pekerjaan['jabatan'].'"':''?>>
          </div>

          <div class="form-group">
            <label for="bidangahli"><strong>Bidang Keahlian*</strong></label>
            <select name="bidangahli" class="form-control" id="bidangahli" required>
              <option value="">--pilih bidang keahlian--</option>
              <?php
                foreach ($this->mylib->bidang_keahlian as $key => $value):
                  $ssel = isset($pekerjaan) && $pekerjaan['bidang_keahlian']==$value['kode']?'SELECTED':'';
              ?>
                  <option value="<?=$value['kode']?>"<?=$ssel?>><?=$value['keahlian']?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="jabatan"><strong>Rensposibility</strong></label>
            <textarea id="responsibility" name="responsibility" class="form-control" rows="8" cols="80"
                      placeholder="-- deskripsi singkat tentang tugas dan tanggung jawab --"><?=isset($pekerjaan)?$pekerjaan['responsibility']:''?></textarea>
          </div>

          <div class="form-group">
            <label for="statuskerja"><strong>Status Pekerja*</strong></label>
            <select name="statuskerja" class="form-control" id="statuskerja" required>
              <option value="">--pilih status pekerja--</option>
              <?php
                foreach ($this->mylib->status_kerja as $key => $value):
                  $ssel = isset($pekerjaan) && $pekerjaan['status_kerja']==$key?'SELECTED':'';
              ?>
                  <option value="<?=$key?>"<?=$ssel?>><?=$value?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="levelgaji"><strong>Level Penghasilan (rata-rata per-bulan)*</strong></label>
            <select name="levelgaji" class="form-control" id="levelgaji" required>
              <option value="">--pilih level penghasilan--</option>
              <?php
                foreach ($this->mylib->level_gaji as $key => $value):
                  $ssel = isset($pekerjaan) && $pekerjaan['level_gaji']==$key?'SELECTED':'';
              ?>
                  <option value="<?=$key?>"<?=$ssel?>><?=$value?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="tglmulaikerja">Tanggal Mulai Bekerja*</label>
            <input type="text" name="tglmulaikerja" class="form-control datepicker" id="tglmulaikerja"
                   placeholder="tanggal mulai bekerja (dd-mm-yyyy)"
                   <?=isset($pekerjaan) && !empty($pekerjaan['tanggal_awal'])?
                       'value="'.date('d-m-Y',strtotime($pekerjaan['tanggal_awal'])).'"':''?> required>
          </div>

          <div class="form-group">
            <label for="tglakhirkerja">Tanggal Berhenti Bekerja</label>
            <input type="text" name="tglakhirkerja" class="form-control datepicker" id="tglakhirkerja"
                   placeholder="(kosongkan jika masih bekerja di perusahaan ini)"
                   <?=isset($pekerjaan) && !empty($pekerjaan['tanggal_akhir'])?
                       'value="'.date('d-m-Y',strtotime($pekerjaan['tanggal_akhir'])).'"':''?>>
          </div>

          <?php
            if( isset($pekerjaan) && empty($referensi) && empty($pekerjaan['tanggal_akhir']) ){
          ?>
              <a href="/alumni/referensi/<?=$pekerjaan['mitra']?>/<?=$pekerjaan['cabang_mitra']?>">
                Anda belum menambahkan Contact Person untuk Referensi
              </a>
              <br>&nbsp;<br>
          <?php
            }
          ?>

          <div class="form-group pull-right">
            <button type="submit" name="add" value="Simpan" class="btn btn-primary">Simpan</button>

            <?php
              if( isset( $pekerjaan) ){
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

  if( $("#isoncabang").is(':checked') ){
    $("#infocabang").show();
  }

  if( $("#negaraln").val() != '' ){
    $("#kotadn").hide();
    $("#alamatln").show();
  } else {
    $("#kotadn").show();
    $("#alamatln").hide();
  }

});

$("#isoncabang").change(function(){
  if( $(this).is(':checked') ){
    $("#infocabang").show();
    if( $("#namakc").val() == '' ){
      $("#namakc").prop('required', true);
      $("#kotakc").prop('required', true);
    }
  } else {
    $("#namakc").prop('required', false);
    $("#kotakc").prop('required', false);
    $("#infocabang").hide();
  }
})

$("#statusbh").change(function(){
  if( $("#statusbh").val() == 8 ){
    $("#kotakp").prop('required', false);
    $("#kotaln").prop('required', true);
    $("#negaraln").prop('required', true);
    $("#kotadn").hide();
    $("#alamatln").show();
  } else {
    $("#kotakp").prop('required', true);
    $("#kotaln").prop('required', false);
    $("#negaraln").prop('required', false);
    $("#kotadn").show();
    $("#alamatln").hide();
  }
});

$("#perusahaan").change(function(){
  if( $("#id_mitra").val() == '' && $("#perusahaan").val() != '' ) {
    $("#logoblank").show();
    $("#logomitra").html('');
  } else if ( $("#perusahaan").val() == '' ) {
    unlockFieldKp();
    clearFieldKp();
  } else {
    $("#logoblank").hide();
  }
});

$("#perusahaan").autocomplete({
  source: function( request, response ) {
    $.ajax( {
      url: "/api_mitra/companylist",
      dataType: "jsonp",
      data: {
        term: request.term
      },
      success: function( data ) {
        response( $.map( data.mitra, function( value, key ){
          nama = value.nama_perusahaan.toLowerCase();
          brand = value.brand.toLowerCase();
          if( (nama.indexOf( request.term.toLowerCase() ) !== -1) || (brand.indexOf( request.term.toLowerCase() ) !== -1) ){
            return {
              label: value.nama_perusahaan + " (" + value.brand + ")",
              value: value.nama_perusahaan,

              id_mitra: value.id_mitra,
              brand: value.brand,
              alamatkp: value.alamat_kantor_pusat,
              teleponkp: value.telepon_kantor_pusat,
              kotakp: value.kota_kantor_pusat,
              kodeposkp: value.kodepos_kantor_pusat,
              website: value.website,
              bidangusaha: value.bidang_usaha,
              statusbh: value.statusbh
            }
          }
        } ));
      },
    } );
  },
  minLength: 2,
  select: function( event, ui ) {
    $("#id_mitra").val( ui.item.id_mitra );
    $("#brand").val( ui.item.brand );
    $("#alamatkp").val( ui.item.alamatkp );
    $("#teleponkp").val( ui.item.teleponkp );
    $("#kodeposkp").val( ui.item.kodeposkp );
    $("#website").val( ui.item.website );

    $("#industri option[value=" + ui.item.bidangusaha + "]").prop( 'selected', true );
    $("#statusbh option[value=" + ui.item.statusbh + "]").prop( 'selected', true );
    $("#kotakp option[value=" + ui.item.kotakp + "]").prop( 'selected', true );

    $.get( "/api_mitra/logomitra/id/" + ui.item.id_mitra , function( result ){
      $("#logomitra").html('<img src="' + result.logomitra + '" class="mitra-img">')
    })

    lockFieldKp();
  },
  change: function( event, ui ){
    if( ui.item === null ){
      unlockFieldKp();
      clearFieldKp();
    }
  }
});

$("#namakc").autocomplete({
  source: function( request, response ){
    $.ajax( {
      url: "/api_mitra/branchlist/id/" + $("#id_mitra").val() ,
      dataType: "jsonp",
      data: {
        term: request.term
      },
      success: function( data ){
        response( $.map( data.cabang_mitra, function( value, key ){
          namakc = value.nama_cabang.toLowerCase();
          if( namakc.indexOf( request.term.toLowerCase() ) !== -1 ){
            return {
              label: value.nama_cabang,
              value: value.nama_cabang,

              idkc: value.id_cabang,
              alamatkc: value.alamat_cabang,
              teleponkc: value.telepon_cabang,
              kodeposkc: value.kodepos_cabang,
              kotakc: value.kota_cabang
            }
          }
        } ));
      }
    } );
  },
  minLength: 1,
  select: function( event, ui ){
    $("#alamatkc").val( ui.item.alamatkc );
    $("#teleponkc").val( ui.item.teleponkc );
    $("#kodeposkc").val( ui.item.kodeposkc );

    $("#kotakc option[value=" + ui.item.kotakc + "]").prop( 'selected', true );
    $("#id_cabang").val( ui.item.idkc );
    lockFieldKc();
  },
  change: function( event, ui ){
    if( ui.item === null ){
      unlockFieldKc();
      clearFieldKc();
    }
  }
});

function clearFieldKp(){
  $("#id_mitra").val('');
  $("#brand").val('');
  $("#alamatkp").val('');
  $("#teleponkp").val('');
  $("#kodeposkp").val('');
  $("#website").val('');

  $("#kotakp option[value='']").prop( 'selected', true );
  $("#industri option[value='']").prop( 'selected', true );
  $("#statusbh option[value='']").prop( 'selected', true );

  $("#logomitra").html('');
}

function lockFieldKp(){
  $("#brand").prop('readonly' , true);
  $("#alamatkp").prop('readonly' , true);
  $("#teleponkp").prop('readonly' , true);
  $("#kodeposkp").prop('readonly' , true);
  $("#website").prop('readonly' , true);

  $("#kotakp").prop('disabled' , true );
  $("#industri").prop('disabled' , true );
  $("#statusbh").prop('disabled' , true );
}

function unlockFieldKp(){
  $("#brand").prop('readonly' , false);
  $("#alamatkp").prop('readonly' , false);
  $("#teleponkp").prop('readonly' , false);
  $("#kodeposkp").prop('readonly' , false);
  $("#website").prop('readonly' , false);

  $("#kotakp").prop('disabled' , false );
  $("#industri").prop('disabled' , false );
  $("#statusbh").prop('disabled' , false );
}

function clearFieldKc(){
  $("#alamatkc").val('');
  $("#teleponkc").val('');
  $("#kodeposkc").val('');

  $("#kotakc option[value='']").prop( 'selected', true );
}

function lockFieldKc(){
  $("#alamatkc").prop('readonly' , true );
  $("#teleponkc").prop('readonly' , true );
  $("#kodeposkc").prop('readonly' , true );

  $("#kotakc").prop('disabled' , true );
}

function unlockFieldKc(){
  $("#alamatkc").prop('readonly' , false );
  $("#teleponkc").prop('readonly' , false );
  $("#kodeposkc").prop('readonly' , false );

  $("#kotakc").prop('disabled' , false );
}

</script>
