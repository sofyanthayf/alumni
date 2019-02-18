<section id="contact" class="wow">
  <div class="container">

    <div class="form row">
      <div class="col-md-3">

      </div>

      <div class="col-md-8">
        <div class="section-header">
          <h2>Form Validasi Alumni</h2>
        </div>

        <?php if($this->session->flashdata('msg_ok')) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fa fa-check"></i> <?= $this->session->flashdata('msg_ok'); ?>
        </div>
        <?php } ?>

        <table class="table">
          <tr>
            <td class="datafields"><label>Email<font color="red">*</font> </label></td>
            <td><input type="text" class="form-control" name="email" required></td>
          </tr>
          <tr>
            <td>
            </td>
          </tr>
        </table>

        <strong><u>Isi minimal tiga di antara data berikut:</u></strong>

        <table class="table">
          <tr>
            <td class="datafields">NIM:</td>
            <td><input type="number" class="form-control" name="nim" onkeypress="if(this.value.length==8) return false;"></td>
          </tr>
          <tr>
            <td class="datafields">Nama Lengkap:</td>
            <td><input type="text" class="form-control" name="nama_lengkap"></td>
          </tr>
          <tr>
            <td class="datafields">Program Studi:</td>
            <td><select class="form-control" name="program_studi" id="program_studi"></td>
          </tr>
          <tr>
            <td class="datafields">Tahun Masuk:</td>
            <td><input type="text" class="form-control datepicker" id="thmasuk" name="tahun_masuk"></td>
          </tr>
          <tr>
            <td class="datafields">Tahun Wisuda:</td>
            <td><input type="text" class="form-control datepicker" id="thwisuda" name="tahun_wisuda"></td>
          </tr>
          <tr>
            <td class="datafields">Nomor Ijazah:</td>
            <td><input type="text" class="form-control" name="nomor_ijazah" maxlength="32"></td>
          </tr>
          <tr>
            <td class="datafields">Pembimbing Skripsi:</td>
            <td><select class="form-control" name="pembimbing_skripsi" id="pembimbing_skripsi"></td>
          </tr>
          <tr>
            <td class="datafields">Judul Skripsi:</td>
            <td><input type="text" class="form-control" name="judul_skripsi"></td>
          </tr>
        </table>
        <div class="text-right"><button type="submit" onclick="validasiAlumni()">Submit</button></div>

      </div>

    </div>
  </div>

</section>

<script type="text/javascript">

$(function(){
  daftarprodi();
  daftardosentetap();

  $("#thmasuk").datepicker({
    format: "yyyy",
    weekStart: 1,
    orientation: "bottom",
    keyboardNavigation: false,
    viewMode: "years",
    minViewMode: "years"
  });

  $("#thwisuda").datepicker({
    format: "yyyy",
    weekStart: 1,
    orientation: "bottom",
    keyboardNavigation: false,
    viewMode: "years",
    minViewMode: "years"
  });

});

function daftarprodi(){
  var lprodi="";
  $("#program_studi").html('<option value="" selected disabled hidden>-- Pilih Program Studi --</option>');
  $.get("https://siska.kharisma.ac.id/api/prodi",
  function(result){
    $.each(result.program_studi,function(key,val){
      lprodi='<option value="'+val.kode+'">'+val.nama+' - '+val.jenjang+'</option>';
      $("#program_studi").append(lprodi);
    })
    });
}

function daftardosentetap(){
  var lprodi="";
  $("#pembimbing_skripsi").html('<option value="" selected disabled hidden>-- Pilih Nama Dosen --</option>');
  $.get("https://siska.kharisma.ac.id/api/daftardosentetap",
  function(result){
    $.each(result.dosen,function(key,val){
      ldosen='<option value="'+val.nidn+'">'+val.gelar_depan+' '+val.nama+' '+val.gelar_belakang+'</option>';
      $("#pembimbing_skripsi").append(ldosen);
    })
    });
}

function validasiAlumni(){
  var i="";
  var email = $('[name="email"]').val();
  var nim = $('[name="nim"]').val();
  var nama_lengkap = $('[name="nama_lengkap"]').val();
  var program_studi = $('[name="program_studi"]').val();
  var tahun_masuk = $('[name="tahun_masuk"]').val();
  var tahun_wisuda = $('[name="tahun_wisuda"]').val();
  var nomor_ijazah = $('[name="nomor_ijazah"]').val();
  var pembimbing_skripsi = $('[name="pembimbing_skripsi"]').val();
  var judul_skripsi = $('[name="judul_skripsi"]').val();
  if(!email){
    alert('Email wajib di isi!');
  } else {

    if(nim) i++;
    if(nama_lengkap) i++;
    if(program_studi) i++;
    if(tahun_masuk) i++;
    if(tahun_wisuda) i++;
    if(nomor_ijazah) i++;
    if(pembimbing_skripsi) i++;
    if(judul_skripsi) i++;

    if(i<3){
      alert('Harap mengisi minimal tiga data');
    } else {
      $.ajax({
      type : "POST",
      url  : "",
      dataType : "JSON",
      data : {email:email, nimhs:nim, nama_lengkap:nama_lengkap, program_studi:program_studi, tahun_masuk:tahun_masuk, tahun_wisuda:tahun_wisuda,
              nomor_ijazah:nomor_ijazah, pembimbing_skripsi:pembimbing_skripsi, judul_skripsi:judul_skripsi}
      });
      alert('Permintaan Anda sudah terkirim.\nValidasi akan dilakukan secara manual dan hasilnya akan diinformasikan melalui email Anda');
      // location.reload();
      window.location.href = "/";
    }
  }
}
</script>
