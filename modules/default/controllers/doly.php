<?php

/**
* Your copy paste Controller.
*/
Class Doly extends Controller {
    
    function __construct()
    {   
        parent::__construct();
    }                               

    public function index()
    {
        echo 'MODULENAME: Default and doly controller works !!';
       
        echo br(2);
        
        echo anchor('default/subdir', 'Try Subfolder !');
    }
}

/* End of file doly.php */
/* Location: .modules/default/controllers/doly.php */
