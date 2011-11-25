Obullo "captcha" Module
=========================

The goal of `captcha` module sending captcha posts to captcha controller via
ajax or php posts, and easy maintenance.

## Dependencies
- Captcha.sql file.
- This module uses Hmvc libraries.

## Installation
- Give the 777 write permission to `/modules/capthca/public/images/` folder.
- Look at Sample_Model.php in `/modules/capthca/models/` folder and copy validation 
codes and paste to your models.

## Run
- Do a Hmvc call to `/captcha/create/` url like below the code, response will return to 
serialized string format and using unserialize(); function you can grab it as array();

    loader::helper('ob/request');  
    $response = request('GET', '/captcha/create')->exec()->response();
    $data['cap'] = unserialize($response);

    print_r($data['cap']);

## Tips
- Look at the `test` module you will find a form validation example which is use the captcha module.
