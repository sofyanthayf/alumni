<section id="about" class="wow">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        <?php $this->load->view('/admin/nav'); ?>

      </div>

      <div class="col-lg-8 content">
        <h2>Perusahaan Mitra</h2>

        <table class="table">
          <thead>
            <th colspan="2">
              Perusahaan &nbsp;
              <sup>
                <span class="badge badge-primary"><?=count($mitra)?></span>
              </sup>
            </th>
            <th class="text-center">Status</th>
            <th class="text-center">Alumni</th>
          </thead>
          <tbody>
            <?php foreach ($mitra as $key => $value): ?>
              <tr>
                <td class="text-center" width="120px">
                  <img src="<?=$value['logo']?>" style="max-width: 120px; max-height:60px;"></td>
                <td>
                  <a href="/mitra/<?=$value['mitra']?>" target="_blank">
                    <strong><?=$value['nama_perusahaan']?></strong>
                    <sup><span class="badge badge-danger small"><?= ($this->session->who == 'ad' && $value['views'] < 2) ? 'new' : '' ?></span></sup>
                  </a>
                  <?=!empty($value['brand'])?'<br>'.$value['brand']:''?>
                  <?php if (!empty($value['website'])): ?>
                    <div class="small">
                      <a href="<?=$value['website']?>"><?=$value['website']?></a>
                    </div>
                  <?php endif; ?>
                </td>
                <td class="text-center"><?=$this->mylib->badan_usaha[$value['statusbh']]?></td>
                <td class="text-center"><?=$value['jml_alumni']?> alumni</td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>

    </div>

  </div>
</section><!-- #about -->
