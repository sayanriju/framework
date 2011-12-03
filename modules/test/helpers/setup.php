<?php
defined('BASE') or exit('Access Denied!'); 

// ------------------------------------------------------------------------

/**
 * Obullo Test Module Setup Helper
 *
 * @package     Obullo
 * @category    Module Helpers
 */

// ------------------------------------------------------------------------

/**
 * Check the user is set the correctly
 * everythings for test module.
 * 
 * @return void
 */
function check_setup()
{
    if(db_item('database', 'db') != 'obullo')
    {
        show_error('SETUP ERROR - Please create a test database called <b>obullo</b> 
            and configure it from <b>/application/config/database.php</b> file.');
    }
    else
    {
        $db = loader::database('db', false);

        $db->set_attribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

        $db->query("SELECT * FROM ob_captcha");

        if(count($db->errors()) > 0)
        {
            if(in_array("Table 'obullo.ob_captcha' doesn't exist", $db->errors())
            OR in_array('42S02', $db->errors())
            OR in_array('1146', $db->errors()))
            {
                show_error('SETUP ERROR - Please run the <b>test.sql</b> which is located in 
                    your <b>/modules/test/</b> folder !');
            } 
        }

        $db->set_attribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    $folder = MODULES .'captcha'. DS . 'public'. DS . 'images'. DS;

    if( ! is_really_writable($folder .'index.html'))
    {
        show_error('SETUP ERROR - Please set chmod settings to 777 for captcha folder: '. $folder);
    }
}

/* End of file setup.php */
/* Location: ./modules/test/helpers/setup.php */