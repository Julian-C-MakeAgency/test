<?php
$group_1        = get_sub_field( 'group_1' );
$group_2        = get_sub_field( 'group_2' );
$heading        = $group_1['heading'] ?? '';
$image          = ( $image = $group_2['background_image'] ) ? wp_get_attachment_image_src( $image, 'large' )[0] : '';
$imprint        = $group_2['imprint'] ?? '';
$imprint_colour = ( $imprint->name ?? '' ) ? colourByImprint( $imprint->name ) : '';
$logo           = ( $imprint->term_id ?? '' ) ? wp_get_attachment_image_src( get_term_meta( $imprint->term_id, 'logo', true ), 'large' )[0] : '';
?>


<div class="hero">
	<div class="relative pt-96 bg-sky-900">
		<?php
		if ( $image ) {
			echo '<img class="absolute w-full h-full object-cover inset-0" src="' . $image . '" alt="">';
			echo '<div class="absolute inset-x-0 bottom-0 w-full h-full bg-gradient-to-t from-black/[0.7] to-black/[0.1]"></div>';
		}

		if ( $heading ) {
			?>
			<div class="relative">
				<div class="text-white m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-4 text-center">
					<div class="relative">
						<h1 class="text-4xl sm:text-7xl md:px-28 mb-16 md:mb-0"><?php echo $heading; ?></h1>
					</div>
				</div>
			</div>
			<?php
		}

		if ( $logo ) {
			echo '<div class="text-white m-auto max-w-8xl px-4 sm:px-8 xl:px-14 mb-8">';
			echo '<div class="relative">';
			echo '<div class="rounded-full absolute flex justify-center items-center -top-14 -ml-14 md:ml-0 left-1/2 md:left-0 w-28 h-28 bg-' . $imprint_colour . '">';
			echo '<img class="relative w-16 h-16 object-contain" src="' . $logo . '">';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}



		?>
	</div>
</div>
