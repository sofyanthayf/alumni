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
          <?=isset($karya)?'Edit Data':'Tambah Data'?> Karya Publikasi/Produk
        </h3>

        <form id="formkr" action="/alumni/<?=isset($karya)?'updatekarya':'tambahkarya'?>" method="post">
          <?php
            if( isset($karya) ) {
          ?>
              <input type="hidden" name="id" value="<?=$karya['id_karya']?>">

              <div class="text-right">
                <a href="/alumni/hapuskarya/<?=$karya['id_karya']?>" title="Hapus data ini" id="clickhapus">
                  <img src="/assets/img/delete16.png" alt="Update"> Hapus
                </a>
              </div>
          <?php
            }
          ?>

          <div class="form-group">
            <label for="judul">Judul Karya*</label>
            <input type="text" name="judul" class="form-control" id="judul"
                   placeholder="judul artikel / buku / makalah atau nama produk"
                   <?=isset($karya)?'value="'.$karya['judul'].'"':''?> required>
          </div>

          <div class="form-group">
            <label for="jenis">Jenis Karya*</label>
            <select class="form-control" name="jenis" id="jenis" required>
              <option value="">--pilih jenis--</option>
              <?php
                foreach ($this->mylib->jeniskarya as $key => $value):
                  $sel = (isset($karya) && $karya['jenis'] == $key) ? 'SELECTED' : '';
              ?>
                  <option value="<?=$key?>" <?=$sel?>><?=$value?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="media">Media/Forum*</label>
            <input type="text" name="media" class="form-control" id="media"
                   placeholder="nama forum / nama media"
                   <?=isset($karya)?'value="'.$karya['forum'].'"':''?> required>
          </div>

          <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" class="form-control" id="publisher"
                   placeholder="nama penerbit / penyelenggara / label vendor"
                   <?=isset($karya)?'value="'.$karya['publisher'].'"':''?> >
          </div>

          <div class="form-group">
            <label for="edisi">Edisi</label>
            <input type="text" name="edisi" class="form-control" id="edisi"
                   placeholder="nomor terbitan / volume / nomor versi"
                   <?=isset($karya)?'value="'.$karya['edisi'].'"':''?>>
          </div>

          <div class="form-group">
            <label for="tglterbit">Tanggal*</label>
            <input type="text" name="tglterbit" class="form-control datepicker" id="tglterbit"
                   placeholder="tanggal terbit / tanggal rilis"
                   <?=isset($karya) && !empty($karya['tanggal_rilis'])?
                       'value="'.date('d-m-Y',strtotime($karya['tanggal_rilis'])).'"':''?> required>
          </div>

          <div class="form-group">
            <label for="linkurl">Link URL</label>
            <input type="text" name="linkurl" class="form-control" id="linkurl"
                   placeholder="http://"
                   <?=isset($karya)?'value="'.$karya['url'].'"':''?>>
          </div>

        <div class="form-group pull-right">
          <button type="submit" name="add" value="Simpan" class="btn btn-primary">Simpan</button>

          <?php
            if( isset( $karya) ){
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
    $('#formkr').reset();
    document.location.href='/alumni/<?=$this->session->uid?>';
  });

  $("#tbreset").click(function(){
    $('#formkr').reset();
    document.location.reload();
  });

</script>
