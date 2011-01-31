<?php

/**
* Your copy paste php5 library file.
*/
Class doly
{
    private static $instance;
    
    public static function instance()
    {
       if(! (self::$instance instanceof self))
       {
            self::$instance = new self();
       } 
       
       return self::$instance;
    }
    
    public function init() 
    {    
        return self::instance();
    }
    

    public function func()
    {
        echo 'php5 test ... works !!';
    }
    
} 

/* End of file doly.php */
/* Location: .modules/libraries/php5/doly.php */