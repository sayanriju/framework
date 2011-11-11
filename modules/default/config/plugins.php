<?php
defined('BASE') or exit('Access Denied!'); 

/*
| -------------------------------------------------------------------
| SET PLUGINS
| -------------------------------------------------------------------
| This file contains arrays of your "Js" or "Css" type plugins.  It is used by the
| View helper functions to help set heag tag variables js, css data.
| The array keys are used to identify the plugin name
| and the array values are used to set the actual filename and path of the public items.
|
*/

$config['doly'] = array(
                         'js/doly/example.js',
                         'css/doly/example.css',
                         'js/doly/a.js',
                         'js/doly/b.js',
                        );