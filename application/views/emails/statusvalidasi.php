  <p>
    Yang terhormat, <br>
    Saudara <?=$request['nama_lengkap']?>
  </p>
  <br>
  <p>
    Terima kasih atas kesediaan Anda untuk berpartisipasi pada <a href="<?=base_url()?>">Layanan Alumni
    STMIK KHARISMA Makassar</a>, dengan mengajukan permintaan validasi data Anda sebagai alumni.
  </p>
<?php
  switch ($validasi) {
    case '1':
      ?>

        <p>
          Mohon maaf yang sebesar-besarnya karena kami tidak menemukan catatan maupun data yang relevan
          dengan data yang Anda berikan yang menunjukkan bahwa Anda adalah alumni STMIK KHARISMA Makassar,
          sehingga permintaan validasi Anda, untuk sementara, tidak dapat kami lanjutkan.
        </p>
        <p>
          Sangat mungkin terdapat kekeliruan dalam pengajuan data alumni maupun pada sistem pendataan kami,
          untuk itu kami persilahkan Anda untuk menghubungi pengelola STMIK KHARISMA Makassar untuk melakukan
          klarifikasi.
        </p>
        <p>
          Besar harapan kami untuk dapat menghimpun seluruh alumni dan saling memberi manfaat dalam Layanan Alumni
          STMIK KHARISMA Makassar.
        </p>

      <?php
      break;

    case '2':
      ?>

      <p>
        Mohon maaf yang sebesar-besarnya karena berdasarkan data yang Anda ajukan, kami belum bisa
        memastikan status Anda sebagai alumni STMIK KHARISMA Makassar, salah satunya adalah ada lebih
        dari satu data alumni yang mirip dengan data Anda, sehingga permintaan validasi Anda,
        untuk sementara, belum dapat kami lanjutkan.
      </p>
      <p>
        Silahkan mengajukan permintaan validasi alumni kembali dengan data yang lebih lengkap dan
        lebih spesifik <?=empty($request['nimhs'])?'(NIM Anda salah satunya)':''?>, atau silahkan
        menghubungi langsung ke pengelola STMIK KHARISMA Makassar.
      </p>
      <p>
        Besar harapan kami untuk dapat menghimpun seluruh alumni dan saling memberi manfaat dalam Layanan Alumni
        STMIK KHARISMA Makassar.
      </p>

      <?php
      break;

    case '3':
      ?>

      <p>
        Mohon maaf karena email yang anda masukkan telah terdaftar/didaftarkan sebagai Contact Person
        dari Perusahaan Mitra oleh alumni yang lain (yang mungkin rekan sejawat di perusahaan mitra yang
        sama dengan Anda), sehingga permintaan validasi Anda, untuk sementara, belum dapat kami lanjutkan.
      </p>
      <p>
        Email yang digunakan sebagai Alumni harus berbeda dengan email yang digunakan sebagai
        Contact Person Perusahaan Mitra, karena status user divalidasi berdasarkan email dan keduanya
        memiliki kapabilitas yang berbeda dalam sistem Layanan Alumni kami.
      </p>
      <p>
        Silahkan mengajukan permintaan validasi alumni kembali dengan menggunakan alamat email Anda yang lain.
      </p>
      <p>
        Besar harapan kami untuk dapat menghimpun seluruh alumni dan saling memberi manfaat dalam Layanan Alumni
        STMIK KHARISMA Makassar.
      </p>

      <?php
      break;

    case '7':
      ?>

      <p>
        Mohon maaf yang sebesar-besarnya karena berdasarkan data yang Anda ajukan, setelah dilakukan
        penelusuran pada Sistem Informasi Akademik STMIK KHARISMA maupun pada Pangkalan Data Perguruan Tinggi
        dari RistekDikti, Anda tercatat belum menyelesaikan keseluruhan proses studi dan belum berhak
        menyandang sebutan alumni.
      </p>
      <p>
        Masih ada kemungkinan terdapat kekeliruan dalam pengajuan data alumni maupun pada sistem pendataan kami,
        untuk itu kami persilahkan Anda untuk menghubungi pengelola STMIK KHARISMA Makassar untuk melakukan
        klarifikasi.
      </p>
      <p>
        Besar harapan kami untuk dapat menghimpun seluruh alumni dan saling memberi manfaat dalam Layanan Alumni
        STMIK KHARISMA Makassar.
      </p>

      <?php
      break;

    case '8':
      ?>

      <p>
        Alamat Email yang Anda ajukan telah tercatat dalam daftar akun user Layanan Alumni STMI KHARISMA Makassar.
        Karena itu, Anda hanya perlu menjalankan mekanisme
        <a href="<?=base_url()?>lupapassword"><strong>Lupa Password</strong></a>
        untuk mendapatkan password baru dan melakukan login dengan akun Anda.
      </p>

      <?php
      break;

    case '9':
      ?>

        <p>
          Telah dilakukan proses validasi data alumni yang Anda ajukan dan dinyatakan diterima.
          Anda adalah benar alumni STMIK KHARISMA Makassar
        </p>
        <p>
          Selanjutnya Anda dapat login dan melakukan penyesuaian data alumni dengan menggunakan
          akun alumni Anda berikut ini:
        </p>
        <ul>
          <li>Email: <?=$request['email']?></li>
          <li>Password: <span class="code"><strong><?=$newp?></strong></span></li>
        </ul>
        <p>
          Pastikan Anda melakukan penggantian password yang lebih mudah di ingat dan lebih aman,
          begitu Anda berhasil login.
        </p>

      <?php
      break;
  }
 ?>

 <?php if ( $validasi == 8 || $validasi == 9 ): ?>
    <p>
      Kelengkapan dan validitas data yang Anda berikan pada layanan alumni akan berdampak langsung
      maupun tidak langsung pada peningkatan kualitas dan <strong>peringkat akreditasi</strong>
      STMIK KHARISMA Makassar, yang pada akhirnya juga akan berdampak pada karir Anda sebagai alumni
    </p>
 <?php endif; ?>

    <p>
      Atas perhatian dan kerjasama Anda, dihaturkan banyak terima kasih.
    </p>
    <br>
    <p>
      <strong>SALAM SUKSES</strong>
    </p>
