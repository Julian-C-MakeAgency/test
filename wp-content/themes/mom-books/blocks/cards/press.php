<?php
$image     = $args['image'] ?? '';
$title     = $args['title'] ?? '';
$text      = $args['text'] ?? '';
$tag       = $args['tag'] ?? '';
$page_link = $args['page_link'] ?? '';
?>


<div class="card relative">
	<div class="relative rounded-lg bg-slate-100 overflow-hidden sm:row-span-3">
		<?php
		if ( $page_link ) {
			echo '<a class="absolute w-full h-full inset-0 z-10" href="' . $page_link . '"></a>';
		}
		?>
		<div class="flex flex-wrap items-center">
			<div class="w-full h-56 md:h-96 relative">
				<img src="<?php echo $image; ?>" class="absolute inset-0 object-cover w-full h-full">
			</div>
			<div class="w-full p-8 flex">
				<div>
					<?php
					if ( $tag ) {
						echo '<span class="bg-slate-500 mr-2 text-white text-xs uppercase p-1.5 sm:p-2 rounded mb-4 inline-block tracking-widest leading-3">' . $tag . '</span>';
					}
					if ( $title ) {
						echo '<h3 class="text-2xl mb-4 font-medium">' . $title . '</h3>';
					}
					if ( $text ) {
						echo '<p class="text-lg">' . $text . '</p>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
