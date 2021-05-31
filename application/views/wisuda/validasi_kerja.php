<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        <?php $this->load->view('/wisuda/nav'); ?>
      </div>


      <div class="col-lg-6 content">
        <h2>Registrasi Wisuda</h2>
        <p class="text-primary">
          Untuk keperluan data pendukung akreditasi dan re-akreditasi serta peningkatan kualitas pendidikan,
          STMIK KHARISMA  membutuhkan informasi tentang riwayat pekerjaan Anda, terhitung sejak
          tanggal Anda di-yudisium
        </p>

        <form class="form" action="/wisuda/registrasi" method="post">
          <table class="table">
            <tbody>
              <tr>
                <td><strong>Apakah Anda sudah bekerja?</strong></td>
              </tr>
              <tr>
                <td>
                  <input type="radio" name="bekerja" id="bekerja" value="1" required>
                  Ya, saya sudah bekerja / berwirausaha
                </td>
              </tr>
              <tr>
                <td>
                  <input type="radio" name="bekerja" id="bekerja" value="0" required>
                  Tidak, saya belum bekerja
                </td>
              </tr>
              <tr>
                <td>
                  <table width="100%">
                    <tr>
                      <td>
                        <input type="checkbox" name="datavalid" value="1" required>
                      </td>
                      <td>
                        Pernyataan saya di atas adalah yang sebenar-benarnya, dan saya bersedia menerima
                        segala konsekwensi bila saya memberikan data yang tidak sesuai
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" class="btn btn-primary"> &nbsp; Lanjutkan &nbsp; </button>
                </td>
              </tr>
            </tbody>
          </table>
        </form>

      </div>
    </div>

  </div>
</section>
