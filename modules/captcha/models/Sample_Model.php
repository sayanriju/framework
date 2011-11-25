<?php

/**
 * This is a Sample Model Using HMVC 
 * with captcha module.
 * 
 * Just copy the captcha validation blocks
 * and paste to models which are 
 * use captcha module.
 */

Class Sample_Model extends VM
{
    function __construct()
    {
        //----- Captcha Validation ----//
        
        $this->settings['fields']['captcha_answer'] = array(
          'label' => 'Security Image',
          'type'  => 'string',
          'rules' => 'trim|required|integer|min_lenght[1]|max_length[5]|callback_captcha_check'
        );
        
        //----- Captcha Validation ----//

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
    
    //----- Captcha Validation ----//
    
    /**
    * Validate captcha answer.
    *
    * @return  boolean
    */
    public function captcha_check()
    {
        loader::helper('ob/request');

        $response = request('GET','/captcha/check')->exec()->response();
        
        if($response == '0')
        {
            return FALSE;
        }
        elseif($response == '1')
        {
            return TRUE;
        }
    }
    
    //----- Captcha Validation ----//
    
}