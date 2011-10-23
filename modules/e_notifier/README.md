Obullo "e_notifier" Module
=========================

The goal of `e_notifier` module sending application errors in background to developers.When 
your application run your LIVE server.

## Requirements
- Any Linux platform
- Shell command must available on your server (This module use php exec() or system() command)
- A Smtp account to send emails to you

## Installation
- Set $config['send_errors'] to TRUE from `modules/e_notifier/config/settings.php`
- Set your smtp account and recipient fields from `modules/e_notifier/config/settings.php`
- Give chmod file write permission (777) to `modules/e_notifier/views/html_errors/` folder
- Close `$config['error_reporting'] = 0;` from /application/config/config.php when your application go
to LIVE.

## Run
- Try an error forexample write an undefined variable `$undefined;` in your controller 
if your settings right when the script run you will get an application error email from 
obullo e_notifier module.

## Tips
You can add these codes to /e_notifier/config/settings.php if you don't want get error emails 
when you work on local.

------- modules/e_notifier/config/settings.php --------

if(config_item('env') == 'LIVE') 
{
    $config['send_errors']    = TRUE;
} 
else 
{
    $config['send_errors']    = FALSE;
}

or You can add these codes to /application/config/settings.php if you don't want enable "e_notifier" extension
when you work on local.

------- application/config/extensions.php --------

if(config_item('env') == 'LIVE') 
{
    $extensions['application']['e_notifier']['enabled'] = TRUE;
} 
else 
{
    $extensions['application']['e_notifier']['enabled'] = FALSE;
}