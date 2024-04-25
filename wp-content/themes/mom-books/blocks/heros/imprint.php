<?php
$page_colour      = get_query_var( 'page_colour' ) ?? '';
$group_2          = get_sub_field( 'group_2' );
$image            = ( $image = $group_2['background_image'] ) ? wp_get_attachment_image_src( $image, 'large' )[0] : '';
$imprint          = $group_2['imprint'] ?? '';
$imprint_name     = $imprint->name ?? '';
$imprint_alt_name = $imprint_name == "Michael O'Mara" ? "O'Mara Books" : $imprint_name;
?>


<div class="hero">
	<div class="relative pt-96">
		<?php
		if ( $image ) {
			echo '<img class="absolute w-full h-full object-cover inset-0" src="' . $image . '" alt="">';
			echo '<div class="absolute inset-0 bg-black opacity-30"></div>';
		}

		if ( $imprint_alt_name ) {
			?>
			<div class="relative bg-<?php echo $page_colour; ?>">
				<div class="text-white m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-4 text-center">
					<div class="relative">
						<h1 class="text-4xl sm:text-6xl px-20"><?php echo $imprint_alt_name; ?></h1>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>
<div id="content-start" class="-mt-16 absolute"></div>
