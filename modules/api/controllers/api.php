<?php

require_once(DIR .'api'. DS .'libraries'. DS .'php5'. DS .'MY_Model'. EXT);

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
        loader::model('../db_common/common_user');
        
        // $this>common_user->save();
        
        print_r(i_server('REQUEST_METHOD'));        
    }
    
    function model_test()
    {
        echo '<br /><br /><br /><B>MODEL TEST IS OK !!!!!!!!</B>';
    }
    
}