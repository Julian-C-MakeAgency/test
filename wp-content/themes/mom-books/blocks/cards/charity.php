<?php
$logo = $args['logo'] ?? '';
$link = $args['link'] ?? '';
?>


<div class="relative">
	<div class="">
		<?php
		if ( $logo ) {
			echo '<div class="mb-4"><a href="' . $link . '" target="_blank"><img class="max-w-60 max-h-24" src="' . $logo . '"></a></div>';
		}
		?>
	</div>
</div>
