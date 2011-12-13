
<?php view_var('head', css('welcome.css')); ?>

<!-- body content -->
<h1>Welcome to Obullo HMVC !</h1>

<table>
    
    <tr>
        <td width="35%"><b>Example Code</b></td>
        <td>
<pre>#### Welcome controller / hmvc function ####</pre>   
         
<pre>
loader::helper('ob/request');

$data['response'] = request('welcome/test/1/2/3')->exec();</pre></td>
    </tr>

    <tr>
        <td><b>Response</b></td>
        <td><pre>#### View hmvc file ####</pre><pre>echo $response;</pre><? echo $response;?></td>
    </tr>

</table>

