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
          <?=isset($sertifikasi)?'Edit Data':'Tambah Data'?> Sertifikasi
        </h3>

        <form id="formsr" action="/alumni/<?=isset($sertifikasi)?'updatesertifikasi':'tambahsertifikasi'?>" method="post">
          <?php
            if( isset($sertifikasi) ) {
          ?>
              <input type="hidden" name="id" value="<?=$sertifikasi['id_sertifikat']?>">

              <div class="text-right">
                <a href="/alumni/hapussertifikasi/<?=$sertifikasi['id_sertifikat']?>" title="Hapus data ini" id="clickhapus">
                  <img src="/assets/img/delete16.png" alt="Update"> Hapus
                </a>
              </div>
          <?php
            }
          ?>

          <div class="form-group">
            <label for="judulsertif">Judul Sertifikat*</label>
            <input type="text" name="judulsertif" class="form-control" id="judulsertif"
                   placeholder="judul/nama sertifikat (mis: Sertifikat Kompetensi, Lisensi)"
                   <?=isset($sertifikasi)?'value="'.$sertifikasi['judul_sertifikat'].'"':''?> required>
          </div>

          <div class="form-group">
            <label>Bidang Keahlian*</label>
            <select class="form-control" id="bdgkeahlian" name="bdgkeahlian" required>
              <option value=''>--pilih--</option>
              <?php
              foreach ($bdgkeahlian as $bdg) {
                $bsel = isset($sertifikasi) && $sertifikasi['bidang_keahlian'] == $bdg['kode'] ? 'SELECTED' : '';
                echo "<option value='$bdg[kode]' $bsel>$bdg[keahlian]</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="lembaga">Lembaga Penerbit*</label>
            <input type="text" name="lembaga" class="form-control" id="lembaga"
                   placeholder="nama lembaga penerbit sertifikat"
                   <?=isset($sertifikasi)?'value="'.$sertifikasi['lembaga_penerbit'].'"':''?> required>
          </div>

          <div class="form-group">
            <label>Negara*</label>
            <select class="form-control" id="negara" name="negara" required>
              <option value=''>--pilih--</option>
              <?php
              foreach ($negara as $ngr) {
                $sel = isset($sertifikasi) && $sertifikasi['negara'] == $ngr['code'] ?
                           'SELECTED' : ($ngr['code']=='ID' ? 'SELECTED' : '');
                echo "<option value='$ngr[code]' $sel>$ngr[country]</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="nosertif">Nomor Sertifikat</label>
            <input type="text" name="nosertif" class="form-control" id="nosertif"
                   placeholder="nomor sertifikat"
                   <?=isset($sertifikasi)?'value="'.$sertifikasi['nomor_sertifikat'].'"':''?>>
          </div>

          <div class="form-group">
            <label for="tglsertif">Tanggal Sertifikat*</label>
            <input type="text" name="tglsertif" class="form-control datepicker" id="tglsertif"
                   placeholder="tanggal terbit sertifikat (dd-mm-yyyy)"
                   <?=isset($sertifikasi) && !empty($sertifikasi['tanggal_sertifikat'])?
                       'value="'.date('d-m-Y',strtotime($sertifikasi['tanggal_sertifikat'])).'"':''?> required>
          </div>

          <div class="form-group">
            <label for="tglexpire">Tanggal Expire Sertifikat</label>
            <input type="text" name="tglexpire" class="form-control datepicker" id="tglexpire"
                   placeholder="tanggal batas masa berlaku sertifikat (dd-mm-yyyy)"
                   <?=isset($sertifikasi) && !empty($sertifikasi['tanggal_expire'])?
                       'value="'.date('d-m-Y',strtotime($sertifikasi['tanggal_expire'])).'"':''?>>
          </div>


        <div class="form-group pull-right">
          <button type="submit" name="add" value="Simpan" class="btn btn-primary">Simpan</button>

          <?php
            if( isset( $sertifikasi) ){
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

  $("#tbcancel").click(function(){
    $('#formsr').reset();
    document.location.href='/alumni/<?=$this->session->uid?>';
  });

  $("#tbreset").click(function(){
    $('#formsr').reset();
    document.location.reload();
  });

</script>
