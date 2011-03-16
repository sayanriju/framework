<?php
  
Class Send_Mail extends Controller 
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
    }
    
    /**
    * Send error mails in background
    * via task_run(); function.
    * 
    * @return void
    */
    function send()
    {
        $config = core_register('Config');
        
        if($config->item('capture_errors'))
        {
            $smtp = lib('Email');
            $smtp->clear();

            $config['protocol']  = $config->item('protocol');
            $config['charset']   = 'utf-8';
            $config['crlf']      = "\r\n";
            $config['newline']   = "\r\n";
            $config['wordwrap']  = FALSE;
            $config['mailtype']  = 'html';

            $config['smtp_host'] = $config->item('smtp_host');
            $config['smtp_user'] = $config->item('smtp_user');
            $config['smtp_pass'] = $config->item('smtp_pass');
            $config['smtp_port'] = $config->item('smtp_port');
            $config['smtp_timeout'] = $config->item('smtp_timeout');

            $smtp->init($config);
            $smtp->from($config->item('from_email'), $config->item('from_name'));
            $smtp->to($config->item('recipients'));

            // $smtp->cc('another@another-example.com');
            // $smtp->bcc('xturknet@hotmail.com');

            $message = 'An Error Was Encountered, follow this link ---> ';
            $err_uri = trim(base_url(), '/') .'/error_mail/display/show/'.$uniqid;
            $message.= '<a href="'.$err_uri.'">'.$err_uri.'</a>';
            
            $smtp->subject($config->item('subject'));
            $smtp->message($message);

            // $email->attach('rest.txt');

            $sent = $smtp->send();
            
            if($sent)
            {
                log_me('debug', 'Ticket# '. $uniqid . ' error mail sent succesfully.');
            } 
            else
            {
                log_me('debug', '!! WARNING Ticket# '. $uniqid . ' error mail could not send. Check your smtp 
                settings.');
            }          
      
            return;
      
        }
      
    }

}

// END send_mail.php File

/* End of file Bootstrap.php
/* Location: ./modules/error_mail/tasks/send_mail.php */