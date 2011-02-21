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

$extensions['sample'] =  array(
                                'enabled' => FALSE,
                                'lib_override' => '',
                                'helper_override' => '',
                                'public_folder' => 'public',
                                );
                                
$extensions['error_mail'] =  array(
                                    'enabled' => FALSE,
                                    'lib_override'    => 'Exception',
                                    'public_folder'   => 'public',
                                    );


/* End of file config.php */
/* Location: ./modules/extensions.php */