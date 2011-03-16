<?php
  
/**
* Display error templates
* 
* http://acd/error_mail/display/show/4d8125a246863
*/

Class Display extends Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function show($error_id = '')
    {
        if( file_exists(MODULES .'error_mail'. DS .'views'. DS .'html_errors'. DS .$error_id. EXT))
        {
            echo view('html_errors/'.$error_id);
            
            return;
        }
        
        show_error('Error file not found or deleted from server.');
    }
    
    
    function delete($error_id = '')
    {
        if( file_exists(MODULES .'error_mail'. DS .'views'. DS .'html_errors'. DS .$error_id. EXT))
        {
            unlink(MODULES .'error_mail'. DS .'views'. DS .'html_errors'. DS .$error_id. EXT);
            
            echo '<font face="arial" size="3">File deleted !</font>';
            
            return;
        }
        
        show_error('This file not found on the server.');
    }
    
}
  