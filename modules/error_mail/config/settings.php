<?php

/**
* Error Mail Extension Config
*
* @var mixed
*/
$config['domain']         = 'http://obullo/';
$config['capture_errors'] = TRUE;
$config['write_log']      = FALSE;  // Keep all errors into log file.

$config['recipients']     = array('eguvenc@gmail.com', 'cj@autoclaimsdirect.com', 'anazar@autoclaimsdirect.com');
//$config['recipients']     = array('cjlazell@gmail.com');

$config['from_email']     = 'errors@autoclaimsirect.com';
$config['from_name']      = 'ACD Errors';
$config['subject']        = 'ACD Application Errors';


$config['protocol']       = 'smtp';
$config['smtp_host']      = 'localhost';
$config['smtp_user']      = '';
$config['smtp_pass']      = '';
$config['smtp_port']      = '25';
$config['smtp_timeout']   = '21';


 // $config['protocol']       = 'smtp';
 // $config['smtp_host']      = 'mail.develturk.com';   // pust ssl://  for ssl connection
 // $config['smtp_user']      = 'news@develturk.com';
 // $config['smtp_pass']      = '99219033';
 // $config['smtp_port']      = '587'; // 465 for ssl
 // $config['smtp_timeout']   = '21';
