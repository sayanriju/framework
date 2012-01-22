<?php
defined('BASE') or exit('Access Denied!'); 

/*
|--------------------------------------------------------------------------
| Database Settings
|--------------------------------------------------------------------------
| Put your static database configurations here and decide your db variable
| name. You will use it in the application like this $this->db .
| 
| $database['db']['option']  db variable name ( default $this->db )
| 
| Prototype Options:  array( PDO::ATTR_PERSISTENT => FALSE , 
|                            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => FALSE
|                          ); 
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



/* End of file database.php */
/* Location: ./application/config/database.php */