<?php

/**
* Your copy paste Model.
*/
Class Model_doly extends Model {
    
    function __construct()
    {    
        loader::database();
        parent::__construct();
        
    }
    
    public function doly()
    {
        echo 'test';
        
        // ...
        // $this->db->query( ... );
    }
        

} 

/* End of file model_doly.php */
/* Location: .modules/default/models/model_doly.php */
