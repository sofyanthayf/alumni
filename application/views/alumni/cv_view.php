<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 member">
        <div class="container text-center">
          <img src="<?=$alumnus['foto']?>" alt="" style="max-width:250px;">

        <?php
          if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
        ?>
            <a class="btn btn-light btn-block" href="updatefoto" title="Ganti Foto" style="margin:15px;">
              <img src="/assets/img/photo16.png"> update foto
            </a>

            <a class="btn btn-light btn-block" href="/gantipassword" title="Ganti Password" style="margin:15px;">
              <img src="/assets/img/user16.png"> ganti password
            </a>

            <a class="btn btn-light btn-block" href="testimoni"
               title="<?=isset($alumnus['testimoni'])?'Edit':'Tulis'?> testimoni anda tentang KHARISMA"
               style="margin:15px;">
              <img src="/assets/img/edit16.png"> <?=isset($alumnus['testimoni'])?'edit':'tulis'?> testimoni
            </a>
            <br>
            <p class="text-primary small">
              Kelengkapan dan validitas data yang Anda berikan<br>
              pada Layanan Alumni ini akan berdampak<br>
              langsung maupun tidak langsung pada<br>
              peningkatan kualitas dan <strong>peringkat akreditasi</strong><br>
              STMIK KHARISMA Makassar,<br>
              yang pada akhirnya juga akan berdampak<br>
              pada karir Anda sebagai alumni
            </p>


        <?php
          }
        ?>
        </div>

      </div>

      <div class="col-lg-8 content">
        <h2><?=$alumnus['namamhs']?></h2>
        <h3>
          <ul>
            <li>
              <i class="ion-android-checkmark-circle"></i> Lulusan Program
              <?=$this->mylib->program_studi[$alumnus['prodi']]['program']." ".
                 $this->mylib->program_studi[$alumnus['prodi']]['nama']?>
            </li>
            <li>
              <i class="ion-android-checkmark-circle"></i> Tanggal Yudisium:
              <?=!empty($alumnus['tanggal_sk_yudisium']) ? date("d-m-Y", strtotime($alumnus['tanggal_sk_yudisium'])) : ''?>
            </li>
          </ul>
        </h3>

        <?php
          if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
        ?>

          <div class="text-right" id="cvmenu">
            <span id="linkedit">
              <a href="#" title="Perubahan Biodata" id="clickedit">
                <img src="/assets/img/edit16.png" alt="Edit Data"> Edit
              </a>
            </span>
            <span id="linkupdate" style="display:none;">
              <a href="#" title="Simpan perubahan data" id="clickupdate">
                <img src="/assets/img/disc16.png" alt="Update"> Update
              </a>
            </span>
            <span id="linkcancel" style="display:none;">
              &nbsp;|&nbsp;
              <a href="#" title="Batalkan perubahan" id="clickcancel">
                <img src="/assets/img/delete16.png" alt="Update"> Cancel
              </a>
            </span>
            <span id="linkpdf">
              &nbsp;|&nbsp;
              <a href="/alumni/<?=$alumnus['nimhs']?>/pdf" target="_blank"
                 title="Tulis CV ke dalam format PDF untuk dicetak">
                <img src="/assets/img/pdf16.png" alt="Edit Data"> Cetak CV
              </a>
            </span>
          </div>

        <?php
          }
         ?>

       <form action="/alumni/update" id="formbio" method="post">

        <h3>
          <i class="ion-android-checkmark-circle"></i> Biodata:
        </h3>

        <table class="table">
          <tr>
            <td class="datafields" width='180px'>Tempat Lahir:</td>
            <td>
              <input type="text" class="form-control editable" name="tp_lahir"
                     value="<?=$alumnus['tplahir']?>" readonly>
             </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>Tanggal Lahir:</td>
            <td>
              <input type="text" class="form-control datepicker editable" name="tgl_lahir" id="dtgllahir"
                     value="<?=!empty($alumnus['tglahir']) ? date("d-m-Y", strtotime($alumnus['tglahir'])) : ''?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>Jenis Kelamin:</td>
            <td>
              <span id="pilihjkel" style="display:none;">
                <input type="radio" name="jkel" value="L" <?=$alumnus['sex']=='L' ? "CHECKED" : ""?>> Laki-laki
                <input type="radio" name="jkel" value="P" <?=$alumnus['sex']=='P' ? "CHECKED" : ""?>> Perempuan
              </span>
              <span id="textjkel">
                <?=!empty($alumnus['sex'])?$this->mylib->jenis_kelamin[$alumnus['sex']]:''?>
              </span>
            </td>
          </tr>
          <tr>
            <td class="datafields" name="agama" width='180px'>Agama:</td>
            <td>
              <span id="pilihagama" style="display:none;">
                <?php foreach ($this->mylib->agama as $key => $value): ?>
                  <input type="radio" name="pagama"
                         value="<?=$key?>" <?=$alumnus['agama']==$key ? "CHECKED" : ""?>> <?=$value?> <br>
                <?php endforeach; ?>
              </span>
              <span id="textagama">
                <?=!empty($alumnus['agama'])?$this->mylib->agama[$alumnus['agama']]:''?>
              </span>
            </td>
          </tr>
          <tr><td></td><td></td></tr>
        </table>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Kontak:
        </h3>

        <table class="table">

