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

$config['form'] = array(
                         'js/form/jquery.livequery.js',
                         'js/form/underscore.js',
                         'js/form/underscore_addons.js',
                         'js/form/notification.js',
                         'js/form/form.js',
                         'js/form/form_settings.js',
                        );


$config['form2'] = array(
                         'js/form2/underscore.js',
                         'js/form2/underscore_addons.js',
                         'js/form2/jquery.livequery.js',
                         'js/form2/jquery.multiselect.js',
                         'js/form2/jquery.masked_input.js',
                         'js/form2/form.js',
                         'js/form2/notification.js',
                        );