<?php
  
/**
* A task_run function call this task file
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
        // bug in this class server will go unlimited loop while 
        // consume all the server memory.
        // 
        // Please don't remove exception handler functions !!
        //-----------------------------------------------------------
        
        restore_error_handler();        // Reset exception handlers
        restore_exception_handler();
        
        loader::config('../e_notifier/config');  // Load module config file.
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
        
        if($cfg->item('send_email'))
        {
            $smtp = lib('ob/email');
            $smtp->clear();

            $config['protocol']  = 'smtp';
            $config['charset']   = 'utf-8';
            $config['crlf']      = "\r\n";
            $config['newline']   = "\r\n";
            $config['wordwrap']  = FALSE;
            $config['mailtype']  = 'html';

            $config['smtp_host']    = $cfg->item('smtp_host');
            $config['smtp_user']    = $cfg->item('smtp_user');
            $config['smtp_pass']    = $cfg->item('smtp_pass');
            $config['smtp_port']    = $cfg->item('smtp_port');
            $config['smtp_timeout'] = $cfg->item('smtp_timeout');

            $smtp->init($config);
            $smtp->from($cfg->item('from_email'), $cfg->item('from_name'));
            $smtp->to($cfg->item('recipients'));

            // $smtp->cc('another@another-example.com');
            // $smtp->bcc('example@example.com');

            loader::helper('ob/url');
            
            $error_url = trim($cfg->item('domain_root'), '/') .'/e_notifier/display/ticket/'. $uniqid;
            
            $message = 'An Error Was Encountered, follow this link ---> ';
            $message.= '<a href="'.$error_url.'" target="_blank">'.$error_url.'</a>';
            
            $smtp->subject($cfg->item('subject'));
            $smtp->message($message);

            // $smtp->attach('test.txt');

            $sent = $smtp->send();
            
            if($sent)
            {
                log_me('debug', 'Ticket# '. $uniqid . ' error notification sent succesfully.');
                
                return TRUE;
            } 
            else
            {
                log_me('debug', '!! WARNING Ticket# '. $uniqid . ' error notification could not send. Check your smtp 
                settings.');
            }          
      
            return FALSE;
        }
      
    }

}

// END send_mail.php File

/* End of file send_mail.php
/* Location: ./modules/e_notifier/tasks/send_mail.php */