<?php
get_header();

?>

<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 text-sky-900  mt-24 mb-8">
	<h2 class="text-4xl sm:text-7xl font-medium text-center sm:text-left">Our Books</h2>
	<div class="border-slate-500 border-t my-12"></div>
</div>


	<?php
	echo '<form id="book-filters" method="GET" action="' . get_home_url() . '/books">'; // Action points to admin-ajax.php for handling AJAX
	echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 text-sky-900 my-8">';
	echo '<div class="max-w-lg grid grid-cols-2 sm:grid-cols-3 gap-3">';

	// Fetch terms for each taxonomy
	$book_category_terms = get_terms(
		array(
			'taxonomy'   => 'book-category',
			'hide_empty' => true,
		)
	);
	$imprint_terms       = get_terms(
		array(
			'taxonomy'   => 'imprint',
			'hide_empty' => true,
		)
	);
	$contributor_terms   = get_terms(
		array(
			'taxonomy'   => 'contributor',
			'hide_empty' => true,
		)
	);

	// Dropdown for book categories
	if ( ! empty( $book_category_terms ) ) {
		echo '<select class="styled" name="category" class="hidden" data-bgcolour="bg-sky-900">';
		echo '<option value="">Category</option>';
		foreach ( $book_category_terms as $term ) {
			if ( isset( $_GET['category'] ) && $_GET['category'] == $term->slug ) {
				echo '<option value="' . esc_attr( $term->slug ) . '" selected>' . esc_html( $term->name ) . '</option>';
			} else {
				echo '<option value="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</option>';
			}
		}
		echo '</select>';
	}

	// Dropdown for imprints
	if ( ! empty( $imprint_terms ) ) {
		echo '<select class="styled" name="imprint" class="hidden" data-bgcolour="bg-sky-900">';
		echo '<option value="">Imprint</option>';
		foreach ( $imprint_terms as $term ) {
			if ( isset( $_GET['imprint'] ) && $_GET['imprint'] == $term->slug ) {
				echo '<option value="' . esc_attr( $term->slug ) . '" selected>' . esc_html( $term->name ) . '</option>';
			} else {
				echo '<option value="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</option>';
			}
		}
		echo '</select>';
	}

	// Dropdown for contributors/authors
	if ( ! empty( $contributor_terms ) ) {
		echo '<select class="styled" name="author" class="hidden" data-bgcolour="bg-sky-900">';
		echo '<option value="">Author</option>';
		foreach ( $contributor_terms as $term ) {
			// Optionally filter out terms not marked as 'Author'
			$isAuthor = get_term_meta( $term->term_id, 'personrelationship_role', true ) == 'Author';
			if ( $isAuthor ) {
				if ( isset( $_GET['author'] ) && $_GET['author'] == $term->slug ) {
					echo '<option value="' . esc_attr( $term->slug ) . '" selected>' . esc_html( $term->name ) . '</option>';
				} else {
					echo '<option value="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</option>';
				}
			}
		}
		echo '</select>';
	}

	echo '</div>';
	echo '</div>';
	echo '</form>';



	if ( have_posts() ) :
		?>
		<?php


		echo '<div class="m-auto max-w-8xl px-2 sm:px-6 xl:px-12 text-sky-900">';
		echo '<div id="book-list" class="flex flex-wrap">';
		while ( have_posts() ) :
			the_post();
			echo '<div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-8">';
			get_template_part(
				'/blocks/cards/' . 'book',
				null,
				array(
					'image'     => get_post_meta( get_the_ID(), 'jacket_image_url_onix_image', true ) ?? '',
					'title'     => get_the_title( get_the_ID() ) ?? '',
					'tag'       => wp_get_post_terms( get_the_ID(), 'imprint' )[0]->name ?? '',
					'authors'   => authorNames( get_the_ID() ),
					'page_link' => get_permalink( get_the_ID() ) ?? '',
					'price'     => editionPrice( get_the_ID() ),
				)
			);
			echo '</div>';
		endwhile;

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

else :
	echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 text-sky-900 my-24">';
	echo '<h2 class="text-4xl sm:text-5xl font-medium text-center sm:text-left">No books found</h2>';
	echo '</div>';

endif;
get_footer();
