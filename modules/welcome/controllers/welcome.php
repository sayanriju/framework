<?php

Class Welcome extends Welcome_Controller {
    
    function __construct()
    {   
        parent::__construct();
    }         
    
    public function index()
    {
        view_var('title', 'Welcome to Obullo Framework !');
        
        // USING HMVC
        
        loader::helper('ob/request');
        $request = request('get', 'welcome/test/1/2/3');
        $data['response'] = $request->exec()->response();
                
        // USING HMVC
        
        $data['var'] = 'and generated by ';
       
        view_var('body', view('welcome', $data));
        view_layout('welcome'); 
    }
    
    function test($arg1 = '', $arg2 = '', $arg3 = '')
    {
        echo '<b>Hmvc test:</b> '.$arg1 .' - '.$arg2. ' - '.$arg3;
    }
    
    // Using tasks .. 
    function task()
    {
        loader::helper('ob/task');
        
        task_run('welcome/test', true);
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/controllers/welcome.php */