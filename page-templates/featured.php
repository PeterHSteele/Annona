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
			<div 
			class="img-featured"
			style="background-image: url(<?php annona_background_image( 'annona-sec1-featured-image', 'full' ) ?>);">
				<?php if ( is_front_page() ) : ?>
					<h1 class="site-title "><span class="annona-text-mask"><?php bloginfo( 'name ' ) ?></span></h1>
				<?php endif; ?>
				<a href="#links" class="skip-to-cta banner-section-clickable">
					<span class="screen-reader-text"><?php esc_html_e( 'Restaurant Information', 'annona' ); ?></span>
					<i class="fas fa-caret-down"></i>
				</a>
			</div>
		</div>
		<section id="featured-links" class="secondary-img-section">
			<div class="img-second" style="background-image: url(<?php annona_background_image( 'annona_featured_sec2_image1' ) ?>)">
				<div class="mask">
					<a 
					href="<?php echo esc_url( get_theme_mod( 'annona-featured-sec2-link-href1', '#featured-links' )) ?>" 
					class='btn-link'>
					<?php echo esc_html( get_theme_mod( 'annona-featured-sec2-link-text1' ), '' ) ?>
					</a>
				</div>
			</div>
			<div class="img-second" style="background-image: url(<?php annona_background_image( 'annona_featured_sec2_image2' ) ?>)">
				<div class="mask">
					<a 
					href="<?php echo esc_url( get_theme_mod( 'annona-featured-sec2-link-href2', '#featured-links' )) ?>"  
					class='btn-link'>
					<?php echo esc_html( get_theme_mod( 'annona-featured-sec2-link-text2' ), '' ) ?>
				</a>
				</div>
			</div> 
		</section>
		<section id="section-3" class='section-3'>
			<div>
				<?php 
				echo apply_filters( 'the_content', get_the_content( null, null, get_theme_mod( 'annona-sec3-content1' , false ))); 
				?>
			</div>

			<div>
				<?php echo apply_filters( 'the_content', get_the_content( null, null, get_theme_mod( 'annona-sec3-content2', false ))); ?>
			</div>
			<div>
				<?php echo apply_filters( 'the_content', get_the_content( null, null, get_theme_mod( 'annona-sec3-content3', false ))) ?>
			</div>
		</section>
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
			</div>
		</div>
		<article id="section-5" class="section-5">
			<?php annona_testimonials(); ?>
		</article>
		<article id="section-6" class="section-6">
			<svg xmlns="http://www.w3.org/2000/svg" class="gate gate-bottom-right" viewBox="0 0 91.83 129.6"><defs><style>.cls-1{fill:none;stroke:#cbd280;stroke-miterlimit:10;}</style></defs><title>gate-bottom-right</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M53.83,113.41c-8-4.33-11.41-13.55-8.5-20.68,3.49-8.55,14.24-9.8,20.68-8.51,6.77,1.37,13.42,6.54,15.08,13.14,2.57,10.27-7.26,24.85-26.29,30.16-5.72,1.34-22,4.36-35.76-4.64-21.42-14-18.83-45.34-18-55.47C3.48,38.92,21,1.84,46.1.54,60.18-.19,72.84,10.62,75.28,12.71c5.45,4.66,16.12,13.77,16,27.25C91.25,54,79.62,70.66,65,70.11,48.65,69.5,35.5,47.35,41.46,36.29c3.28-6.09,12.45-12.07,20.68-8.5,6.92,3,11,11.8,8.51,20.68"/></g></g></svg>-->
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
			<!--</div>--><!--.section-6-backdrop-->
		</article><!-- #main -->
		</div><!--.content-->
<?php
get_footer();