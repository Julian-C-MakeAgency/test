<?php
$group_1   = get_sub_field( 'group_1' ) ?? array();
$heading   = $group_1['heading'] ?? '';
$images    = $group_1['images'] ?? '';
$bg_colour = get_sub_field( 'background_colour' ) ?? '';
?>

<div class="image-grid bg-[<?php echo $bg_colour; ?>]">
	<div>
		<div class="m-auto max-w-8xl px-2 sm:px-6 xl:px-12 py-24">
			<div class="w-full px-2">
				<div class="w-full">
					<?php
					if ( $heading ) {
						echo '<h2 class="text-sky-900 text-4xl sm:text-7xl leading-tight sm:leading-tight font-medium mb-6">' . $heading . '</h2>';
					}
					if ( $images ) {
						echo '<div class="max-w-full text-sky-900 mb-6 prose-hr:border-sky-900 prose-xl prose-img:inline-block prose-img:m-2 prose-headings:text-sky-900 prose-headings:font-medium prose-h2:text-3xl">' . $images . '</div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
