<?php
/**
|--------------------------------------------------------------------------
| Obullo Command Line Tool
|--------------------------------------------------------------------------
| Obullo Cli Easy Steps, Go to command line
| 
| $ cd /root/path/to/your/framework
| $ php cmd.php welcome
| 
| - php cmd.php task_controller method 'arguments'
|
| 'Welcome.php' task controller located in your .application/tasks path.
| Also you can use task folders creating them under the .modules.
|
| @author CJ Lazell
|
*/ 
if (isset($_SERVER['REMOTE_ADDR'])) exit('Access denied!');

/**
|--------------------------------------------------------------------------
| Cmd Constant
|--------------------------------------------------------------------------
| If CMD constant defined that means Obullo works in Command Line 
| mode so someone can check the mode using php defined() function.
|
*/  
define('CMD', 1);
 
/**
|--------------------------------------------------------------------------
| Get Command Line Arguments
|--------------------------------------------------------------------------
*/ 
unset($_SERVER['argv'][0]);

/**
|--------------------------------------------------------------------------
| Set Command Line Arguments as Obullo Segments
|--------------------------------------------------------------------------
| Manually set the URI path based on command line arguments.
|
*/ 
$_SERVER['PATH_INFO']      = '/'. implode('/', $_SERVER['argv']) .'/';
$_SERVER['REQUEST_URI']    = $_SERVER['PATH_INFO'];
$_SERVER['QUERY_STRING']   = $_SERVER['PATH_INFO'];
$_SERVER['ORIG_PATH_INFO'] = $_SERVER['PATH_INFO'];
 
/**
|--------------------------------------------------------------------------
| Index.php file.
|--------------------------------------------------------------------------
| If you want to rename or move your general index.php also you need to
| to change it from here.
|
*/ 
require('index.php');