<?php
  if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
    // var_dump($alumnus);
    ?>
          <tr>
            <td class="datafields" width='180px'>Alamat:</td>
            <td>
              <input type="text" class="form-control editable" name="alamat"
                     value="<?=$alumnus['alamat_rumah']?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>Kabupaten/Kota:</td>
            <td>
              <input type="hidden" id="idkabkota" name="idkabkota"
                      value="<?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['id_kabkota']:'7371'?>">
              <input type="text" class="form-control editable" id="kabkota" name="kabkota"
                     value="<?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['nama_kabkota']:'KOTA MAKASSAR'?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>Desa/Kelurahan:</td>
            <td>
              <input type="hidden" id="iddesakelurahan" name="iddesakelurahan"
                      value="<?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['id_desakelurahan']:''?>">
              <input type="text" class="form-control editable" id="desakelurahan" name="desakelurahan"
                     value="<?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['nama_desakelurahan']:''?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>Kecamatan:</td>
            <td>
              <input type="hidden" id="idkecamatan" name="idkecamatan"
                      value="<?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['id_kecamatan']:''?>">
              <input type="text" class="form-control editable" id="kecamatan" name="kecamatan"
                     value="<?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['nama_kecamatan']:''?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>Propinsi:</td>
            <td>
              <input type="text" class="form-control editable" id="propinsi" name="propinsi"
                     value="<?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['nama_propinsi']:''?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>Kode Pos:</td>
            <td>
              <input type="text" class="form-control editable" id="kodepos" name="kodepos"
              value="<?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['kodepos']:''?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>No. Handphone:</td>
            <td>
              <input type="text" class="form-control editable" name="notelp"
                     value="<?=$alumnus['telepon']?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>No. Telepon 2:</td>
            <td>
              <input type="text" class="form-control editable" name="notelp2"
                     value="<?=$alumnus['telepon2']?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>Email:</td>
            <td><?=$alumnus['email']?></td>
          </tr>
