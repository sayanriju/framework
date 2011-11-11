<?php 
defined('BASE') or exit('Access Denied!'); 

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| This is settings default routes for all this module.You should
| configure it before the first run of your module.
|
*/
$routes['welcome']       = 'welcome/index';   

/*
|--------------------------------------------------------------------------
| Overridding Global Routes
|--------------------------------------------------------------------------
|
| This is controller default index method for all controllers.
|
*/
$routes['index_method']  = "index";
$routes['404_override']  = '';

