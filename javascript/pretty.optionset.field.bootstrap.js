(function ($) {

    $.fn.extend({
        ssPrettyOptionset: function (opts) {
            return $(this).each(function () {
                var config = $.extend(opts || {}, $(this).data(), $(this).data('prettyoptionsetconfig'), {});
                if ($(this).hasClass('po-applied')) return; // already applied
                $(this).addClass('po-applied').prettyCheckable(config);
                $(this).blur().focus(); // trigger show
            });
        }
    });

    $(window).on('load', function () {
        $('.prettyoptionsetfield').ssPrettyOptionset();
    });

}(jQuery));