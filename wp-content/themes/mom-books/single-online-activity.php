<?php
get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		if ( function_exists( 'have_rows' ) && have_rows( 'builder' ) ) {
			while ( have_rows( 'builder' ) ) {
				the_row();
				get_template_part( '/blocks/' . under_to_dash( get_row_layout() ) );
			}
		} else {
			get_template_part( 'template-parts/content', get_post_type() );
		}
	endwhile;
endif;
get_footer();
