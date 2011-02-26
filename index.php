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
|---------------------------------------------------------------
| FOLDER CONSTANTS
|---------------------------------------------------------------
|
| If you want this front controller to use a different "application"
| folder then the default one you can set its name here. The folder 
| can also be renamed or relocated anywhere on your server.
| It is same for "Modules" folder.
| @see
| User Guide: Chapters / General Topics / Managing Your Applications
|
*/
define('ROOT',  realpath(dirname(__FILE__)) . DS);
define('BASE', ROOT .'obullo'. DS);
define('APP',  ROOT .'application'. DS);
define('MODULES',  ROOT .'modules'. DS);

/**
|---------------------------------------------------------------
| UNDERSTANDING CONSTANTS
|---------------------------------------------------------------
| DS        - The DIRECTORY SEPERATOR
| EXT       - The file extension.  Typically ".php"
| SELF      - The name of THIS file (typically "index.php")
| FCPATH    - The full server path to THIS file
| FPATH     - The full server path without file
| ROOT      - The root path of your server
| BASE      - The full server path to the "obullo" folder
| APP       - The full server path to the "application" folder
| MODULES   - The full server path to the "modules" folder
|
*/
define('EXT',  '.php'); 
define('FCPATH', __FILE__);
define('FPATH', dirname(__FILE__));  
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

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
if(defined('CMD'))
{
    // Obullo Command Line Bootstrap file.
    //--------------------------------------------------------------- 
    require(APP  .'core'. DS .'Cli_Bootstrap'. EXT); 
} 
else 
{
    // Obullo Standart Bootstrap file.
    //--------------------------------------------------------------- 
    require(APP  .'core'. DS .'Bootstrap'. EXT); 
}

require(BASE .'core'. DS .'Bootstrap'. EXT);
  

ob_include_files();
ob_set_headers();

ob_system_run();
ob_system_close();