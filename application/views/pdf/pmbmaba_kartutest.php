<html>
    <head>
        <style>
        @page {
            size: 21cm 29.7cm;
            margin: 1.2cm !important;
            font-family: Helvetica, Arial;
            font-size: 11.5px;
        }

        .qr {
            margin-bottom: 0px;
        }

        table {
            border-collapse: collapse;
            border: 1px solid #2a2a2a;
            width: 100%;
            margin-top: 15px;
        }
        td {
            border: 1px solid #2a2a2a;
            padding: 7px;
            vertical-align: top;
        }

        th {
            border: 1px solid #2a2a2a;
            padding: 3;
            font-weight: bold;
            background: #efefef;
        }

        .field {
            text-align: right;
            vertical-align: top;
            width: 140px;
        }

        .boxfoto {
            width: 150px;
            text-align: center;
            vertical-align: middle;
            overflow: hidden;
            padding: 3px;
        }

        .foto {
            width: 100%;
            display: block;
            margin: auto;
            /*margin-right: auto;*/
        }

        .noborder {
            border: none;
            padding: 2;
            font-weight: bold;
        }

        </style>
    </head>
    <body>
        <img src='<?= base_url() ?>assets/img/stmikkharismamks.gif' height='50'>
        <table>
            <tr>
                <td colspan="3">
                    <h2 align='center'>KARTU TANDA PESERTA<br>
                        Seleksi Penerimaan Mahasiswa Baru 2017</h2>
                </td>
            </tr>
            <tr>
                <td class="field">ID Peserta:</td>
                <td><strong><?= $maba['id'] ?></strong></td>
                <td rowspan="7" id="foto" class="boxfoto">
                    <?php
                        $foto = $this->pmbuser_model->checkDokumen( '03', $maba['id']);
                        $filefoto = $foto['id_owner']."_".$foto['tipe'].".".$foto['tipefile'];
                    ?>
                    <img src="<?= base_url() ?>assets/dokumen/maba/2017/<?= $filefoto ?>" class="foto">
                </td>
            </tr>
            <tr>
                <td class="field">Nama Lengkap:</td>
                <td><strong><?= $maba['nama_lengkap'] ?></strong></td>
            </tr>
            <tr>
                <td class="field">Alamat E-mail:</td>
                <td><strong><?= $maba['email'] ?></strong></td>
            </tr>
            <tr>
                <td class="field">Alamat Rumah:</td>
<?php
                $kota = "";
                if( !empty( $maba['kelurahan'] ) ){
                    $aregion = $this->region_model->getRegion( $maba['kelurahan'] );
                    $kota = "<br /> "."Kecamatan: ".$aregion['nama_kecamatan'].", ".$aregion['nama_kota'];
                }
?>
                <td><strong><?= $maba['alamat'].$kota ?></strong></td>
            </tr>
            <tr>
                <td class="field">Nomor Handphone</td>
                <td><strong><?= $maba['telepon'] ?></strong></td>
            </tr>
            <tr>
                <td class="field" style="background: #ededed;">Program Studi Pilihan 1:</td>
                <td><strong>
                    <?php
                    if( !empty($maba['prodi_pilihan1']) ){
                        $pil1 = $this->prodi_model->getProdi($maba['prodi_pilihan1']);
                        echo strtoupper($pil1['nama'])." - ".
                             strtoupper($pil1['jenjang']['namaprogram'])." (".$pil1['jenjang']['kode'].")";
                    }
                    ?>
                </strong></td>
            </tr>
            <tr>
                <td class="field" style="background: #ededed;">Program Studi Pilihan 2:</td>
                <td><strong>
                    <?php
                    if( !empty($maba['prodi_pilihan2']) ){
                        $pil2 = $this->prodi_model->getProdi($maba['prodi_pilihan2']);
                        echo strtoupper($pil2['nama'])." - ".
                             strtoupper($pil2['jenjang']['namaprogram'])." (".$pil2['jenjang']['kode'].")";
                    }
                    ?>
                </strong></td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="field">Tanggal Registrasi:</td>
                <td><strong><?= $maba['tg_registrasi'] ?></strong></td>
                <td></td>
                <td rowspan="5" id="qrcode" class="boxfoto">
                <?php
                    $qrpath = 'assets/dokumen/maba/2017/';
                    $params['data'] = $this->pmb_lib->link_verifikasi_kartutest($maba['id'], $maba['token']);
        			$params['level'] = 'M';
        			$params['size'] = 6;
        			// $params['savename'] = FCPATH . str_replace('/','\\', $qrpath) . $maba['id'] . '_11Q.png';
        			$params['savename'] = FCPATH . $qrpath . $maba['id'] . '_11Q.png';
        			$this->ciqrcode->generate($params);
                ?>
                    <img src="<?= base_url() . $qrpath . $maba['id'] . '_11Q.png'; ?>" class="foto" />
                </td>
            </tr>
            <tr>
                <td class="field">Tanda Tangan Calon Mahasiswa:<br />&nbsp;</td>
                <td colspan="2" style="font-size:9px;color:#818181;vertical-align:bottom;padding:2px;">
                    <i>Tanda tangani 2x tidak melewati kotak:</i>
                </td>
            </tr>
            <tr>
                <td class="field" style="background: #ededed;">Ujian Seleksi:</td>
                <td>
                    Tanggal: <strong></strong>
                    <br />
                    Waktu: <strong></strong>
                </td>
                <td>Paraf Panitia:</td>
            </tr>
            <tr>
                <td class="field" style="background: #ededed;">Psikotest:</td>
                <td>Tanggal: <strong></strong></td>
                <td>Paraf Panitia:</td>
            </tr>
            <tr>
                <td class="field" style="background: #ededed;">Wawancara:</td>
                <td>Tanggal: <strong></strong></td>
                <td>Paraf Panitia:</td>
            </tr>
        </table>

        <table><tr><td style="padding:10px;">
            <strong><u>CATATAN PENTING:</u></strong>
            <p style="font-family: 'Arial Narrow'; font-size:10px;">
                <ol>
                    <li>
                        Kartu Tanda Peserta ini WAJIB untuk DICETAK (berwarna atau hitam-putih) dan DITANDA-TANGANI
                        oleh calon mahasiswa pada tempat yang sudah disediakan sesuai petunjuk.
                    </li>
                    <li>
                        Kartu Tanda Peserta ini WAJIB untuk DIBAWA setiap kali mengikuti tahapan dalam proses seleksi
                        sebagai kartu identitas peserta.
                    </li>
                    <li>
                        Jagalah Kartu Tanda Peserta ini dengan baik, jangan sampai rusak atau hilang
                    </li>
                    <li>
                        Panitia akan memberikan paraf di setiap tahap seleksi untuk melengkapi bukti kehadiran Anda
                        secara fisik dalam proses seleksi.
                    </li>
                    <li>
                        Kartu Tanda Peserta ini harus diserahkan saat melakukan Pendaftaran Ulang setelah dinyatakan
                        lulus sebagai Mahasiswa Baru STMIK KHARISMA Makassar.
                    </li>
                </ol>
            </p>
        </td></tr></table>

    </body>
</html>
