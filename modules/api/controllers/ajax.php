<?php

Class Ajax extends Api_controller {
    
    function __construct()
    {
        parent::__construct();   
    }
    
    
    function index()
    {
        // ob_start();
        echo 'ajax - index';
        print_r($this->uri->rsegments);
        
        // $this->output->append_output(ob_get_clean());
    }
    
    function table($arg = '')
    {
        echo $arg;
        
        echo 'ERSIN  ajax/api/table function works !';
    }
    
}