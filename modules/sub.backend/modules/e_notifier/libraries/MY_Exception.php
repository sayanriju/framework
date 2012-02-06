<?php

/**
* Custom Exception Class for e_notifier
* extension, capture all Exceptions and 
* send them via email.
*
* @author Obullo Team.
*/

Class MY_Exception extends OB_Exception
{
    function __construct()
    {
        parent::__construct();
        
        log_me('debug', 'MY_Exception Class Initialized');
    }
    
    /**
    * Write Exceptions.
    * 
    * @param mixed $e
    * @param mixed $type
    * @return string
    */
    public function write($e, $type = '')
    {   
        $type = ($type != '') ? ucwords(strtolower($type)) : 'Exception Error';
        $sql  = array();

        if(substr($e->getMessage(),0,3) == 'SQL')
        {
            $ob   = this();
            $type = 'Database';

            foreach(profiler_get('databases') as $db_name => $db_var)
            {
                if(is_object($ob->$db_var))
                {
                    $last_query = $ob->{$db_var}->last_query($ob->{$db_var}->prepare);
                    
                    if( ! empty($last_query))
                    {
                        $sql[$db_name] = $last_query;
                    }
                }
            }
        }
        
        // CAPTURE ERRORS
        //--------------------------------------------------------------------------------

        write_errors_and_send_email($e, $type, $sql);
        
        
        // Command Line Errors
        //-----------------------------------------------------------------------
        if(defined('CMD'))  // If Command Line Request. 
        {
            echo $type .': '. $e->getMessage(). ' File: ' .error_secure_path($e->getFile()). ' Line: '. $e->getLine(). "\n";
            
            $cmd_type = (defined('TASK')) ? 'Task' : 'Cmd';
            
            if(lib('ob/Config')->item('write_log'))
            {
                log_me('error', 'Php Error ('.$cmd_type.'): '.$type.'  --> '.$e->getMessage(). ' '.error_secure_path($e->getFile()).' '.$e->getLine(), true);
                log_me('error', '[ e_notifier ]: Php Error ('.$cmd_type.'): '.$type.'  --> '.$e->getMessage(). ' '.error_secure_path($e->getFile()).' '.$e->getLine(), true);
            }
            
            return;
        }

        loader::helper('ob/view');

        $data['e']    = $e;
        $data['sql']  = $sql;
        $data['type'] = $type;

        // Log Writing
        //-----------------------------------------------------------------------
        
        if(lib('ob/Config')->item('write_log'))
        {
            log_me('error', 'Php Error: '.$type.'  --> '.$e->getMessage(). ' '.error_secure_path($e->getFile()).' '.$e->getLine(), true);
            log_me('error', '[ e_notifier ]: Php Error: '.$type.'  --> '.$e->getMessage(). ' '.error_secure_path($e->getFile()).' '.$e->getLine(), true);
        }

        // Displaying Errors
        //-----------------------------------------------------------------------
        
        if(lib('ob/Config')->item('error_reporting') > 0)
        {
            ob_start();
            echo lib('ob/View')->load_view(APP .'core'. DS .'errors'. DS, 'ob_exception', $data, true);
            $buffer = ob_get_contents();
            ob_get_clean();  // don't close output buffering just clean it.

            echo $buffer;
        }

    }
    
}

// END MY_Exception.php File

/* End of file MY_Exception.php
/* Location: ./modules/e_notifier/libraries/MY_Exception.php */