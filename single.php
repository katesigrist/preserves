<?php get_header(); ?>

	<?php get_sidebar(); // sidebar 1 ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col700 left first clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
							
							
							
							<p class="small-meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.</p>
							
							<figure> 
								<?php if( class_exists( 'kdMultipleFeaturedImages' ) ) {
    kd_mfi_the_featured_image( 'featured-image-2', 'post' ); } ?>
							</figure>

						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							
					
						</section> <!-- end article section -->
						
						<h2 class="the-useful-bit">The Useful Bit</h2>

						<?php  
                if ( get_post_meta(get_the_ID(), $prefix.'_medias', true)) {    
                    $medias = get_post_meta(get_the_ID(), $prefix.'_medias', true);
                    $medias = substr($medias, 3);
                    $medias = explode('~~~', $medias);
                    
                    $output_medias = '';
                    foreach ($medias as $media) {
                        $object = explode('~~', $media);
                        $type = $object[0];
                        $id = $object[1];
                        $val = $object[2];
                        
                        if (get_option($prefix.'_slider') == 'on') { $output_medias .= "<li>"; };
                        if ($type == 'image') { 
                            $image = wp_get_attachment_image_src($val, 'full'); $image = $image[0];
                            $thisimage = '<img src="'.$image.'" alt=""/>';
                            if(get_option($prefix.'_fancybox') == "on") {
                                $output_medias .= '<div class="mediaitem"><a href="'.$image.'" class="openfancybox" rel="gallery'.get_the_ID().'">'.$thisimage.'</a></div>';
                            } else {
                                $output_medias .= '<div class="mediaitem">'.$thisimage.'</div>';
                            }
                        } else {
                            $output_medias .= '<div class="mediaitem"><div class="embeddedvideo">'.$val.'</div></div>';
                        }
                        if (get_option($prefix.'_slider') == 'on') { $output_medias .= "</li>"; };
                    }
                    
                    
                    if (get_option($prefix.'_slider') == 'on') { ?>
                    
                        <div id="slider">        
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php echo $output_medias; ?>
                                </ul>
                            </div>
                        </div>
                    
                    <?php 
                    } else {
                        echo '<div class="medias clearfix">'.$output_medias.'</div>';
                    }
                }
                
                ?>
						
						<h2>You'll Be Needing</h2>

						<p><?php global $simple_mb; $needing = $simple_mb->the_value('be_needing'); ?></p>

						<h2>How we made it</h2>

						<p><?php global $simple_mb; $made = $simple_mb->the_value('how_we_made_it'); ?></p>
						
<!-- 						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<div class="meta"> 
						<span class="top"></span>
							<p>STILL HUNGRY? THEN YOU MIGHT LIKE...</p>
							<p class="clearfix"><?php the_category(', '); ?></p>
						<span class="bottom"></span>
					</div>
					
					<?php comments_template(); ?>
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1>Not Found</h1>
					    </header>
					    <section class="post_content">
					    	<p>Sorry, but the requested resource was not found on this site.</p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>