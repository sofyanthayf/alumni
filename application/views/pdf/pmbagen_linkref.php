<html>
<head>
    <style>
    @page {
        size: 21cm 29.7cm;
        margin: 0.6cm !important;
        font-family: Helvetica, Arial;
        font-size: 11.5px;
    }

    .qr {
        margin-bottom: 0px;
    }
    </style>
</head>
<body>
<?php
    for($u=1; $u<=3 ; $u++) {
 ?>
    <table style="width:100%">
        <tr>
            <td>
                <table style="width:100%;border:solid 1px grey; padding:10px;">
                    <tr>
                        <td width="100px" valign="top"><br />
                            <img class="qr" src="<?= $myqrimg ?>" width="100px">
                        </td>
                        <td>
                            <h3>STMIK KHARISMA Makassar, Pilihan Tepat</h3>
                            <p>
                                Memilih sekolah untuk studi lanjut ke Pendidikan Tinggi merupakan keputusan penting
                                yang diharapkan tidak menjadi penyesalan di kemudian hari. Karena itu memilih perguruan
                                tinggi yang mengedepankan kualitas menjadi satu prinsip utama.<br />
                                STMIK KHARISMA Makassar, perguruan tinggi bidang informatika dan komputer di kota
                                Makassar yang selalu mengutamakan kualitas, bisa menjadi pilihan Anda.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Registrasi On-line:</td>
                        <td style="border:solid 1px; padding:5px;"><strong><?= $bitly ?></strong></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;" valign="top">Informasi:</td>
                        <td>
                            Kampus STMIK KHARISMA <br />
                            Jl. Baji Ateka No. 20 Makassar<br />
                            Telepon 0411-871555
                        </td>
                    </tr>
                </table>

            </td>

            <td style="width:20px;">&nbsp;&nbsp;&nbsp;&nbsp;</td>

            <td>
                <table style="width:100%;border:solid 1px grey; padding:10px;">
                    <tr>
                        <td width="100px" valign="top"><br />
                            <img class="qr" src="<?= $myqrimg ?>" width="100px">
                        </td>
                        <td>
                            <h3>STMIK KHARISMA Makassar, Pilihan Tepat</h3>
                            <p>
                                Memilih sekolah untuk studi lanjut ke Pendidikan Tinggi merupakan keputusan penting
                                yang diharapkan tidak menjadi penyesalan di kemudian hari. Karena itu memilih perguruan
                                tinggi yang mengedepankan kualitas menjadi satu prinsip utama.<br />
                                STMIK KHARISMA Makassar, perguruan tinggi bidang informatika dan komputer di kota
                                Makassar yang selalu mengutamakan kualitas, bisa menjadi pilihan Anda.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Registrasi On-line:</td>
                        <td style="border:solid 1px; padding:5px;"><strong><?= $bitly ?></strong></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;" valign="top">Informasi:</td>
                        <td>
                            Kampus STMIK KHARISMA <br />
                            Jl. Baji Ateka No. 20 Makassar<br />
                            Telepon 0411-871555
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table><br /><br />
<?php } ?>
</body>
</html>
