<?php

Class Start extends VM_Controller {   // VM_Controller is your VM module custom controller 
                                      // and its located in /modules/vm/parents folder.
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
        $user->username = i_get_post('username');
        $user->email    = i_get_post('email');

        if($user->save())
        {
            if($this->uri->extension() == 'json')  // Ajax support
            {
                echo form_json_success('Success !');
                return;
            }
            
            sess_set_flash('msg', 'Data Saved !');
            redirect('/test/vm/start/index');
        } 
        else
        {
            if($this->uri->extension() == 'json') // Ajax support
            {
                echo form_json_error($user);
                return;
            }
           
            $data['user'] = $user;
            
            view_var('body', view('view_vm', $data));
            view_layout('layout_vm'); 
        }
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/controllers/welcome.php */
