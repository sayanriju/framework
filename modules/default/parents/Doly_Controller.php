<?php
defined('BASE') or exit('Access Denied!');

/**
* Your copy paste Module Controller file.
*/

Class Doly_Controller extends Controller
{                                     
    public function __construct()
    {
        parent::__construct();
        
        loader::helper('ob/html');
        loader::helper('ob/url');
        
    }
      
}

/* End of file Doly_controller.php */
/* Location: .modules/parents/Doly_controller.php */