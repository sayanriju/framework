(function() {
  (function($, window) {
    return $.fn.notification = function(type, message, view) {
      var $notification, icon, notification_content, self;
      self = this;
      self.find('.notification').remove();
      /* icon = {
        success: 'accept',
        error: 'exclamation',
        info: 'information',
        warn: 'error'
      };
      */
      notification_content = '<div class="notification notification-' + type + '">' + message + '</div>';

      if(view){
          notification_content += '<div class="notification-view margin-top border rounded padding-big">' + view + '</div>';
      }

      $notification = $('<div>', {
        /* 'class': "notification notification-" + type,*/
        html:  notification_content,
        click: function() {
            /*
          return $notification.fadeOut('fast', function() {
            return $notification.remove();
          });
            */
        }
      }).hide();

      if (type === 'success') {

          /*
        setTimeout(function() {
          return $notification.fadeOut('slow', function() {
            return $notification.remove();
          });
        }, 3000);
        */
      }
      if (self.data('inline-edit')) {
        self.parent().before($notification.fadeIn('fast'));
      } else {
        self.parent().prepend($notification.fadeIn('fast'));
      }
      return self;
    };
  })(jQuery, this);
}).call(this);

