<?php
defined('BASE') or exit('Access Denied!');

/*
| -------------------------------------------------------------------
| AUTO-LOADER & MODULE FUNCTIONS
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default.This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Libraries              loader::lib();
| 2. Helper files           loader::helper();
| 4. Custom config files    loader::config();
| 5. Language files         loader::lang();
| 6. Models                 loader::model();
|
*/

loader::helper('ob/view');
loader::helper('ob/html');
loader::helper('ob/url');
loader::helper('ob/form');
loader::helper('ob/form_json');
loader::helper('ob/session');

sess_start();

view_set_folder('view_layout', 'layouts');  // you can set sub directory for view functions.
        
/* End of file autoload.php */
/* Location: ./application/config/autoload.php */