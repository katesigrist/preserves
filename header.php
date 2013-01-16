<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
		wp_title( '-', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' - ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
		?></title>
		
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

		<!-- default stylesheet -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/normalize.css">	
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/flexslider.css">	
		
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
		
		<!-- drop Google Analytics Here -->
		<!-- end analytics -->
		
		<!-- modernizr -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/modernizr.full.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/mylibs/jquery.flexslider.js"></script>
  		<!--script src="<?php echo get_template_directory_uri(); ?>/library/js/mylibs/jquery.bxSlider.min.js"></script-->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		
	</head>
	
	<body <?php body_class(); ?>>
	
				<header role="banner">
			
				<div id="inner-header" class="clearfix">
					
					<a href="<?php echo home_url(); ?>"><p id="logo" class="h1"><?php bloginfo('name'); ?></p></a>
					
					<? // php bloginfo('description'); ?>
					
				   <!--nav role="navigation">
						<?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
					</nav-->
				
				</div> <!-- end #inner-header -->
				
				<div id="carousel-container" class="clearfix"> 

					<div id="carousel-top" class="clearfix">
					</div>
					
					<span id="carousel-top-nipple">
						<img class="cni" src="<?php echo get_template_directory_uri(); ?>/library/images/carousel-nipple-top.png" />
					</span>
					
					<section class="slider">
					
						<div class="flexslider carousel">

							<ul class="slides">
								
								<?php 
									$loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1, 'orderby'=> 'ASC')); 
								?>
								<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

									<li class="slide">
										<img class="mask" />
										<?php $url = get_permalink($post->ID);
											  $title = get_the_title($post->ID);
										if($url!='') { 
											echo '<a href="'.$url.'">';
											echo the_post_thumbnail('full');
											echo '</a>';
											echo '<h3 class="label"><a href="'.$url.'" title="'.$title.'">'.$title.'</a></h3>';
										} else {
											echo the_post_thumbnail('full');
										} ?>
									</li>

								<?php endwhile; ?>
								
								<?php wp_reset_query(); ?>

							</ul>

						</div>
        											    
					</section>
						
					<span id="carousel-bottom-nipple">
						<img class="cni" src="<?php echo get_template_directory_uri(); ?>/library/images/carousel-nipple-lower.png" />
					</span>
					
					<div id="carousel-bottom" class="clearfix">	
					</div>

				</div>

				<span class="randomize-nav">
					<a class="randomize" href="#">Shuffle</a>
				</span>
			
			</header> <!-- end header -->
			
		<div id="container">
			

