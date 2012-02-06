<?php
  
/**
* Display `e_notifier` Error Tickets
* 
* @see http://example.com/index.php/e_notifier/display/ticket/4d8125a246863
*/

Class Display extends Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    /**
    * Display Ticket
    * 
    * @param string $error_id
    * @return void
    */
    function ticket($error_id = '')
    {
        $root = extension('root','e_notifier');
        
        if( file_exists($root .'e_notifier'. DS .'views'. DS .'html_errors'. DS .$error_id. EXT))
        {
            echo view('html_errors/'.$error_id);
            
            return;
        }
        
        show_error('Error file not found on the server.');
    }
    
    //--------------------------------------------------------------------------------
    
    /**
    * Delete Ticket
    * 
    * @param string $error_id
    * @return void
    */
    function delete($error_id = '')
    {
        $root = extension('root','e_notifier');
        
        if( file_exists($root .'e_notifier'. DS .'views'. DS .'html_errors'. DS .$error_id. EXT))
        {
            unlink($root .'e_notifier'. DS .'views'. DS .'html_errors'. DS .$error_id. EXT);
            
            echo '<font face="arial" size="3">File deleted !</font>';
            
            return;
        }
        
        show_error('This file not found on the server.');
    }
    
}

// END display.php File

/* End of file dsiplay.php
/* Location: ./modules/e_notifier/controllers/display.php */