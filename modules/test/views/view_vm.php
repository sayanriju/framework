<?php
view_var('head', css('welcome.css'));
view_var('head', js('jquery-min.js'));
view_var('meta', meta('keywords', 'obullo, validation model, vm, validation in model'));
view_var('head', css('
label { font-weight:bold; }
.input-error { color: #DF4545; }

.notification {
  max-width: 800px;
  border:1px solid;
  margin-left: 0px;
  margin-bottom: 10px;
  padding: 15px;
  text-align:center;
  font-weight:bold;
  font-size: 16px;
}

.notification h1 { margin-bottom: 5px; }

.notification.success {
  border-color: #E6DB55;
  background-color: #FFFFE0;
  line-height: 24px;
  color: #000;
  background-position:0px 1px
}

.notification.error {
  border-color: #DF4545;
  background-color: #FFEBE8;
  color: #000;
  background-position:0 -7055px;
}
', 'embed'));
?>

<!-- body content -->
<h1>Welcome to Obullo Validation Model !</h1> 

<div style="padding: 10px 10px 10px 0;"><? echo anchor('/test/vm/start', 'Validation Model (No Ajax)'); ?> | <? echo anchor('/test/vm/start/ajax_example', 'Validation Model (VM) with Ajax'); ?></div>


<? echo form_msg($user); ?>

<div>
<? echo form_open('/test/vm/start/do_post', array('method' => 'POST', 'class' => 'no-ajax'));?>
<table width="100%">
    
    <tr>
        <td style="width:20%;"><? echo form_label('Username'); ?></td>
        <td>
        <? echo form_error('usr_username', '<div class="input-error">', '</div>'); ?>
        <? echo form_input('usr_username', '', " id='username' ");?>
        </td>
    </tr>
    
    <tr>
        <td><? echo form_label('Email'); ?></td>
        <td>
        <? echo form_error('usr_email', '<div class="input-error">', '</div>'); ?>
        <? echo form_input('usr_email', '', " id='email' ");?>
        </td>
    </tr>
    
    <tr>
        <td><? echo form_label('Password'); ?></td>
        <td>
        <? echo form_error('usr_password', '<div class="input-error">', '</div>'); ?>
        <? echo form_password('usr_password', '', " id='password' ");?>
        </td>
    </tr>
    
    <tr>
        <td><? echo form_label('Confirm'); ?></td>
        <td>
        <? echo form_error('usr_confirm_password', '<div class="input-error">', '</div>'); ?>
        <? echo form_password('usr_confirm_password', '', " id='confirm' ");?>
        </td>
    </tr>
    
    <!-- Get the captcha module view -->

    <? echo view('../captcha/view_captcha'); ?>
    
    <!-- Get the captcha module view -->
    
    <tr>
        <td></td>
        <td><? echo form_submit('do_post', 'Do Post');?><font size="1"> * Please do post with blank fields and see the errors.</font></td>
    </tr>
    
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    
    <tr>
        <td><b>Code</b></td>
        <td>
<pre>
loader::model('user', false);  // Include user model

$user = new User();
$user->usr_username = i_get_post('usr_username');
$user->usr_password = i_get_post('usr_password');
$user->usr_email    = i_get_post('usr_email');

$data['user'] = $user;

view_var('body', view('view_vm', $data));
view_layout('layout_vm'); </pre></td>
    </tr>
    
    
    <tr>
        <td colspan="2">Test Results</td>
    </tr>
    <tr>
        <td><b>form_error('usr_username');</b></td>
        <td><pre><? echo form_error('usr_username'); ?></pre></td>
    </tr>
    
    <tr>
        <td><b>validation_errors();</b></td>
        <td><pre><? echo validation_errors(' | ', ' | '); ?></pre></td>
    </tr>
    
    <? if(is_object($user)) { ?>
    
    <tr>
        <td><b>print_r($user->errors());</b></td>
        <td><pre><? print_r($user->errors()); ?></pre></td>
    </tr>
    
    <tr>
        <td><b>print_r($user->errors);</b></td>
        <td><pre><? print_r($user->errors); ?></pre></td>
    </tr>
    
    <tr>
        <td><b>print_r($user->values());</b></td>
        <td><pre><? print_r($user->values()); ?></pre></td>
    </tr>
    
    <tr>
        <td><b>print_r($user->values);</b></td>
        <td><pre><? print_r($user->values); ?></pre></td>
    </tr>
    
    <? } ?>
        
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    
</table>
     
<? echo form_close(); ?>
</div>


<?php echo br(); ?>
<!-- body content -->
