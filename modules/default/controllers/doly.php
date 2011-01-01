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
        view_var('title', '');

        view_var('body', view(''));
        view_temp('layout_');
    }
    
}

/* End of file doly.php */
/* Location: .modules/default/controllers/doly.php */
