<?php

Class Welcome extends Global_controller {
    
    function __construct()
    {   
        parent::__construct();
    }           
    
    public function index()
    {                
        view_var('title', 'Welcome to Obullo Framework !');
        
        $data['var'] = 'This page generated by ';
        
        view_var('body', view('view_welcome', $data));
        view_temp('layout_base'); 
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/controllers/welcome.php */