<?php
$group_1    = get_sub_field( 'group_1' ) ?? array();
$group_2    = get_sub_field( 'group_2' ) ?? array();
$heading    = $group_1['heading'] ?? '';
$text       = $group_1['text'] ?? '';
$button     = $group_1['button'] ?? array();
$image_left = $group_2['image_left'] ? ' md:order-1' : '';
$image      = ( $image = $group_2['image'] ) ? wp_get_attachment_image_src( $image, 'full' )[0] : '';
$bg_colour  = get_sub_field( 'background_colour' ) ?? '';
?>


<div class="text-with-image bg-[<?php echo $bg_colour; ?>]">
	<div class="m-auto max-w-8xl px-2 xl:px-7 flex flex-wrap py-10 text-center sm:text-left">
		<div class="w-full md:w-1/2 px-2 sm:px-6 xl:px-7 py-6 min-h-96 flex items-center<?php echo $image_left; ?>">
			<div class="w-full">
				<?php
				if ( $heading ) {
					echo '<h2 class="text-sky-900 text-4xl sm:text-5xl leading-tight sm:leading-tight font-medium mb-6">' . $heading . '</h2>';
				}
				if ( $text ) {
					echo '<div class="mb-6 prose [&_img]:mx-auto sm:[&_img]:mx-0">' . $text . '</div>';
				}
				if ( $button ) {
					echo '<a class="inline-block font-medium py-3.5 px-6 text-white bg-sky-900 rounded-3xl" href="' . $button['url'] . '" target="' . $button['target'] . '">' . $button['title'] . '</a>';
				}
				?>
			</div>
		</div>
		<div class="w-full md:w-1/2 px-2 sm:px-6 xl:px-7 py-6">
			<?php
			if ( $image ) {
				echo '<div class="relative flex h-full rounded-2xl overflow-hidden">';
				echo '<img class="md:absolute inset-0 w-full h-full object-cover object-center" src="' . $image . '">';
				echo '</div>';
			}
			?>
		</div>
	</div>
</div>
