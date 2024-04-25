<?php
echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 pb-14 text-sky-900">';
echo '<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-4 sm:gap-y-16">';
$charitys = get_posts(
	array(
		'post_type'      => 'charity',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
		'fields'         => 'ids',
	)
);
foreach ( $charitys as $charity ) {
	$logo           = wp_get_attachment_image_src( get_field( 'logo', $charity ), 'large' )[0] ?? '';
	$name           = get_field( 'name', $charity ) ?? '';
	$charity_number = get_field( 'charity_number', $charity ) ?? '';
	$website        = get_field( 'website', $charity ) ?? '';
	echo '<div class="px-8 pt-16 pb-16 border border-slate-100 text-center">';

	echo '<div class="w-full max-w-[320px] mx-auto">';
	if ( $logo ) {
		echo '<img class="w-auto h-auto max-w-48 max-h-24 mx-auto mb-8" src="' . $logo . '">';
	}
	if ( $name ) {
		echo '<h3 class="text-2xl font-medium mb-6 leading-normal">' . $name . '</h3>';
	}
	if ( $charity_number ) {
		echo '<p class="text-lg mb-4 text-slate-500">Registered charity number: ' . $charity_number . '</p>';
	}
	if ( $website ) {
		echo '<a class="text-lg mb-4 text-slate-500" href="' . $website . '" target="_blank">' . $website . '</a>';
	}
	echo '</div>';


	echo '</div>';
}

echo '</div>';
echo '</div>';
