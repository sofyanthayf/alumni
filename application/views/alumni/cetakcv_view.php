<html>
  <head>

    <style>
      table{
        border:0px;
        padding: 10px;
      }
      td{
        vertical-align: top;
      }
    </style>

  </head>

<body>
  <table width="100%" cellspacing="0">
      <tr>
        <td width="200px"><img src= <?php echo $foto ?> width='180px'>
        </td>
        <td><b>DATA DIRI</b>

          <table width="100%">
            <?php foreach ($datadiri as $key):; ?>
            <tr>
              <td> Nama Lengkap:</td>
              <td> <?php echo $key->namamhs; ?> </td>
            </tr>

              <tr>
                <td> Tempat, Tanggal Lahir:</td>
                <td> <?php echo $key->tplahir; echo ", "; echo date("d-m-Y", strtotime($key->tglahir)); ?> </td>
              </tr>

              <tr>
                <td> Alamat:</td>
                <td> <?php echo $key->alamat_rumah; ?> </td>
              </tr>

              <tr>
                <td> No. HP:</td>
                <td> <?php echo $key->telepon; ?> </td>
              </tr>

              <tr>
                <td> Jenis Kelamin:</td>
                <td> <?php echo $this->mylib->jenis_kelamin[$key->sex]; ?> </td>
              </tr>

              <tr>
                <td> Agama:</td>
                <td> <?php echo $this->mylib->agama[$key->agama]; ?> </td>
              </tr>

              <tr>
                <td> Email:</td>
                <td> <?php echo $key->email; ?> </td>
              </tr>

            <?php endforeach; ?>
            </table>

          </td>
        </tr>
      </table>

      <!-- pengalaman kerja -->
      <br>
      <table width="100%" cellspacing="0">
          <tr>
            <td width="200px">
            </td>
            <td><b>PENGALAMAN KERJA</b>

            <table width="100%">
              <?php foreach ($riwayatpekerjaan as $key):; ?>
               <tr>
                 <td width="150px" rowspan="3"> <?php echo date("Y", strtotime($key->tanggal_awal)); ?>  - <?php echo date("Y", strtotime($key->tanggal_akhir)) ?>  </td>
                 <td>Perusahaan : <?php echo $key->nama_perusahaan; ?></td>
               </tr>
               <tr>
                 <td>Jabatan : <?php echo $key->jabatan; ?></td>
               </tr>
               <tr>
                 <td>Bidang : <?php echo $key->keahlian; ?></td>
               </tr>
             <?php endforeach ?>

            </table><div style="page-break-before:always;"></div>

          </td>
        </tr>
      </table>

      <!-- riwayat pendidikan formal -->
      <br>
      <table width="100%" cellspacing="0">
          <tr>
            <td width="200px">
            </td>
            <td><b>RIWAYAT PENDIDIKAN FORMAL</b>

            <table width="100%">
              <?php foreach ($pendidikanformal as $key):; ?>
               <tr>
                 <td width="150px" rowspan="4"> <?php echo $key->gelar_singkat; ?> </td>
                 <td>Institusi : <?php echo $key->institusi; ?></td>
               </tr>

               <tr>
                 <td>Program Studi : <?php echo $key->program_studi; ?> </td>
               </tr>

               <tr>
                 <td>Tanggal Mulai : <?php echo date("d-m-Y", strtotime($key->tanggal_mulai)); ?> </td>
               </tr>

               <tr>
                 <td>Tanggal Lulus : <?php echo date("d-m-Y", strtotime($key->tanggal_lulus)); ?> </td>
               </tr>

             <?php endforeach; ?>

            </table><div style="page-break-before:always;"></div>

          </td>
        </tr>
      </table>

      <!-- riwayat pendidikan nonformal -->
      <br>
      <table width="100%" cellspacing="0">
          <tr>
            <td width="200px">
            </td>
            <td><b>RIWAYAT PENDIDIKAN NONFORMAL</b>

            <table width="100%">
              <?php foreach ($pendidikannonformal as $key):; ?>
               <tr>
                 <td width="150px" rowspan="4"> <?php echo $key->gelar_singkat; ?> </td>
                 <td>Institusi : <?php echo $key->institusi; ?></td>
               </tr>

               <tr>
                 <td>Program Studi : <?php echo $key->program_studi; ?> </td>
               </tr>

               <tr>
                 <td>Tanggal Mulai : <?php echo date("d-m-Y", strtotime($key->tanggal_mulai)); ?> </td>
               </tr>

               <tr>
                 <td>Tanggal Lulus : <?php echo date("d-m-Y", strtotime($key->tanggal_lulus)); ?> </td>
               </tr>

             <?php endforeach; ?>

           </table><div style="page-break-before:always;"></div>

         </td>
       </tr>
     </table>

     <!-- sertifikasi -->
     <br>
     <table width="100%" cellspacing="0">
         <tr>
           <td width="200px">
           </td>
           <td><b>SERTIFIKASI</b>

            <table width="100%">
              <?php foreach ($record as $key): ?>
               <tr>
                 <td width="150px" rowspan="2"> <?php echo date("d-m-Y", strtotime($key->tanggal_sertifikat)); ?> </td>
                 <td>Judul : <?php echo $key->judul_sertifikat; ?></td>
               </tr>
               <tr>
               <td>Bidang Keahlian : <?php echo $key->keahlian; ?></td>
               </tr>
             <?php endforeach; ?>

            </table><div style="page-break-before:always;"></div>

          </td>
        </tr>
      </table>


</body>

</html>
