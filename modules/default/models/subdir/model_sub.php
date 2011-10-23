<?php

/**
* Your copy paste Sub Model load it as
*/
Class Model_sub extends Model {
    
    function __construct()
    {    
        loader::database();
        parent::__construct();
        
    }
    
    public function test()
    {
        echo 'Default sub model sub test function works !';
        
        // ...
        // $this->db->query( ... );
    }
        

} 

/* End of file model_doly.php */
/* Location: ./modules/default/models/subdir/model_sub.php */