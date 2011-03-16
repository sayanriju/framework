<html>
<head>

<style type="text/css">
#exception_content {
font-family: verdana;
font-size:12;
width:99%;
padding:5px;
background-color: #F0F0F0;
}
#exception_content .errorfile { 
display:block;
line-height: 2.0em; 
}
#exception_content pre.source { 
margin: 5px 0 5px 0; 
padding: 0; 
background: none; 
border: none; 
line-height: none; 
}
#exception_content div.collapsed { display: none; }
#exception_content div.arguments { }
#exception_content div.arguments table { 
font-family: verdana; 
font-size:12; 
border-collapse: collapse; 
border-spacing: 0; 
background: #fff;  
}
#exception_content div.arguments table td { text-align: left; padding: 5px; border: 1px solid #ccc; }
#exception_content div.arguments table td .object_name { color: blue; }
#exception_content pre.source span.line { display: block; }
#exception_content pre.source span.highlight { background: #E0E0E0; }
#exception_content pre.source span.line span.number { color: none; }
#exception_content pre.source span.line span.number { color: none; }

body {
font-family: verdana; 
font-size:12; 
}
</style>

<script type="text/javascript">
function Obullo_Element() 
{
    var elements = new Array();
    for (var i = 0; i < arguments.length; i++) 
    {
        var element = arguments[i];
        if (typeof element == 'string')
            element = document.getElementById(element);
        if (arguments.length == 1)
            return element;
        elements.push(element);
    }
    return elements;
}

function Obullo_Error_Toggle(obj)
{
    var el = Obullo_Element(obj);
    el.className = (el.className != 'collapsed' ? 'collapsed' : '' );
}
</script>
</head>

<body>

<div style="float:left"><h3>Ticket# : <?php echo $uniqid; ?></h3></div>
<div style="float:right" id="del_msg">
<form action="/error_mail/display/delete/<?php echo $uniqid?>" method="POST" id="error_form" name="error_form">
<input type="button" onclick="delete_file('<?=$uniqid?>');" value="Delete This File" />
</form>
</div>

<div style="clear:both"></div>

<?php
$agent = lib('agent');

// echo '<b>SITE :</b> '. BASE_URL.'<br />';
// echo '<b>FULL URL :</b> '. full_url().'<br />';
echo '<b>PLATFORM :</b> '. $agent->platform().'<br />';
echo '<b>BROWSER :</b> '. $agent->browser() .' '. $agent->version().'<br />';
echo '<b>MOBILE :</b>'. $agent->mobile().'<br />';
echo '<b>CHARSETS</b> '. print_r($agent->charsets(), true).'<br />';
echo '<b>$_REQUESTS</b> '. print_r($_REQUEST, true).'<br />';
echo '<b>$_SERVER</b> '. print_r($_SERVER, true).'<br />';
// echo '<b>USER DATA</b> '. print_r(user(), true).'<br />';
?>

<h3>Application Errors</h3>

<div id="exception_content">

<b>(<?php echo $type; ?>): </b> <?php echo $e->getMessage(); ?> <br />

<?php 
if(count($sql) > 0) 
{ 
    foreach ($sql as $db => $query)
    {
        echo '<span class="errorfile"><b>('.$db.') SQL:</b> '.$query.'</span>';
    }
}
?>
<?php $code = ($e->getCode() != 0) ? ' Code : '. $e->getCode() : ''; ?> 

<span class="errorfile"><?php echo error_secure_path($e->getFile()) ?><? echo $code; ?><? echo ' ( Line : '.$e->getLine().' ) '; ?></span>

<?php 
$debug = config_item('debug_backtrace');

if($debug['enabled']) 
{
    // Show source code for first exception trace
    // ------------------------------------------------------------------------
    $e_trace['file'] = $e->getFile();
    $e_trace['line'] = $e->getLine();
    
    echo error_write_file_source($e_trace);
    
    // ------------------------------------------------------------------------
    
    $full_traces = error_debug_backtrace($e);

    $debug_traces = array();
    foreach($full_traces as $key => $val)
    {
        if( isset($val['file']) AND isset($val['line']))
        {   
            $debug_traces[] = $val;
        }
    }
    
    if(isset($debug_traces[0]['file']) AND isset($debug_traces[0]['line']))
    {
        if($debug_traces[0]['file'] == $e->getFile() AND $debug_traces[0]['line'] == $e->getLine())
        {
            unset($debug_traces[0]);
            
            $unset = TRUE;
        } 
        else 
        {
            $unset = FALSE;
        }
        
        if(isset($debug_traces[1]['file']) AND isset($debug_traces[1]['line'])) 
        { 
            $class_info = '';
            foreach($debug_traces as $key => $trace) 
            {                    
                $prefix = uniqid().'_';

                if(isset($trace['file'])) 
                {                        
                    $class_info = '';
                    
                    if(isset($trace['class']) AND isset($trace['function']))
                    {
                        $class_info.= $trace['class'] .'->'. $trace['function'];  
                    }
                    
                    if( ! isset($trace['class']) AND isset($trace['function']))
                    {
                        $class_info.= $trace['function']; 
                    }
                    
                    if(isset($trace['args']))  
                    {       
                        if(count($trace['args']) > 0)
                        {                  
                            $class_info.= '(<a href="javascript:void(0);" ';
                            $class_info.= 'onclick="Obullo_Error_Toggle(\'arg_toggle_'.$prefix.$key.'\');">';
                            $class_info.= 'arg';
                            $class_info.= '</a>)'; 
                            
                            $class_info.= '<div id="arg_toggle_'.$prefix.$key.'" class="collapsed">';
                            $class_info.= '<div class="arguments">';
                            
                            $class_info.= '<table>';
                            foreach($trace['args'] as $arg_key => $arg_val)
                            {
                                $class_info.= '<tr>';
                                $class_info.= '<td>'.$arg_key.'</td>';
                                $class_info.= '<td>'.error_dump_argument($arg_val).'</td>';
                                $class_info.= '</tr>'; 
                            }
                            $class_info.= '</table>';
                            
                            $class_info.= '</div>';
                            $class_info.= '</div>';
                        }
                        else
                        {
                            $class_info.= (isset($trace['function'])) ? '()' : '';     
                        }
                    }
                    else
                    {
                        $class_info.= (isset($trace['function'])) ? '()' : '';    
                    }
                    
                    echo '<div class="error_file" style="line-height: 2em;">'.$class_info.'</div>';
                }

                if($unset == FALSE) { ++$key; }
                ?>
                
                <span class="errorfile" style="line-height: 1.8em;">
                <a href="javascript:void(0);" onclick="Obullo_Error_Toggle('error_toggle_' + '<?php echo $prefix.$key?>');"><?php echo error_secure_path($trace['file']); echo ' ( '?><?php echo ' Line : '.$trace['line'].' ) '; ?></a>
                </span>
        
                <?php 
                // Show source codes foreach traces
                // ------------------------------------------------------------------------
                
                echo error_write_file_source($trace, $key, $prefix);
                
                // ------------------------------------------------------------------------
                ?>
                 
    <?php   } // end foreach ?>

    <?php }   // end if isset ?>     
    <?php }   // end if isset ?>

<?php }   // end if debug backtrace ?>

</div>


<script language="JavaScript">
<!--
  
function delete_file(uniqid)
{
    input_box = confirm("Are you sure you want to delete this file from server ?");
     
    if(input_box) 
    {
        // document.getElementById('del_msg').innerHTML = '<b>The error file ' + uniqid + '.php deleted from server !</b>';
        
        document.forms["error_form"].submit();
    }
}
  
//-->
</script>

</body>

</html>