<?php
  }
 ?>
          <tr>
            <td class="datafields" width='180px'>Personal Website:</td>
            <td>
              <input type="text" class="form-control editable" name="urlwebsite"
                     value="<?=$alumnus['website']?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>Facebook:</td>
            <td>
              <input type="text" class="form-control editable" name="urlfacebook"
                     value="<?=$alumnus['facebook']?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>LinkedIn:</td>
            <td>
              <input type="text" class="form-control editable" name="urllinkedin"
                     value="<?=$alumnus['linkedin']?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="datafields" width='180px'>Google Scholar:</td>
            <td>
              <input type="text" class="form-control editable" name="urlscholar"
                     value="<?=$alumnus['scholar']?>" readonly>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>

            <?php
            if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
            ?>

              <div class="text-right" id="cvmenu">
                <span id="linkedit2">
                  <a href="#" title="Perubahan Biodata" id="clickedit2">
                    <img src="/assets/img/edit16.png" alt="Edit Data"> Edit
                  </a>
                </span>
                <span id="linkupdate2" style="display:none;">
                  <a href="#" title="Simpan perubahan data" id="clickupdate2">
                    <img src="/assets/img/disc16.png" alt="Update"> Update
                  </a>
                </span>
                <span id="linkcancel2" style="display:none;">
                  &nbsp;|&nbsp;
                  <a href="#" title="Batalkan perubahan" id="clickcancel2">
                    <img src="/assets/img/delete16.png" alt="Update"> Cancel
                  </a>
                </span>
              </div>

            <?php
            }
            ?>

            </td>
          </tr>
        </table>
      </form>


        <h3>
          <i class="ion-android-checkmark-circle"></i> Riwayat Pekerjaan:
        </h3>
        <table class="table">
          <?php foreach ($alumnus['pekerjaan'] as $key => $value): ?>
            <tr>
              <td width='180px'>
                <?=date("Y", strtotime($value['tanggal_awal'])) ." - ".
                   (empty($value['tanggal_akhir'])?'sekarang':date("Y", strtotime($value['tanggal_akhir']))) ?>
              </td>
              <td>
                <?php
                  $job = "";
                  $job .= !empty( $value['divisi'] ) ? $value['divisi']." pada " : "";
                  $job .= $value['nama_perusahaan'];
                  $job .= !empty( $value['cabang_mitra'] ) ? ", ".$value['nama_cabang'] : "";
                  $job .= !empty( $value['jabatan'] ) ? "<br>jabatan: ".$value['jabatan'] : "";

                  echo $job;
                ?>
              </td>

              <td>
              <?php
                if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
               ?>
                  <a href="/alumni/pekerjaan/<?=$value['mitra']?>/<?=$value['cabang_mitra']?>"
                     title="edit data">
                    <img src="/assets/img/edit16.png" alt="edit">
                  </a>
              <?php
                }
              ?>
              </td>

            </tr>
          <?php endforeach; ?>
            <tr>
              <td></td>
              <td colspan="2">
              <?php
              if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
                ?>

                <div class="text-right" id="addjob">
                  <a href="/alumni/pekerjaan" title="Tambahkan Riwayat Pekerjaan">
                    <img src="/assets/img/edit16.png" alt="Tambah Riwayat Pekerjaan"> Tambah Data
                  </a>
                </div>

              <?php
              }
               ?>
              </td>
            </tr>
        </table>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Riwayat Pendidikan Formal:
        </h3>

        <table class="table">
          <?php foreach ($alumnus['pendidikan_formal'] as $key => $value): ?>
            <tr>
              <td width='180px'><?=$value['gelar']." (".$value['gelar_singkat'].")"?></td>
              <td>
                <?=$value['program_studi'].", ".$value['institusi'].", ".$value['kota']."<br>".
                   'Tanggal Masuk: '.date("d-m-Y", strtotime($value['tanggal_mulai']))."<br>".
                   (!empty($value['tanggal_lulus'])?'Tanggal Lulus: '.date("d-m-Y", strtotime($value['tanggal_lulus'])):'Belum Selesai')?>
              </td>

              <td>
            <?php
              if( !empty( $this->session->uid ) &&
                  $this->session->uid == $alumnus['nimhs'] &&
                  $value['id_pendidikan'] != '' ){
             ?>
                <a href="/alumni/pendidikan/1/<?=$value['id_pendidikan']?>" title="edit data">
                  <img src="/assets/img/edit16.png" alt="edit">
                </a>
            <?php
              }
            ?>
              </td>

            </tr>
          <?php endforeach; ?>
            <tr>
              <td></td>
              <td colspan="2">
              <?php
              if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
                ?>

                <div class="text-right" id="addformal">
                  <a href="/alumni/pendidikan/1" title="Tambahkan Riwayat Pendidikan Formal">
                    <img src="/assets/img/edit16.png" alt="Tambah Riwayat Pendidikan"> Tambah Data
                  </a>
                </div>

              <?php
              }
               ?>
              </td>
            </tr>
        </table>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Riwayat Pendidikan Non-formal:
        </h3>

        <table class="table">
          <?php foreach ($alumnus['pendidikan_nonformal'] as $key => $value): ?>
            <tr>
              <td width='180px'><?=date("F Y", strtotime($value['tanggal_mulai']))?></td>
              <td>
                <?=$value['program_studi'].", ".$value['institusi'].", ".$value['kota']."<br>".
                   'Tanggal Mulai: '.date("d-m-Y", strtotime($value['tanggal_mulai']))."<br>".
                   'Tanggal Lulus: '.date("d-m-Y", strtotime($value['tanggal_lulus']))?>
              </td>
              <td>
              <?php
                if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
               ?>
                  <a href="/alumni/pendidikan/2/<?=$value['id_pendidikan']?>" title="edit data">
                    <img src="/assets/img/edit16.png" alt="edit">
                  </a>
              <?php
                }
              ?>
              </td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td></td>
            <td colspan="2">
              <?php
              if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
                ?>

                <div class="text-right" id="addnonformal">
                  <a href="/alumni/pendidikan/2" title="Tambahkan Riwayat Pendidikan Non-formal">
                    <img src="/assets/img/edit16.png"> Tambah Data
                  </a>
                </div>

              <?php
              }
               ?>
            </td>
          </tr>
        </table>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Sertifikasi:
        </h3>
        <table class="table">
        <?php foreach ($alumnus['sertifikasi'] as $key => $value): ?>
          <tr>
            <td width='180px'><?=date("F Y", strtotime($value['tanggal_sertifikat']))?></td>
            <td>
              <?php
                $sert = $value['judul_sertifikat'];
                $sert .= (!empty($value['keahlian']))?", bidang keahlian ".$value['keahlian']:"";
                $sert .= (!empty($value['lembaga_penerbit']))?", dari ".$value['lembaga_penerbit']:"";
                $sert .= (!empty($value['nomor_sertifikat']))?"<br>Nomor Sertifikat: ".$value['nomor_sertifikat']:"";
                $sert .= (!empty($value['tanggal_sertifikat']))?"<br>Tanggal Sertifikat: ".date("d-m-Y", strtotime($value['tanggal_sertifikat'])):"";
                $sert .= (!empty($value['tanggal_expire']))?"<br>Berlaku sampai dengan tanggal: ".date("d-m-Y", strtotime($value['tanggal_expire'])):"";
                echo $sert;
               ?>
            </td>
            <td>
            <?php
              if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
             ?>
                <a href="/alumni/sertifikasi/<?=$value['id_sertifikat']?>" title="edit data">
                  <img src="/assets/img/edit16.png" alt="edit">
                </a>
            <?php
              }
            ?>
            </td>
          </tr>
        <?php endforeach; ?>
          <tr>
            <td></td>
            <td colspan="2">
              <?php
              if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
                ?>

                <div class="text-right" id="addsert">
                  <a href="/alumni/sertifikasi" title="Tambahkan Data Sertifikasi">
                    <img src="/assets/img/edit16.png"> Tambah Data
                  </a>
                </div>

              <?php
              }
               ?>
            </td>
          </tr>
        </table>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Karya dan Publikasi:
        </h3>
        <table class="table">
        <?php foreach ($alumnus['karya'] as $key => $value): ?>
          <tr>
            <td width='180px'><?=date("F Y", strtotime($value['tanggal_rilis']))?></td>
            <td>
              <?php
                $karya = $value['judul'].", ".$this->mylib->jeniskarya[$value['jenis']];
                $karya .= (!empty($value['forum']))?", ".$value['forum']:"";
                $karya .= (!empty($value['publisher']))?", ".$value['publisher']:"";
                $karya .= (!empty($value['edisi']))?", ".$value['edisi']:"";
                $karya .= (!empty($value['tanggal_rilis']))?", tanggal: ".date("d-m-Y", strtotime($value['tanggal_rilis'])):"";

                if( !empty($value['url']) ){
                  if( strpos( $value['url'], 'http' ) !== false ){
                    $url = $value['url'];
                  } else {
                    $url = 'http://'.$value['url'];
                  }
                  $karya .= '<br>(<a href="'.$url.'" target="_blank">'.$url.'</a>)';;
                }

                echo $karya;
               ?>
            </td>
            <td>
            <?php
              if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
             ?>
                <a href="/alumni/karya/<?=$value['id_karya']?>" title="edit data">
                  <img src="/assets/img/edit16.png" alt="edit">
                </a>
            <?php
              }
            ?>
            </td>
          </tr>
        <?php endforeach; ?>
          <tr>
            <td></td>
            <td colspan="2">
              <?php
              if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
                ?>

                <div class="text-right" id="addsert">
                  <a href="/alumni/karya" title="Tambahkan Data Karya/Publikasi/Produk">
                    <img src="/assets/img/edit16.png"> Tambah Data
                  </a>
                </div>

              <?php
              }
               ?>
            </td>
          </tr>
        </table>

        <?php
        if( !empty( $this->session->uid ) && $this->session->uid == $alumnus['nimhs'] ){
          ?>

          <div id="linkpdf2" class="text-right">
            <a href="/alumni/<?=$alumnus['nimhs']?>/pdf" target="_blank"
               title="Tulis CV ke dalam format PDF untuk dicetak">
              <img src="/assets/img/pdf16.png" alt="Cetak CV"> Cetak CV
            </a>
          </div>

          <?php
        }
         ?>

    </div>

  </div>
