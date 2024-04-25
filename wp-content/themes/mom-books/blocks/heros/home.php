<?php
$group_1 = get_sub_field( 'group_1' );
$group_2 = get_sub_field( 'group_2' );
$heading = $group_1['heading'] ?? '';
$text    = $group_1['text'] ?? '';
$button  = $group_1['button'] ?? array();
$image   = ( $image = $group_2['background_image'] ) ? wp_get_attachment_image_src( $image, 'large' )[0] : '';
?>


<div class="hero">
	<div class="relative">
		<?php
		if ( $image ) {
			echo '<img class="absolute w-full h-full object-cover inset-0" src="' . $image . '" alt="">';
			echo '<div class="absolute inset-0 bg-black opacity-30"></div>';
		}
		?>
		<div class="relative text-white m-auto max-w-8xl px-4 sm:px-8 xl:px-14 pb-16 pt-24">
			<?php
			if ( $heading ) {
				echo '<h1 class="text-5xl leading-tight sm:text-7xl sm:leading-tight mb-4 max-w-screen-sm">' . $heading . '</h1>';
			}
			if ( $text ) {
				echo '<p class="sm:text-2xl font-light mb-10 max-w-xl sm:pr-6">' . $text . '</p>';
			}
			if ( $button ) {
				echo '<a class="inline-block font-medium py-3 px-8 bg-white text-sky-900 rounded-3xl" href="' . $button['url'] . '" target="' . $button['target'] . '">' . $button['title'] . '</a>';
			}
			?>
		</div>
	</div>
</div>
