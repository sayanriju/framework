<?php
defined('BASE') or exit('Access Denied!');


Class VM_Controller extends Controller
{                                     
    public function __construct()
    {
        parent::__construct();
        
        loader::helper('ob/html');
        loader::helper('ob/url');
        loader::helper('ob/form');
        loader::helper('ob/form_json');
        loader::helper('ob/session');
        
        sess_start();
    }
      
}

/* End of file Global Welcome_controller.php */
/* Location: ./modules/welcome/parents/Welcome_controller.php */