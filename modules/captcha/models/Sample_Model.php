<?php

/**
 * This is a Sample Model Using HMVC 
 * with captcha module.
 * 
 * Just copy the captcha validation blocks
 * and paste to your models.
 */

Class Sample_Model extends VM
{
    function __construct()
    {
        //----- Sample Captcha Validation ----//
        
        $this->settings['fields']['captcha_answer'] = array(
          'label' => 'Security Image',
          'type'  => 'string',
          'rules' => 'trim|required|integer|min_lenght[1]|max_length[5]|callback_request[post][captcha/check]'
        );
        
        //----- End Captcha Validation ----//

        parent::__construct();
    }
    
    public $settings = array(
    'database' => 'db',
    'table'    => 'tablename',
    'primary_key' => 'id',
    'fields' => array
     (
        'example' => array(
          'label' => 'ID',
          'type'  => 'int',
          'rules' => 'trim|integer'
        ),
    ));
}