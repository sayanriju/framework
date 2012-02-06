<?php
defined('BASE') or exit('Access Denied!');

/*
|--------------------------------------------------------------------------
| SUBMODULE Database Settings
|--------------------------------------------------------------------------
| Put your database configurations here and decide your db variable
| name. You will use it in the module like this $this->db .
| 
| $config['database']['db']['option']  db variable name ( default $this->db )
| 
*/

$database['db']['hostname']  = "localhost";
$database['db']['username']  = "root";
$database['db']['password']  = "";
$database['db']['database']  = "obullo";
$database['db']['dbdriver']  = "mysql";
$database['db']['dbh_port']  = "";
$database['db']['char_set']  = "utf8";
$database['db']['dsn']       = "";
$database['db']['options']   = array();