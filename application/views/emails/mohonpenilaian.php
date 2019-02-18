<p>
  Yang terhormat, <br>
  <?=$sex=='L'?'Bapak':'Ibu'?> <strong><?=$nama?></strong>
  <?= !empty($jabatan) ? '<br>'.$jabatan : '' ?>
  <br><?=$perusahaan?>
</p>

<p>
  <i>Assalamu alaikum warahmatullah wabarakatuh</i><br>
  Salam Sejahtera
</p>

<p>
  Dengan Hormat,
</p>

<p>
  Perkenalkan, email ini adalah atas nama Unit Kerjasama dan Pelayanan Alumni STMIK KHARISMA Makassar,
  di bawah koordinasi Wakil Ketua Bidang Kemahasiswaan STMIK KHARISMA Makassar. Dalam rangka
  upaya peningkatan kualitas alumni, kualitas pembelajaran dan peningkatan akreditasi institusi kami,
  kami telah menjalankan layanan <i>online</i> <strong>Alumni KHARISMA</strong> (<?=base_url()?>).
</p>

<p>
  Salah satu alumni kami yang bekerja pada perusahaan/instansi yang sama dengan <?=$sex=='L'?'Bapak':'Ibu'?>:
  <ul>
    <li>Nama Alumni: <strong><?=$alumni?></strong></li>
    <li>Bagian/Divisi Kerja: <strong><?=$divisialumni?></strong> </li>
    <?php if (!empty($cabangalumni)): ?>
      <li>Kantor Cabang: <strong><?=$cabangalumni?></strong> </li>
    <?php endif; ?>
  </ul>
  <br>
  telah mempercayakan <?=$sex=='L'?'Bapak':'Ibu'?> sebagai atasan atau rekan sejawat dari yang bersangkutan,
  untuk memberikan penilaian atas kinerja dan kualitasnya sebagai alumni kami.
</p>

<p>
  Untuk itu, kami mohon kesediaan <?=$sex=='L'?'Bapak':'Ibu'?>, kiranya dapat meluangkan sedikit
  waktunya untuk mengisi angket penilaian untuk alumni kami tersebut di atas. Angket penilaian dapat
  diakses pada link berikut:<br><br>
  <a href="<?=$link?>"><?=$link?></a>
</p>

<p>
  Kami memperkirakan, <?=$sex=='L'?'Bapak':'Ibu'?> hanya membutuhkan waktu tidak lebih dari 5 menit
  untuk melakukan penilaian.
</p>

<p>
  Untuk dapat melakukan penilaian, <?=$sex=='L'?'Bapak':'Ibu'?> akan diminta untuk melakukan <i>log-in</i>
  terlebih dahulu dengan menggunakan data akun sebagai berikut:
</p>
<ul>
  <li>Nama user: <strong><?=$email?></strong></li>
  <li>Password: <span class="code"><strong><?=$pass?></strong></span> </li>
</ul>
<br>&nbsp;<br>
<p>
  <?=$sex=='L'?'Bapak':'Ibu'?> dapat melakukan penggantian <i>password</i>, untuk memudahkan
  dalam mengakses kembali layanan <strong>Alumni KHARISMA</strong> guna pemanfaatan dan
  kerjasama pengembangan alumni lebih lanjut.
</p>

<p>
  Besar harapan kami, <?=$sex=='L'?'Bapak':'Ibu'?> dapat ikut bekerjasama dalam peningkatan
  kualitas alumni kami. Atas perkenan <?=$sex=='L'?'Bapak':'Ibu'?>, kami haturkan banyak terima kasih.
</p>

<p>Salam Sukses Selalu</p>
