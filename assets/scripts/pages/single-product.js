(function($) {
    'use strict';

    let FSHandler = FS.Checkout.configure({
        plugin_id:  $('[fs-product-id]').attr('fs-product-id'),
        plan_id:    $('[fs-plan-id]').attr('fs-plan-id'),
        public_key: $('[fs-public-key]').attr('fs-public-key'),
    });
 
    $('#purchase').on('click', function (e) {
        FSHandler.open({
            licenses : $('input.license:checked').attr('id'),
            success  : function (response) {}
        });

        e.preventDefault();
    });

    $('input.license').first().prop('checked', true).trigger('change');

})(jQuery);
