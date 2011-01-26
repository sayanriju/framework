<?php
  
Class MY_Model extends Model {
    
    public $get;
    public $post;
    public $delete;
    public $put;
    
    
    function __construct($file = '')
    {
        parent::__construct();
        $this->process_settings();  
    }
    
    function process_settings()
    {
        loader::model('../db_common/common_company', 'location');
        
        this()->location->process_settings();
    }
    
    function save()
    {
        $hmvc = hmvc_request('POST', 'api/model_test');
        echo $hmvc->exec()->response();
    }

}
