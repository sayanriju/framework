<?php
  
/**
* Sample Extension File
* 
* Loading extension library in 
* Controller file loader::ext('sample');
*/
Class Sample
{
    function __construct()
    {
        /**
        * Loading sub files from extension 
        * folder.
        */
        loader::lib('../sample/libname');
        loader::model('../sample/modelname');
        loader::helper('../sample/helpername');
    }
    
}

/* End of file Sample.php */
/* Location: ./extenstions/sample/Sample.php */