<?php
defined('BASE') or exit('Access Denied!');
/*
| -------------------------------------------------------------------
| AUTO-LOADER MODULE
| -------------------------------------------------------------------
| This file specifies which MODULE should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default.This file lets
| you globally define which systems you would like loaded with every
| request to current module.
|
| Prototype:  ./application/config/autoload.php
|
*/

$autoload['helper']     = array('ob/view' => '', 'ob/html' => '', 'ob/url' => '');
$autoload['lib']        = array();
$autoload['config']     = array();
$autoload['lang']       = array();
$autoload['model']      = array();


/* End of file autoload.php */
/* Location: ./modules/default/config/autoload.php */