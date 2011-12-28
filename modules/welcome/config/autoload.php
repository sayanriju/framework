<?php
defined('BASE') or exit('Access Denied!');
/*
| -------------------------------------------------------------------
| MODULE AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which MODULE file should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default.This file lets
| you globally define which systems you would like loaded with every
| request to current module.
|
| Prototype:  ./application/config/autoload.php
|
*/

$autoload['helper']     = array('ob/session' => '', 'ob/form' => '');
$autoload['lib']        = array();
$autoload['config']     = array();
$autoload['lang']       = array();
$autoload['model']      = array();


/* End of file autoload.php */
/* Location: ./modules/welcome/config/autoload.php */