</section><!-- #about -->

<script type="text/javascript">

$("#clickedit").click(function(){
  enableEdit();
});

$("#clickupdate").click(function(){
  disableEdit();
  $("#formbio").submit();
});

$("#clickcancel").click(function(){
  location.reload();
});

$("#clickedit2").click(function(){
  enableEdit();
});

$("#clickupdate2").click(function(){
  disableEdit();
  $("#formbio").submit();
});

$("#kabkota").autocomplete({
  source: function( request, response ) {
    $.ajax( {
      url: "/api_regional/kabkota",
      dataType: "jsonp",
      data: {
        term: request.term
      },
      success: function( data ) {
        response( $.map( data.kabkota, function( value, key ){
          nama = value.nama_kabkota.toLowerCase();
          if( (nama.indexOf( request.term.toLowerCase() ) !== -1) ){
            return {
              label: value.nama_kabkota,
              value: value.nama_kabkota,
              idkabkota: value.id_kabkota,
              idpropinsi: value.id_propinsi
            }
          }
        } ));
      },
    } );
  },
  minLength: 2,
  select: function( event, ui ) {
    $("#idkabkota").val( ui.item.idkabkota );
    setpropinsi(ui.item.idpropinsi);
    $("#iddesakelurahan").val('');
    $("#desakelurahan").val('');
    $("#kecamatan").val('');
    $("#kodepos").val('');
  },
  change: function( event, ui ){
    if( ui.item === null ){

    }
  }
});

