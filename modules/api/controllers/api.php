<?php

Class Api extends Controller {
    
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }
    
    function v3()
    {
        print_r(i_server('REQUEST_METHOD'));
        
        print_r($this->uri->segments);
                
    }
    
    function model_test()
    {
        echo '<br /><br /><br /><B>MODEL TEST IS OK !!!!!!!!</B>';
    }
    
}