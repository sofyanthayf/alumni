<section id="about" class="wow">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 member">
        <div class="container text-center">
          <img src="<?=$alumnus['foto']?>" alt="" style="max-width:250px;">
          <br>&nbsp;<br>

          <div id="logomitra">
            <?php if ( !empty($logomitra) ): ?>
              <img src="<?=$logomitra?>" class="mitra-img">
            <?php endif; ?>
          </div>

        </div>

      </div>

      <div class="col-md-6 content">
        <h2><?=$alumnus['namamhs']?></h2>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Kontak Referensi
        </h3>

        <p class="text-info">
          Jika Anda masih bekerja pada perusahaan dan unit kerja ini, mohon kesediaan Anda
          untuk memberikan beberapa Email Contact Person dalam lingkungan kerja Anda,
          yang bisa dijadikan referensi tentang riwayat pekerjaan Anda <br>
          (sebaiknya memohon izin terlebih dahulu kepada yang bersangkutan)
        </p>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Atasan
        </h3>
        <p class="text-info"><small>
          Paling relevan adalah Atasan Langsung
        </small></p>

        <form id="formsejawat" name="formsejawat" action="/alumni/simpanreferensi" method="post">

        <input type="hidden" name="mitra" value="<?=$mitra?>">
        <input type="hidden" name="cabang" value="<?=$cabang?>">

        <div class="form-group">
          <input type="radio" name="jkel_p1" value="L" required> Bapak &nbsp; / &nbsp;
          <input type="radio" name="jkel_p1" value="P" required> Ibu
        </div>

        <div class="form-group">
          <label for="nama_p1"><strong>Nama Lengkap*</strong></label>
          <input type="text" name="nama_p1" class="form-control" id="nama_p1"
                 placeholder="nama lengkap atasan (sebaiknya dengan gelar)" required>
        </div>

        <div class="form-group">
          <label for="email_p1"><strong>Email*</strong></label>
          <input type="email" name="email_p1" class="form-control" id="email_p1"
                 placeholder="alamat email" required>

          <div class="alert alert-danger small" id="warn_email_p1" style="display:none;">
          </div>
        </div>

        <div class="form-group">
          <label for="telp_p1"><strong>Nomor Handphone</strong></label>
          <input type="text" name="telp_p1" class="form-control" id="telp_p1"
                 placeholder="nomor hp (boleh dikosongkan jika ybs berkeberatan)">
        </div>

        <div class="form-group">
          <label for="divisi_p1"><strong>Divisi / Bagian</strong></label>
          <input type="text" name="divisi_p1" class="form-control" id="divisi_p1"
                 placeholder="divisi / bagian / unit kerja">
        </div>

        <div class="form-group">
          <label for="jabatan_p1"><strong>Jabatan</strong></label>
          <input type="text" name="jabatan_p1" class="form-control" id="jabatan_p1"
                 placeholder="jabatan">
        </div>
        <br>

        <h3>
          <i class="ion-android-checkmark-circle"></i> Rekan Sejawat (1-2 orang)
        </h3>
        <p class="text-info"><small>
          Diutamakan mitra/rekan sejawat yang relatif lebih senior atau bagian HRD/PSDM
        </small></p>

        <div class="form-group">
          <input type="radio" name="jkel_p2" value="L" required> Bapak &nbsp; / &nbsp;
          <input type="radio" name="jkel_p2" value="P" required> Ibu
        </div>

        <div class="form-group">
          <label for="nama_p2"><strong>Nama Lengkap*</strong></label>
          <input type="text" name="nama_p2" class="form-control" id="nama_p2"
                 placeholder="nama lengkap rekan sejawat 1 (sebaiknya dengan gelar)" required>
        </div>

        <div class="form-group">
          <label for="email_p2"><strong>Email*</strong></label>
          <input type="email" name="email_p2" class="form-control email" id="email_p2"
                 placeholder="alamat email" required>

           <div class="alert alert-danger small" id="warn_email_p2" style="display:none;">
           </div>
        </div>

        <div class="form-group">
          <label for="telp_p2"><strong>Nomor Handphone</strong></label>
          <input type="text" name="telp_p2" class="form-control" id="telp_p2"
                 placeholder="nomor hp (boleh dikosongkan jika ybs berkeberatan)">
        </div>

        <div class="form-group">
          <label for="divisi_p2"><strong>Divisi / Bagian</strong></label>
          <input type="text" name="divisi_p2" class="form-control" id="divisi_p2"
                 placeholder="divisi / bagian / unit kerja">
        </div>

        <div class="form-group">
          <label for="jabatan_p2"><strong>Jabatan</strong></label>
          <input type="text" name="jabatan_p2" class="form-control" id="jabatan_p2"
                 placeholder="jabatan">
        </div>
        <br><hr>

        <div class="form-group">
          <input type="radio" name="jkel_p3" value="L"> Bapak &nbsp; / &nbsp;
          <input type="radio" name="jkel_p3" value="P"> Ibu
        </div>

        <div class="form-group">
          <label for="nama_p3"><strong>Nama Lengkap</strong></label>
          <input type="text" name="nama_p3" class="form-control" id="nama_p3"
                 placeholder="nama lengkap rekan sejawat 2 (optional)">
        </div>

        <div class="form-group">
          <label for="email_p3"><strong>Email</strong></label>
          <input type="email" name="email_p3" class="form-control" id="email_p3"
                 placeholder="alamat email">

         <div class="alert alert-danger small" id="warn_email_p3" style="display:none;">
         </div>
        </div>

        <div class="form-group">
          <label for="telp_p3"><strong>Nomor Handphone</strong></label>
          <input type="text" name="telp_p3" class="form-control" id="telp_p3"
                 placeholder="nomor hp (boleh dikosongkan jika ybs berkeberatan)">
        </div>

        <div class="form-group">
          <label for="divisi_p3"><strong>Divisi / Bagian</strong></label>
          <input type="text" name="divisi_p3" class="form-control" id="divisi_p3"
                 placeholder="divisi / bagian / unit kerja">
        </div>

        <div class="form-group">
          <label for="jabatan_p3"><strong>Jabatan</strong></label>
          <input type="text" name="jabatan_p3" class="form-control" id="jabatan_p3"
                 placeholder="jabatan">
        </div>
        <br>

        <p class="text-danger">
          Setelah data disimpan, maka mereka yang disebutkan di atas akan langsung dikirimi
          email konfirmasi secara otomatis, karena itu data yang telah disimpan tidak boleh
          lagi di-edit (hanya dapat di-edit sendiri oleh yang bersangkutan).<br>
          Mohon diteliti kembali dan pastikan data yang Anda berikan sudah benar sebelum menyimpan
        </p>

        <div class="form-group">
            <input type="checkbox" id="isok" name="isok" value="1">
            Saya sudah memeriksa kembali dan yakin dengan data ini
        </div>

        <div class="form-group pull-right">
          <button type="submit" id="tbsimpan" value="Simpan" class="btn btn-primary" disabled>Simpan</button>
        </div>


      </form>

      </div>

    </div>
  </div>
