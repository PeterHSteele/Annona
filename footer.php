<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package annona
 */

?>

	<footer id="colophon" class="site-footer">
		<?php 
		get_sidebar();
		$jetpack_exists = annona_check_for_jetpack();
		if ( has_nav_menu( 'menu-2') || $jetpack_exists ) : 
		?>
		<div class="footer-navs-container">
			<nav class="nav-secondary">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'depth'			 => 1,
					'fallback_cb' 	 => false 
				));
			?>
			</nav>
			<?php
			if ( $jetpack_exists ){ 
				jetpack_social_menu(); 
			} 
			?>
		</div>
		<?php endif; ?> 
		<div class="footer-info">
			<?php 
			the_privacy_policy_link(); 
			?>
			<span>&copy; 2020 <?php esc_html_e( '"Your Restaurant Here"', 'annona' ) ?></span>
		</div> 
	</footer><!-- #colophon -->
	</div><!--.horizontal-animate-->
	</div><!--.content-track-->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>