			</div> <!-- end #container -->

			<footer role="contentinfo">
			
				<div id="outer-footer" class="clearfix">
					<span class="outer-nipple"></span>
				</div>
			
				<div id="inner-footer" class="clearfix">
						
					<span class="inner-nipple"></span>
	
					<p class="attribution"> Copyright Simpson House Preserve Factory, 2012 </p>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		<!-- scripts are now optimized via Modernizr.load -->	
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
		
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

		<script type="text/javascript">
		(function($) {
		$.fn.randomize = function(selector){
		    var $elems = selector ? $(this).find(selector) : $(this).children(),
		        $parents = $elems.parent();

		    $parents.each(function(){
		        $(this).children(selector).sort(function(){
		            return Math.round(Math.random()) - 0.5;
		        }).remove().appendTo(this);
		    });

		    return this;
		};
		})(jQuery);
		</script>

		<script type="text/javascript">
			$(window).load(function(){
				var path = '<?php echo get_template_directory_uri(); ?>/library/images/carousel/';
		        var images = [
		        
		          { image: 'label-1.png', cls: 'mask1' }, 
		          { image: 'label-2.png', cls: 'mask2' }, 
		          { image: 'label-3.png', cls: 'mask3' },
		          { image: 'label-4.png', cls: 'mask4' }
		          
		        ];

		        $('.mask').each(function () {

		            var random = Math.floor(Math.random() * images.length);
		            var result = images[random].image;
		            var fullPath = path + result;

		            $(this).attr('src', fullPath).addClass(images[random].cls);

		        });
			});
			$(document).ready(function(){
				$('.randomize').click(function() {
		        	$('ul.slides').randomize();
		        });
			});
		</script>

	</body>

</html>