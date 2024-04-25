<?php
$group_1            = get_sub_field( 'group_1' );
$group_2            = get_sub_field( 'group_2' );
$heading            = $group_1['heading'] ?? '';
$text               = $group_1['text'] ?? '';
$imprint_categories = $group_2['imprint_categories'] ?? array();
$fields             = get_fields( 'imprint_' . $group_2['imprint_categories'] ) ?? array();
$logo               = ( $logo = $fields['logo'] ) ? wp_get_attachment_image_src( $logo, 'large' )[0] : '';
$imprint_category   = get_term( $imprint_categories );
$page_colour        = get_query_var( 'page_colour' ) ?? '';
$bg_colour          = get_sub_field( 'background_colour' ) ?? '';
?>


<div class="text-with-cat bg-[<?php echo $bg_colour; ?>]">
	<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-16 text-sky-900 flex flex-wrap md:flex-nowrap">
		<div class="w-full md:w-48 flex flex-wrap mb-12">
			<div class="w-full">
				<?php
				if ( $logo ) {
					echo '<div class="w-full">';
					echo '<div class="bg-' . $page_colour . ' flex h-36 w-36 justify-center items-center rounded-full mb-6 mx-auto">';
					echo '<img class="h-20 w-20 object-contain" src="' . $logo . '">';
					echo '</div>';
					echo '</div>';
				}

				// Fetch terms in the 'book_category' taxonomy
				$book_categories = get_terms(
					array(
						'taxonomy'   => 'book-category',
						'hide_empty' => true,
					)
				);

				// Filter book categories by those associated with a specific 'imprint' term
				$filtered_categories = array();
				foreach ( $book_categories as $category ) {
					// Query posts within this category that have the specific imprint
					$args  = array(
						'post_type'      => 'book', // Assuming 'book' is your custom post type
						'posts_per_page' => -1, // Get all posts
						'tax_query'      => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'book-category',
								'field'    => 'term_id',
								'terms'    => $category->term_id,
							),
							array(
								'taxonomy' => 'imprint',
								'field'    => 'term_id',
								'terms'    => $imprint_category->term_id, // Replace with your specific imprint term slug
							),
						),
					);
					$query = new WP_Query( $args );

					// If there are posts in this category with the specific imprint, add the category to the list
					if ( $query->have_posts() ) {
						$filtered_categories[] = $category;
					}
				}



				if ( $filtered_categories ) {
					echo '<form id="book-filters" method="GET" action="' . get_home_url() . '/books">';
					echo '<select class="styled" name="category" data-bgcolour="bg-' . $page_colour . '">';
					$items = array();
					foreach ( $filtered_categories as $term ) {
						echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
					}
					echo '</select>';
					echo '<input hidden name="imprint" value="' . $imprint_category->slug . '">';
					echo '</form>';
				}
				?>
			</div>
		</div>
		<div class="md:flex-grow md:px-14 w-full">
			<div class="m-auto max-w-3xl">
				<?php
				if ( $heading || $text ) {
					echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 pb-10 text-sky-900">';
					if ( $heading ) {
						echo '<h2 class="text-3xl sm:text-5xl font-light mb-4">' . $heading . '</h2>';
					}
					if ( $text ) {
						echo '<div class="text-lg">' . $text . '</div>';
					}
					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>
</div>
