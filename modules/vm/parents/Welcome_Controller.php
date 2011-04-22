<?php
defined('BASE') or exit('Access Denied!');


Class Welcome_Controller extends Controller
{                                     
    public function __construct()
    {
        parent::__construct();
        
        loader::helper('ob/head_tag');
        loader::helper('ob/body_tag');
        loader::helper('ob/url');
        
    }
      
}

/* End of file Global Welcome_controller.php */
/* Location: ./modules/welcome/parents/Welcome_controller.php */