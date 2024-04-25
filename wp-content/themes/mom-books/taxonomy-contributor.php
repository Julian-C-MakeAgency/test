<?php
get_header();


$contributor = get_queried_object();

$carouselPosts = get_posts(
	array(
		'post_type' => 'book',
		'tax_query' => array(
			array(
				'taxonomy' => 'contributor',
				'field'    => 'term_id',
				'terms'    => $contributor->term_id,
			),
		),
	)
);

$firstBookID = $carouselPosts[0]->ID ?? '';

$imprint = wp_get_post_terms( $firstBookID, 'imprint' )[0]->name ?? '';

?>

	<div class="hero">
	<div class="relative pt-96 bg-<?php echo colourFromImprint( $imprint ); ?>">
		<?php

		if ( $contributor->name ) {
			?>
			<div class="text-white m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-4 text-center">
			<div class="relative">
				<h1 class="text-4xl sm:text-7xl sm:px-40 mb-6 sm:mb-0"><?php echo $contributor->name; ?></h1>
				<?php echo '<a href="#publications"><span class="sm:absolute right-0 top-1/2 flex items-center sm:-mt-5 justify-center px-4 h-10 border border-white rounded-3xl cursor-pointer"><span class="pr-2">View Books</span>' . svg( 'chevron', 'w-3 fill-white' ) . '</span></a>'; ?>
			</div>
			</div>
			<?php
		}
		?>
	</div>
	</div>


	<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-24">
	<div class="w-full md:max-w-3xl px-2 sm:px-6 xl:px-7 m-auto">
		<div class="w-full">
			<?php
			if ( $contributor->description ) {
				echo '<div class="max-w-full text-sky-900 mb-6 prose-hr:border-sky-900 prose-xl prose-img:mx-auto sm:prose-img:mx-0 prose-headings:text-sky-900 prose-headings:font-medium prose-h2:text-3xl text-lg">' . $contributor->description . '</div>';
			}

			$twitter   = get_term_meta( $contributor->term_id, 'twitter' )[0] ?? '';
			$facebook  = get_term_meta( $contributor->term_id, 'facebook' )[0] ?? '';
			$instagram = get_term_meta( $contributor->term_id, 'instagram' )[0] ?? '';
			$linkedin  = get_term_meta( $contributor->term_id, 'linkedin' )[0] ?? '';
			$goodreads = get_term_meta( $contributor->term_id, 'goodreads' )[0] ?? '';
			$wikipedia = get_term_meta( $contributor->term_id, 'wikipedia' )[0] ?? '';
			$website   = get_term_meta( $contributor->term_id, 'website' )[0] ?? '';

			if ( $website ) {
				echo '<a href="' . $website . '" class="text-sky-900 hover:text-sky-700" target="_blank">' . $website . '</a>';
			}
			echo '<div class="flex items-center gap-x-2 mt-4">';
			if ( $twitter ) {
				echo '<a href="' . $twitter . '" target="_blank">' . svg( 'x', 'w-6 fill-sky-900' ) . '</a>';
			}
			if ( $facebook ) {
				echo '<a href="' . $facebook . '" target="_blank">' . svg( 'facebook', 'w-8 fill-sky-900' ) . '</a>';
			}
			if ( $instagram ) {
				echo '<a href="' . $instagram . '" target="_blank">' . svg( 'instagram', 'w-8 fill-sky-900' ) . '</a>';
			}
			if ( $linkedin ) {
				echo '<a href="' . $linkedin . '" target="_blank">' . svg( 'linkedin', 'w-7 fill-sky-900' ) . '</a>';
			}
			echo '</div>';

			?>
		</div>
	</div>
	</div>


	<div class="carousel relative">
	<div id="publications" class="absolute -top-24"></div>
	<div class="relative pt-16 pb-8">

		<?php
		$heading = 'Publications';
		if ( $heading ) {
			echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 mb-10 text-sky-900 flex">';
			echo '<div class="flex-grow">';
			if ( $heading ) {
				echo '<h2 class="text-4xl sm:text-5xl font-medium text-center sm:text-left">' . $heading . '</h2>';
			}
			echo '</div>';

			echo '<div class="nav-wrap hidden flex items-center justify-end -mr-0.5">';
			echo '<div class="w-48 hidden sm:flex text-sky-900 flex-wrap items-center justify-end">';
			echo '<span class="prev flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-current rotate-180' ) . '</span>';
			echo '<span class="next flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-current' ) . '</span>';
			echo '</div>';
			echo '</div>';

			echo '</div>';
		}
		?>

		<div class="carousel-container w-full overflow-x-scroll whitespace-nowrap snap-x overscroll-x-contain snap-mandatory pb-12">
		<div class="inline-flex">
			<?php


			$outer_class = 'whitespace-normal pr-4 translate-x-4 sm:translate-x-8 xl:translate-x-14 xxl:translate-x-carousel';
			if ( $carouselPosts ) {
				foreach ( $carouselPosts as $carouselPost ) {
					echo '<div class="carousel-item snap-start inline-block w-carousel">';
					$postID = $carouselPost->ID;
					$text   = strip_tags( html_entity_decode( get_post_meta( $postID, 'edition_copy_description', true ) ), 300 );
					echo '<div class="' . $outer_class . '">';
					get_template_part(
						'/blocks/cards/' . 'book',
						null,
						array(
							'image'     => get_post_meta( $postID, 'jacket_image_url_onix_image', true ) ?? '',
							'title'     => get_the_title( $postID ) ?? '',
							'text'      => limitText( $text ) ?? '',
							'tag'       => wp_get_post_terms( $postID, 'imprint' )[0]->name ?? '',
							'authors'   => authorNames( $postID ),
							'page_link' => get_permalink( $postID ) ?? '',
						)
					);
					echo '</div>';
					echo '</div>';
				}
			}
			?>
		</div>
		</div>


		<?php
		if ( $heading ) {
			echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 mb-10 text-sky-900 flex justify-center">';
			echo '<div class="nav-wrap hidden flex items-center justify-end -mr-0.5">';
			echo '<div class="w-48 sm:hidden flex text-sky-900 flex-wrap items-center justify-center">';
			echo '<span class="prev flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-current rotate-180' ) . '</span>';
			echo '<span class="next flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-current' ) . '</span>';
			echo '</div>';
			echo '</div>';

			echo '</div>';
		}
		?>

	</div>
	</div id="publications">



<?php


get_footer();
