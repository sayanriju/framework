<?php
defined('BASE') or exit('Access Denied!');

/*
|--------------------------------------------------------------------------
| MODULE CONFIG FILE:
|--------------------------------------------------------------------------
| When the application works Obullo will merge application config
| variables with your MODULE config variables.
*/

/*
|--------------------------------------------------------------------------
| Send EMAIL
|--------------------------------------------------------------------------
| To send errors to you send_email must be TRUE.
|
*/
$config['send_email']     = TRUE;

/*
|--------------------------------------------------------------------------
| Write LOGS
|--------------------------------------------------------------------------
| Keep all errors into log file.
|
*/
$config['write_log']      = FALSE;

/*
|--------------------------------------------------------------------------
| Email Recipients & Email Headers
|--------------------------------------------------------------------------
| Set recipients in array format. You can change the email headers.
|
*/
$config['recipients']     = array('');
$config['from_email']     = 'me@example.com';
$config['from_name']      = 'Obullo Application Errors';
$config['subject']        = 'Application Errors';

/*
|--------------------------------------------------------------------------
| SMTP Settings
|--------------------------------------------------------------------------
| Set your smtp account to here. Using this account
| Obullo will send application errors to you.
|
| $config['smtp_host']    = 'mail.example.com';
| 
| Use ssl:// prefix for ssl connections. 
| 
| $config['smtp_host']    = 'ssl://mail.example.com';
|
*/
$config['smtp_host']      = 'mail.example.com';   
$config['smtp_user']      = '';
$config['smtp_pass']      = '';
$config['smtp_port']      = '587'; // 465 for ssl
$config['smtp_timeout']   = '21';



/* End of file config.php */
/* Location: ./modules/e_notifier/config/config.php */