<?php
$group_1            = get_sub_field( 'group_1' );
$group_2            = get_sub_field( 'group_2' );
$heading            = $group_1['heading'] ?? '';
$text               = $group_1['text'] ?? '';
$imprint_categories = $group_2['imprint_categories'] ?? array();
$fields             = get_fields( 'imprint_' . $group_2['imprint_categories'] ) ?? array();
$logo               = ( $logo = $fields['logo'] ) ? wp_get_attachment_image_src( $logo, 'large' )[0] : '';
$imprint_category   = get_term( $imprint_categories );
$term_name          = $imprint_category->name;

$book_category_terms = get_terms(
	array(
		'taxonomy'   => 'book-category',
		'hide_empty' => false,
	)
);



if ( $term_name == 'Buster Books' ) {
	$imprintClass = 'bg-sky-500';
} elseif ( $term_name == 'LOM ART' ) {
	$imprintClass = 'bg-violet-600';
} else {
	$imprintClass = 'bg-sky-900';
}
?>


<div class="cards">
	<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-16 text-sky-900 flex flex-wrap">
		<div class="w-1/6">
			<?php
			if ( $logo ) {
				echo '<div class="' . $imprintClass . ' flex h-36 w-36 justify-center items-center rounded-full">';
				echo '<img class="h-20 w-20 object-contain object-left" src="' . $logo . '">';
				echo '</div>';
			}
			if ( $book_category_terms ) {
				echo '<select class="mt-6 ' . $imprintClass . ' text-white p-4">';
				foreach ( $book_category_terms as $book_category_term ) {
					echo '<option>' . $book_category_term->name . '</option>';
				}
				echo '</select>';
			}
			?>
		</div>
		<div class="w-4/6">
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
