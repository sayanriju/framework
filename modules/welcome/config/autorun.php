<?php
defined('BASE') or exit('Access Denied!');

/*
| -------------------------------------------------------------------
| AUTO-RUN MODULE
| -------------------------------------------------------------------
| This file specifies which functions should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default.This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Prototype
| -------------------------------------------------------------------
| 
| $autorun['function']['function_name'] = array('arg1', 'arg2');
| 
|
*/

$autorun['function']['sess_start']        = array();
$autorun['function']['view_set_folder']   = array('view_layout', 'layouts');