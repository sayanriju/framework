<?php
  
Class Start extends Controller {
    
    function __construct()
    {
        parent::__construct(); 
    }
    
    public function _remap($method)
    {
        if ($method == 'index')
        {
            $this->k();
        }
        else
        {
            $this->default_method();
        }
    }
    
    
}
