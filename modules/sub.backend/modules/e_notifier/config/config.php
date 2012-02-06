<?php
defined('BASE') or exit('Access Denied!');

/*
|--------------------------------------------------------------------------
| E_NOTIFIER extension configuration file:
|--------------------------------------------------------------------------
| The goal of `e_notifier` module sending application errors in the 
| background when the application run on your live server.
|
| For more details look at `/modules/e_notifier/readme.md` file.
| 
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
| Write LOG
|--------------------------------------------------------------------------
| Keep all errors into log file.
|
*/
$config['write_log']      = TRUE;

/*
|--------------------------------------------------------------------------
| Email Recipients & Email Headers
|--------------------------------------------------------------------------
| Set recipients in array format. You can change the email headers.
|
*/
$config['recipients']     = array('eguvenc@gmail.com');
$config['from_email']     = 'news@develturk.com';
$config['from_name']      = 'Obullo "e_notifier"';
$config['subject']        = 'Errors :(';

/*
|--------------------------------------------------------------------------
| SMTP Settings
|--------------------------------------------------------------------------
| Set your smtp account to here. Using this account
| Obullo will send system errors to you.
|
|   $config['smtp_host']    = 'mail.example.com';
| 
|   SSL Config:
|   Use "ssl://" prefix for ssl connections. ( 'ssl://mail.example.com' )
|   Use "465" port for ssl connections.
|
*/
$config['smtp_host']      = 'mail.develturk.com';   
$config['smtp_user']      = 'news@develturk.com';
$config['smtp_pass']      = '99219033';
$config['smtp_port']      = '587'; // 465 for ssl
$config['smtp_timeout']   = '21';



/* End of file config.php */
/* Location: ./modules/e_notifier/config/config.php */