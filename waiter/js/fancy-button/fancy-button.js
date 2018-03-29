(function ($) {
    $.fn.extend({
        fancybutton: function () {
            return this.each(function () {
                var element = $(this);
                var isRadio = element.attr('type') === 'radio';
                if (isRadio) {
                    element.addClass('fancy-radio');
                    var fakeRadio = $('<div/>');
                    fakeRadio.addClass('fancy-radio');
                    fakeRadio.css('position', 'relative');
                    fakeRadio.css('display', 'inline-block');
                    fakeRadio.css('position', 'relative');
                    fakeRadio.css('padding-left', '2px');
                    fakeRadio.css('padding-right', '2px');
                    fakeRadio.css('z-index', '1000');
                    element.css('z-index', '-100');
                    element.after(fakeRadio);
                    element.css('position', 'relative');
                    element.css('display', 'none');
                    fakeRadio.click(function () {
                        element.attr('checked', true);
                        var allRadios = $('input:radio[name=' + element.attr('name') + ']');
                        allRadios.each(function () {
                            $(this).next('div').removeClass('on');
                        });
                        if (element.is(':checked')) {
                            fakeRadio.addClass('on');
                        }
                        else {
                            fakeRadio.removeClass('on');
                        }
                    });

                }
                else 
                {
                    element.addClass('fancy-checkbox');
                    var fakeCheckbox = $('<div/>');
                    fakeCheckbox.addClass('fancy-checkbox');
                    fakeCheckbox.css('position', 'relative');
                    fakeCheckbox.css('display', 'inline-block');
                    fakeCheckbox.css('position', 'relative');
                    fakeCheckbox.css('padding-left', '2px');
                    fakeCheckbox.css('padding-right', '2px');
                    fakeCheckbox.css('z-index', '1000');
                    element.css('z-index', '-100');
                    element.after(fakeCheckbox);
                    element.css('position', 'relative');
                    element.css('display', 'none');
                    fakeCheckbox.click(function () {
                        if (element.attr('checked'))
                            element.attr('checked', false);
                        else
                            element.attr('checked', true);

                        if (element.is(':checked')) {
                            fakeCheckbox.addClass('on');
                        }
                        else {
                            fakeCheckbox.removeClass('on');
                        }
                    });
                }

            });
        }
    });
})(jQuery);