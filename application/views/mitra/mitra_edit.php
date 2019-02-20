<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 content">

        <div class="about-img text-center">
        <?php if (empty($mitra['logo'])): ?>
          <div id="logoblank">
            <a href="/mitra/updatelogo/<?=$mitra['id_mitra']?>" title="upload file logo perusahaan">
              <img src="/assets/img/mitra/blank.png" class="mitra-img">
            </a>
          </div>
        <?php else: ?>
            <img src="<?=$mitra['logo']?>" alt="" class="mitra-img"><br>
            <a href="/mitra/updatelogo/<?=$mitra['id_mitra']?>">
              <button type="button" class="btn btn-light btn-block"name="udlogo">update logo</button>
            </a>
        <?php endif; ?>
        </div>
        <br>

      </div>

      <div class="col-lg-8 content">
        <h2><?=$mitra['nama_perusahaan']?></h2>
        <form class="form" action="/mitra/simpanupdate" method="post">
          <input type="hidden" name="id_mitra" value="<?=$mitra['id_mitra']?>">
        <h3>
          <i class="ion-android-checkmark-circle"></i> Updata Data Perusahaan
        </h3>
        <table class="table">
          <tr>
            <td class="datafields" width="200px">Nama Perusahaan*:</td>
            <td>
              <input type="text" class="form-control" id="" name="nama_perusahaan"
              value="<?=$mitra['nama_perusahaan']?>" required>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Jenis Badan Usaha*:</td>
            <td>
              <select class="form-control" id="statusbh" name="statusbh" required>
                <?php foreach ($this->mylib->badan_usaha as $key => $value): ?>
                  <option value="<?=$key?>" <?=$key==$mitra['statusbh']?'selected':''?>><?=$value?></option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Industry*:</td>
            <td>
              <select class="form-control" id="bidang_usaha" name="bidang_usaha" required>
                <?php foreach ($industri as $key => $value): ?>
                  <option value="<?=$value['kode']?>" <?=$value['kode']==$mitra['bidang_usaha']?'selected':''?>><?=$value['bidang']?></option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Brand:</td>
            <td>
              <input type="text" class="form-control" id="brand" name="brand"
              value="<?=$mitra['brand']?>">
            </td>
          </tr>
        </table>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Data Kantor Pusat
        </h3>

        <table class="table">
          <tr>
            <td class="datafields" width="200px">Alamat Kantor Pusat:</td>
            <td>
              <input type="text" class="form-control" id="alamat" name="alamat_kantor_pusat"
                     value="<?=$mitra['alamat_kantor_pusat']?>" required>
            </td>
          </tr>

          <tr id="kotadn">
            <td class="datafields" width="200px">Kota:</td>
            <td>
              <select class="form-control" id="kota" name="kota_kantor_pusat">
                <?php foreach ($this->mylib->daftar_kota as $key => $value): ?>
                  <option value="<?=$value['id']?>"
                    <?=$value['id']==$mitra['kota_kantor_pusat']?'selected':''?>>
                    <?=$value['name']?>
                  </option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>

          <tr id="kotaln">
            <td class="datafields" width="200px">Kota:</td>
            <td>
              <input type="text" class="form-control" id="ln_kota" name="ln_kota" value="<?=$mitra['ln_kota']?>">
            </td>
          </tr>
          <tr id="negaraln">
            <td class="datafields" width="200px">Negara:</td>
            <td>
              <input type="text" class="form-control" id="ln_negara" name="ln_negara" value="<?=$mitra['ln_negara']?>">
            </td>
          </tr>

          <tr>
            <td class="datafields" width="200px">Kode Pos:</td>
            <td>
              <input type="text" class="form-control" id="kodepos" name="kodepos_kantor_pusat"
                     value="<?=$mitra['kodepos_kantor_pusat']?>" required>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Telepon:</td>
            <td>
              <input type="text" class="form-control" id="telepon" name="telepon_kantor_pusat"
                     value="<?=$mitra['telepon_kantor_pusat']?>" required>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Website:</td>
            <td>
              <input type="text" class="form-control" id="website" name="website"
                     value="<?=$mitra['website']?>">
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
              <p class="text-primary small">
                Perubahan data ini bersifat usulan dan baru akan dilakukan perubahan tetap <br>
                setelah direview dan divalidasi oleh administrator
              </p>
              <div class="text-right">
                <input type="submit" class="btn btn-primary" value=" Simpan Usulan Penyesuaian ">
                &nbsp;
                <a href="/contactperson">
                  <button type="button" class="btn btn-danger" name="btcancel"> Batal </button>
                </a>
              </div>
            </td>
          </tr>
        </table>

      </form>

      </div>
    </div>

  </div>
</section>

<script type="text/javascript">

$(function(){
  if( $("#ln_negara").val() != '' ){
    luarNegeri();
  } else {
    dalamNegeri();
  }
});

$("#statusbh").change(function(){
  if( $("#statusbh").val() == 8 ){
    luarNegeri();
  } else {
    dalamNegeri()
  }
});

function luarNegeri(){
  $("#kotadn").hide();
  $("#kota").prop('required', false);

  $("#kotaln").show();
  $("#negaraln").show();
  $("#ln_kota").prop('required', true);
  $("#ln_negara").prop('required', true);
}

function dalamNegeri(){
  $("#kotadn").show();
  $("#kota").prop('required', true);

  $("#kotaln").hide();
  $("#negaraln").hide();
  $("#ln_kota").prop('required', false);
  $("#ln_negara").prop('required', false);
}

</script>
