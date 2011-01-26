<?php

/**
* Your copy paste library.
*/
Class common_company extends MY_Model {
    
    function __construct()
    {
        loader::database('db_common');
        parent::__construct(__FILE__);
        
        $this->db = $this->db_common;
    }
} 

/* End of file doly.php */
/* Location: .modules/libraries/doly.php */