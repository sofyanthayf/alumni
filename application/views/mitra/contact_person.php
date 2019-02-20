<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 content">

        <div class="about-img text-center">
          <img src="<?=$mitra['logo']?>" alt="" class="mitra-img">
        </div>
        <br>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Contact Person
        </h3>

        <table class="table">
          <tr>
            <td class="datafields" width="80px">Nama:</td>
            <td><?= $cp['nama'] ?></td>
          </tr>
          <tr>
            <td class="datafields" width="80px">Jabatan:</td>
            <td><?= $cp['jabatan'] ?></td>
          </tr>
          <tr>
            <td class="datafields" width="80px">Divisi:</td>
            <td><?= $cp['divisi'] ?></td>
          </tr>
          <tr>
            <td class="datafields" width="80px">Email:</td>
            <td><?= $cp['email'] ?></td>
          </tr>
          <tr>
            <td class="datafields" width="80px">Telepon:</td>
            <td><?= $cp['nomor_hp'] ?></td>
          </tr>
        </table>

        <?php
          if( !empty( $this->session->uid ) && $this->session->uid == $cp['id'] ){
        ?>
            <a class="btn btn-light btn-block" href="/contactperson/edit" title="Penyesuaian Data" style="margin:15px;">
              <img src="/assets/img/edit16.png"> edit data
            </a>
            <a class="btn btn-light btn-block" href="/gantipassword" title="Ganti Password" style="margin:15px;">
              <img src="/assets/img/user16.png"> ganti password
            </a>

        <?php
          }
        ?>

      </div>

      <div class="col-lg-8 content">
        <h2><?=$mitra['nama_perusahaan']?></h2>
        <h3>
          <table>
            <tr>
              <td class="datafields">industry: &nbsp;</td>
              <td><strong><?=$mitra['bidang']?></strong></td>
            </tr>
            <tr>
              <td class="datafields">brand: &nbsp;</td>
              <td><strong><?=$mitra['brand']?></strong></td>
            </tr>
          </table>
        </h3>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Kantor Pusat
        </h3>

        <table class="table">
          <tr>
            <td class="datafields" width="180px">Alamat:</td>
            <td><?=$mitra['alamat_kantor_pusat']?></td>
          </tr>
          <tr>
            <td class="datafields" width="180px">Kota:</td>
            <td><?=$mitra['lokasi']?></td>
          </tr>
          <tr>
            <td class="datafields" width="180px">Kode Pos:</td>
            <td><?=$mitra['kodepos_kantor_pusat']?></td>
          </tr>
          <tr>
            <td class="datafields" width="180px">Telepon:</td>
            <td><?=$mitra['telepon_kantor_pusat']?></td>
          </tr>
          <tr>
            <td class="datafields" width="180px">Website:</td>
            <td><a href="http://<?=$mitra['website']?>" target="_blank">http://<?=$mitra['website']?></a></td>
          </tr>
          <tr>
            <td class="datafields" width="180px">Alumni Bekerja:</td>
            <td>
              <ul>
                <li>
                  <strong><?=$mitra['total_alumni']?> alumni</strong>
                </li>
                <?php
                  foreach ($mitra['cabang'] as $key => $value) {
                ?>
                    <li><?=$value['nama_cabang']?> (<?=$value['jml_alumni']?> alumni)</li>
                <?php
                  }
                ?>
              </ul>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
              <div class="text-right">
                <a href="/mitra/usulanedit/<?=$mitra['id_mitra']?>"
                   title="Ajukan usulan penyesuaian data perusahaan" id="clickedit">
                  <img src="/assets/img/edit16.png" alt="Edit Data"> Edit/Penyesuaian Data Perusahaan
                </a>
              </div>
            </td>
          </tr>
        </table>


        <?php if ( isset($cabang) ): ?>

          <h3>
            <i class="ion-android-checkmark-circle"></i> Kantor Cabang
          </h3>

          <table class="table">
            <tr>
              <td class="datafields" width="150px">Nama Cabang:</td>
              <td><?=$cabang['nama_cabang']?></td>
            </tr>
            <tr>
              <td class="datafields" width="150px">Alamat Cabang:</td>
              <td><?=$cabang['alamat_cabang']?></td>
            </tr>
            <tr>
              <td class="datafields" width="150px">Telepon:</td>
              <td><?=$cabang['telepon_cabang']?></td>
            </tr>
            <tr>
              <td class="datafields" width="150px">Kota:</td>
              <td><?=$cabang['kota_cabang']?></td>
            </tr>
            <tr>
              <td class="datafields" width="150px">Kode Pos:</td>
              <td><?=$cabang['kodepos_cabang']?></td>
            </tr>
            <tr>
              <td></td>
              <td>
                <div class="text-right">
                  <a href="#" title="Ajukan usulan penyesuaian data perusahaan" id="clickedit">
                    <img src="/assets/img/edit16.png" alt="Edit Data"> Edit/Penyesuaian Data Kantor Cabang
                  </a>
                </div>
              </td>
            </tr>
          </table>

        <?php endif; ?>

      </div>
    </div>

  </div>
</section><!-- #about -->
