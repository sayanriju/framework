<?php
  
/**
* A task_run function call this task
* file which is located in /e_notifier/helpers/my_error.php
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
        // Please don't remove "restore handler" functions !!
        //-----------------------------------------------------------
        
        restore_error_handler();        // Reset exception handlers
        restore_exception_handler();
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
        loader::config('../e_notifier/config');  // Load module extension file.
        
        $cfg = lib('ob/Config');
        
        if($cfg->item('send_email'))
        {
            if($cfg->item('smtp_user') == '' OR $cfg->item('smtp_pass') == '')
            {
                log_me('debug', '[ e_notifier ]: Please set a smtp account for e_notifier extension.');
                
                return FALSE;
            }
            
            //------------------------------------------------------------
            
            $email = lib('ob/Email');
            $email->clear();

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
            
            $email->init($config);
            $email->from($cfg->item('from_email'), $cfg->item('from_name'));
            $email->to($cfg->item('recipients'));
            
            $sub_module = extension('path', 'e_notifier');
   
            if($sub_module != '')
            {
                $sub_module = '/'.substr($sub_module, 4); // substract sub.
            }
            
            $index_page = ($cfg->item('index_page') == '') ? '' : '/'. $cfg->item('index_page');
            $error_url  = trim($cfg->item('domain_root'), '/').$index_page.$sub_module.'/e_notifier/display/ticket/'. $uniqid;
            
            $message = 'An Error Was Encountered, follow this link ---> ';
            $message.= '<a href="'.$error_url.'" target="_blank">'.$error_url.'</a>';
            
            $email->subject($cfg->item('subject'));
            $email->message($message);
               
            //------------------------------------------------------------
            
            if($email->send())
            {
                log_me('debug', '[ e_notifier ]: Ticket# '. $uniqid . ' sent succesfully.');
                
                return TRUE;
            } 
            else    // Look at e_notifier/core/logs.
            {
                log_me('error', '[ e_notifier ]: Ticket# '. $uniqid . ' could not send. Check your smtp settings.');
                log_me('error', '[ e_notifier ]: Details of #'.$uniqid.': ' .$email->print_debugger());
            }          
      
            return FALSE;
        }
      
    }

}

// END send_mail.php File

/* End of file send_mail.php
/* Location: ./modules/e_notifier/tasks/send_mail.php */