<?php
$image     = $args['image'] ?? '';
$title     = $args['title'] ?? '';
$text      = $args['text'] ?? '';
$button    = $args['button'] ?? '';
$tag       = $args['tag'] ?? '';
$authors   = $args['authors'] ?? '';
$big       = $args['big'] ?? false;
$price     = $args['price'] ?? '';
$tagClass  = 'bg-' . colourFromImprint( $tag );
$page_link = $args['page_link'] ?? '';
$classes   = $big ? 'h-[16rem] sm:h-[28rem] xl:h-[36rem]' : 'h-[16rem] xl:h-[24rem]';
?>


<div class="card-1 relative">
	<?php
	if ( $page_link ) {
		echo '<a class="absolute inset-0 z-10" href="' . $page_link . '"></a>';
	}
	?>
	<div class="bg-slate-100 px-6 lg:px-12 py-8 xl:py-16 mb-6 rounded-lg select-none">
		<div class="flex items-center justify-center <?php echo $classes; ?>">
			<img class="shadow-xl max-h-full" src="<?php echo $image; ?>">
		</div>
	</div>
	<div class="mb-2">
		<?php
		if ( $tag ) {
			echo '<span class="' . $tagClass . ' text-white text-xs uppercase p-2 rounded mb-2 inline-block tracking-widest leading-3">' . $tag . '</span>';
		}
		?>
	</div>
	<div class="pr-6">
		<?php
		if ( $title ) {
			echo '<h3 class="text-3xl text-sky-900 mb-4 font-medium">' . $title . '</h3>';
		}
		if ( $authors ) {
			if ( is_array( $authors ) ) {
				$authors = implode( ', ', $authors );
			}
			echo '<p class="text-slate-500 uppercase mb-4 text-xs font-medium">' . $authors . '</p>';
		}
		if ( $price ) {
			echo '<p class="text-sky-900 uppercase mb-4 text-lg">' . $price . '</p>';
		}
		if ( $text ) {
			echo '<p class="text-slate-600 text-lg break-words">' . $text . '</p>';
		}
		?>
	</div>
</div>
