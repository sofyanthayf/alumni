<?php

$config['smtp_host'] = 'smtp.googlemail.com';
$config['protocol'] = 'smtp';
$config['smtp_port'] = 587;
$config['smtp_crypto'] = "tls";

$config['useragent'] = 'KHARISMA Mailer';
$config['smtp_user'] = getenv('SMTP_USER');
$config['smtp_pass'] = getenv('SMTP_PASS');

$config['smtp_timeout'] = 5;
$config['wordwrap'] = TRUE;
$config['wrapchars'] = 76;
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['validate'] = TRUE;
$config['priority'] = 3;
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
$config['bcc_batch_mode'] = FALSE;
$config['bcc_batch_size'] = 200;


 ?>
