<?php

Class Api extends Controller {
    
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }
    
    function v3($a = '')
    {
        // echo sess_get('session_id').'<br />';
        
        echo '<br />'.$GLOBALS['d'].'<br /><br />';
        // echo current_url().'<br />';
        
        // loader::model('');
        echo '<br />';
        
        print_r($_SERVER);
        //print_r($this->uri->segments);
                
    }
    
    function v4()
    {
        echo 'works';
    }
    
    function model_test()
    {
        echo '<br /><br /><br /><B>MODEL TEST IS OK !!!!!!!!</B>';
    }
    
}