$("#desakelurahan").autocomplete({
  source: function( request, response ) {
    $.ajax( {
      url: "/api_regional/desakelurahan/id/"+$("#idkabkota").val(),
      dataType: "jsonp",
      data: {
        term: request.term
      },
      success: function( data ) {
        response( $.map( data.desakelurahan, function( value, key ){
          nama = value.nama_desakelurahan.toLowerCase();
          if( (nama.indexOf( request.term.toLowerCase() ) !== -1) ){
            return {
              label: value.nama_desakelurahan,
              value: value.nama_desakelurahan,
              iddesakelurahan: value.id_desakelurahan
            }
          }
        } ));
      },
    } );
  },
  minLength: 2,
  select: function( event, ui ) {
    $("#iddesakelurahan").val( ui.item.iddesakelurahan );
    $.get("/api_regional/wilayah/id/"+ui.item.iddesakelurahan , function(data){
      $("#kecamatan").val( data.wilayah.nama_kecamatan);
      $("#kodepos").val( data.wilayah.kodepos);
    });
  },
  change: function( event, ui ){
    if( ui.item === null ){

    }
  }
});

function setpropinsi(id){
  $.get("/api_regional/propinsi/id/"+id, function(data){
    $("#propinsi").val( data.propinsi.nama_propinsi );
  });
}

function enableEdit(){
  $("#linkedit").hide();
  $("#linkpdf").hide();
  $("#linkupdate").show();
  $("#linkcancel").show();

  $("#linkedit2").hide();
  $("#linkpdf2").hide();
  $("#linkupdate2").show();
  $("#linkcancel2").show();

  $("#textjkel").hide();
  $("#pilihjkel").show();

  $("#textagama").hide();
  $("#pilihagama").show();

  $("input").each(function () {
    $(this).prop("readonly", false);
    $(this).css('color', 'blue');
  })

}

function disableEdit(){
  $("#linkupdate").hide();
  $("#linkcancel").hide();
  $("#linkedit").show();

  $("#linkupdate2").hide();
  $("#linkcancel2").hide();
  $("#linkedit2").show();

  $("#textjkel").show();
  $("#pilihjkel").hide();

  $("#textagama").show();
  $("#pilihagama").hide();

  $("input").each(function () {
    $(this).prop("readonly", true);
    $(this).css('color', 'black');
  })

}


</script>
