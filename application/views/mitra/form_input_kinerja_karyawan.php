<style>
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
</style>



<section id="about" class="wow fadeInUp">
  <div class="container">
    <h2>Form Penilaian Kinerja Karyawan</h2>
    <div class="row">

      <div class="col-md-4">
        <!-- <img src="/assets/img/mitra/1547623300.jpg" alt=""> -->
        <?php
        // $mitrakriteria = $this->session->userdata('mitra');

          $fotomitrajpg = '/assets/img/mitra/' . $mitraalumni['mitra'] . ".jpg";
          $fotomitrapng = '/assets/img/mitra/' . $mitraalumni['mitra'] . ".png";


          if( file_exists( FCPATH . $fotomitrajpg ) ) {
            // echo $fotomitrajpg->result_array;
            echo
            '<img src="'.$fotomitrajpg.'" alt="" class="mitra-img">'
            ;
          } else if ( file_exists( FCPATH . $fotomitrapng ) )  {
            // echo $fotomitrapng->result_array;
            echo '<img src="'.$fotomitrapng.'" alt="" class="mitra-img">'
            ;
          }

        ?>
        <p>Nama: <?= $this->session->userdata('nama'); ?> </p>
        <p>Jabatan: <?= $this->session->userdata('divisi'); ?> </p>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6">
            <table class="table">
              <tr>
                <td width="50px">Nama</td>
                <td><?= $mitraalumni['namamhs'] ?></td>
              </tr>
              <tr>
                <td width="50px">Cabang</td>
                <td><?= $mitraalumni['nama_cabang'] ?></td>
              </tr>
              <tr>
                <td width="50px">Divisi</td>
                <td><?= $mitraalumni['divisi'] ?></td>
              </tr>
              <tr>
                <td width="50px">Jabatan</td>
                <td><?= $mitraalumni['jabatan'] ?></td>
              </tr>
            </table>
          </div>
          <div class="col-md-2">
            <?php
            $nimhs = $mitraalumni['nimhs'];

            $prodi = substr( $nimhs, 0, 3);
            $angkatan = substr( $nimhs, 3, 2);

            $fotoalumni = 'assets/img/alumni/' .$angkatan. '/' .$prodi. '/' .$nimhs. '.jpg';

            if (file_exists ( FCPATH . $fotoalumni)) {
              $fotomhs = base_url().$fotoalumni;
            } else {
              $fotomhs = 'https://siska.kharisma.ac.id//assets//img//foto//mhs//'.$angkatan.'/'.$prodi.'//'.$nimhs.'.jpg';
            }

            echo '<img src="'.$fotomhs.'" alt="" class="mitra-img" width="354px" height="472px">';

            ?>

            <!-- <img src="/assets/img/mitra/1547623300.jpg" alt=""> -->
          </div>
        </div>


      <form action="<?php echo site_url('mitra/insert_penilaian') ?>" method="post">
        <table>
          <tr>
            <th>Kriteria</th>
            <th>Kurang</th>
            <th>Cukup</th>
            <th>Baik</th>
            <th>Sangat Baik</th>
          </tr>
          <tr>
            <td>Etika</td>
            <td class="text-center"><input type="radio" name="nilaietika[]" value="1"></td>
            <td class="text-center"><input type="radio" name="nilaietika[]" value="2"></td>
            <td class="text-center"><input type="radio" name="nilaietika[]" value="3"></td>
            <td class="text-center"><input type="radio" name="nilaietika[]" value="4"></td>
          </tr>
          <tr>
            <td>Keahlian pada Bidang Ilmu (Kompetensi Utama)</td>
            <td class="text-center"><input type="radio" name="nilaikeahlian[]" value="1"></td>
            <td class="text-center"><input type="radio" name="nilaikeahlian[]" value="2"></td>
            <td class="text-center"><input type="radio" name="nilaikeahlian[]" value="3"></td>
            <td class="text-center"><input type="radio" name="nilaikeahlian[]" value="4"></td>
          </tr>
          <tr>
            <td>Kemampuan Berbahasa Asing</td>
            <td class="text-center"><input type="radio" name="nilaibahasa[]" value="1"></td>
            <td class="text-center"><input type="radio" name="nilaibahasa[]" value="2"></td>
            <td class="text-center"><input type="radio" name="nilaibahasa[]" value="3"></td>
            <td class="text-center"><input type="radio" name="nilaibahasa[]" value="4"></td>
          </tr>
          <tr>
            <td>Penggunaan Teknologi Informasi</td>
            <td class="text-center"><input type="radio" name="nilaiteknologi[]" value="1"></td>
            <td class="text-center"><input type="radio" name="nilaiteknologi[]" value="2"></td>
            <td class="text-center"><input type="radio" name="nilaiteknologi[]" value="3"></td>
            <td class="text-center"><input type="radio" name="nilaiteknologi[]" value="4"></td>
          </tr>
          <tr>
            <td>Kemampuan Berkomunikasi</td>
            <td class="text-center"><input type="radio" name="nilaikomunikasi[]" value="1"></td>
            <td class="text-center"><input type="radio" name="nilaikomunikasi[]" value="2"></td>
            <td class="text-center"><input type="radio" name="nilaikomunikasi[]" value="3"></td>
            <td class="text-center"><input type="radio" name="nilaikomunikasi[]" value="4"></td>
          </tr>
          <tr>
            <td>Kerjasama</td>
            <td class="text-center"><input type="radio" name="nilaikerjasama[]" value="1"></td>
            <td class="text-center"><input type="radio" name="nilaikerjasama[]" value="2"></td>
            <td class="text-center"><input type="radio" name="nilaikerjasama[]" value="3"></td>
            <td class="text-center"><input type="radio" name="nilaikerjasama[]" value="4"></td>
          </tr>
          <tr>
            <td>Pengembangan Diri</td>
            <td class="text-center"><input type="radio" name="nilaipengembangandiri[]" value="1"></td>
            <td class="text-center"><input type="radio" name="nilaipengembangandiri[]" value="2"></td>
            <td class="text-center"><input type="radio" name="nilaipengembangandiri[]" value="3"></td>
            <td class="text-center"><input type="radio" name="nilaipengembangandiri[]" value="4"></td>
          </tr>
        </table>
        <br>

        <input type="hidden" name="nimhs" value="<?php echo $nimhs?>" >
        <div class="form-group">
          <label for="saran1">Saran Pengembangan Kualitas Alumni</label>
          <textarea class="form-control" name="saran1" id="saran1" rows="3" placeholder="Saran Pengembangan Kualitas Alumni"> </textarea>
        </div>
        <div class="form-group">
          <label for="saran2">Saran Pengembangan Institusi</label>
          <textarea class="form-control" name="saran2" id="saran2" rows="3" placeholder="Saran Pengembangan Institusi"> </textarea>
        </div>

      </div>
    </div>
    <button class="pull-right btn-primary" type="submit" name="simpan">Simpan</button>    
  </form>
  </div>

</section>
