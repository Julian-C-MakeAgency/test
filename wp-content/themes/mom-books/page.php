<?php
get_header();
while ( have_posts() ) {
	the_post();
	if ( function_exists( 'have_rows' ) && have_rows( 'builder' ) ) {
		set_query_var( 'page_colour', colourFromImprint( get_field( 'page_colour' )->name ?? '' ) );
		while ( have_rows( 'builder' ) ) {
			the_row();
			get_template_part( '/blocks/' . under_to_dash( get_row_layout() ) );
		}
	} else {
		get_template_part( 'template-parts/content', get_post_type() );
	}
}
get_footer();
