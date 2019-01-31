<?php
  setlocale(LC_MONETARY, 'id_ID');
  // var_dump($dmhs);
?>
<html>
<head>
    <style>
    @page {
        size: 21cm 29.7cm;
        margin: 0.6cm !important;
        font-family: Courier;
        font-size: 14px;
    }

    .qr {
        margin-bottom: 0px;
    }

    .container {
      margin-left: 1cm;
      margin-right: 3cm;
      margin-top: 3.5cm
    }
    </style>
</head>
<body>
  <div class="container">
    <table width='100%'>
      <tr>
        <td width='50%' valign='top'>
          <?php
          echo "<br><br><br><br><br><br>";
          echo "<strong>" . $dmhs['namamhs']."</strong><br>";
          echo "<strong>" . $dmhs['nimhs']."</strong><br>";
          echo "<strong>" . $dmhs['program_studi']['nama']." - ".$dmhs['program_studi']['jenjang']['kode']."</strong><br>";
          echo "<br><br><br><br><br><br>";
          echo "<strong>" . $dkrs['terbilang']." Rupiah.</strong><br>";
          echo "<br><br>";
          echo "<strong>" . date( 'd-m-Y', strtotime($dkrs['tanggal_cetak_slip']) ) ."</strong>" ;
          ?>
        </td>

        <td>
        </td>

        <td width='20%' align='right' valign='top'>
          <?php
          $total = $dkrs['biaya_sks'] + $dkrs['biaya_adm'];

          echo "<strong>" . $dkrs['nomorslip'] . "</strong><br>";
          echo "<br><br><br><br><br><br>";

          echo "<strong>" . number_format( $dkrs['biaya_sks'] , 0, '', '.')."</strong><br>";
          echo "<strong>" . number_format( $dkrs['biaya_adm'] , 0, '', '.')."</strong><br>";
          echo "<br><br><br><br><br>";
          echo "<strong>" . number_format( $total , 0, '', '.')."</strong><br>";
          ?>
        </td>
      </tr>
      <tr>
        <td>
          <?php
           ?>
        </td>
        <td></td>
        <td></td>
      </tr>

    </table>
  </div>

</body>
</html>
