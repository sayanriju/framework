<?php
defined('BASE') or exit('Access Denied!');

/*
|--------------------------------------------------------------------------
| AVAILABLE EXTENSIONS
|--------------------------------------------------------------------------
| Obullo extensions similar as Obullo modules the main difference is
| when Obullo loaders see the if its extension all files loading from
| /extenstions/name folder. And if extension has a main library
| you can load it calling loader::ext('sample'); function.
|
| Congiguration Example
|
| extension name  -  option    - value
| $extension['name']['option'] = '';
|
*/

$extensions['sample']['enabled']         = FALSE;
$extensions['sample']['lib_override']    = '';
$extensions['sample']['helper_override'] = '';
$extensions['sample']['public_folder']   = 'public'; 

$extensions['error_mail']['enabled']         = FALSE;
$extensions['error_mail']['lib_override']    = 'Exception';
$extensions['error_mail']['public_folder']   = 'public'; 



/* End of file config.php */
/* Location: ./modules/extensions.php */