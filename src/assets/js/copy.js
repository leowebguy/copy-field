(($) => {
    'use strict';

    $('.clipCopy').click((e) => {
        copy(e.target);
    });

    const copy = (el) => {
        let txt = $(el).prev() || false;

        navigator.clipboard.writeText(txt.val())
            .then(() => {
                $(el).addClass('success');
                setTimeout(() => {
                    $(el).removeClass('success');
                }, 1000);
                // console.log(txt.val());
            })
            .catch((err) => {
                $(el).addClass('error');
                setTimeout(() => {
                    $(el).removeClass('error');
                }, 1000);
                console.warn(err);
            });
    };
})(jQuery);
