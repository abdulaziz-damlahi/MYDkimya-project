
/* -------------------------------------------------------------------
 [Table of contents]
 * 01.Wow Js
*/

$(function() {
    "use strict";

    // Call all ready functions
    hohor_wow_js();
});

/* ------------------------------------------------------------------- */
/* 01.Wow Js
/* ------------------------------------------------------------------- */
function hohor_wow_js() {
    "use-strict";

    wow = new WOW(
        {
        boxClass:     'wow',     
        animateClass: 'animated',
        offset:       0,
        mobile:       true,
        live:         true
      }
    );
    wow.init();
}