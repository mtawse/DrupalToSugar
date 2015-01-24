/**
 * @author Martin Tawse martintawse@gmail.com
 * Date: 24/01/2015
 */

(function ($) {

    Drupal.behaviors.pathFieldsetSummaries = {
        attach: function (context) {
            $('fieldset.sugar-module-form', context).drupalSetSummary(function (context) {
                var sugarcrmModule = $('.form-item-sugar-module select').val();

                return sugarcrmModule ?
                    Drupal.t('@sugarcrm_module', { '@sugarcrm_module': sugarcrmModule }) :
                    Drupal.t('No module selected');
            });
        }
    };

})(jQuery);