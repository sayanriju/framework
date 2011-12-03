<?php

Class Start extends Controller {    
                                      
    function __construct()
    {   
        parent::__construct();
        
        loader::helper('ob/request');
        loader::helper('setup');
        
        check_setup();
    }         

    public function index()
    {
        view_var('title', 'Welcome to Obullo Validation Model !');
                        
        $data['user'] = array();
        
        //------ HMVC CALL -----//
        
        $response = request('/captcha/create')->exec();
        $data['cap'] = unserialize($response);
                
        //------ HMVC CALL -----//
        
        view_var('body', view('view_vm', $data));
        view_layout('layout_vm'); 
    }
    
    function ajax_example()
    {
        view_var('title', 'Welcome to Obullo Validation Model (AJAX) !');
        
        //------ HMVC CALL -----//
          
        $response = request('/captcha/create')->exec();
        $data['cap'] = unserialize($response);
                
        //------ HMVC CALL -----//
        
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
        
        $data['user'] = $user;  // User object for none ajax request
  
        if($user->save())
        {
            if(i_ajax())  // Ajax support
            {
                echo form_send_success('Data Saved Successfully !');
                return;
            }
        } 
        else
        {
            if(i_ajax()) // Ajax support 
            {
                echo form_send_error($user);
                return;
            }
            
            //------ Hmvc call for none ajax requests -----//
        
            $response = request('/captcha/create')->exec();
            $data['cap'] = unserialize($response);
        }
        
        view_var('body', view('view_vm', $data));
        view_layout('layout_vm'); 
    }
    
    
    public function delete()
    {
        loader::model('user', false);  // Include user model
        
        $user = new User();
        
        if($user->delete('usr_id', 5))
        {
            echo 'User Deleted Successfuly !';
        }
        
        print_r($user->errors());
        
        echo $user->last_query();
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/controllers/welcome.php */