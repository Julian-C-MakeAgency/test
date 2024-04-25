<?php
$group_1  = get_sub_field( 'group_1' );
$group_2  = get_sub_field( 'group_2' );
$heading  = $group_1['heading'] ?? '';
$sub_text = $group_1['sub_text'] ?? '';
$text     = $group_1['text'] ?? '';
$button   = $group_1['button'] ?? array();
$people   = $group_2['people'] ?? array();
?>


<div class="hero">
	<div class="relative bg-slate-100 text-sky-900 text-center sm:text-left">
		<div class="relative m-auto max-w-3xl px-4 sm:px-8 pb-16 pt-24">
			<?php
			if ( $heading ) {
				echo '<h1 class="text-5xl leading-tight sm:text-7xl sm:leading-tight mb-8 max-w-screen-sm">' . $heading . '</h1>';
			}
			if ( $sub_text ) {
				echo '<p class="sm:text-3xl font-medium mb-6 max-w-xl sm:pr-6">' . $sub_text . '</p>';
			}
			if ( $text ) {
				echo '<p class="text-slate-600 sm:text-lg font-light mb-10 max-w-xl sm:pr-6">' . $text . '</p>';
			}
			if ( $button ) {
				echo '<a class="inline-block font-medium py-3 px-8 bg-white text-sky-900 rounded-3xl" href="' . $button['url'] . '" target="' . $button['target'] . '">' . $button['title'] . '</a>';
			}

			if ( $people ) {
				echo '<div class="grid sm:grid-cols-2 mt-16">';
				foreach ( $people as $person ) {
					$image   = wp_get_attachment_image_src( $person['image'], 'large' )[0] ?? '';
					$name    = $person['name'] ?? '';
					$postion = $person['position'] ?? '';
					echo '<div class="flex items-center mb-8 justify-center sm:justify-start">';
					if ( $image ) {
						echo '<img class="w-16 h-20 rounded mr-4 object-cover" src="' . $image . '" alt="' . $name . '">';
					}
					echo '<div>';
					if ( $name ) {
						echo '<h3 class="text-xl font-medium">' . $name . '</h3>';
					}
					if ( $postion ) {
						echo '<p class="text-slate-600">' . $postion . '</p>';
					}
					echo '</div>';
					echo '</div>';
				}
				echo '</div>';
			}
			?>
		</div>
	</div>
</div>
