<?php

Class Hello extends Controller {
    
    function __construct()
    {   
        parent::__construct(); 
    }         
    
    public function index($a = '')
    {   
        view_var('title', 'Welcome to Obullo Backend Submodule !');
        
        $data['var'] = 'and generated by ';
        
        view_var('body', view('view_hello', $data));
        view_layout('layout_hello'); 
    }
    
    function test($arg1 = '', $arg2 = '', $arg3 = '')
    {
        echo '<pre>Backend Sub Module Response: '.$arg1 .' - '.$arg2. ' - '.$arg3.'</pre>';
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/controllers/welcome.php */