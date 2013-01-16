/* =============================================================================
   Namespace definition
   ========================================================================== */

   if ( ! preserves )
   		var preserves = {};


 /* =============================================================================
   Carousel
   ========================================================================== */

   preserves.carousel = function(){

   		this.init = function(){

        $('.flexslider').flexslider({
          animation: "slide",
          animationLoop: true,
          controlNav: false,
          randomize: true,
          itemWidth: 210,
          itemMargin: 5,
          start: function(slider){
            $('body').removeClass('loading');
          }
        });

   		};

   };


/* =============================================================================
   Document ready
   ========================================================================== */

$(document).ready(function(){
	var carouselLoad = new preserves.carousel();
	carouselLoad.init();
});




