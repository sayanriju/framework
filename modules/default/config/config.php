<?php
defined('BASE') or exit('Access Denied!');

/*
|--------------------------------------------------------------------------
| MODULE CONFIG FILE:
|--------------------------------------------------------------------------
| When the application works Obullo will merge application config
| variables with your MODULE config variables.
|
| Prototype:
|
|	$config['item'] = 'mixed value';
*/
$config['item']                   = 'Default module config item1 works !';

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
|
|    0 = Disables logging, Error logging TURNED OFF
|    1 = Error Messages (including PHP errors)
|    2 = Debug Messages
|    3 = Informational Messages
|    4 = All Messages
|
| For a live site you'll usually only enable Errors (1) to be logged otherwise
| your log files will fill up very fast.
|
*/
$config['log_threshold']         = 2;


/* End of file config.php */
/* Location: .modules/default/config/config.php */