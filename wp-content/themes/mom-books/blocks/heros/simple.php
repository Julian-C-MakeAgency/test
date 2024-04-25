<?php
$group_1 = get_sub_field( 'group_1' );
$group_2 = get_sub_field( 'group_2' );
$heading = $group_1['heading'] ?? '';
$text    = $group_1['text'] ?? '';
?>


<div class="hero">
	<div class="relative">
		<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 text-sky-900 mt-24 mb-8">
			<?php
			if ( $heading ) {
				echo '<h1 class="text-4xl sm:text-7xl font-medium text-center sm:text-left">' . $heading . '</h1>';
			}
			if ( $text ) {
				echo '<p class="text-lg text-center sm:text-left mt-4">' . $text . '</p>';
			}
			echo '<div class="border-slate-500 border-t my-12"></div>';
			?>
		</div>
	</div>
</div>
