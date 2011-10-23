<?php

/**
* Obullo e_notifier (Error Notifier) Extension
* Config variables.
*
* @var mixed
*/
$config['send_errors']    = TRUE;
$config['write_log']      = FALSE;  // Keep all errors into log file.

$config['recipients']     = array('eguvenc@gmail.com');
$config['from_email']     = 'news@develturk.com';
$config['from_name']      = 'Obullo Application Errors';
$config['subject']        = 'Application Errors';

$config['protocol']       = 'smtp';
$config['smtp_host']      = 'mail.develturk.com';   // pust ssl://  for ssl connection
$config['smtp_user']      = 'news@develturk.com';
$config['smtp_pass']      = '99219033';
$config['smtp_port']      = '587'; // 465 for ssl
$config['smtp_timeout']   = '21';
