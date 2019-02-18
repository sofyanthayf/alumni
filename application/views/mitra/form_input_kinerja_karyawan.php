<!-- <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
  width: 10px;
}
button {
  align-items: flex-end;
  margin-top: 10px;
  margin-bottom: 5px;
  font-family: arial, sans-serif;
  background: #3498DB;
  border: 0;
  border-radius: 3px;
  padding: 10px 30px;
  color: #fff;
  transition: 0.4s;
  cursor: pointer;
}
</style> -->
<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 content">

        <div class="text-center">
          <img src="<?=$logomitra?>" alt="" class="mitra-img"><br>
          <h4><?=$pekerjaan['nama_perusahaan']?></h4>
        </div>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Penilai
        </h3>

        <table class="table">
          <tr>
            <td class="datafields" width="80px">Nama:</td>
            <td><?= $contactperson['nama'] ?></td>
          </tr>
          <tr>
            <td class="datafields" width="80px">Jabatan:</td>
            <td><?= $contactperson['jabatan'] ?></td>
          </tr>
          <tr>
            <td class="datafields" width="80px">Divisi:</td>
            <td><?= $contactperson['divisi'] ?></td>
          </tr>
        </table>

      </div>

      <div class="col-lg-8 content">
        <h2>Penilaian Karyawan</h2>

        <?php if ( empty($penilaian) || $penilaian['publish'] == 0 ): ?>
          <p class="text-primary">
            Mohon kesediaan untuk memberikan penilaian singkat kepada Alumni kami yang
            menjadi karyawan dan/atau rekan sejawat <?=$contactperson['sex']=='L'?'Bapak':'Ibu'?>.
            (perkiraan waktu penilaian: 5 menit)
          </p>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-8">

            <table class="table">
              <tr>
                <td class="datafields" width="150px">Nama Karyawan:</td>
                <td><strong><?= $alumnus['namamhs'] ?></strong></td>
              </tr>
              <tr>
                <td class="datafields" width="150px">Cabang:</td>
                <td><?= $pekerjaan['nama_cabang'] ?></td>
              </tr>
              <tr>
                <td class="datafields" width="150px">Divisi:</td>
                <td><?= $pekerjaan['divisi'] ?></td>
              </tr>
              <tr>
                <td class="datafields" width="150px">Jabatan:</td>
                <td><?= $pekerjaan['jabatan'] ?></td>
              </tr>
              <tr>
                <td class="datafields" width="80px">Mulai Bekerja:</td>
                <td><?= date('d-m-Y',strtotime($pekerjaan['tanggal_awal'])) ?></td>
              </tr>
            </table>

          </div>

          <div class="col-md-2 pull-right">
            <img src="<?=$alumnus['foto']?>" alt="" style="max-width:150px;">
          </div>

        </div>

        <?php
          if( !empty($penilaian) && $penilaian['publish'] == 1 ){
        ?>

        <p class="text-primary">
          Terima kasih, Anda telah memberikan penilaian kepada Alumni kami yang
          menjadi karyawan dan/atau rekan sejawat tersebut di atas, dan telah menyatakan
          bahwa penilaian Anda telah selesai dan final.
        </p>
        <p class="text-danger small">
          Anda akan di-<strong>redirect</strong> dalam <span id="countdown"></span> detik
        </p>

        <script type="text/javascript">
          var wait = 15;
          window.setInterval(function(){
            wait--;
            $("#countdown").html( "<strong>" + wait + "</strong>" );
            if( wait == 0 ){
              window.location.replace("/contactperson");
            }
          },1000);
        </script>

        <?php
        } else {
        ?>

        <div class="row">
          <div class="col-md-12">
            <form action="/referensi_update" method="post">
              <br>
              <h3>
                <i class="ion-android-checkmark-circle"></i> Penilaian
              </h3>

              <table class="table">
                <tr>
                  <th class="text-center">Kriteria</th>
                  <th class="text-center">Kurang</th>
                  <th class="text-center">Cukup</th>
                  <th class="text-center">Baik</th>
                  <th class="text-center">Sangat Baik</th>
                </tr>

              <?php foreach ($this->mylib->kriteria_penilaian as $key => $value): ?>
                <tr>
                  <td><?= $value ?></td>
                  <?php
                    for ($v=1; $v <=4 ; $v++) {
                      $chk = $penilaian['k'.$key]==$v ? 'CHECKED' : '';
                    ?>
                  <td class="text-center">
                    <input type="radio" name="nilai<?=$key?>" value="<?=$v?>" required <?=$chk?>>
                  </td>
                  <?php } ?>
                </tr>
              <?php endforeach; ?>

              </table>
              <br>

              <h3>
                <i class="ion-android-checkmark-circle"></i> Saran-saran
              </h3>

              <input type="hidden" name="ref_id" value="<?=$contactperson['id_penilaian']?>" >

              <div class="form-group">
                <?php
                  $vs1 = !empty($penilaian['saran1']) ? $penilaian['saran1'] : '';
                 ?>
                <label for="saran1">Saran Anda untuk pengembangan dan kualitas alumni</label>
                <textarea class="form-control" name="saran1" id="saran1" rows="5"
                          placeholder="-- saran-saran untuk peningkatan kualitas alumni --"><?=$vs1?></textarea>
              </div>
              <div class="form-group">
                <?php
                  $vs2 = !empty($penilaian['saran1']) ? $penilaian['saran1'] : '';
                 ?>
                <label for="saran2">Saran Anda untuk pengembangan STMIK KHARISMA Makassar</label>
                <textarea class="form-control" name="saran2" id="saran2" rows="5"
                          placeholder="-- saran-saran untuk pengembangan institusi STMIK KHARISMA --"><?=$vs2?></textarea>
              </div>

              <div class="form-group">
                <input type="checkbox" name="publish" value="1"> <strong>Selesai</strong> <br>
                <p class="text-primary small">
                  Dengan memberi tanda <strong>Selesai</strong>, berarti Anda telah yakin dengan penilaian Anda
                  dan telah dianggap selesai serta tidak dapat diedit/dirubah lagi.
                </p>
              </div>

              <div class="text-danger text-center small">
                Penilaian ini bersifat tertutup dan tidak akan dipublikasikan atau diserahkan kepada
                pihak manapun, termasuk para alumni dan alumni yang bersangkutan, dan hanya akan
                dipergunakan untuk kepentingan STMIK KHARISMA Makassar.<br>
                Publikasi hasil penilaian hanya akan disajikan dalam bentuk representasi kuantitatif
                dari hasil pengolahan statistik tanpa menyebutkan narasumber atau respondennya.
              </div>
              <br>

              <button class="pull-right btn-primary" type="submit" name="simpan">Simpan Penilaian</button>

            </form>

          </div>

        </div>

        <?php
        }
         ?>

      </div>
    </div>
  </div>

</section>
