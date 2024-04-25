<?php
$group_1     = get_sub_field( 'group_1' ) ?? array();
$heading     = $group_1['heading'] ?? '';
$text        = $group_1['text'] ?? '';
$cta         = $group_1['cta'] ?? '';
$background  = $group_1['background'] ? 'bg-slate-100' : '';
$width       = $background ? 'md:max-w-6xl' : 'md:max-w-3xl';
$headingSize = $background ? 'text-4xl sm:text-5xl' : 'text-4xl sm:text-7xl';
?>


<div class="text">
	<div class="<?php echo $background; ?>">
		<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-24">
			<div class="w-full px-2 sm:px-6 xl:px-7 m-auto <?php echo $width; ?>">
				<div class="w-full">
					<?php
					if ( $heading ) {
						echo '<h2 class="text-sky-900 ' . $headingSize . ' leading-tight sm:leading-tight font-medium mb-6">' . $heading . '</h2>';
					}
					if ( $text ) {
						echo '<div class="max-w-full text-sky-900 mb-6 prose-hr:border-sky-900 prose-xl [&_ul]:list-disc [&_ol]:list-decimal prose-img:mx-auto sm:prose-img:mx-0 prose-headings:text-sky-900 prose-headings:font-medium prose-h2:text-3xl">' . $text . '</div>';
					}
					if ( $cta ) {
						echo '<a class="btn-cta" href="' . $cta['url'] . '" target="' . $cta['target'] . '">' . $cta['title'] . '</a>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
