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
        
        echo $djhdf;
        
        echo current_url();
        
        // print_r($_SERVER);
        
        // print_r($this->uri->segments);
                
    }
    
    function model_test()
    {
        echo '<br /><br /><br /><B>MODEL TEST IS OK !!!!!!!!</B>';
    }
    
}