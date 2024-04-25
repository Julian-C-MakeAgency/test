<?php
$image   = $args['image'] ?? '';
$title   = $args['title'] ?? '';
$text    = $args['text'] ?? '';
$button  = $args['button'] ?? '';
$logo    = $args['logo'] ?? '';
$imprint = $args['imprint'] ?? '';
if ( $imprint == 'Buster Books' ) {
	$imprintClass = 'bg-sky-500';
} elseif ( $imprint == 'LOM ART' ) {
	$imprintClass = 'bg-violet-600';
} else {
	$imprintClass = 'bg-sky-900';
}
?>


<div class="card-2 <?php echo $imprintClass; ?> text-white rounded-lg overflow-hidden h-full relative flex flex-col">

	<?php
	if ( $image ) {
		echo ' <div class="h-52 relative">';
		echo '<img class="absolute inset-0 w-full h-full object-cover" src="' . $image . '">';
		echo '</div>';
	}
	?>
	<div class="p-8 pb-0 relative flex-grow">
		<?php
		if ( $logo ) {
			echo '<img class="mb-6 h-20 w-20 object-contain object-left" src="' . $logo . '">';
		}
		if ( $title ) {
			echo '<h3 class="text-3xl mb-4 font-medium">' . $title . '</h3>';
		}
		if ( $text ) {
			echo '<p class="text-lg mb-8">' . $text . '</p>';
		}
		?>
	</div>
	<div class="p-8 pt-0 relative mt-auto">
		<?php
		if ( $button['url'] ) {
			echo '<a class="mt-4 inline-block font-medium py-3 px-8 bg-white text-sky-900 rounded-3xl w-full text-center" href="' . $button['url'] . '" target="' . $button['target'] . '">' . $button['title'] . '</a>';
		}
		?>
	</div>
</div>
