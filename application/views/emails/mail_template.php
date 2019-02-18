<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Layanan Alumni KHARISMA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <style>
        .head
        {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 32px;
            color: #41637e;
            font-family: sans-serif;
            text-align: center
        }

        .logo {
            border: 0;
            -ms-interpolation-mode: bicubic;
            display: block;
            padding-bottom: 5px;
        }

        .visi {
            text-align: center;
        }

        p {
            Margin-top: 0;
            color: #565656;
            font-family: Helvetica;
            font-size: 14px;
            Margin-bottom: 25px
        }

        .noreply {
            text-align: center;
            font-size: 10px;
            /*font-style: italic;*/
            font-weight: bold;
            border: 1px solid;
            padding: 5px;
        }

        .code {
          font-family: Courier;
          font-size: 14px;
        }

        </style>
    </head>
    <body>
        <div>
            <img class="logo" src="<?=base_url()?>assets/img/STMIKKHARISMA01w.gif" alt="STMIK KHARISMA Makassar">
            <h2 class="head">Layanan Alumni STMIK KHARISMA</h2>
            <hr /><br />

            <?= $pesan ?>

            <br>&nbsp;<br>
<?php
    if( $tampilkanvisi ){
        echo "<hr />";
        echo "<div class='visi'>";
        echo "<p><b>Dukung dan wujudkan Visi STMIK KHARISMA Makassar 2029:</b></p>
              <p><i>".$this->mylib->visi_stmik."</i></p>";
        echo "</div>";
    }
 ?>
            <div class="noreply">
                E-mail ini ditulis secara otomatis, jangan mengirim balasan (reply) untuk e-mail ini<br />
                karena tidak akan terpantau dan tidak akan mendapatkan respon
            </div>
        </div>
    </body>
</html>
