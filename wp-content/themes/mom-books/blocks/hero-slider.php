<?php
$slider = get_sub_field( 'slider' ) ?? array();


if ( $slider ) {
	echo '<div class="hero-slider relative w-full overflow-hidden">';
	echo '<div class="swiper-wrapper">';
	foreach ( $slider as $slide ) {
		$group_1 = $slide['group_1'];
		$group_2 = $slide['group_2'];
		$heading = $group_1['heading'] ?? '';
		$text    = $group_1['text'] ?? '';
		$button  = $group_1['button'] ?? array();
		$image   = ( $image = $group_2['background_image'] ) ? wp_get_attachment_image_src( $image, 'large' )[0] : '';
		?>
		<div class="hero-slide swiper-slide !h-auto">
			<div class="relative h-full">
				<?php
				if ( $image ) {
					echo '<img class="absolute w-full h-full object-cover inset-0" src="' . $image . '" alt="">';
					echo '<div class="absolute inset-0 bg-black opacity-30"></div>';
				}
				?>
				<div class="relative text-white h-full m-auto max-w-8xl px-4 md:px-24 xxxl:px-14 pb-16 pt-24">
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
		<?php
	}
	echo '</div>';
	echo '<div class="swiper-button-prev swiper-btn !text-white !left-6 !hidden md:!block"></div>';
	echo '<div class="swiper-button-next swiper-btn !text-white !right-6 !hidden md:!block"></div>';
	echo '</div>';
}
