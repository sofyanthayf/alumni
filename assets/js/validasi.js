daftarprodi();
daftardosentetap();

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
    if(nim){
      i++;
    }
    if(nama_lengkap){
      i++;
    }
    if(program_studi){
      i++;
    }
    if(tahun_masuk){
      i++;
    }
    if(tahun_wisuda){
      i++;
    }
    if(nomor_ijazah){
      i++;
    }
    if(pembimbing_skripsi){
      i++;
    }
    if(judul_skripsi){
      i++;
    }
    if(i<3){
      alert('Data Kurang dari 3!');
    } else {
      $.ajax({
      type : "POST",
      url  : "",
      dataType : "JSON",
      data : {email:email, nimhs:nim, nama_lengkap:nama_lengkap, program_studi:program_studi, tahun_masuk:tahun_masuk, tahun_wisuda:tahun_wisuda,
              nomor_ijazah:nomor_ijazah, pembimbing_skripsi:pembimbing_skripsi, judul_skripsi:judul_skripsi}
      });
      alert('Validasi Alumni sudah terkirim!');
      location.reload();
    }
  }
}
