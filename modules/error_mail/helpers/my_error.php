<?php
defined('BASE') or exit('Access Denied!');

/**
 * Obullo Framework (c) 2009.
 *
 * PHP5 MVC Based Minimalist Software.
 * 
 * @package         obullo    
 * @author          obullo.com
 * @copyright       Ersin Guvenc (c) 2009.
 * @since           Version 1.0
 * @filesource
 * @license
 */
 
/**
* We Override to Obullo Exception Handler Function
* 
* @param  object $e
* @return void
*/
function Obullo_Exception_Handler($e, $type = '')
{   
    $shutdown_errors = array(
    'ERROR'            => 'ERROR',            // E_ERROR 
    'PARSE ERROR'      => 'PARSE ERROR',      // E_PARSE
    'COMPILE ERROR'    => 'COMPILE ERROR',    // E_COMPILE_ERROR   
    'USER FATAL ERROR' => 'USER FATAL ERROR', // E_USER_ERROR
    );
    
    if(isset($shutdown_errors[$type]))  // We couldn't use any object for shutdown errors.
    {
        $type  = ucwords(strtolower($type));
        $code  = $e->getCode();
        $level = config_item('error_reporting');
        
        // CAPTURE ERRORS
        //---------------------------------------------------------------------------------
    
        write_errors_and_send_email($e, $type, $sql = array());
    
        //---------------------------------------------------------------------------------
        // CAPTURE ERRORS END
        
        if(defined('CMD'))  // If Command Line Request.
        {
            echo $type .': '. $e->getMessage(). ' File: ' .$e->getFile(). ' Line: '. $e->getLine(). "\n";
            
            $cmd_type = (defined('TASK')) ? 'Task' : 'Cmd';
            
            log_me('error', 'Php Error Type ('.$cmd_type.'): '.$type.'  --> '.$e->getMessage(). ' '.$e->getFile().' '.$e->getLine(), TRUE);
            return;
        }

        if($level > 0 OR is_string($level))  // If user want to display all errors
        {
            $sql    = array();
            $errors = error_get_defined_errors();
            $error  = (isset($errors[$code])) ? $errors[$code] : '';
            
            if(is_numeric($level)) 
            {
                switch ($level) 
                {              
                   case  0: return; break; 
                   case  1: include(APP .'core'. DS .'errors'. DS .'ob_exception'. EXT); return;
                   break;
                }   
            }       
                             
            $rules = error_parse_regex($level); 
            
            if($rules == FALSE) 
            {
                return;
            }
            
            $allowed_errors = error_get_allowed_errors($rules);  // Check displaying error enabled for current error.
        
            if(isset($allowed_errors[$code]))
            {
                include(APP .'core'. DS .'errors'. DS .'ob_exception'. EXT);
            }
        }
        else
        {
            include(APP .'core'. DS .'errors'. DS .'ob_disabled_error'. EXT);
        }
        
        log_me('error', 'Php Error Type: '.$type.'  --> '.$e->getMessage(). ' '.$e->getFile().' '.$e->getLine(), TRUE); 
         
    } 
    else  // Is It Exception ?
    {   
        $exception = load_class('Exception');
        
        if(is_object($exception)) 
        {           
            $exception->write($e, $type);
        }
    }
    
    return;
}     

//---------------------------------------------------------------------------------

/**
* Write errors into static html files we just
* send html links via email.
* 
* @param mixed $e
* @param mixed $type
* @param mixed $sql
* @param mixed $uniqid
*/
function write_errors_and_send_email($e, $type = '', $sql = array())
{   
    if( ! defined('DEV_EMAIL'))
    define('DEV_EMAIL', 'eguvenc@gmail.com');
    
    if(DEV_EMAIL == 'eguvenc@gmail.com')
    {
        loader::config('../error_mail/settings_ersin');
    }
    else
    {
        loader::config('../error_mail/settings');
    }
    
    if(core_class('Config')->item('capture_errors') == FALSE)   // Capture switch.
    {
        return;
    }

    $uniqid = md5($e->getFile() . $e->getLine() . $e->getMessage());
    
    $file   = MODULES .'error_mail'. DS .'views'. DS .'html_errors'. DS .$uniqid. '.html';
    
    if( file_exists($file) )  // If we already have same file, we don't need capture this
    {                          // error foreach users !!   
        return;
    }
    
    $data['e']    =  $e;
    $data['type'] =  $type;
    $data['sql']  =  $sql;
    $data['uniqid'] = $uniqid;
    
    loader::helper('ob/view');
    
    $message   = "<"."?php defined('BASE') or exit('Access Denied!'); ?".">\n\n";
    $message  .= view('../error_mail/error_template', $data);
    $file_path = MODULES .'error_mail'. DS .'views'. DS .'html_errors'. DS .$uniqid. '.html';
    
    if ( ! $fp = @fopen($file_path, FOPEN_WRITE_CREATE))
    {
        return FALSE;
    }

    flock($fp, LOCK_EX);    
    fwrite($fp, $message);
    flock($fp, LOCK_UN);
    fclose($fp);

    @chmod($file_path, FILE_WRITE_MODE);
    
    // Write All errors to html files and Send them via smtp in background..
    //---------------------------------------------------------------------
    // Run SHELL COMMAND and Send Emails in Background.
    //----------------------------------------------------------
    
    loader::helper('ob/task');
    
    task_run('error_mail send_mail/send/'.$uniqid);
    
    //----------------------------------------------------------    

}