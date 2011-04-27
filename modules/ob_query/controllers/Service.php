<?php
  
Class Service extends Controller {
    
    function __construct()
    {
        parent::__construct(); 
    }
    
    public function start()
    {
        $this->rest = lib('Query_rest');
    }
        
}