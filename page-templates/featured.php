<?php
/**
* Template Name: Featured
*
* Designed to be the front page, but can be used for anything.
*
* @package WordPress
* @subpackage Annona
* @since 1.0
*/
get_header();
?>
		<button class='menu-toggle banner-section-clickable' role="presentation"><i class="fas fa-bars fa-2x"></i></button> 
		<div class="hero">
			<div class="img-featured">
				<!--<div class="mask">-->
				<?php if ( is_front_page() ) : ?>
					<h1 class="site-title "><span class="annona-text-mask"><?php bloginfo( 'name ' ) ?></span></h1>
				<?php endif; ?>
				<a href="#featured-secondary" class="skip-to-cta banner-section-clickable">
					<span class="screen-reader-text"><?php esc_html_e( 'Restaurant Information', 'annona' ); ?></span>
					<!--<span class="dashicons dashicons-arrow-down-alt2"></span>-->
					<i class="fas fa-caret-down"></i>
				</a>
				<!--</div>-->
			</div>
		</div>
		<section id="featured-secondary" class="secondary-img-section">
			<div class="img-second">
				<div class="mask">
					<a href='#' class='btn-link'>Order Delivery</a>
				</div>
			</div>
			<div class="img-second">
				<div class="mask">
					<a href='#' class='btn-link'>View Our Menu</a>
				</div>
			</div> 
		</section>
		<section id="section-3" class='section-3'>
			<div>
				<?php 
				//print_r(get_theme_mod( 'annona-sec3-content1' ));
				echo apply_filters( 'the_content', get_the_content( null, null, get_theme_mod( 'annona-sec3-content1' ))); 
				//echo get_the_content( null, null, get_theme_mod( 'annona-sec3-content1' ));
				//echo apply_filters( 'the_excerpt', get_the_excerpt( get_theme_mod( 'annona-sec3-content1' )));
				?>
			</div>

			<div>
				<?php echo apply_filters( 'the_content', get_the_content( null, null, get_theme_mod( 'annona-sec3-content2' ))); ?>
			</div>
			<div>
				<?php echo apply_filters( 'the_content', get_the_content( null, null, get_theme_mod( 'annona-sec3-content3'  ))) ?>
			</div>
		</section>
		<!--<div id="section-5" class="section-5" >
			<div class="parallax-container">  
			style="background-image: url(<?php annona_background_image( 'annona-sec5-featured-image', 'full' )?>);"
			<div class="background">
			    <?php 
			    $attachment_id = get_theme_mod('annona-sec5-featured-image', null );
			    echo wp_get_attachment_image( $attachment_id, 'full', false, array( 'class' => 'image background__image' )); 
				/*echo wp_get_attachment_image( 2258, 'full', false, array( 'class' => 'image middle__image') );
				echo wp_get_attachment_image( 89, 'full', false, array( 'class' => 'image foreground__image') );*/
				?>
			</div>
			<div class="foreground">
			    <div class="foreground__content">
			      <h1>Oooo, parallax</h1>
			    </div>
			</div>
			<?php //var_dump( wp_get_attachment_image_src( get_theme_mod( 'annona-sec5-featured-image', null ), 'full')); ?>
		</div>
		</div>-->
		<div id="section-4" class="section-4" >
			<section class="parallax bg1">
				<?php
				$attachment = get_theme_mod( 'annona-sec4-featured-image', false ); 
				if ( $attachment ){
					echo wp_get_attachment_image( $attachment , 'full', false, array( 'class' => 'parallax-image' )); 
				}  
				?>
			</section>
			<div class="parallax-content">
				<?php
				$show_content = get_theme_mod( 'annona-show-section-4-text', false );
				$message = get_theme_mod( 'annona-sec4-message' , '' );
				
				if ( $show_content ):
					?>
					<div class="sec-4-tagline">
						<p>
							<?php annona_section_4_tagline(); ?>
						</p>
					</div>
					<div class="sec-4-content">
						<p><?php echo esc_html( $message ) ?></p>
					</div>
				<?php endif; ?>
				<!--<h2 class="parallax-overlay-title"><?php bloginfo('description') ?></h2>-->
			</div>
		</div>
			<!--<div id="section-4" class="section-4" >
			style="background-image: url(<?php annona_background_image( 'annona-sec5-featured-image', 'full' )?>);"
			<section class="parallax bg1">
				<?php
				$attachment = get_theme_mod( 'annona-sec4-featured-image', false ); 
				if ( $attachment ){
					echo wp_get_attachment_image( $attachment , 'full', false, array( 'class' => 'parallax-image' )); 
				} 
				?>
			</section>
			<div class="parallax-content">
				 <?php 
				 $tagline = get_theme_mod( 'annona-sec4-tagline', '' );
				if ( $tagline ):
					$tagline_color = get_theme_mod( 'annona-sec4-tagline-color', '#404040' );
					$text_mask = get_theme_mod( 'annona-sec4-text-mask' , false ) ? 'annona-text-mask' : '';
					?>
					<div class="sec-4-title sec-4-tagline">
						<p 
						class="<?php echo $text_mask; ?>"
						style="color: <?php echo esc_attr($tagline_color) ?>">
						<?php echo esc_html( $tagline ) ?>
						</p>
					</div>
				<?php endif; ?>
				<h2 class="parallax-overlay-title"><?php bloginfo('description') ?></h2>
			</div>
		</div>-->
		<article id="section-5" class="section-5">
			<?php annona_testimonials(); ?>
		</article>
		<article id="section-6" class="section-6">
			<div class="section-6-backdrop">
			<!--<svg xmlns="http://www.w3.org/2000/svg" class="gate-image" viewBox="0 0 1002.71 593.53"><defs><style>.cls-1,.cls-3{fill:none;stroke:#eee;stroke-miterlimit:10;stroke-width:3px;}.cls-1,.cls-2{opacity:1;}</style></defs><title>gate-3</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M39,576.33c8-4.32,11.42-13.55,8.51-20.68-3.49-8.54-14.24-9.8-20.68-8.5-6.77,1.36-13.42,6.54-15.08,13.14C9.16,570.56,19,585.14,38,590.44c5.72,1.35,22,4.36,35.75-4.63,21.43-14,18.84-45.35,18-55.47-2.41-28.49-20-65.58-45-66.88-14.08-.73-26.74,10.09-29.19,12.18-5.44,4.65-16.11,13.77-16,27.25.07,14,11.71,30.69,26.28,30.15,16.39-.61,29.55-22.76,23.59-33.82-3.29-6.09-12.46-12.07-20.68-8.51-6.93,3-11,11.81-8.51,20.68"/><path class="cls-1" d="M963.3,576c-8-4.32-11.41-13.55-8.5-20.68,3.48-8.54,14.24-9.8,20.68-8.5,6.77,1.36,13.41,6.54,15.07,13.14,2.58,10.27-7.25,24.84-26.28,30.15-5.72,1.35-22,4.36-35.76-4.63-21.42-14-18.83-45.35-18-55.47,2.42-28.49,20-65.58,45-66.88,14.08-.73,26.74,10.09,29.18,12.18,5.45,4.65,16.11,13.76,16,27.25-.07,14-11.71,30.69-26.28,30.15-16.39-.61-29.54-22.76-23.58-33.82,3.28-6.1,12.45-12.08,20.68-8.51,6.92,3,11,11.8,8.5,20.68"/><g class="cls-2"><path class="cls-3" d="M463.77,485.89c5.09,7.6,3.73,17.32-2.18,22.26-7.08,5.91-17.17,2-22.25-2.18-5.34-4.38-8.79-12.07-7.16-18.68,2.54-10.28,18.06-18.54,37.35-14.31,5.69,1.49,21.47,6.45,29.41,20.85,12.37,22.41-4.61,48.89-10.12,57.43-15.48,24-48.37,48.57-71.12,38-12.78-6-18.9-21.44-20.08-24.43-2.63-6.67-7.77-19.72-1.39-31.6,6.62-12.33,24.73-21.62,37.35-14.31,14.19,8.22,15.43,34,5,40.93-5.75,3.84-16.66,4.83-22.25-2.18-4.71-5.9-4.18-15.58,2.18-22.25"/><path class="cls-3" d="M542.59,486.08c-5.08,7.6-3.73,17.32,2.18,22.26,7.09,5.91,17.18,2,22.26-2.18,5.34-4.38,8.78-12.07,7.15-18.68-2.53-10.28-18-18.54-37.35-14.31-5.68,1.49-21.47,6.45-29.41,20.85-12.36,22.42,4.62,48.89,10.12,57.43,15.49,24,48.37,48.57,71.13,38,12.78-5.95,18.89-21.44,20.07-24.43,2.63-6.67,7.78-19.72,1.4-31.6-6.63-12.33-24.73-21.62-37.35-14.31-14.19,8.22-15.43,33.95-5,40.93,5.76,3.84,16.66,4.83,22.25-2.18,4.71-5.9,4.19-15.58-2.18-22.25"/></g><path class="cls-1" d="M972.8,86.67c1.33-9-4.07-17.24-11.53-19.16-8.94-2.3-16.36,5.59-19.16,11.53-3,6.25-2.75,14.67,1.56,19.94,6.7,8.19,24.26,9,39.87-3.12,4.5-3.79,16.62-15,17.61-31.46,1.54-25.55-25.16-42.16-33.8-47.52-24.31-15-64.54-23.09-80.54-3.74-9,10.87-7.85,27.48-7.63,30.69C879.66,51,880.62,65,891.48,73c11.28,8.29,31.62,8.91,39.88-3.11,9.28-13.52-.65-37.29-13.08-39.1-6.85-1-17.12,2.79-19.16,11.52-1.72,7.35,2.91,15.87,11.52,19.16"/><path class="cls-1" d="M31.36,86.43c-1.33-9,4.07-17.25,11.52-19.16C51.82,65,59.24,72.85,62,78.79,65,85,64.8,93.46,60.49,98.73c-6.71,8.2-24.27,9-39.88-3.11C16.12,91.83,4,80.57,3,64.15,1.46,38.6,28.17,22,36.81,16.64c24.3-15.06,64.53-23.09,80.53-3.74,9,10.86,7.86,27.48,7.64,30.68-.49,7.15-1.44,21.15-12.31,29.13C101.39,81,81.05,81.62,72.79,69.6c-9.28-13.52.65-37.29,13.09-39.1C92.73,29.5,103,33.3,105,42c1.72,7.35-2.92,15.86-11.53,19.16"/><path class="cls-1" d="M136.82,1.41c-16.37,18.38-14.45,45.12.7,58.3,16.14,14,45.15,10.81,54.6-5.62,4.51-7.84,6.54-20,0-28.8-7.49-10.06-24.73-14-32.9-5.62-6.93,7.09-3.78,19.35-3.5,20.37"/><path class="cls-1" d="M867.44,1.63c16.37,18.38,14.45,45.13-.7,58.31-16.14,14-45.16,10.8-54.6-5.62-4.51-7.84-6.54-20,0-28.8,7.49-10.07,24.72-14,32.9-5.62,6.93,7.09,3.77,19.35,3.5,20.37"/><g class="cls-2"><path class="cls-3" d="M520.92,398.14c.29-.72,2-4.82,6-6,5.1-1.51,10.68,2.7,12,7,2,6.35-5,14.15-12,16-10,2.65-22.1-6.39-23-16-1-11,12.75-19.93,24-21,13.65-1.3,25.65,8.88,30,20,3.24,8.3,1.13,16.07,0,20-8.12,28.29-44.44,39.45-50,41.08l-5,45.66"/><path class="cls-3" d="M485.65,398.14c-.28-.72-2-4.82-6-6-5.1-1.51-10.68,2.7-12,7-1.94,6.35,5,14.15,12,16,10,2.65,22.1-6.39,23-16,1-11-12.74-19.93-24-21-13.64-1.3-25.65,8.88-30,20-3.24,8.3-1.12,16.07,0,20,8.12,28.29,44.45,39.45,50,41.08l5,45.66"/></g></g></g></svg>-->
			<svg xmlns="http://www.w3.org/2000/svg" class="gate gate-top-left" viewBox="0 0 194.35 104.31"><defs><style>.cls-1{fill:none;stroke:#cbd280;stroke-miterlimit:10;}</style></defs><title>gate-top-left</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M28.92,85.43c-1.33-9,4.07-17.25,11.52-19.16C49.38,64,56.8,71.85,59.6,77.79c2.95,6.25,2.76,14.67-1.55,19.94-6.71,8.2-24.27,9-39.88-3.11C13.68,90.83,1.55,79.57.56,63.15-1,37.6,25.73,21,34.37,15.64,58.67.58,98.9-7.45,114.9,11.9c9,10.86,7.85,27.48,7.64,30.68-.49,7.15-1.45,21.15-12.31,29.13C99,80,78.61,80.62,70.35,68.6,61.07,55.08,71,31.31,83.44,29.5c6.84-1,17.11,2.8,19.16,11.53,1.72,7.35-2.92,15.86-11.53,19.16"/><path class="cls-1" d="M134.38.41c-16.38,18.38-14.45,45.12.7,58.3,16.14,14,45.15,10.81,54.6-5.62,4.51-7.84,6.54-20,0-28.8-7.49-10.06-24.73-14-32.9-5.62C149.85,25.76,153,38,153.28,39"/></g></g></svg>
			<svg xmlns="http://www.w3.org/2000/svg" class="gate gate-bottom-left" viewBox="0 0 91.83 129.6"><defs><style>.cls-1{fill:none;stroke:#cbd280;stroke-miterlimit:10;}</style></defs><title>gate-bottom-left</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M38,113.41c8-4.33,11.42-13.55,8.51-20.68-3.49-8.55-14.24-9.8-20.68-8.51-6.77,1.37-13.42,6.54-15.08,13.14C8.16,107.63,18,122.21,37,127.52c5.72,1.34,22,4.36,35.75-4.64,21.43-14,18.84-45.34,18-55.47-2.41-28.49-20-65.57-45-66.87C31.65-.19,19,10.62,16.54,12.71,11.1,17.37.43,26.48.5,40c.07,14,11.71,30.7,26.28,30.15,16.39-.61,29.55-22.76,23.59-33.82-3.29-6.09-12.46-12.07-20.68-8.5-6.93,3-11,11.8-8.51,20.68"/></g></g></svg>
			<svg xmlns="http://www.w3.org/2000/svg" class="gate gate-bottom-center" viewBox="0 0 221.04 214.92"><defs><style>.cls-1{fill:none;stroke:#cbd280;stroke-miterlimit:10;}</style></defs><title>gate-bottom-center</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M71.11,108.36c5.09,7.6,3.73,17.32-2.18,22.26-7.08,5.91-17.17,2-22.25-2.18-5.35-4.38-8.79-12.07-7.16-18.68,2.54-10.28,18-18.54,37.35-14.31,5.69,1.49,21.47,6.45,29.41,20.85,12.37,22.42-4.62,48.89-10.12,57.43-15.49,24-48.37,48.57-71.12,38C12.25,205.74,6.14,190.25,5,187.26c-2.63-6.67-7.78-19.72-1.39-31.59C10.19,143.33,28.3,134,40.92,141.35c14.19,8.22,15.42,34,5,40.93-5.75,3.85-16.66,4.83-22.25-2.18-4.71-5.9-4.18-15.58,2.18-22.25"/><path class="cls-1" d="M149.93,108.55c-5.08,7.6-3.73,17.32,2.18,22.26,7.08,5.91,17.17,2,22.25-2.18,5.35-4.38,8.79-12.07,7.16-18.68C179,99.67,163.47,91.41,144.17,95.64c-5.68,1.49-21.47,6.45-29.41,20.86-12.36,22.41,4.62,48.88,10.12,57.42,15.49,24,48.37,48.57,71.13,38,12.78-5.95,18.89-21.44,20.07-24.43,2.63-6.67,7.78-19.72,1.4-31.59-6.63-12.34-24.74-21.63-37.36-14.32-14.19,8.23-15.42,34-5,40.93,5.76,3.85,16.66,4.83,22.25-2.18,4.71-5.9,4.19-15.58-2.18-22.25"/><path class="cls-1" d="M128.26,20.61c.29-.72,2-4.82,6-6,5.1-1.51,10.68,2.7,12,7,2,6.36-5,14.15-12,16-10,2.65-22.1-6.39-23-16-1-11,12.75-19.93,24-21,13.64-1.3,25.65,8.88,30,20,3.24,8.3,1.12,16.07,0,20-8.12,28.29-44.45,39.45-50,41.08l-5,45.66"/><path class="cls-1" d="M93,20.61c-.29-.72-2-4.82-6-6-5.1-1.51-10.68,2.7-12,7C73,28,80,35.76,87,37.61c10,2.65,22.1-6.39,23-16,1-11-12.75-19.93-24-21-13.64-1.3-25.65,8.88-30,20-3.24,8.3-1.12,16.07,0,20,8.12,28.29,44.45,39.45,50,41.08l5,45.66"/></g></g></svg>
			<svg xmlns="http://www.w3.org/2000/svg" class="gate gate-top-right" viewBox="0 0 194.25 104.31"><defs><style>.cls-1{fill:none;stroke:#cbd280;stroke-miterlimit:10;}</style></defs><title>gate-top-right</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M165.34,85.43c1.33-9-4.07-17.25-11.53-19.16-8.94-2.3-16.36,5.58-19.16,11.52-3,6.25-2.75,14.67,1.56,19.94,6.7,8.2,24.26,9,39.87-3.11,4.5-3.79,16.62-15.05,17.61-31.47,1.54-25.55-25.16-42.16-33.8-47.51C135.58.58,95.35-7.45,79.35,11.9c-9,10.86-7.85,27.48-7.63,30.68.48,7.15,1.44,21.15,12.3,29.13C95.3,80,115.64,80.62,123.9,68.6c9.28-13.52-.65-37.29-13.08-39.1C104,28.5,93.7,32.3,91.66,41c-1.72,7.35,2.91,15.86,11.52,19.16"/><path class="cls-1" d="M60,.38c16.37,18.39,14.45,45.13-.7,58.31-16.14,14-45.16,10.81-54.6-5.62-4.51-7.84-6.54-20,0-28.8,7.49-10.06,24.72-14,32.9-5.62C44.51,25.74,41.35,38,41.08,39"/></g></g></svg>
			<svg xmlns="http://www.w3.org/2000/svg" class="gate gate-bottom-right" viewBox="0 0 91.83 129.6"><defs><style>.cls-1{fill:none;stroke:#cbd280;stroke-miterlimit:10;}</style></defs><title>gate-bottom-right</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M53.83,113.41c-8-4.33-11.41-13.55-8.5-20.68,3.49-8.55,14.24-9.8,20.68-8.51,6.77,1.37,13.42,6.54,15.08,13.14,2.57,10.27-7.26,24.85-26.29,30.16-5.72,1.34-22,4.36-35.76-4.64-21.42-14-18.83-45.34-18-55.47C3.48,38.92,21,1.84,46.1.54,60.18-.19,72.84,10.62,75.28,12.71c5.45,4.66,16.12,13.77,16,27.25C91.25,54,79.62,70.66,65,70.11,48.65,69.5,35.5,47.35,41.46,36.29c3.28-6.09,12.45-12.07,20.68-8.5,6.92,3,11,11.8,8.51,20.68"/></g></g></svg>
			<?php
			while ( have_posts() ) :
				the_post();

				the_title('<h2 class="page-title">', '</h2>');
				?>
				<div class="entry-content">
				<?php the_content(); ?>
				</div>
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			</div><!--.section-6-backdrop-->
		</article><!-- #main -->
		</div><!--.content-->
<?php
get_footer();