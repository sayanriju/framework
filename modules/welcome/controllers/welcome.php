<?php

Class Welcome extends Welcome_Controller {
    
    function __construct()
    {   
        parent::__construct();
        // $this->output->profiler();
        
        // add database default
        // $database['default'] = 'db';
        loader::base_helper('hmvc');
        // loader::helper('test');
    }           
    
    public function index()
    {     
        // print nl2br(ob_get_contents()); exit;
        view_var('title', 'Welcome to Obullo Framework !');
        $data['var'] = 'and generated by ';
        
        // $hmvc = hmvc_request('GET', 'api/v3?query=%22SELECT+%2A+FROM+common.user+LIMIT+1%22', array('last' => 'me'));
        // $hmvc->exec()->response();

        // view_var('body', view_render(array('layouts/view_header', 'view_left',   
        // 'view_welcome', 'view_right', 'layouts/view_footer'), $data));
        
        view_var('body', view('view_welcome', $data));
        view_layout('layout_welcome'); 
    }
    
    
    function _test()
    {
        view_var('title', 'sssssssss');
        print_r(i_get('query'));
        echo 'test function works fine !';
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/controllers/welcome.php */