
<!-- body content -->
<h1>Welcome to Obullo HMVC !</h1>

<table>
    
    <tr>
        <td width="35%"><b>Example Code</b></td>
        <td>
<pre>#### Welcome controller / hmvc function ####</pre>   
         
<pre>
loader::helper('ob/request');
$request = request('GET', 'welcome/test/1/2/3');

$data['response'] = $request->exec()->response();</pre></td>
    </tr>

    <tr>
        <td><b>Response</b></td>
        <td><pre>#### View hmvc file ####</pre><pre>echo $response;</pre><? echo $response;?></td>
    </tr>

</table>

