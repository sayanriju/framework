Obullo "captcha" Module
=========================

The goal of `captcha` module sending captcha posts to module controller via
ajax or native post, and easy maintenance.

## Dependencies
- Captcha.sql file.
- This module uses Hmvc libraries.

## Installation
- Give the 777 write permission to `/modules/captcha/public/images/` folder.
- Look at Sample_Model.php in `/modules/captcha/models/` folder and copy validation 
codes and paste to your models.

    $this->settings['fields']['captcha_answer'] = array(
      'label' => 'Security Image',
      'type'  => 'string',
      'rules' => 'trim|required|integer|min_lenght[1]|max_length[5]|callback_request[post][/captcha/check/]'
    );

## Run
- Do a Hmvc call to `/captcha/create/` url like below the code, response will return to 
serialized string format and using unserialize(); function you can grab it as array();

## Use in any controller method

    loader::helper('ob/request');  
    $response = request('GET', '/captcha/create')->exec()->response();
    $data['cap'] = unserialize($response);

    print_r($data['cap']);

## Tips
- Look at the `/modules/test/vm` path you will find a validation in model example which is use the captcha module.
