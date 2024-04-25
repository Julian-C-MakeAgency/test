<?php
$image  = $args['image'] ?? '';
$title  = $args['title'] ?? '';
$text   = $args['text'] ?? '';
$button = $args['button'] ?? '';
$tag    = $args['tag'] ?? '';
$author = $args['author'] ?? '';
$price  = $args['price'] ?? '';
if ( $tag == 'Buster Books' ) {
	$tagClass = 'bg-sky-500';
} elseif ( $tag == 'LOM ART' ) {
	$tagClass = 'bg-violet-600';
} else {
	$tagClass = 'bg-sky-900';
}
?>


<div class="card-1">
	<div class="flex flex-wrap">
		<div class="xs:w-2/6 lg:w-1/2">
			<div class="xs:pr-8">
				<div class="shadow-xl max-h-full"><?php echo $image; ?></div>
			</div>
		</div>
		<div class="xs:w-4/6 lg:w-1/2 flex lg:block items-center">
			<div class="lg:pr-4">
				<?php
				if ( $title ) {
					echo '<h3 class="text-3xl text-sky-900 mt-8 xs:mt-0 mb-4 font-medium">' . $title . '</h3>';
				}
				if ( $author ) {
					echo '<p class="text-slate-500 uppercase mb-4 text-xs font-medium">' . $author . '</p>';
				}
				if ( $price ) {
					echo '<p class="text-sky-900 uppercase mb-4 text-lg font-light">' . $price . '</p>';
				}
				if ( $text ) {
					echo '<p class="text-slate-600 text-lg">' . $text . '</p>';
				}
				?>
			</div>
		</div>
	</div>
</div>
