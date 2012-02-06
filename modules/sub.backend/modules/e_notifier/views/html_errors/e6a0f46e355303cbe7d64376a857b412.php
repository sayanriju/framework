<?php defined('BASE') or exit('Access Denied!'); ?>

<html>
<head>

<style type="text/css">
#exception_content {
font-family: Verdana, "Bitstream Vera Sans", "DejaVu Sans", Tahoma, Geneva, Arial, Sans-serif;
font-size:12px;
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
font-family: Verdana, "Bitstream Vera Sans", "DejaVu Sans", Tahoma, Geneva, Arial, Sans-serif;
font-size: 12px; 
border-collapse: collapse; 
border-spacing: 0; 
background: #fff;  
}
#exception_content div.arguments table td { text-align: left; padding: 5px; border: 1px solid #ccc; }
#exception_content div.arguments table td span.object { color: blue; }
#exception_content pre.source span.line { display: block; }
#exception_content pre.source span.highlight { background: #E0E0E0; }
#exception_content pre.source span.line span.number { color: none; }
#exception_content pre.source span.line span.number { color: none; }

body {
font-family: Verdana, "Bitstream Vera Sans", "DejaVu Sans", Tahoma, Geneva, Arial, Sans-serif;
font-size: 12px; 
}
</style>

<script type="text/javascript">
function Obullo_Element() {
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

function Obullo_Error_Toggle(obj) {
    var el = Obullo_Element(obj);
    if (el == null){
        return false;
    }
    el.className = (el.className != 'collapsed' ? 'collapsed' : '' );
}
</script>
</head>

<body>

<div style="float:left"><h3>Ticket# : e6a0f46e355303cbe7d64376a857b412</h3></div>
<div style="float:right" id="del_msg">
<form action="/index.php/backend/e_notifier/display/delete/e6a0f46e355303cbe7d64376a857b412"  method="POST" id="error_form" name="error_form" ><div style="display:none">
<input type="hidden" name="csrf_token_name" value="0df370eb21977875bda18204d07e60b9"/>
</div><button name="del_error" type="button"  onclick="delete_file('e6a0f46e355303cbe7d64376a857b412');">Delete This File</button></form></div>

<div style="clear:both"></div>


<table>
    <tr>
        <td width="10%">PLATFORM</td>
        <td>Linux</td>
    </tr>
    
    <tr>
        <td>BROWSER</td>
        <td>Firefox 9.0.1</td>
    </tr>
    
        
    <tr>
        <td>CHARSETS</td>
        <td>Array
(
    [0] => iso-8859-1
    [1] => utf-8
)
</td>
    </tr>
    
    <tr>
        <td>$_REQUESTS</td>
        <td>Array
(
)
</td>
    </tr>
    
    <tr>
        <td>$_SERVER</td>
        <td>Array
(
    [HTTP_HOST] => obullo
    [HTTP_USER_AGENT] => Mozilla/5.0 (Ubuntu; X11; Linux i686; rv:9.0.1) Gecko/20100101 Firefox/9.0.1
    [HTTP_ACCEPT] => text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
    [HTTP_ACCEPT_LANGUAGE] => en-us,en;q=0.5
    [HTTP_ACCEPT_ENCODING] => gzip, deflate
    [HTTP_ACCEPT_CHARSET] => ISO-8859-1,utf-8;q=0.7,*;q=0.7
    [HTTP_CONNECTION] => keep-alive
    [HTTP_COOKIE] => csrf_cookie_name=0df370eb21977875bda18204d07e60b9
    [PATH] => /usr/local/bin:/usr/bin:/bin
    [SERVER_SIGNATURE] => <address>Apache/2.2.20 (Ubuntu) Server at obullo Port 80</address>

    [SERVER_SOFTWARE] => Apache/2.2.20 (Ubuntu)
    [SERVER_NAME] => obullo
    [SERVER_ADDR] => 127.0.1.1
    [SERVER_PORT] => 80
    [REMOTE_ADDR] => 127.0.0.1
    [DOCUMENT_ROOT] => /var/www/framework
    [SERVER_ADMIN] => webmaster@localhost
    [SCRIPT_FILENAME] => /var/www/framework/index.php
    [REMOTE_PORT] => 47057
    [GATEWAY_INTERFACE] => CGI/1.1
    [SERVER_PROTOCOL] => HTTP/1.1
    [REQUEST_METHOD] => GET
    [QUERY_STRING] => 
    [REQUEST_URI] => /index.php/backend
    [SCRIPT_NAME] => /index.php
    [PATH_INFO] => /backend
    [PATH_TRANSLATED] => /var/www/framework/backend
    [PHP_SELF] => /index.php/backend
    [REQUEST_TIME] => 1328315695
)
</td>
    </tr>
</table>

<h3>Application Errors</h3>

<div id="exception_content">

<b>(Notice): </b> Undefined variable: undefined <br />

 

<span class="errorfile">MODULES/sub.backend/modules/hello/views/view_hello.php Code : 8 ( Line : 5 ) </span>

<div id="error_toggle_0" ><pre class="source"><code><span class="line"><span class="number"> 1</span> &lt;?php
</span><span class="line"><span class="number"> 2</span> view_var('head', css('backend.css'));
</span><span class="line"><span class="number"> 3</span> view_var('meta', meta('keywords', 'obullo, php5, framework'));   // You should set some head tags in view files.
</span><span class="line"><span class="number"> 4</span> 
</span><span class="line highlight"><span class="number"> 5</span> echo $undefined;        
</span><span class="line"><span class="number"> 6</span> ?&gt;
</span><span class="line"><span class="number"> 7</span> 
</span><span class="line"><span class="number"> 8</span> &lt;!-- body content --&gt;
</span><span class="line"><span class="number"> 9</span> &lt;h1&gt;Backend Sub Module !&lt;/h1&gt; 
</span><span class="line"><span class="number">10</span> 
</span></code></pre></div><div class="error_file" style="line-height: 2em;">include(<a href="javascript:void(0);" onclick="Obullo_Error_Toggle('arg_toggle_4f2c7d2f51dec_1');">arg</a>)<div id="arg_toggle_4f2c7d2f51dec_1" class="collapsed"><div class="arguments"><table><tr><td>0</td><td><small>string</small><span>(73)</span> "/var/www/framework/modules/sub.backend/modules/hello/views/view_hello.php"</td></tr></table></div></div></div>                
                <span class="errorfile" style="line-height: 1.8em;">
                <a href="javascript:void(0);" onclick="Obullo_Error_Toggle('error_toggle_' + '4f2c7d2f51dec_1');">BASE/libraries/View.php (  Line : 93 ) </a>
                </span>
        
                <div id="error_toggle_4f2c7d2f51dec_1"  class="collapsed" ><pre class="source"><code><span class="line"><span class="number">88</span>         {
</span><span class="line"><span class="number">89</span>             echo eval('?&gt;'.preg_replace("/;*\s*\?&gt;/", "; ?&gt;", str_replace('&lt;?=', '&lt;?php echo ', file_get_contents($path.$filename. EXT))));
</span><span class="line"><span class="number">90</span>         }
</span><span class="line"><span class="number">91</span>         else
</span><span class="line"><span class="number">92</span>         {
</span><span class="line highlight"><span class="number">93</span>             include($path . $filename . EXT);
</span><span class="line"><span class="number">94</span>         }
</span><span class="line"><span class="number">95</span> 
</span><span class="line"><span class="number">96</span>         log_me('debug', ucfirst($func).' file loaded: '.$path . $filename . EXT);
</span><span class="line"><span class="number">97</span> 
</span><span class="line"><span class="number">98</span>         if($string === TRUE)
</span></code></pre></div>                 
    <div class="error_file" style="line-height: 2em;">OB_View->view(<a href="javascript:void(0);" onclick="Obullo_Error_Toggle('arg_toggle_4f2c7d2f52198_2');">arg</a>)<div id="arg_toggle_4f2c7d2f52198_2" class="collapsed"><div class="arguments"><table><tr><td>0</td><td><small>string</small><span>(59)</span> "/var/www/framework/modules/sub.backend/modules/hello/views/"</td></tr><tr><td>1</td><td><small>string</small><span>(10)</span> "view_hello"</td></tr><tr><td>2</td><td><small>array</small><span>(1)</span> <span>(
    "var" => <small>string</small><span>(17)</span> "and generated by "
)</span></td></tr><tr><td>3</td><td><small>bool</small> TRUE</td></tr><tr><td>4</td><td><small>bool</small> FALSE</td></tr><tr><td>5</td><td><small>string</small><span>(4)</span> "view"</td></tr></table></div></div></div>                
                <span class="errorfile" style="line-height: 1.8em;">
                <a href="javascript:void(0);" onclick="Obullo_Error_Toggle('error_toggle_' + '4f2c7d2f52198_2');">BASE/helpers/view.php (  Line : 333 ) </a>
                </span>
        
                <div id="error_toggle_4f2c7d2f52198_2"  class="collapsed" ><pre class="source"><code><span class="line"><span class="number">328</span> */
</span><span class="line"><span class="number">329</span> if ( ! function_exists('load_view'))
</span><span class="line"><span class="number">330</span> {
</span><span class="line"><span class="number">331</span>     function load_view($path, $filename, $data = '', $string = FALSE, $return = FALSE, $func = 'view')
</span><span class="line"><span class="number">332</span>     {
</span><span class="line highlight"><span class="number">333</span>         return lib('ob/view')-&gt;view($path, $filename, $data, $string, $return, $func);
</span><span class="line"><span class="number">334</span>     }
</span><span class="line"><span class="number">335</span> }
</span><span class="line"><span class="number">336</span> 
</span><span class="line"><span class="number">337</span> /* End of file view.php */
</span><span class="line"><span class="number">338</span> /* Location: ./obullo/helpers/view.php */</span></code></pre></div>                 
    <div class="error_file" style="line-height: 2em;">load_view(<a href="javascript:void(0);" onclick="Obullo_Error_Toggle('arg_toggle_4f2c7d2f52a5a_3');">arg</a>)<div id="arg_toggle_4f2c7d2f52a5a_3" class="collapsed"><div class="arguments"><table><tr><td>0</td><td><small>string</small><span>(59)</span> "/var/www/framework/modules/sub.backend/modules/hello/views/"</td></tr><tr><td>1</td><td><small>string</small><span>(10)</span> "view_hello"</td></tr><tr><td>2</td><td><small>array</small><span>(1)</span> <span>(
    "var" => <small>string</small><span>(17)</span> "and generated by "
)</span></td></tr><tr><td>3</td><td><small>bool</small> TRUE</td></tr><tr><td>4</td><td><small>bool</small> FALSE</td></tr><tr><td>5</td><td><small>string</small><span>(4)</span> "view"</td></tr></table></div></div></div>                
                <span class="errorfile" style="line-height: 1.8em;">
                <a href="javascript:void(0);" onclick="Obullo_Error_Toggle('error_toggle_' + '4f2c7d2f52a5a_3');">BASE/helpers/view.php (  Line : 239 ) </a>
                </span>
        
                <div id="error_toggle_4f2c7d2f52a5a_3"  class="collapsed" ><pre class="source"><code><span class="line"><span class="number">234</span> 
</span><span class="line"><span class="number">235</span>         $file_info = lib('ob/view')-&gt;_load_file($file_url, 'views', $extra_path);
</span><span class="line"><span class="number">236</span>         
</span><span class="line"><span class="number">237</span>         profiler_set('views', $file_info['filename'], $file_info['path'] . $file_info['filename'] .EXT);
</span><span class="line"><span class="number">238</span> 
</span><span class="line highlight"><span class="number">239</span>         return load_view($file_info['path'], $file_info['filename'], $data, $string, $return, __FUNCTION__);
</span><span class="line"><span class="number">240</span>     }
</span><span class="line"><span class="number">241</span> }
</span><span class="line"><span class="number">242</span> 
</span><span class="line"><span class="number">243</span> // ------------------------------------------------------------------------
</span><span class="line"><span class="number">244</span> 
</span></code></pre></div>                 
    <div class="error_file" style="line-height: 2em;">view(<a href="javascript:void(0);" onclick="Obullo_Error_Toggle('arg_toggle_4f2c7d2f5329a_4');">arg</a>)<div id="arg_toggle_4f2c7d2f5329a_4" class="collapsed"><div class="arguments"><table><tr><td>0</td><td><small>string</small><span>(10)</span> "view_hello"</td></tr><tr><td>1</td><td><small>array</small><span>(1)</span> <span>(
    "var" => <small>string</small><span>(17)</span> "and generated by "
)</span></td></tr></table></div></div></div>                
                <span class="errorfile" style="line-height: 1.8em;">
                <a href="javascript:void(0);" onclick="Obullo_Error_Toggle('error_toggle_' + '4f2c7d2f5329a_4');">MODULES/sub.backend/modules/hello/controllers/hello.php (  Line : 16 ) </a>
                </span>
        
                <div id="error_toggle_4f2c7d2f5329a_4"  class="collapsed" ><pre class="source"><code><span class="line"><span class="number">11</span>     {   
</span><span class="line"><span class="number">12</span>         view_var('title', 'Welcome to Obullo Backend Submodule !');
</span><span class="line"><span class="number">13</span>         
</span><span class="line"><span class="number">14</span>         $data['var'] = 'and generated by ';
</span><span class="line"><span class="number">15</span>         
</span><span class="line highlight"><span class="number">16</span>         view_var('body', view('view_hello', $data));
</span><span class="line"><span class="number">17</span>         view_layout('layout_hello'); 
</span><span class="line"><span class="number">18</span>     }
</span><span class="line"><span class="number">19</span>     
</span><span class="line"><span class="number">20</span>     function test($arg1 = '', $arg2 = '', $arg3 = '')
</span><span class="line"><span class="number">21</span>     {
</span></code></pre></div>                 
    <div class="error_file" style="line-height: 2em;">call_user_func_array(<a href="javascript:void(0);" onclick="Obullo_Error_Toggle('arg_toggle_4f2c7d2f5352f_5');">arg</a>)<div id="arg_toggle_4f2c7d2f5352f_5" class="collapsed"><div class="arguments"><table><tr><td>0</td><td><small>array</small><span>(2)</span> <span>(
    0 => <small>object</small> <span class="object">Hello(4)</span> <pre>{<br />        <small>public</small> config => <small>object</small> <span class="object">OB_Config(2)</span> <pre>{<br />            <small>public</small> config => <small>array</small><span>(61)</span> <span>(
                "base_url" => <small>string</small><span>(1)</span> "/"
                "domain_root" => <small>string</small><span>(16)</span> "http://localhost"
                "ssl" => <small>bool</small> FALSE
                "public_url" => <small>string</small><span>(1)</span> "/"
                "public_folder" => <small>string</small><span>(6)</span> "public"
                "error_reporting" => <small>integer</small> 1
                "debug_backtrace" => <small>array</small><span>(2)</span> <span>(
                    "enabled" => <small>string</small><span>(30)</span> "E_ALL ^ (E_NOTICE | E_WARNING)"
                    "padding" => <small>integer</small> 5
                )</span>
                "log_threshold" => <small>integer</small> 2
                "log_path" => <small>string</small><span>(0)</span> ""
                "log_date_format" => <small>string</small><span>(11)</span> "Y-m-d H:i:s"
                "time_reference" => <small>string</small><span>(5)</span> "local"
                "index_page" => <small>string</small><span>(9)</span> "index.php"
                "uri_protocol" => <small>string</small><span>(4)</span> "AUTO"
                "uri_extensions" => <small>array</small><span>(7)</span> <span>(
                    0 => <small>string</small><span>(3)</span> "php"
                    1 => <small>string</small><span>(4)</span> "html"
                    2 => <small>string</small><span>(4)</span> "json"
                    3 => <small>string</small><span>(3)</span> "xml"
                    4 => <small>string</small><span>(3)</span> "raw"
                    5 => <small>string</small><span>(3)</span> "rss"
                    6 => <small>string</small><span>(4)</span> "ajax"
                )</span>
                "url_suffix" => <small>string</small><span>(0)</span> ""
                "language" => <small>string</small><span>(7)</span> "english"
                "charset" => <small>string</small><span>(5)</span> "UTF-8"
                "subclass_prefix" => <small>string</small><span>(3)</span> "MY_"
                "subhelper_prefix" => <small>string</small><span>(3)</span> "my_"
                "permitted_uri_chars" => <small>string</small><span>(13)</span> "a-z 0-9~%.:_-"
                "enable_query_strings" => <small>bool</small> FALSE
                "submodule_trigger" => <small>string</small><span>(3)</span> "sub"
                "directory_trigger" => <small>string</small><span>(1)</span> "d"
                "subfolder_trigger" => <small>string</small><span>(1)</span> "s"
                "controller_trigger" => <small>string</small><span>(1)</span> "c"
                "function_trigger" => <small>string</small><span>(1)</span> "m"
                "encryption_key" => <small>string</small><span>(0)</span> ""
                "sess_cookie_name" => <small>string</small><span>(10)</span> "ob_session"
                "sess_expiration" => <small>integer</small> 7200
                "sess_die_cookie" => <small>bool</small> FALSE
                "sess_encrypt_cookie" => <small>bool</small> FALSE
                "sess_driver" => <small>string</small><span>(6)</span> "native"
                "sess_db_var" => <small>string</small><span>(2)</span> "db"
                "sess_table_name" => <small>string</small><span>(11)</span> "ob_sessions"
                "sess_match_ip" => <small>bool</small> FALSE
                "sess_match_useragent" => <small>bool</small> TRUE
                "sess_time_to_update" => <small>integer</small> 300
                "cookie_prefix" => <small>string</small><span>(0)</span> ""
                "cookie_domain" => <small>string</small><span>(0)</span> ""
                "cookie_path" => <small>string</small><span>(1)</span> "/"
                "cookie_time" => <small>integer</small> 1328920495
                "cookie_secure" => <small>bool</small> FALSE
                "rewrite_short_tags" => <small>bool</small> FALSE
                "global_xss_filtering" => <small>bool</small> FALSE
                "csrf_protection" => <small>bool</small> TRUE
                "csrf_token_name" => <small>string</small><span>(15)</span> "csrf_token_name"
                "csrf_cookie_name" => <small>string</small><span>(16)</span> "csrf_cookie_name"
                "csrf_expire" => <small>integer</small> 7200
                "proxy_ips" => <small>string</small><span>(0)</span> ""
                "sub_item" => <small>string</small><span>(31)</span> "Sub module config item1 works !"
                "send_email" => <small>bool</small> TRUE
                "write_log" => <small>bool</small> TRUE
                "recipients" => <small>array</small><span>(1)</span> <span>(
                    0 => <small>string</small><span>(17)</span> "eguvenc@gmail.com"
                )</span>
                "from_email" => <small>string</small><span>(18)</span> "news@develturk.com"
                "from_name" => <small>string</small><span>(19)</span> "Obullo "e_notifier""
                "subject" => <small>string</small><span>(9)</span> "Errors :("
                "smtp_host" => <small>string</small><span>(18)</span> "mail.develturk.com"
                "smtp_user" => <small>string</small><span>(18)</span> "news@develturk.com"
                "smtp_pass" => <small>string</small><span>(8)</span> "99219033"
                "smtp_port" => <small>string</small><span>(3)</span> "587"
                "smtp_timeout" => <small>string</small><span>(2)</span> "21"
            )</span><br />            <small>public</small> is_loaded => <small>array</small><span>(2)</span> <span>(
                0 => <small>string</small><span>(56)</span> "/var/www/framework/modules/sub.backend/config/config.php"
                1 => <small>string</small><span>(75)</span> "/var/www/framework/modules/sub.backend/modules/e_notifier/config/config.php"
            )</span><br />        }</pre><br />        <small>public</small> router => <small>object</small> <span class="object">OB_Router(12)</span> <pre>{<br />            <small>public</small> uri => <small>object</small> <span class="object">OB_Uri(7)</span> <pre>{<br />                <small>public</small> keyval => <small>array</small><span>(0)</span> <br />                <small>public</small> uri_string => <small>string</small><span>(8)</span> "/backend"<br />                <small>public</small> sub_module => <small>string</small><span>(7)</span> "backend"<br />                <small>public</small> segments => <small>array</small><span>(0)</span> <br />                <small>public</small> rsegments => <small>array</small><span>(3)</span> <span>(
                    0 => <small>string</small><span>(5)</span> "hello"
                    1 => <small>string</small><span>(5)</span> "hello"
                    2 => <small>string</small><span>(5)</span> "index"
                )</span><br />                <small>public</small> cache_time => <small>string</small><span>(0)</span> ""<br />                <small>public</small> extension => <small>string</small><span>(0)</span> ""<br />            }</pre><br />            <small>public</small> config => <small>NULL</small><br />            <small>public</small> hmvc => <small>bool</small> FALSE<br />            <small>public</small> hmvc_response => <small>string</small><span>(0)</span> ""<br />            <small>public</small> routes => <small>array</small><span>(3)</span> <span>(
                "404_override" => <small>string</small><span>(0)</span> ""
                "index_method" => <small>string</small><span>(5)</span> "index"
                "backend" => <small>string</small><span>(11)</span> "hello/index"
            )</span><br />            <small>public</small> error_routes => <small>array</small><span>(0)</span> <br />            <small>public</small> class => <small>string</small><span>(5)</span> "hello"<br />            <small>public</small> method => <small>string</small><span>(5)</span> "index"<br />            <small>public</small> directory => <small>string</small><span>(5)</span> "hello"<br />            <small>public</small> subfolder => <small>string</small><span>(0)</span> ""<br />            <small>public</small> uri_protocol => <small>string</small><span>(4)</span> "auto"<br />            <small>public</small> default_controller => <small>string</small><span>(13)</span> "welcome/index"<br />        }</pre><br />        <small>public</small> uri => <small>object</small> <span class="object">OB_Uri(7)</span> <pre>{<br />            <small>public</small> keyval => <small>array</small><span>(0)</span> <br />            <small>public</small> uri_string => <small>string</small><span>(8)</span> "/backend"<br />            <small>public</small> sub_module => <small>string</small><span>(7)</span> "backend"<br />            <small>public</small> segments => <small>array</small><span>(0)</span> <br />            <small>public</small> rsegments => <small>array</small><span>(3)</span> <span>(
                0 => <small>string</small><span>(5)</span> "hello"
                1 => <small>string</small><span>(5)</span> "hello"
                2 => <small>string</small><span>(5)</span> "index"
            )</span><br />            <small>public</small> cache_time => <small>string</small><span>(0)</span> ""<br />            <small>public</small> extension => <small>string</small><span>(0)</span> ""<br />        }</pre><br />        <small>public</small> output => <small>object</small> <span class="object">OB_Output(5)</span> <pre>{<br />            <small>public</small> final_output => <small>NULL</small><br />            <small>public</small> cache_expiration => <small>integer</small> 0<br />            <small>public</small> headers => <small>array</small><span>(0)</span> <br />            <small>public</small> enable_profiler => <small>bool</small> FALSE<br />            <small>public</small> parse_exec_vars => <small>bool</small> TRUE<br />        }</pre><br />    }</pre>
    1 => <small>string</small><span>(5)</span> "index"
)</span></td></tr><tr><td>1</td><td><small>array</small><span>(0)</span> </td></tr></table></div></div></div>                
                <span class="errorfile" style="line-height: 1.8em;">
                <a href="javascript:void(0);" onclick="Obullo_Error_Toggle('error_toggle_' + '4f2c7d2f5352f_5');">BASE/core/Bootstrap.php (  Line : 193 ) </a>
                </span>
        
                <div id="error_toggle_4f2c7d2f5352f_5"  class="collapsed" ><pre class="source"><code><span class="line"><span class="number">188</span>         }
