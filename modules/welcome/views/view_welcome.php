<?php

view_var('head', js('http://code.jquery.com/jquery-1.5.1.js'));

view_var('head', css('welcome.css'));
view_var('head', js('welcome.js'));
view_var('head', script('welcome'));    
view_var('meta', meta('keywords', 'obullo, php5, framework'));   // You should set some head tags in view files. 
?>

<script type="text/javascript">

function send_ajax()
{
    $.post('/index.php/welcome/ajax', function(data) 
    {
        // alert(data);
    });
}

</script>


<!-- body content -->
<h1>Welcome to Obullo !</h1> 

<div id="main">
    <div class="fieldset"> 
          <div class="fieldbox"> 
               <h3 class="legend">.modules/welcome</h3> 
               <div class="inner">
               
                    <p>If you would like to edit this page you'll find files located at</p>
                    
                    <?php echo br(); ?>
                    
                    <code><b>.modules/welcome/views/</b><samp>layouts</samp>/layout_base.php <kbd>( Layout )</kbd></code> 
                    
                    <code><b>.modules/welcome/</b><samp>views</samp>/view_welcome.php <kbd>( View )</kbd></code>
                    
                    <code><b>.modules/welcome/</b><samp>controllers</samp>/welcome.php <kbd>( Controller )</kbd></code>
                   
                    <code><b>.modules/welcome/</b><samp>parents</samp>/Welcome_Controller.php <kbd>( Global Controller )</kbd></code>

                    <code><b>.modules/welcome/</b><samp>scripts</samp>/welcome.php <kbd>( Script )</kbd></code>

                    <code><b>.application/</b><samp>parents</samp>/App_Controller.php <kbd>( Application Controller )</kbd></code>
                    
                    <code class="no_background"><input type="button" onclick="test_me();" value="Script Test !"/></code>
                       
                    <?php echo br(); ?>
                    
                    <p><b>Note:</b> If you are new to Obullo, you should start by 
                reading the <a href="http://obullo.com/user_guide/<?php echo OBULLO_VERSION; ?>/index.html">User Guide</a>.</p>
           
              </div>
          </div> 
    </div> 

<p>
<?php echo br(); ?>Page rendered in {elapsed_time} seconds 

<?php if(function_exists('memory_get_usage')) {?> using {memory_usage} of memory <?php } ?> <?php echo $var; ?> 
<?php echo img('gif/obullo.gif', ' border="0" '); ?>
</p>

</div> 

<?php echo br(); ?>
<!-- body content -->
