<?php
/**
|--------------------------------------------------------------------------
| Obullo Framework (c) 2009 - 2011. 
|--------------------------------------------------------------------------
|
| PHP5 MVC Based Minimalist Software for PHP 5.1.2 or newer
|
| @version defined  in  .obullo/core/Controller.php
| @see     license.txt
|
*/ 
define('DS',   DIRECTORY_SEPARATOR);  

/**
|--------------------------------------------------------------------------
| Php error reporting
|--------------------------------------------------------------------------
|
| Predefined error constants
| @see http://usphp.com/manual/en/errorfunc.constants.php

| For security
| reasons you are encouraged to change this when your site goes live.
| If you use Obullo error handle you don't
*/
error_reporting(E_ALL | E_STRICT); 
error_reporting(0);

/**
|---------------------------------------------------------------
| APPLICATION FOLDER CONSTANT
|---------------------------------------------------------------
|
| If you want this front controller to use a different "application"
| folder then the default one you can set its name here. The folder 
| can also be renamed or relocated anywhere on your server.
| @see
| User Guide: Chapters / General Topics / Managing Your Applications
|
*/
define('ROOT',  realpath(dirname(__FILE__)) . DS);
define('BASE', ROOT .'obullo'. DS);
define('APP',  ROOT .'application'. DS);
define('MODULES',  ROOT .'modules'. DS);

/*
|---------------------------------------------------------------
| DEFINE APPLICATION CONSTANTS
|---------------------------------------------------------------
| DS        - The DIRECTORY SEPERATOR
| EXT       - The file extension.  Typically ".php"
| SELF      - The name of THIS file (typically "index.php")
| FCPATH    - The full server path to THIS file
| ROOT      - The root path of your server
| BASE      - The full server path to the "system" folder
| APP       - The full server path to the "application" folder
|
*/
define('EXT',  '.php'); 
define('FCPATH', __FILE__);
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

require(APP  .'core'. DS .'Bootstrap'. EXT);  
require(BASE .'core'. DS .'Bootstrap'. EXT);

/**
|--------------------------------------------------------------------------
| User Front Controller for Bootstrap.php file. 
|--------------------------------------------------------------------------
|
| User can create own Front Controller who want replace
| system methods by overriding to Bootstrap.php file.
| 
| @see User Guide: Chapters / General Topics / Control Your Application Boot
|
*/
ob_include_files();
ob_set_headers();

ob_system_run();
ob_system_close();
