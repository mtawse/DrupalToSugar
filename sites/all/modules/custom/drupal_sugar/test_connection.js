/**
 * @author Martin Tawse martintawse@gmail.com
 * Date: 24/01/2015
 */

(function($) {
    Drupal.behaviors.myBehavior = {
        attach: function (context, settings) {
            //code starts
            var $statusEl = $('<span>');
            var $testButton = $("#edit-drupal-sugar-config-test-connection");
            $testButton.after($statusEl);
            $testButton.click(function() {
                var sugarURL = $('input[name=drupal_sugar_config_url]').val();
                var username = $('input[name=drupal_sugar_config_username]').val();
                var password = $('input[name=drupal_sugar_config_password]').val();
                // add status message
                $statusEl.html(Drupal.t('Testing connection...'));
                $statusEl.removeClass('success failed');
                $.ajax({
                    url: Drupal.settings.basePath + 'admin/config/services/sugar/test',
                    data: {
                        sugarURL: sugarURL,
                        username: username,
                        password: password
                    },
                    success: function(data) {
                        console.log(data);
                        $statusEl.html(Drupal.t('Success'));
                        $statusEl.addClass('success');
                        $statusEl.removeClass('failed');
                    },
                    error: function() {
                        $statusEl.html(Drupal.t('Failed'));
                        $statusEl.addClass('failed');
                        $statusEl.removeClass('success');
                    }
                })
            });
        }
    };
})(jQuery);