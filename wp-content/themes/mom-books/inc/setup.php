<?php
function mombooks_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'mombooks_setup' );

function mombooks_menus() {
	$locations = array(
		'primary'     => 'Primary Menu',
		'footerone'   => 'Footer One',
		'footertwo'   => 'Footer Two',
		'footerthree' => 'Footer Three',
		'footer'      => 'Sub Footer Menu',
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'mombooks_menus' );

function mombooks_scripts() {
	if ( is_admin() ) {
		wp_enqueue_style( 'admin-styles', get_template_directory_uri() . '/assets/css/admin-styles.css' );
	} else {
		wp_enqueue_style( 'avenir', get_template_directory_uri() . '/assets/fonts/avenir/font.css' );
		wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/styles.css' );
		wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
		wp_enqueue_script( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), '', true );
		wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array( 'swiper' ), '1.0.0', true );
		wp_localize_script(
			'script',
			'ajax',
			array(
				'url'   => admin_url( 'admin-ajax.php' ),
				'nonce' => wp_create_nonce( 'ajax-nonce' ),
			)
		);

	}
}
add_action( 'wp_enqueue_scripts', 'mombooks_scripts' );
add_action( 'admin_enqueue_scripts', 'mombooks_scripts' );


add_filter( 'use_block_editor_for_post', '__return_false', 10 );
function mombooks_deregister_styles() {
	wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'mombooks_deregister_styles', 100 );

function delete_all_posts_of_custom_post_type( $post_type ) {
	$all_posts = get_posts(
		array(
			'post_type'   => 'book',
			'numberposts' => -1,
		)
	);
	foreach ( $all_posts as $post ) {
		wp_delete_post( $post->ID, true );
	}
}
// add_action('init', 'delete_all_posts_of_custom_post_type');
// delete all taxonomies conributor
function delete_all_terms_of_custom_taxonomy( $taxonomy ) {
	$all_terms = get_terms(
		array(
			'taxonomy'   => 'contributor',
			'hide_empty' => false,
		)
	);
	foreach ( $all_terms as $term ) {
		wp_delete_term( $term->term_id, 'contributor' );
	}
}
// add_action('init', 'delete_all_terms_of_custom_taxonomy');
