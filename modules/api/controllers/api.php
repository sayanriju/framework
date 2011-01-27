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
        loader::model('doly', null, null, true);
        
        $this->doly->test();
    
        print_r(i_server('REQUEST_METHOD'));        
    }
    
    function model_test()
    {
        echo '<br /><br /><br /><B>MODEL TEST IS OK !!!!!!!!</B>';
    }
    
}