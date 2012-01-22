
<?php view_var('head', css('welcome.css')); ?>

<!-- body content -->
<h1>Welcome to Obullo HMVC !</h1>

<table>
    
    <tr>
        <td width="35%"><b>Example Code</b></td>
        <td>
<pre>#### Welcome Controller ####</pre>   
        
<br />

<pre>
loader::helper('ob/request');

$data['response_a'] = request('welcome/test/1/2/3')->exec();
$data['response_b'] = request('backend/hello/test/1/2/3')->exec();</pre></td>
    </tr>

    <tr>
        <td><b>Response</b></td>
        <td></td>
    </tr>
    
    <tr>
                <td></td>
        <td>
            <pre>#### View hmvc file ####</pre>
            
            <br />
            
            <pre>echo $response_a;</pre>
            <pre>echo $response_b;</pre>
            <br />
            
            <? echo $response_a;?>            
            <? echo $response_b;?>
        </td>
    </tr>

</table>