</span><span class="line"><span class="number">189</span>         
</span><span class="line"><span class="number">190</span>         //                                                                     0       1       2
</span><span class="line"><span class="number">191</span>         // Call the requested method. Any URI segments present (besides the directory/class/method) 
</span><span class="line"><span class="number">192</span>         // will be passed to the method for convenience
</span><span class="line highlight"><span class="number">193</span>         call_user_func_array(array($OB, $GLOBALS['m']), $arguments);
</span><span class="line"><span class="number">194</span>         
</span><span class="line"><span class="number">195</span>         benchmark_mark('execution_time_( '.$page_uri.' )_end');  // Mark a benchmark end point 
</span><span class="line"><span class="number">196</span>         
</span><span class="line"><span class="number">197</span>         // Write Cache file if cache on ! and Send the final rendered output to the browser
</span><span class="line"><span class="number">198</span>         $output-&gt;_display();
</span></code></pre></div>                 
    <div class="error_file" style="line-height: 2em;">ob_system_run()</div>                
                <span class="errorfile" style="line-height: 1.8em;">
                <a href="javascript:void(0);" onclick="Obullo_Error_Toggle('error_toggle_' + '4f2c7d2f54d70_6');">ROOT/index.php (  Line : 155 ) </a>
                </span>
        
                <div id="error_toggle_4f2c7d2f54d70_6"  class="collapsed" ><pre class="source"><code><span class="line"><span class="number">150</span>   
</span><span class="line"><span class="number">151</span> 
</span><span class="line"><span class="number">152</span> ob_include_files();
</span><span class="line"><span class="number">153</span> ob_set_headers();
</span><span class="line"><span class="number">154</span> 
</span><span class="line highlight"><span class="number">155</span> ob_system_run();
</span><span class="line"><span class="number">156</span> ob_system_close();</span></code></pre></div>                 
    
         
    

</div>


<script language="JavaScript">
function delete_file(uniqid)
{
    input_box = confirm("Are you sure you want to delete this file from server ?");
     
    if(input_box) 
    {       
        document.forms["error_form"].submit();
    }
}
</script>

</body>

</html>