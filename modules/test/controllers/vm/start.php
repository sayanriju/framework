<?php

Class Start extends Controller {    
                                      
    function __construct()
    {   
        parent::__construct();
    }         

    public function index()
    {
        view_var('title', 'Welcome to Obullo Validation Model !');
                        
        $data['user'] = array();
        
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
        } 
        else
        {
            if($this->uri->extension() == 'json') // Ajax support
            {
                echo form_json_error($user);
                return;
            }   
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
