<?php
$group_1   = get_sub_field( 'group_1' );
$group_2   = get_sub_field( 'group_2' );
$heading   = $group_1['heading'] ?? 'Our imprints';
$imprints  = get_terms(
	array(
		'taxonomy'   => 'imprint',
		'hide_empty' => false,
		'orderby'    => 'name',
		'order'      => 'DESC',
	)
);
$bg_colour = get_sub_field( 'background_colour' ) ?? '';
$count     = 0;
?>
<div class="imprints bg-[<?php echo $bg_colour; ?>]">
	<?php
	foreach ( $imprints as $imprint ) {
		$fields       = get_fields( 'imprint_' . $imprint->term_id ) ?? array();
		$imprint_page = $fields['imprint_page'] ?? '';
		$alt_name     = $fields['alternative_name'] ? : $imprint->name;
		$logo         = wp_get_attachment_image_src( $fields['logo'] ?? '', 'large' )[0] ?? '';
		$image        = wp_get_attachment_image_src( $fields['banner_image'] ?? '', 'large' )[0] ?? '';

		if ( ! $logo || $imprint->description === '' ) {
			continue;
		}

		if ( $count === 0 ) {
			if ( $heading ) {
				echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 text-sky-900">';
				echo '<h2 class="text-4xl sm:text-5xl font-medium text-center sm:text-left">' . $heading . '</h2>';
				echo '</div>';
			}
			echo '<div class="imprints">';
			echo '<div class="relative py-10">';
			echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-12">';
		}
		++$count;

		echo '<div>';
		get_template_part(
			'/blocks/cards/' . 'imprints',
			null,
			array(
				'image'   => $image,
				'logo'    => $logo,
				'title'   => $alt_name,
				'text'    => $imprint->description,
				'button'  => array(
					'title'  => 'Discover ' . $alt_name,
					'url'    => $imprint_page,
					'target' => '_self',
				),
				'imprint' => $imprint->name,
			)
		);
		echo '</div>';
	}

	if ( $count > 0 ) {
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

	echo '</div>';