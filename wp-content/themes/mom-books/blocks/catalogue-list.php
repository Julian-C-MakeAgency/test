<?php
$text = get_sub_field( 'text' );
?>

<div class="catalogue-list">
	<div class="text-sky-900">
		<div class="relative">
			<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 text-sky-900 mt-24 mb-8">
				<?php
				echo '<h1 class="text-4xl sm:text-7xl font-medium text-center sm:text-left">Catalogues</h1>';
				echo $text ? '<div class="text-lg text-center sm:text-left mt-6">' . $text . '</div>' : '';
				echo '<div class="border-slate-500 border-t my-12"></div>';
				?>
			</div>
		</div>
		<div class="m-auto max-w-8xl px-2 sm:px-6 xl:px-12 text-sky-900 mt-8 mb-24 flex flex-wrap">
			<?php
			$catalogues = get_posts(
				array(
					'post_type'      => 'catalogue',
					'posts_per_page' => -1,
					'orderby'        => 'date',
					'order'          => 'DESC',
				)
			);
			if ( $catalogues ) {
				foreach ( $catalogues as $catalogue ) {
					echo '<div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-12">';
					$file          = get_field( 'file', $catalogue->ID );
					$featuredImage = get_the_post_thumbnail_url( $catalogue->ID, 'large' );
					if ( $file && $featuredImage ) {
						echo '<div>';
						echo '<div>';
						echo '<img class="w-full h-96 object-cover rounded-xl mb-4" src="' . $featuredImage . '">';
						echo '</div>';
						echo '<h3 class="text-2xl mb-4">' . $catalogue->post_title . '</h3>';
						echo '<a href="' . $file . '" target="_blank">Download</a>';
						echo '</div>';
					}
					echo '</div>';
				}
			}
			?>
		</div>
	</div>
</div>
