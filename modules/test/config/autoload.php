<?php
defined('BASE') or exit('Access Denied!');
/*
| -------------------------------------------------------------------
| AUTO-LOADER MODULE
| -------------------------------------------------------------------
| This file specifies which MODULE file should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default.This file lets
| you globally define which systems you would like loaded with every
| request.
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('ob/url', 'ob/file', 'my_helper');
*/

$autoload['helper']     = array('ob/form', 'ob/form_json');

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in the obullo/libraries folder
| or in your application/libraries folder, 
| or modules/current_module/libraries folder.
|
| Prototype:
|
|	$autoload['lib'] = array('ob/calendar', 'my_lib');
| 
| Prototype using arguments:
|
|       $autoload['lib'] = array(array('app/auth' => '', 'app/my_library' => array($construct_params))); 
|
|       No Instantiate example
|
|       $autoload['lib'] = array(array('app/auth' => FALSE));  
| 
| 
| NOTE: Using libraries with FALSE means no instantiate 
| (e.g. like running loader::lib('app/my_library', false)) if you intend to use false 
| this will just include file, the library construct params must be array.
|
*/

$autoload['lib']        = array();

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/

$autoload['config']     = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['lang'] = array('lang1', 'lang2');
|
*/

$autoload['lang']       = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| 
| Prototype:
|
|	$autoload['model'] = array('app/model', 'my_modelname');
| 
| Prototype using arguments:
|
|       $autoload['model'] = array(array('app/model' => '', 'app/my_modelname' => array($construct_params))); 
|
|       No Instantiate example
|
|       $autoload['model'] = array(array('modelname' => FALSE));  
*/

$autoload['model']      = array();


/* End of file autoload.php */
/* Location: .modules/test/config/autoload.php */