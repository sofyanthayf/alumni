<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['alumni/login'] = 'user/form_login_alumni';
$route['alumni/login/(:any)'] = 'user/form_login_alumni/$1';
$route['alumni/logedin'] = 'user/login_alumni';

$route['mitra/login'] = 'user/form_login_cpmitra';
$route['mitra/login/(:any)'] = 'user/form_login_cpmitra/$1';
$route['mitra/logedin'] = 'user/login_cpmitra';

$route['lupapassword'] = 'user/lupa_password';
$route['gantipassword'] = 'user/ganti_password';

$route['alumni/validasi'] = 'user/validasi_alumni';
$route['alumni/updatefoto'] = 'alumni/update_foto';
$route['alumni/uploadfoto'] = 'alumni/upload_foto';

$route['alumni/update'] = 'alumni/updatealumnus';
$route['alumni/pendidikan/(:any)'] = 'alumni/pendidikan/$1';
$route['alumni/pendidikan/(:any)/(:any)'] = 'alumni/pendidikan/$1/$2';
$route['alumni/tambahpendidikan'] = 'alumni/insert_pendidikan';
$route['alumni/updatependidikan'] = 'alumni/update_pendidikan';
$route['alumni/hapuspendidikan/(:any)'] = 'alumni/hapus_pendidikan/$1';

$route['alumni/sertifikasi'] = 'alumni/sertifikasi';
$route['alumni/sertifikasi/(:any)'] = 'alumni/sertifikasi/$1';
$route['alumni/tambahsertifikasi'] = 'alumni/insert_sertifikasi';
$route['alumni/updatesertifikasi'] = 'alumni/update_sertifikasi';
$route['alumni/hapussertifikasi/(:any)'] = 'alumni/hapus_sertifikasi/$1';

$route['alumni/karya'] = 'alumni/karya';
$route['alumni/karya/(:any)'] = 'alumni/karya/$1';
$route['alumni/tambahkarya'] = 'alumni/insert_karya';
$route['alumni/updatekarya'] = 'alumni/update_karya';
$route['alumni/hapuskarya/(:any)'] = 'alumni/hapus_karya/$1';

$route['alumni/testmail'] = 'alumni/testmail';
$route['alumni/pekerjaan'] = 'alumni/pekerjaan';
$route['alumni/pekerjaan/(:any)'] = 'alumni/pekerjaan/$1';
$route['alumni/pekerjaan/(:any)/(:any)'] = 'alumni/pekerjaan/$1/$2';
$route['alumni/tambahpekerjaan'] = 'alumni/insert_pekerjaan';
$route['alumni/updatepekerjaan'] = 'alumni/update_pekerjaan';
$route['alumni/hapuspekerjaan/(:any)'] = 'alumni/hapus_pekerjaan/$1';
$route['alumni/hapuspekerjaan/(:any)/(:any)'] = 'alumni/hapus_pekerjaan/$1/$2';
$route['alumni/referensi/(:any)'] = 'alumni/tambah_referensi/$1';
$route['alumni/referensi/(:any)/(:any)'] = 'alumni/tambah_referensi/$1/$2';
$route['alumni/simpanreferensi'] = 'alumni/simpan_referensi';

$route['testimoni'] = 'testimoni';
$route['alumni/testimoni'] = 'testimoni/tulis_testimoni';
$route['submittestimoni'] = 'testimoni/submit_testimoni';
$route['updatetestimoni'] = 'testimoni/update_testimoni';

$route['alumni/(:any)'] = 'alumni/detailalumni/$1';
$route['alumni/(:any)/(:any)'] = 'alumni/detailalumni/$1/$2';   // $2 = 'pdf'

$route['mitra/usulanedit/(:any)'] = 'mitra/edit_mitra/$1';
$route['mitra/simpanupdate'] = 'mitra/simpanupdate_mitra';
$route['mitra/usulaneditcabang/(:any)'] = 'mitra/edit_cabang/$1';
$route['mitra/simpanupdatecabang'] = 'mitra/simpanupdate_cabang';
$route['mitra/updatelogo/(:any)'] = 'mitra/update_logo/$1';
$route['mitra/uploadlogo'] = 'mitra/upload_logo';
$route['mitra/(:any)'] = 'mitra/detailmitra/$1';

$route['contactperson'] = 'mitra/detail_cp';
$route['contactperson/edit'] = 'mitra/edit_cp';
$route['contactperson/update'] = 'mitra/update_cp';

$route['referensi/(:any)'] = 'mitra/penilaian_kinerja/$1';
$route['referensi_update'] = 'mitra/insert_penilaian';

// $route['contactperson'] = 'mitra/formeditcontactperson';
$route['editperusahaan'] = 'mitra/formeditperusahaan';
$route['editkantorcabang'] = 'mitra/formeditkantorcabang';

$route['penilaian-kinerja/(:any)'] = 'mitra/formPenilaianKinerja/$1';

$route['dalumni'] = 'alumni/dataalumni';
$route['logout'] = 'user/logout';

$route['credits'] = 'home/credits';
$route['default_controller'] = 'home';

$route['pendidikan_alumni'] = 'pendidikan';
$route['cv_alumni'] = 'cv';


$route['admin'] = 'admin';
$route['admin/login'] = 'user/form_login_admin';
$route['admin/login/(:any)'] = 'user/form_login_admin/$1';
$route['admin/logedin'] = 'user/login_admin';
$route['admin/validasialumni'] = 'admin/validasi_alumni';
$route['admin/validasialumni/(:any)'] = 'admin/validasi_alumni/$1';
$route['admin/submitvalidasi'] = 'admin/submit_validasi';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
