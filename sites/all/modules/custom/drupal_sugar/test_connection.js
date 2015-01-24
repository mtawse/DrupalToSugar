/**
 * @author Martin Tawse martintawse@gmail.com
 * Date: 24/01/2015
 */

(function($) {
    Drupal.behaviors.myBehavior = {
        attach: function (context, settings) {
            //code starts
            $("#edit-drupal-sugar-config-test-connection").click(function() {
                alert("Hello World");
            });
        }
    };
})(jQuery);