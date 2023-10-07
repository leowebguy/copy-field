(() => {
    'use strict';
    console.log('0');

    const c = document.querySelectorAll('.clickCopy');

    const copy = (el) => {
        // const f = document.activeElement;
        const t = el.previousElementSibling;

        // t.focus();
        t.setSelectionRange(0, t.value.length);

        let s;

        try {
            s = document.execCommand('copy');
            console.log('2');
        } catch (e) {
            console.warn(e);
            s = false;
        }

        // if (f && typeof f.focus === 'function') {
        //   f.focus();
        // }

        if (s) {
            console.log('3');
            console.log(s);
            el.classList.add('flash');
            setTimeout(() => {
                el.classList.remove('flash');
            }, 700);
        }

        return s;
    };

    [].forEach.call(c, (el) => {
        el.addEventListener('click', () => {
            console.log('1');
            copy(el);
        });
    });
});
