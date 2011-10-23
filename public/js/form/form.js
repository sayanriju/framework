
/**
 * Obullo JQuery Form Validation Plugin  (c) 2011.
 *
 * PHP5 MVC Based Minimalist Software.
 *
 * @package         obullo       
 * @author          obullo.com
 * @license         public
 * @since           Version 1.1
 * @filesource
 * @license
 */

(function() {
  (function($, window) {
    $.fn.form = function(options) {
      var $base, base, settings;

      if (options == null) {
        options = {};
      }                                    
      
      base = this;
      $base = $(base.selector);
      settings = _.extend({
        error_msg: "There are some errors in the form fields !",
        success: function() {},
        error: function() {},
        before: function() {},
        on_load: function() {}
      }, options);
      
      return $base.livequery(function() {        
        var $root, method, root;

        root = this;

        $root = root.$root = $(root);
        method = root.method || 'post';

        if (!_.isEmpty(options)) {
          $root.removeData('form_plugin_active');
          $root.unbind('submit');
        }
        
        if (!$root.data('form_plugin_active')) {
          settings.on_load.call(root, $root);
          
          $root.data('form_plugin_active', true);

          return $root.bind('submit', function() { 
            var data, i;
            
            settings.before.call(root, $root);
            data = $root.find(':visible, [type="hidden"], .send_even_if_hidden').serialize();
            if (data.length) {
              data += "&SOCKET_ID=" + window.SOCKET_ID;
            } else {
              data = "SOCKET_ID=" + window.SOCKET_ID;
            }

            $root.find('input[type=submit]', this).attr('disabled', 'disabled');
            $root.find('input[type=submit]', this).addClass('disabled');
            
            $loading = $root.find('.loading_div');
            $loading.after("<div style='float:left;'><img class='loading' src='/public/images/gif/loading.gif' /></div>");

            $.ajax({
              type: method,
              url: $root.attr('action'),
              dataType: 'json',
              cache: false,
              timeout: 10000,
              data: data,
              complete: function(){   },
              success: function(r) { 
                
                $root.parent().find('.notification').remove();
                $root.find('.input-error').remove();
              
                if (!r.success) {

                  // if we have server redirect request
                  if ( typeof r.redirect !== 'undefined' && r.redirect)
                  {
                      window.location.replace(r.redirect);
                      return;
                  }
                  
                  // if we have alert request
                  if ( typeof r.alert !== 'undefined' && r.alert != '')
                  {
                      alert(r.alert);
                      return;
                  }
                  
                  $('.loading').hide();
                  $root.find('input[type=submit]', this).removeAttr('disabled');
                  $root.find('input[type=submit]', this).removeClass('disabled');

                  if (r.errors.system_message) {
                    $root.notification('error', r.errors.system_message);
                    $('.notification.notification-error').attr("tabindex", '0').focus();
                    return;
                  }

                  settings.error.call(root, r, $root);
                  if ($root.data('form.error')) {
                    $root.data('form.error').call(root, r, $root);
                  }

                  if(_.strpos($root.attr('class'), 'no-top-msg') === false)
                  {
                      $root.notification('error', settings.error_msg);
                  }
                  
                  return _.each(r.errors, function(value, key) {
                    var $input, ar_key, name;
                    ar_key = _.explode('__', key);
                    name = ar_key[0];
                    ar_key = _.rest(ar_key, 1);
                    if (ar_key.length) {
                      name = "" + name + "[" + (_.implode('][', ar_key)) + "]";
                    }

                   // added eq(0) for unique errors (radio, checkbox etc..)
                   $input = $root.find("[name='" + name + "']:visible:eq(0)"); 

                   var i = 0;
                   i = i + 1;
                   
                   if ( ! $input.prev('[class=input-error]').length) {
                        $input.before("<div class='input-error' tabindex='"+ i +"'>" + value + "</div>");
                        $root.find("[class=input-error]:visible:eq(0)").attr("tabindex", i).focus();
                   }
                    
                  });
                  
                } else {

                  // if we have a forward url request
                  if ( typeof r.forward_url !== "undefined" && r.forward_url)
                  {
                      $root.attr('action', r.forward_url);
                      document.forms[$root.attr('name')].submit();
                      return;
                  }

                  // if we have a server redirect request
                  if ( typeof r.redirect !== "undefined" && r.redirect)
                  {
                      window.location.replace(r.redirect);
                      return;
                  }

                  $('.loading').hide();
                  $('input[type=submit]', this).removeAttr('disabled');
                  $('input[type=submit]', this).removeClass('disabled');

                  settings.success.call(root, r, $root);
                  if ($root.data('form.success')) {
                    $root.data('form.success').call(root, r, $root);
                  }
                  if (r.success_msg)
                  {
                     if(r.view){
                         $root.notification('success', r.success_msg, r.view);
                     } else {
                         $root.notification('success', r.success_msg);
                     }
                    
                    $('.notification.notification-success').attr("tabindex", '0').focus();
                  } 
                  else if(settings.success_msg)
                  {
                    $root.notification('success', settings.success_msg);
                     $('.notification.notification-success').attr("tabindex", '0').focus();
                  }

                  if(_.strpos($root.attr('class'), 'hide-formarea') !== false)
                  {
                     $root.find("[id='formarea']:visible:eq(0)").hide();
                  }

                }

              }  // end success,
              
              ,error: function() { 
                  alert('Please check your internet connection !');
              return false; 
            }
           
           });
           
            return false;
          });

        }
      });
    };
    return $(function() {
      return $('form:not(.no-ajax)').form();
    });
  })(jQuery, this || exports);
}).call(this);