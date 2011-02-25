<?php
defined('CMD') or exit('Access Denied!');

Class Hello extends Controller {
    
    function __construct()
    {   
        parent::__construct();
    }         
    
    public function index()
    {     
        loader::helper('test');
        
        // test();
        
        echo 'Hello Cmd'."\n";
        
        // loader::base_helper('request');
    
        // $request = request('get', 'welcome/test/arg1/arg2');
        // echo $request->exec()->response();
        
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/tasks/welcome.php */