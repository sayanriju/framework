<?php
defined('BASE') or exit('Access Denied!');


Class Welcome_Controller extends Controller
{                                     
    public function __construct()
    {
        parent::__construct();
        
        loader::helper('ob/html');
        loader::helper('ob/url');
    }
      
}

/* End of file Global Welcome_controller.php */
/* Location: ./modules/welcome/parents/Welcome_controller.php */