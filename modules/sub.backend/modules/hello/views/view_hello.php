<?php
view_var('head', css('backend.css'));
view_var('meta', meta('keywords', 'obullo, php5, framework'));   // You should set some head tags in view files.

echo $undefined;        
?>

<!-- body content -->
<h1>Backend Sub Module !</h1> 

<div id="main">
    <div class="fieldset"> 
          <div class="fieldbox"> 
               <h3 class="legend">sub.backend/modules/hello</h3> 
               <div class="inner">
               
                    <p>If you would like to edit <b>Backend Hello Module</b> you'll find files located at</p>
                    
                    <?php echo br(); ?>
                    
                    <code><b>sub.backend/modules/hello/views/</b><samp>layouts</samp>/layout_hello.php <kbd>( Layout )</kbd></code> 
                    
                    <code><b>sub.backend/modules/hello/</b><samp>views</samp>/view_hello.php <kbd>( View )</kbd></code>
                    
                    <code><b>sub.backend/modules/hello/</b><samp>controllers</samp>/hello.php <kbd>( Controller )</kbd></code>
                   
                      <?php echo br(2);  ?>
                    
                    <p><b>Note:</b> If you are new to Obullo, you should start by 
                reading the <a href="http://obullo.com/user_guide/en/<?php echo OBULLO_VERSION; ?>/index.html">User Guide</a>.</p>
           
              </div>
          </div> 
    </div> 

<p>
<?php echo br(); ?>Page rendered in {elapsed_time} seconds 

<?php if(function_exists('memory_get_usage')) {?> using {memory_usage} of memory <?php } ?> <?php echo $var; ?> 
<?php echo img('../welcome/gif/obullo.gif', ' border="0" '); ?>
</p>
    

</div> 

<?php echo br(); ?>
<!-- body content -->
