
 $(document).ready(function() {

     var rtime;
     var timeout = false;
     var delta = 200;
     var maxHeight = -1;

     $(window).resize(function() {
         rtime = new Date();
         if (timeout === false) {
             timeout = true;
             setTimeout(resizeend, delta);
         }
     });

     function resizeend() {
         if (new Date() - rtime < delta) {
             setTimeout(resizeend, delta);
         } else {
             timeout = false;
             eqheight();
         }
     }


     function eqheight() {
         maxHeight = -1;
         var win = $(window);
         $('.eq-height').css({
             height: ""
         });
         $('.eq-height').each(function() {
             maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
         });
         $('.eq-height').height(maxHeight);
         console.log(maxHeight);
     }

     eqheight();
 });