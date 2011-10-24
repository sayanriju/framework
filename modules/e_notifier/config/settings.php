<?php

/**
* Obullo e_notifier (Error Notifier) Extension
* Config variables.
*
* @var mixed
*/
$config['send_errors']    = TRUE;
$config['write_log']      = FALSE;  // Keep all errors into log file.

$config['recipients']     = array('');
$config['from_email']     = 'me@example.com';
$config['from_name']      = 'Obullo Application Errors';
$config['subject']        = 'Application Errors';

$config['protocol']       = 'smtp';
$config['smtp_host']      = 'mail.example.com';   // pust ssl://  for ssl connection
$config['smtp_user']      = '';
$config['smtp_pass']      = '';
$config['smtp_port']      = '587'; // 465 for ssl
$config['smtp_timeout']   = '21';
