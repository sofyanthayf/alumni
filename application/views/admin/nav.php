<?php if (!isset($home)): ?>

  <a class="btn btn-light btn-block" href="/admin" title="Ganti Password" style="margin:15px;">
    <img src="/assets/img/back-blue16.png"> Admin Home
  </a>

<?php else: ?>

  <a class="btn btn-light btn-block" href="/admin/validasialumni" title="Ganti Password" style="margin:15px;">
    <img src="/assets/img/mhs16.png"> Validasi Alumni
    <span class="badge badge-primary"><?=count($validasiwaitinglist)>0 ? count($validasiwaitinglist) : ''?></span>
  </a>

  <a class="btn btn-light btn-block" href="/gantipassword" title="Ganti Password" style="margin:15px;">
    <img src="/assets/img/key16.png"> Ganti Password
  </a>

<?php endif; ?>
