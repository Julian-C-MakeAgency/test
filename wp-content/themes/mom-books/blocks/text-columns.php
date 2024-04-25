<?php
$group_1   = get_sub_field( 'group_1' ) ?? array();
$group_2   = get_sub_field( 'group_2' ) ?? array();
$heading   = $group_1['heading'] ?? '';
$columns   = $group_1['columns'] ?? array();
$bg_colour = get_sub_field( 'background_colour' ) ?? '';
?>

<div class="text-columns bg-[<?php echo $bg_colour; ?>]">
	<div class="py-16">
		<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14">
			<div class="pb-10">
				<h2 class="text-sky-900 text-4xl sm:text-5xl font-medium text-center sm:text-left"><?php echo $heading; ?></h2>
			</div>
		</div>
		<div class="m-auto max-w-8xl px-2 sm:px-6 xl:px-12 flex flex-wrap">
			<?php
			if ( $columns ) {
				foreach ( $columns as $column ) {
					$icon  = ( $icon = $column['icon'] ) ? wp_get_attachment_image_src( $icon, 'large' )[0] : '';
					$title = $column['title'] ?? '';
					$text  = $column['text'] ?? '';
					echo '<div class="w-full sm:w-1/2 lg:w-1/3 px-2 my-8 text-center sm:text-left">';
					echo '<div class="sm:pr-9">';
					if ( $icon ) {
						echo '<img class="max-w-20 max-h-20 mb-4 mx-auto sm:mx-0" src="' . $icon . '">';
					}
					if ( $title ) {
						echo '<h2 class="text-sky-900 text-3xl leading-tight sm:leading-tight font-medium text-center sm:text-left mb-6">' . $title . '</h2>';
					}
					if ( $text ) {
						echo '<p class="mb-6 text-lg">' . $text . '</p>';
					}
					echo '</div>';
					echo '</div>';
				}
			}
			?>
		</div>
	</div>
</div>
