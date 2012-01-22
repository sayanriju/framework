<?php
view_var('head', css('welcome.css'));
view_var('head', js('welcome.js'));    
view_var('meta', meta('keywords', 'obullo, php5, framework'));   // You should set some head tags in view files. 
?>

<!-- body content -->
<h1>Welcome to Obullo !</h1> 

<div id="main">
    <div class="fieldset"> 
          <div class="fieldbox"> 
               <h3 class="legend">modules/welcome</h3> 
               <div class="inner">
               
                    <p>If you would like to edit <b>Welcome Module</b> you'll find files located at</p>
                    
                    <?php echo br(); ?>
                    
                    <code><b>modules/welcome/views/</b><samp>layouts</samp>/layout_welcome.php <kbd>( Layout )</kbd></code> 
                    
                    <code><b>modules/welcome/</b><samp>views</samp>/view_welcome.php <kbd>( View )</kbd></code>
                    
                    <code><b>modules/welcome/</b><samp>controllers</samp>/welcome.php <kbd>( Controller )</kbd></code>
                   
                    <code><b>modules/welcome/</b><samp>parents</samp>/Welcome_Controller.php <kbd>( Module Controller )</kbd></code>

                    <?php echo br();  ?>
                    
                    <div class="test"><? echo anchor('/welcome/hmvc', 'Try to New HMVC Feature'); ?></div>
                    <div class="test"><? echo anchor('/test/vm/start', 'Try to New Obullo Validation Model'); ?></div>
                    <div class="test"><? echo anchor('/welcome/task', 'Try to New Task Feature'); ?></div>
                    <div class="test"><? echo anchor('/backend', 'Try to New Sub Modules'); ?></div>
                    
                    <?php echo br(2);  ?>
                    
                    <p><b>Note:</b> If you are new to Obullo, you should start by 
                reading the <a href="http://obullo.com/user_guide/en/<?php echo OBULLO_VERSION; ?>/index.html">User Guide</a>.</p>
           
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
