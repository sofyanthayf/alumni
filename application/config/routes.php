<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['contactperson'] = 'mitra/formeditcontactperson';
$route['editperusahaan'] = 'mitra/formeditperusahaan';
$route['editkantorcabang'] = 'mitra/formeditkantorcabang';

$route['penilaian-kinerja/(:any)'] = 'mitra/formPenilaianKinerja/$1';

$route['dalumni'] = 'alumni/dataalumni';
$route['logout'] = 'user/logout';

$route['default_controller'] = 'home';

$route['pendidikan_alumni'] = 'pendidikan';
$route['cv_alumni'] = 'cv';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
