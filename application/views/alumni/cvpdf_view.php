<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <style>
      body {
        font-family: 'Helvetica';
        font-size: 12.5px;
      }

      table {
        border:0px;
      }

      table .details {
        padding-left: 15px;
        padding-right: 15px;
        page-break-inside: auto;
      }

      td {
        vertical-align: top;
        padding: 5px;
      }

      td .datafields {
        text-align: right;
        width: 130px;
      }

      td .datavalue {
        font-size: 13px;
        font-weight: bold;
      }

      .foto {
        max-width: 200px;
        float: auto;
      }

      .cvtitle {
        color: #0c2e8a;
        text-align: center;
      }

    </style>

    <title><?=$alumnus['namamhs']?> - CV<?=date('Ymd')?></title>

  </head>
  <body>

    <h1 class="cvtitle">CURRICULUM VITAE</h1>

    <table width="100%" style="page-break-inside: auto;">
      <tr>

        <td style="width:200px; padding:15px;">
          <?php
            // untuk dompdf tanda '/' di depan path foto harus dihilangkan
            if( strpos( $alumnus['foto'], 'siska.kharisma.ac.id', 0 ) !== false ){
              $foto = $alumnus['foto'];
            } else {
              $foto = substr( $alumnus['foto'], 1 , strlen($alumnus['foto'])-1 );
            }
           ?>
          <img src="<?=$foto?>" class="foto">
        </td>

        <td style="padding:15px; page-break-inside: auto">
          <h2><?=$alumnus['namamhs']?></h2>

          <table width="100%">
            <tr>
              <td class="datafields">Tempat/Tanggal Lahir:</td>
              <td class="datavalue">
                <?=$alumnus['tplahir']?> / <?=date('d-m-Y',strtotime($alumnus['tglahir']))?>
              </td>
            </tr>
            <tr>
              <td class="datafields">Jenis Kelamin:</td>
              <td class="datavalue"><?=$alumnus['sex']=='L'?'Laki-laki':'Perempuan'?></td>
            </tr>
            <tr>
              <td class="datafields">Agama:</td>
              <td class="datavalue"><?=$this->mylib->agama[ $alumnus['agama'] ]?></td>
            </tr>
            <tr>
              <td class="datafields">Alamat:</td>
              <td class="datavalue">
                <?php
                  $tptinggal = $alumnus['alamat_rumah'];
                  if( !empty($alumnus['tempat_tinggal']) ){
                    $tptinggal .= '<br>Kelurahan: '.$alumnus['tempat_tinggal']['nama_desakelurahan'];
                    $tptinggal .= '<br>Kecamatan: '.$alumnus['tempat_tinggal']['nama_kecamatan'];
                  }
                  echo $tptinggal;
                 ?>
              </td>
            </tr>
            <tr>
              <td class="datafields">Kota:</td>
              <td class="datavalue">
                <?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['nama_kabkota']:''?>
              </td>
            </tr>
            <tr>
              <td class="datafields">Propinsi:</td>
              <td class="datavalue">
                <?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['nama_propinsi']:''?>
              </td>
            </tr>
            <tr>
              <td class="datafields">Kode Pos:</td>
              <td class="datavalue">
                <?=!empty($alumnus['tempat_tinggal'])?$alumnus['tempat_tinggal']['kodepos']:''?>
              </td>
            </tr>
            <tr>
              <td class="datafields">Nomor Telepon:</td>
              <td class="datavalue"><?=$alumnus['telepon']?></td>
            </tr>

            <?php if ( !empty($alumnus['telepon2']) ): ?>
              <tr>
                <td class="datafields">Nomor Telepon:</td>
                <td class="datavalue"><?=$alumnus['telepon2']?></td>
              </tr>
            <?php endif; ?>

            <tr>
              <td class="datafields">Email:</td>
              <td class="datavalue"><?=$alumnus['email']?></td>
            </tr>

          </table>
        </td>
      </tr>
    </table>

    <?php if (!empty($alumnus['pekerjaan'])): ?>
      <table width="100%" class="details">
        <tr>
          <td width="230px">&nbsp;</td>
          <td colspan="2">
            <h3>Riwayat Pekerjaan</h3>
          </td>
        </tr>
        <?php foreach ($alumnus['pekerjaan'] as $key => $value): ?>
          <tr>
            <td width="230px">&nbsp;</td>
            <td width="130px">
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
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>

    <table width="100%" class="details">
      <tr>
        <td width="230px">&nbsp;</td>
        <td colspan="2">
          <h3>Riwayat Pendidikan</h3>
        </td>
      </tr>
      <?php foreach ($alumnus['pendidikan_formal'] as $key => $value): ?>
        <tr>
          <td width="230px">&nbsp;</td>
          <td width='130px'><?=$value['gelar']." (".$value['gelar_singkat'].")"?></td>
          <td>
            <?=$value['program_studi'].", ".$value['institusi'].", ".$value['kota']."<br>".
            'Tanggal Masuk: '.date("d-m-Y", strtotime($value['tanggal_mulai']))."<br>".
            (!empty($value['tanggal_lulus'])?'Tanggal Lulus: '.date("d-m-Y", strtotime($value['tanggal_lulus'])):'Belum Selesai')?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>

    <?php if (!empty($alumnus['pendidikan_nonformal'])): ?>
      <table width="100%" class="details">
        <tr>
          <td width="230px">&nbsp;</td>
          <td colspan="2">
            <h3>Riwayat Pendidikan Non-formal (Pelatihan/Kursus)</h3>
          </td>
        </tr>
        <?php foreach ($alumnus['pendidikan_nonformal'] as $key => $value): ?>
          <tr>
            <td width="230px">&nbsp;</td>
            <td width='130px'><?=date("F Y", strtotime($value['tanggal_mulai']))?></td>
            <td>
              <?=$value['program_studi'].", ".$value['institusi'].", ".$value['kota']."<br>".
              'Tanggal Mulai: '.date("d-m-Y", strtotime($value['tanggal_mulai']))."<br>".
              'Tanggal Lulus: '.date("d-m-Y", strtotime($value['tanggal_lulus']))?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>

    <?php if (!empty($alumnus['sertifikasi'])): ?>
      <table width="100%" class="details">
        <tr>
          <td width="230px">&nbsp;</td>
          <td colspan="2">
            <h3>Sertifikasi</h3>
          </td>
        </tr>
        <?php foreach ($alumnus['sertifikasi'] as $key => $value): ?>
          <tr>
            <td width="230px">&nbsp;</td>
            <td width='130px'><?=date("F Y", strtotime($value['tanggal_sertifikat']))?></td>
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
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>

    <?php if (!empty($alumnus['karya'])): ?>
      <table width="100%" class="details">
        <tr>
          <td width="230px">&nbsp;</td>
          <td colspan="2">
            <h3>Karya dan Publikasi</h3>
          </td>
        </tr>
        <?php foreach ($alumnus['karya'] as $key => $value): ?>
          <tr>
            <td width="230px">&nbsp;</td>
            <td width="130px"><?=date("F Y", strtotime($value['tanggal_rilis']))?></td>
            <td>
              <?php
              $karya = "<i>\"".$value['judul']."\"</i>";
              $karya .= ", ".$this->mylib->jeniskarya[$value['jenis']];
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
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>

    <?php
    $sosmed = '';

    if( !empty($alumnus['linkedin']) ){
      $sosmed .= '<img src="assets/img/web16.png"> &nbsp; '.$alumnus['website']."<br><br>";
    }

    if( !empty($alumnus['linkedin']) ){
      $sosmed .= '<img src="assets/img/linkedin.png"> &nbsp; '.$alumnus['linkedin']."<br><br>";
    }

    if( !empty($alumnus['facebook']) ){
      $sosmed .= '<img src="assets/img/facebook.png"> &nbsp; '.$alumnus['facebook']."<br><br>";
    }

    if( !empty($alumnus['scholar']) ){
      $sosmed .= '<img src="assets/img/scholar.png"> &nbsp; '.$alumnus['scholar']."<br>";
    }
    ?>

    <?php if ( $sosmed!='' ): ?>
      <table width="100%" class="details">
        <tr>
          <td width="230px">&nbsp;</td>
          <td><h3>Social Media</h3></td>
        </tr>
        <tr>
          <td width="230px">&nbsp;</td>
          <td><?=$sosmed?></td>
        </tr>
      </table>
    <?php endif; ?>


    <div style="page-break-before:auto; padding-left:25px;">
      <br>&nbsp;
      <br>&nbsp;
      <br>&nbsp;<br>
      Dibuat dengan sebenar-benarnya, sesuai keadaan hari ini <br>
      tanggal: <strong><?=date('d-m-Y')?></strong>
      <br>&nbsp;
      <br>&nbsp;
      <br>&nbsp;
      <br>&nbsp;<br>
      <strong><?=$alumnus['namamhs']?></strong>
    </div>

  </body>
</html>
