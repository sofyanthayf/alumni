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

        <h3>
          <i class="ion-android-checkmark-circle"></i> Updata Data Perusahaan
        </h3>
        <table class="table">
          <tr>
            <td class="datafields" width="200px">Nama Perusahaan*:</td>
            <td>
              <input type="text" class="form-control" id="" name=""
              value="<?=$mitra['nama_perusahaan']?>" required>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Jenis Badan Usaha*:</td>
            <td>
              <select class="form-control" id="jenisbu" name="jenisbu" required>
                <?php foreach ($this->mylib->badan_usaha as $key => $value): ?>
                  <option value="<?=$key?>" <?=$key==$mitra['statusbh']?'selected':''?>><?=$value?></option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Industry*:</td>
            <td>
              <select class="form-control" id="industri" name="industri" required>
                <?php foreach ($industri as $key => $value): ?>
                  <option value="<?=$value['kode']?>" <?=$value['kode']==$mitra['bidang_usaha']?'selected':''?>><?=$value['bidang']?></option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Brand:</td>
            <td>
              <input type="text" class="form-control" id="" name=""
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
              <input type="text" class="form-control" id="" name=""
                     value="<?=$mitra['alamat_kantor_pusat']?>" required>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Kota:</td>
            <td>
              <input type="text" class="form-control" id="" name=""
                     value="<?=$mitra['lokasi']?>" required>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Kode Pos:</td>
            <td>
              <input type="text" class="form-control" id="" name=""
                     value="<?=$mitra['kodepos_kantor_pusat']?>" required>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Telepon:</td>
            <td>
              <input type="text" class="form-control" id="" name=""
                     value="<?=$mitra['telepon_kantor_pusat']?>" required>
            </td>
          </tr>
          <tr>
            <td class="datafields" width="200px">Website:</td>
            <td>
              <input type="text" class="form-control" id="" name=""
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
                <input type="button" class="btn btn-primary" name="" value=" Simpan Usulan Penyesuaian">
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
</section><!-- #about -->
