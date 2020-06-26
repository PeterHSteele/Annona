<?php
/**
 * annona Theme Customizer
 *
 * @package annona
 */

require get_template_directory() . '/inc/customizer/class-dropdown-posts-control.php' ;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function annona_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'annona_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'annona_customize_partial_blogdescription',
			)
		);
	}

	function annona_make_customizer_section( $obj, $section ){
		
		$obj->add_section( 'annona-section-' . $section . '-content', array(
			'title' => sprintf( 
				/* translators: %1$s: number of current section */
				__( 'Annona Featured Section %1$s', 'annona' ),
				$section,
			),
			'active_callback' => 'annona_is_featured'
		));

	}

	function annona_make_settings_and_controls( $obj, $section, $content ){

		$obj->add_setting( 'annona-sec' . $section . '-content' . $content, array(
			'default' => '',
			'sanitize_callback' => 'absint'
		));

		$obj->add_control( new Annona_Dropdown_Posts_Control( $obj, 'annona-sec' . $section . '-content' . $content, array(
			'label' => sprintf(
				/* translators: %1$s: number of current section, %2$s: order of this piece of content within current section */
				__( 'Section %1$s content %2$s', 'annona' ),
				$section,
				$content
			),
			'section' => 'annona-section-' . $section . '-content'
		)));

	}

	annona_make_customizer_section( $wp_customize, 3);
	for ( $i = 1; $i <= 3; $i++ ){
		annona_make_settings_and_controls( $wp_customize, 3, $i );
	}
	annona_make_customizer_section( $wp_customize, 4);
	$num_testimonials = min( 6, apply_filters( 'annona_testimonial_count', 3 ));
	for ( $i = 1; $i <= $num_testimonials; $i++ ){
		annona_make_settings_and_controls( $wp_customize, 4, $i );
	}
	annona_make_customizer_section( $wp_customize, 5 );
	$wp_customize->add_setting( 'annona-sec5-featured-image', array(
		'default' => '',
		'sanitize_callback' => 'absint'
	));
	for ( $i = 1; $i <= 2; $i++ ){
		annona_make_settings_and_controls( $wp_customize, 5, $i );
	}



	$wp_customize->add_control( 'annona-sec5-featured-image', array(
		'type' => 'select',
		'label' => __( 'An image that will be prominently placed just before the testimonials.
			Make it big and beautiful.' , 
			'annona' ),
		'choices' => annona_sec5_featured_image_choices(),
		'section' => 'annona-section-5-content'
	));
	/*
	for ( $i = 3; $i <= 4; $i++){
		annona_make_customizer_section( $wp_customize, $i );
		$j = apply_filters( 'annona_testimonial_count', 3 );
		while ( $j <= $i){
			annona_make_settings_and_controls( $wp_customize, $i, $j );
			$j++;
		}
	}*/

}
add_action( 'customize_register', 'annona_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function annona_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function annona_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
* Active callback for selecting content for the featured.php page template.
*/

function annona_is_featured(){
	return is_page_template( 'page-templates/featured.php' );
}

/**
* Gets choices for the select control allowing user to choose image
* for section 5 of the featured page.
*/

function annona_sec5_featured_image_choices(){
	$attachments = get_posts( array(
		'post_type' => 'attachment',
		'numberposts' => -1
	));

	$choices = array();
	foreach ( $attachments as $post ){
		$choices[ $post->ID ] = $post->post_title;
	}
	return $choices;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function annona_customize_preview_js() {
	wp_enqueue_script( 'annona-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'annona_customize_preview_js' );
