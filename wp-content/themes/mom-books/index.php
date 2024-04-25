<?php
get_header();

if ( get_post_type() == 'post' ) {
	?>
	<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 text-sky-900  mt-24 mb-8">
		<h2 class="text-4xl sm:text-7xl font-medium text-center sm:text-left"><?php echo get_the_title( get_option( 'page_for_posts', true ) ); ?></h2>
		<div class="border-slate-500 border-t my-12"></div>
	</div>
	<?php
	echo '<div class="m-auto max-w-8xl px-2 sm:px-6 xl:px-12 text-sky-900 py-12">';
	echo '<div id="book-list" class="flex flex-wrap">';
}

while ( have_posts() ) {
	the_post();
	if ( function_exists( 'have_rows' ) && have_rows( 'builder' ) ) {
		while ( have_rows( 'builder' ) ) {
			the_row();
			get_template_part( '/blocks/' . under_to_dash( get_row_layout() ) );
		}
	} elseif ( get_post_type() == 'post' ) {
			$first_category = get_the_category( get_the_ID() )[0]->name ?? '';
			echo '<div class="w-full sm:w-1/2 px-2 mb-8">';
			get_template_part(
				'/blocks/cards/' . 'press',
				null,
				array(
					'image'     => get_the_post_thumbnail_url( get_the_ID(), 'large' ) ?? '',
					'title'     => get_the_title( get_the_ID() ) ?? '',
					'tag'       => $first_category ?? '',
					'text'      => limitText( get_the_excerpt( get_the_ID() ), 200 ) ?? '',
					'page_link' => get_permalink( get_the_ID() ) ?? '',
				)
			);
			echo '</div>';
	}
}

if ( get_post_type() == 'post' ) {
	echo '</div>';
	echo '</div>';
	echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 text-sky-900 my-8">';
	echo '<div id="pagination-container" class="mb-32 flex justify-center [&_.page-numbers]:text-xl [&_.page-numbers]:mx-1 [&_.page-numbers]:text-slate-500 [&_.page-numbers.current]:text-sky-900 [&_.page-numbers.current]:underline">';

	// Pagination
	echo get_the_posts_pagination(
		array(
			'mid_size'           => 3,
			'screen_reader_text' => ' ',
			'prev_text'          => '<div class="inline-block"><span class="flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-sky-900 rotate-180' ) . '</span></div>',
			'next_text'          => '<div class="inline-block"><span class="flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-sky-900' ) . '</span></div>',
		)
	);
	echo '</div>';
	echo '</div>';
}
get_footer();
