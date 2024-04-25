<?php
$group_1     = get_sub_field( 'group_1' );
$group_2     = get_sub_field( 'group_2' );
$heading     = $group_1['heading'] ?? '';
$text        = $group_1['text'] ?? '';
$button      = $group_1['button'] ?? array();
$image       = ( $image = $group_2['image'] ) ? wp_get_attachment_image_src( $image, 'large' )[0] : '';
$page_colour = get_query_var( 'page_colour' ) ?? '';

if ( $image ) {
	?>
	<div class="cta-2">
	<div class="relative py-16">
		<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14">
			<div class="bg-sky-500 text-white flex flex-wrap items-center rounded-2xl relative overflow-hidden">
				<div class="w-full md:w-1/3">
					<img class="md:absolute inset-0 w-full md:w-1/3 h-full object-cover" src="<?php echo $image; ?>">
				</div>
				<div class="w-full md:w-2/3">
					<div class="py-4 px-6 md:p-12 max-w-3xl">
						<?php
						if ( $heading ) {
							echo '<h3 class="text-3xl md:text-5xl my-4 font-medium">' . $heading . '</h3>';
						}
						if ( $text ) {
							echo '<p class="md:text-lg my-4">' . $text . '</p>';
						}
						if ( $button ) {
							echo '<a class="inline-block my-4 font-medium py-3 px-8 bg-white text-sky-500 rounded-3xl text-center" href="' . $button['url'] . '" target="' . $button['target'] . '">' . $button['title'] . '</a>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
} else {
	?>
	<div class="cta">
	<div class="relative py-16">
		<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14">
			<div class="py-4 sm:py-8 bg-<?php echo $page_colour; ?> text-white flex flex-wrap items-center justify-center rounded-2xl text-center px-8">
				<?php
				if ( $heading ) {
					echo '<h3 class="text-3xl my-4 font-light">' . $heading . '</h3>';
				}
				if ( $button ) {
					echo '<a class="inline-block my-4 mx-8 font-medium py-3 px-8 bg-white text-sky-900 rounded-3xl text-center" href="' . $button['url'] . '" target="' . $button['target'] . '">' . $button['title'] . '</a>';
				}
				?>
			</div>
		</div>
	</div>
</div>
	<?php
}