</section>

<script type="text/javascript">
  var valid=0;

  $("#isok").change( function(){
    console.log(valid);
    if( $(this).is(':checked') && valid==0 ){
      $("#tbsimpan").prop('disabled', false);
    } else {
      $("#tbsimpan").prop('disabled', true);
    }
  });

  $("#email_p1").change(function(){
    checkEmail('p1');
  })

  $("#email_p2").change(function(){
    checkEmail('p2');
  })

  $("#email_p3").change(function(){
    checkEmail('p3');
  })

  function checkEmail( p ){
    var email = $("#email_" + p).val();
    if( email != ''){
      email = email.replace(".", "__dot__");
      email = email.replace("@", "__at__");
      $.get("/api_mitra/emailvalid/m/"+email, function(result){
        if(result.email.registered == 1){
          $("#warn_email_" + p).html('alamat email telah terdaftar juga sebagai email alumni, '+
          'gunakan alamat email yang lain (lebih baik jika menggunakan '+
          'alamat email official)');
          $("#warn_email_" + p).show();
          $("#tbsimpan").prop('disabled', true);
          valid++;
        } else {
          $("#warn_email_" + p).html('');
          $("#warn_email_" + p).hide();
          valid--;
          if( valid < 0 ) valid=0;
        }
      })
    } else {
      $("#warn_email_" + p).html('');
      $("#warn_email_" + p).hide();
    }
  }

</script>
