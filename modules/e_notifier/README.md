Obullo "e_notifier" Module Extension
=========================

The goal of `e_notifier` module sending application errors in the background when 
the application run on LIVE server.

## Requirements
- Any Linux platform
- Shell command must available on your server (This module use php `exec()` or `system()` command)
- A smtp account to send error emails to you

## Installation
- To set e_notifier extension for application, change $extensions['application']['e_notifier']['enabled'] = TRUE; set to true 
from `application/config/extensions.php`
- Set $config['send_errors'] to TRUE from `modules/e_notifier/config/settings.php`
- Set your smtp account and recipient fields from `modules/e_notifier/config/settings.php`
- Give chmod file write permission (777) to `modules/e_notifier/views/html_errors/` folder
- Close `$config['error_reporting'] = 0;` from /application/config/config.php when your application go
to LIVE.

## Run
- Try an error for example write an undefined variable `echo $undefined;` in your controller 
when the script run if your settings right you will get an error email from 
obullo e_notifier module.

## Tips
- You can add these codes to `/modules/e_notifier/config/config.php` if you don't want get error emails 
when you work on local.

## modules/e_notifier/config/settings.php

    if(config_item('env') == 'LIVE') 
    {
        $config['send_errors']    = TRUE;
    } 
    else 
    {
        $config['send_errors']    = FALSE;
    }

or You can add these lines of codes to `/application/config/config.php` if you don't want enable "e_notifier" extension
when you work on local.

## application/config/extensions.php

    if($config['env'] == 'LIVE') 
    {
        $extensions['application']['e_notifier']['enabled'] = TRUE;
    } 
    else 
    {
        $extensions['application']['e_notifier']['enabled'] = FALSE;
    }

- You can set e_notifier extension for another module, for example if you want to set e_notifier 
for welcome module you need to open `application/config/extensions.php` and change settings like this.

    $extensions['welcome']['e_notifier']['enabled']               = TRUE;
    $extensions['welcome']['e_notifier']['lib_override']          = array('Exception');
    $extensions['welcome']['e_notifier']['helper_override']       = array('error');

After that changes e_notifier extension will work for just welcome module.