<?php
defined('CMD') or exit('Access Denied!');

Class Hello extends Controller {
    
    function __construct()
    {   
        parent::__construct();
    }         
    
    public function index()
    {     
        echo 'Hello Cmd'."\n";
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/tasks/welcome.php */