<?php

/**
* Custom Exception Class
* Capture all errors and sen them via email
*
* Ersin Guvenc
*/
Class MY_Exception extends OB_Exception
{
    function __construct()
    {
        parent::__construct();
        
        define('DEV_EMAIL', 'eguvenc@gmail.com');
      
        if(DEV_EMAIL == 'eguvenc@gmail.com')
        {
            loader::config('../error_mail/settings_ersin');
        }
        else
        {
            loader::config('../error_mail/settings');
        }

        log_me('debug', 'MY_Exception class initialized !');
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
        
        // Write All errors to html files and Send them view mail ..
        //----------------------------------------------------------
        
        write_errors_to_file($e, $type, $sql = array(), $uniqid = uniqid());
        
        //----------------------------------------------------------

        // Command Line Errors
        //-----------------------------------------------------------------------
        if(defined('CMD'))  // If Command Line Request. 
        {
            echo $type .': '. $e->getMessage(). ' File: ' .$e->getFile(). ' Line: '. $e->getLine(). "\n";
            
            $cmd_type = (defined('TASK')) ? 'Task' : 'Cmd';
            
            if(core_register('Config')->item('write_log'))
            {
                log_me('error', 'Php Error Type ('.$cmd_type.'): '.$type.'  --> '.$e->getMessage(). ' '.$e->getFile().' '.$e->getLine(), TRUE);
            }
            
            return;
        }

        loader::base_helper('view');

        $data['e']    = $e;
        $data['sql']  = $sql;
        $data['type'] = $type;

        if(core_register('Config')->item('write_log'))
        {
            log_me('error', 'Php Error Type: '.$type.'  --> '.$e->getMessage(). ' '.$e->getFile().' '.$e->getLine(), TRUE);
        }

        if(config_item('error_reporting') > 0)
        {
            ob_start();
            echo load_view(APP .'core'. DS .'errors'. DS, 'ob_exception', $data, true);
            $buffer = ob_get_contents();
            ob_get_clean();  // don't close output buffering just clean it.

            echo $buffer;
        }

    }
    
}