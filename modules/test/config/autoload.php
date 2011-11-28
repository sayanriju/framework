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
| request to current module.
|
| Prototype:  ./application/config/autoload.php
|
*/

$autoload['helper']     = array('ob/form' => '', 'ob/form_send' => '');
$autoload['lib']        = array();
$autoload['config']     = array();
$autoload['lang']       = array();
$autoload['model']      = array();


/* End of file autoload.php */
/* Location: .modules/test/config/autoload.php */