<?php
view_var('head', js('jquery-min.js'));
view_var('head', plugin('form'));
// embed css example
view_var('head', css('
.button {
    padding: 5px 10px;
    display: inline;
    background: #777 url(/public/images/png/button.png) repeat-x bottom;
    border: none;
    color: #fff;
    cursor: pointer;
    font-weight: normal;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    text-shadow: 1px 1px #666;
    text-decoration: none;
    }
.button:hover {
    background-position: 0 center;
    }
.button:active {
    background-position: 0 top;
    position: relative;
    top: 1px;
    padding: 6px 10px 4px;
    }
.button.white { font-size: 90%; background-color: #fff; color: #003399; text-shadow: 1px 1px #fff; border: 1px solid #ACACAC; }
.button.disabled { background: #F2F1F0; color: #ccc; text-shadow: 1px 1px #fff; border: 1px solid #ACACAC; }

.input-error { color:red; }

', 'embed'));

?>

<!-- body content -->
<h1>Welcome to Obullo Validation Model !</h1> 

<div style="padding: 10px 10px 10px 0;"><? echo anchor('/test/vm/start', 'Validation Model (No Ajax)'); ?> | <? echo anchor('/test/vm/start/ajax_example', 'Validation Model (VM) with Ajax'); ?></div>

<!-- body content -->

<? echo form_open('/test/vm/start/do_post.json', array('method' => 'POST', 'class' => 'no-top-msg hide-formarea'));?>
<?
    ##  OBULLO JQUERY FORM VALIDATION CLASS ATTRIBUTES ##
    // no-top-msg: the class attribute no-top-msg hide the main jquery form msg
    // no-ajax: if you don't want to ajax post use this atttribute
    // hide-formarea: put formarea div which have id="formarea" attribute, obullo will hide the form if form submit success !
?>
<div id="formarea">
<table>
    
    <tr>
        <td width="35%"><b>Username</b></td>
        <td><? echo form_input('username', '', " id='username' ");?></td>
    </tr>
    
    <tr>
        <td><b>Email</b></td>
        <td><? echo form_input('email', '', " id='email' ");?></td>
    </tr>
    
    <tr>
        <td></td>
        <td><div class="loading_div" style="float:left;"><? echo form_submit('do_post', 'Do Post', " class='button white' ");?></div></td>
    </tr>
    
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    
    <tr>
        <td width="35%"><b>Code</b></td>
        <td>
<pre>
loader::model('user', false);

$user = new User();
$user->username = '';
$user->email    = 'me@example.com';

if($user->save())
{
    echo form_json_success('Success !');
} 
else
{
    echo form_json_error($user);
}</pre></td>
    </tr>
    
    <tr>
        <td colspan="2">Using php <b>json_encode()</b> function you can turn to json format for ajax requests. <b>json_encode($user->errors);</b>, We do it with obullo form_json helper because of write less coding.<br />
        Please look at the <b>form_json_encode();</b> function you will understand well how does it work.It's located <b>obullo/helpers/form_json.php</b></td>
    </tr>
    
</table>

        
<p>
<?php echo br(); ?>Page rendered in {elapsed_time} seconds 

<?php if(function_exists('memory_get_usage')) {?> using {memory_usage} of memory <?php } ?> generated by 
<?php
// calling images from welcome module !
echo img('../welcome/gif/obullo.gif', ' border="0" '); ?>
</p>

</div> 

<?php echo form_close(); ?>

<?php echo br(); ?>
<!-- body content -->
