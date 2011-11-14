<?php

Class Start extends Controller {    
                                      
    function __construct()
    {   
        parent::__construct();
    }         
    
    public function index()
    {
        view_var('title', 'Welcome to Obullo Validation Model !');
                        
        $data = array();
        
        view_var('body', view('view_vm', $data));
        view_layout('layout_vm'); 
    }
    
    function ajax_example()
    {
        view_var('title', 'Welcome to Obullo Validation Model !');
                        
        $data = array();
        
        view_var('body', view('view_vm_ajax', $data));
        view_layout('layout_vm'); 
    }
    
    function do_post()
    {
        loader::model('user', false);  // Include user model
        
        $user = new User();
        $user->usr_username = i_get_post('usr_username');
        $user->usr_password = i_get_post('usr_password');
        $user->usr_email    = i_get_post('usr_email');
        
        $data['user'] = $user;
        
        if($user->save())
        {
            if($this->uri->extension() == 'json')  // Ajax support
            {
                echo form_json_success('Data Saved Successfully !');
                return;
            }

            $data['msg'] = 'Data Saved Successfully !';
        } 
        else
        {
            if($this->uri->extension() == 'json') // Ajax support
            {
                echo form_json_error($user);
                return;
            }
            
            if($user->validation())  // If validation ok but we have a system error ?
            {
                $data['msg'] = form_error($user);
            }
        }
        
        view_var('body', view('view_vm', $data));
        view_layout('layout_vm'); 
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/controllers/welcome.php */
