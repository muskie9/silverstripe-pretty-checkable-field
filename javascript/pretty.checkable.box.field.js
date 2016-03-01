(function ($) {

    $.fn.extend({
        ssPrettyCheckable: function (opts) {
            return $(this).each(function () {
                var config = $.extend(opts || {}, $(this).data(), $(this).data('prettycheckableconfig'), {});
                if ($(this).hasClass('pc-applied')) return; // already applied
                $(this).addClass('pc-applied').prettyCheckable(config);
                $(this).blur().focus(); // trigger show
            });
        }
    });

    $(window).on('load', function () {
        $('.prettycheckablefield').ssPrettyCheckable();
    });

}(jQuery));