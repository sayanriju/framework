<?php
  
/**
* A task_run function call this task file using
* which is located in /e_notifier/helpers/my_error.php
* 
* Command Line Send Mail CLass
*/
Class Send_Mail extends Controller 
{
    function __construct()
    {
        parent::__construct();
        
        // WARNING !!!!
        //-----------------------------------------------------------
        // We need to reset error handlers, otherwise if we have a
        // bug in this class server will go to unlimited loop while 
        // consume all the server memory.
        // 
        // Please don't remove exception handler functions !!
        //-----------------------------------------------------------
        
        restore_error_handler();        // Reset exception handlers
        restore_exception_handler();
        
        //-----------------------------------------------------------

        loader::config('../e_notifier/settings');
        
    }
    
    //------------------------------------------------------------
    
    /**
    * Send mail in background
    * via task_run(); function and notify user.
    * 
    * @return void
    */
    function send($uniqid)
    {
        $cfg = core_class('Config');
        
        if($cfg->item('send_errors'))
        {
            $smtp = lib('Email');
            $smtp->clear();

            $config['protocol']  = $cfg->item('protocol');
            $config['charset']   = 'utf-8';
            $config['crlf']      = "\r\n";
            $config['newline']   = "\r\n";
            $config['wordwrap']  = FALSE;
            $config['mailtype']  = 'html';

            $config['smtp_host'] = $cfg->item('smtp_host');
            $config['smtp_user'] = $cfg->item('smtp_user');
            $config['smtp_pass'] = $cfg->item('smtp_pass');
            $config['smtp_port'] = $cfg->item('smtp_port');
            $config['smtp_timeout'] = $cfg->item('smtp_timeout');

            $smtp->init($config);
            $smtp->from($cfg->item('from_email'), $cfg->item('from_name'));
            $smtp->to($cfg->item('recipients'));

            // $smtp->cc('another@another-example.com');
            // $smtp->bcc('xturknet@hotmail.com');

            loader::helper('ob/url');
            
            $message = 'An Error Was Encountered, follow this link ---> ';
            $err_uri = trim($cfg->item('domain_root'), '/').'/e_notifier/display/ticket/'.$uniqid;
            $message.= '<a href="'.$err_uri.'" target="_blank">'.$err_uri.'</a>';
            
            $smtp->subject($cfg->item('subject'));
            $smtp->message($message);

            // $email->attach('rest.txt');

            $sent = $smtp->send();
            
            if($sent)
            {
                log_me('debug', 'Ticket# '. $uniqid . ' error mail sent succesfully.');
                
                return TRUE;
            } 
            else
            {
                log_me('debug', '!! WARNING Ticket# '. $uniqid . ' error mail could not send. Check your smtp 
                settings.');
            }          
      
            return FALSE;
        }
      
    }

}

// END send_mail.php File

/* End of file Bootstrap.php
/* Location: ./modules/e_notifier/tasks/send_mail.php */