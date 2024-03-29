<?php

/**
|--------------------------------------------------------------------------
| APPLICATION ENVIRONMENT
|--------------------------------------------------------------------------
|
| You can load different configurations depending on your
| current environment. Setting the environment also influences
| things like logging and error reporting.
|
| This can be set to anything, but default usage is:
|
|     o DEV   - Development ( Show Obullo Friendly Errors )
|     o DEBUG - Debug Mode  ( Show Hidden Php Native Errors )
|     o TEST  - Testing     ( Test mode, behaviours like DEV )
|     o LIVE  - Production  ( Close all errors )
|
| NOTE: If you change these, also change the error_reporting() code below
|
*/
define('ENV', 'DEBUG');

/**
|--------------------------------------------------------------------------
| Native PHP Error Handler (Default Off) 
|--------------------------------------------------------------------------
| For security reasons its default off.
| But default `Obullo Error Handler` is active if you don't want to use Obullo
| development error handler you can *turn off it easily from 
| "application/config.php" file.
|
*/              
if (defined('ENV'))
{
    switch(ENV)
    {
        case 'DEV':
            error_reporting(E_ALL | E_STRICT);
            ini_set('display_errors', '1');
            error_reporting(0); // Show errors using Obullo Error Handler
            break;
        
        case 'TEST':
            error_reporting(E_ALL | E_STRICT);
            error_reporting(0);
            break;
        
        case 'DEBUG':
            error_reporting(E_ALL | E_STRICT);
            ini_set('display_errors', '1');
            break;
        
        case 'LIVE':
            error_reporting(0);
            break;
        
        default:
        exit('The application environment is not set correctly.');
    }   
}

/**
|--------------------------------------------------------------------------
| DIRECTORY SEPERATOR
|--------------------------------------------------------------------------
| Friendly Directory Seperator
|
*/
define('DS',   DIRECTORY_SEPARATOR);

/**
|--------------------------------------------------------------------------
| Set Default Time Zone Identifer.
|--------------------------------------------------------------------------
|                                                                 
| Set the default timezone identifier for date function ( Server Time )
| @see  http://www.php.net/manual/en/timezones.php
| 
*/
date_default_timezone_set('America/Chicago');

/**
|---------------------------------------------------------------
| FOLDER CONSTANTS AND SUBMODULES
|---------------------------------------------------------------
|
| If you want MANAGE MULTIPLE APPLICATIONS in one setup you
| need to use "sub.modules", you can create your sub.modules using
| "sub." prefix in modules/ folder. We did an example submodule
| to you that called "sub.backend".
|
*/
define('ROOT',  realpath(dirname(__FILE__)) . DS);
define('BASE', ROOT .'obullo'. DS);
define('APP',  ROOT .'application'. DS);
define('MODULES',  ROOT . 'modules' . DS);
define('SUB_MODULES', 'modules'. DS);

/**
|---------------------------------------------------------------
| UNDERSTANDING CONSTANTS
|---------------------------------------------------------------
| DS          - The DIRECTORY SEPERATOR
| EXT         - The file extension.  Typically ".php"
| SELF        - The name of THIS file (typically "index.php")
| FCPATH      - The full server path to THIS file
| PHP_PATH    - The php path of your server
| FPATH       - The full server path without file
| ROOT        - The root path of your server
| BASE        - The full server path to the "obullo" folder
| APP         - The full server path to the "application" folder
| MODULES     - The full server path to the "modules" folder
| SUB_MODULES - The sub module "modules" folder path
| TASK_FILE   - Set your task (CLI) file name that we use it in task helper.
*/
define('EXT',  '.php');
define('FCPATH', __FILE__);
define('PHP_PATH', '/usr/bin/php'); 
define('FPATH', dirname(__FILE__));  
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('TASK_FILE', 'task.php');

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