<?php
defined('BASE') or exit('Access Denied!');

/**
 * Obullo Framework (c) 2009 - 2012.
 *
 * PHP5 HMVC Based Scalable Software.
 * 
 * @package         obullo    
 * @author          obullo.com
 * @copyright       Obullo Team.
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
        
        if(defined('CMD'))  // If Command Line Request.
        {
            echo $type .': '. $e->getMessage(). ' File: ' .error_secure_path($e->getFile()). ' Line: '. $e->getLine(). "\n";
            
            $cmd_type = (defined('TASK')) ? 'Task' : 'Cmd';
            
            log_me('error', 'Php Error ('.$cmd_type.'): '.$type.'  --> '.$e->getMessage(). ' '.error_secure_path($e->getFile()).' '.$e->getLine(), true);
            
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
        
        log_me('error', 'Php Error: '.$type.'  --> '.$e->getMessage(). ' '.error_secure_path($e->getFile()).' '.$e->getLine(), true); 
         
    } 
    else  // Is It Exception ?
    {   
        $exception = lib('ob/Exception');
        
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
    //---------------------------------------------------------------------
    // Load extension config file from e_notifier/config folder.
    //----------------------------------------------------------
    
    ############
    
    $root = extension('root', 'e_notifier');
    
    ############
    
    loader::config('../e_notifier/config');  
    
    ############

    $config = lib('ob/Config');
    
    if($config->item('send_email') == FALSE)   // Email switch.
    {
        return;
    }
    
    $uniqid  = md5(error_secure_path($e->getFile()) . $e->getLine() . $e->getMessage());  // unique error ID
    $file_id = $root .'e_notifier'. DS .'views'. DS .'html_errors'. DS .$uniqid. EXT;
    
    if( file_exists($file_id) )  // If we have already same error file, we don't need to send it again.
    {   
        log_me('debug', '[ e_notifier ]: Email not send. The error file '.$uniqid.'.php already exist in /views/html_errors/ folder.');
      
        return;
    }
    
    $data['e']      =  $e;
    $data['type']   =  $type;
    $data['sql']    =  $sql;
    $data['uniqid'] =  $uniqid;
    
    loader::helper('ob/view');
    loader::helper('ob/url');
    loader::helper('ob/form');
    
    $message   = "<"."?php defined('BASE') or exit('Access Denied!'); ?".">\n\n";
    $message  .= view('../e_notifier/error_template', $data);
    
    $file_path = $root .'e_notifier'. DS .'views'. DS .'html_errors'. DS .$uniqid. EXT;
    
    if( ! is_really_writable($root .'e_notifier'. DS .'views'. DS .'html_errors'))
    {
        log_me('error', '[ e_notifier ]: Have not got write access to /views/html_errors/ path check your chmod settings.');
               
        return;
    }

    if ( ! $fp = @fopen($file_path, FOPEN_WRITE_CREATE))
    {
        return FALSE;
    }
    
    flock($fp, LOCK_EX);    
    fwrite($fp, $message);
    flock($fp, LOCK_UN);
    fclose($fp);
    
    @chmod($file_path, FILE_WRITE_MODE);
    
    // Write all errors as html files and Send them via smtp in background..
    //---------------------------------------------------------------------
    // Run SHELL COMMAND and Send Emails in Background.
    //----------------------------------------------------------

    loader::helper('ob/task');

    $sub_module = extension('path', 'e_notifier');
    
    if($sub_module != '')
    {
        $sub_module = substr($sub_module, 4); // substract sub.
    }
    
    #############

    task_run($sub_module.' e_notifier send_mail/send/'.$uniqid);

    #############
    
    log_me('debug', '[ e_notifier ]: Error notify process completed.');
    
}

// END my_error.php File

/* End of file my_error.php
/* Location: ./modules/e_notifier/helpers/my_error.php */