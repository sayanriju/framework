Obullo "e_notifier" Extension
=========================

The goal of `e_notifier` module sending application errors in the background when 
the application run on LIVE server.

## Requirements
- Any Linux platform.
- Shell command must available on your server (This module use php `exec()` or `system()` command).
- A smtp account to send notifications to you.

## Installation
- To set e_notifier extension for application, change $extensions['application']['e_notifier']['enabled'] = TRUE; set to true 
from `application/config/extensions.php`.
- Set $config['send_email'] to TRUE from `modules/e_notifier/config/config.php`.
- Set your smtp account and recipient fields from `modules/e_notifier/config/config.php`.
- Give chmod file write permission (777) to `modules/e_notifier/views/html_errors/` folder.
- Set `$config['error_reporting'] = 0;` from /application/config/config.php when your application go to LIVE.

## Run
- Try an error for example write an undefined variable `echo $undefined;` in your controller 
when the script run if your settings right you will get an error notification email from `e_notifier` extension.

## Tips
if you don't want enable `e_notifier` extension when you work on local.You can set your environments to 
your `module.xml` file. 

- If you would you like enable extensions for different environments, 
just add them to `env="DEV,DEBUG"` attribute. 

- Below the setting will be enable `e_notifier` extension for `TEST` and `LIVE` environments.
You can also set one attribute without commma e.g. `env="LIVE"`.

<?xml version="1.0"?>

<!--
    Document   : module.xml
    Created on : January 29, 2012, 3:05 PM
    Author     : Obullo
    Description:
        Module.xml file works like .htaccess, when your current
        module begin to run, xml settings will be initialize to
        which modules are contains this file.
-->

<root>
    <extension name="e_notifier" enabled="yes" env="TEST,LIVE">
        <override>
            <library>Exception</library>
            <helper>error</helper>
        </override>
    </extension>
</root>

