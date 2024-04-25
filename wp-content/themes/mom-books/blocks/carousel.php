<?php
$group_1      = get_sub_field( 'group_1' );
$group_2      = get_sub_field( 'group_2' );
$block_id     = $group_1['id'] ?? '';
$heading      = $group_1['heading'] ?? '';
$text         = $group_1['text'] ?? '';
$button       = $group_1['button'] ?? array();
$type         = $group_2['type'] ?? '';
$post_ids     = array();
$title_align  = 'text-center sm:text-left';
$imprint      = '';
$category     = '';
$new_releases = '';
$coming_soon  = '';
if ( $type == 'book' ) {
	$post_ids = $group_2['books'] ?? array();
	$imprint  = $group_2['imprint'] ?? '';
	$category = $group_2['category'] ?? '';

	$new_releases = $group_2['new_releases'] ?? '';
	$coming_soon  = $group_2['coming_soon'] ?? '';
}
if ( $type == 'article' ) {
	$type             = 'post';
	$post_ids         = $group_2['articles'] ?? array();
	$category_article = $group_2['category_article'] ?? '';
}
if ( $type == 'charities' ) {
	$type        = 'charity';
	$post_ids    = $group_2['charities'] ?? array();
	$title_align = 'text-center';
}
if ( $type == 'activities' ) {
	$type     = 'online-activity';
	$post_ids = $group_2['activities'] ?? array();
}
if ( $type == 'press' ) {
	$type     = 'press-release';
	$post_ids = $group_2['press_releases'] ?? array();
}
$bg_colour = get_sub_field( 'background_colour' ) ?? '';

if ( $bg_colour == '#6E97C8' || $bg_colour == '#003367' || $bg_colour == '#7649F3' || $bg_colour == '#355666' ) {
	$text_colour = ' text-white';
} else {
	$text_colour = '';
}

?>

<div class="carousel bg-[<?php echo $bg_colour; ?>]">

	<?php
	if ( $block_id ) {
		$id = sanitize_title( $block_id );
		echo '<div id="' . $id . '" class="-mt-20 pt-20"></div>';
	}
	?>

	<div class="relative pt-10 pb-4">

		<?php
		if ( $heading || $text ) {
			echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 mb-10 text-sky-900 flex">';
			echo '<div class="flex-grow">';
			if ( $heading ) {
				echo '<h2 class="text-4xl sm:text-5xl font-medium ' . $title_align . '">' . $heading . '</h2>';
			}
			if ( $text ) {
				echo '<p class="text-lg text-center sm:text-left mt-4">' . $text . '</p>';
			}
			echo '</div>';

			if ( $type !== 'charity' ) {
				echo '<div class="nav-wrap hidden flex items-center justify-end -mr-0.5 select-none">';
				echo '<div class="w-48 hidden sm:flex text-sky-900 flex-wrap items-center justify-end">';
				echo '<span class="prev flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-current rotate-180' ) . '</span>';
				echo '<span class="next flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-current' ) . '</span>';
				echo '</div>';
				echo '</div>';
			}

			echo '</div>';
		}
		?>

		<div class="carousel-container w-full overflow-x-scroll whitespace-nowrap snap-x overscroll-x-contain snap-mandatory pb-6 select-none">
			<div class="inline-flex">
				<?php

				if ( $type == 'book' ) {

					$taxonomy_query = array();

					if ( ! empty( $imprint ) ) {
						$taxonomy_query[] = array(
							'taxonomy' => 'imprint',
							'field'    => 'slug',
							'terms'    => $imprint->slug,
						);
					}

					if ( ! empty( $category ) ) {
						$taxonomy_query[] = array(
							'taxonomy' => 'book-category',
							'field'    => 'slug',
							'terms'    => $category->slug,
						);
					}

					$meta_query = array();

					if ( $new_releases ) {
						$meta_query[] = array(
							'key'     => 'published_date',
							'value'   => date( 'Y-m-d' ),
							'compare' => '<=',
							'type'    => 'DATE',
						);
					}

					if ( $coming_soon ) {
						$meta_query[] = array(
							'key'     => 'published_date',
							'value'   => date( 'Y-m-d' ),
							'compare' => '>',
							'type'    => 'DATE',
						);
					}

					$carouselPosts = get_posts(
						array(
							'post_type'      => $type,
							'posts_per_page' => 12,
							'post__in'       => $post_ids,
							'tax_query'      => $taxonomy_query,
							'meta_query'     => $meta_query,
							'meta_key'       => 'published_date',
							'orderby'        => 'meta_value',
							'order'          => 'DESC',
						)
					);

				} elseif ( $type == 'post' ) {

					$taxonomy_query = array();
					if ( ! empty( $category_article ) ) {
						$taxonomy_query[] = array(
							'taxonomy' => 'category',
							'field'    => 'slug',
							'terms'    => $category_article->slug,

						);
						$carouselPosts = get_posts(
							array(
								'post_type'      => 'post',
								'posts_per_page' => 12,
								'tax_query'      => $taxonomy_query,
							)
						);
					} else {
						$carouselPosts = get_posts(
							array(
								'post_type'      => $type,
								'posts_per_page' => 12,
								'post__in'       => $post_ids,
								'orderby'        => 'post__in',
							)
						);
					}
				} else {
					$carouselPosts = get_posts(
						array(
							'post_type'      => $type,
							'posts_per_page' => 12,
							'post__in'       => $post_ids,
							'orderby'        => 'post__in',
						)
					);
				}

				if ( $type == 'press-release' ) {
					$type = 'post';
				}

				if ( $type == 'book' ) {
					$outer_class = 'whitespace-normal pr-4 translate-x-4 sm:translate-x-8 xl:translate-x-14 xxl:translate-x-carousel';
					if ( $carouselPosts ) {
						foreach ( $carouselPosts as $carouselPost ) {
							echo '<div class="carousel-item snap-start inline-block w-carousel">';
							$postID = $carouselPost->ID;
							$text   = strip_tags( html_entity_decode( get_post_meta( $postID, 'edition_copy_description', true ) ) );
							echo '<div class="' . $outer_class . '">';
							get_template_part(
								'/blocks/cards/' . $type,
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
				}
				if ( $type == 'online-activity' ) {
					$outer_class = 'whitespace-normal pr-4 translate-x-4 sm:translate-x-8 xl:translate-x-14 xxl:translate-x-carousel';
					if ( $carouselPosts ) {
						foreach ( $carouselPosts as $carouselPost ) {
							$activityType = get_field( 'builder', $carouselPost )[0]['group_2']['type'] ?? '';
							$activityType = get_field( 'builder', $carouselPost )[0]['group_2']['type'] ?? '';
							$text         = get_field( 'builder', $carouselPost )[0]['group_1']['text'] ?? '';
							$card_type    = 'book';
							$w_class      = 'w-carousel';
							if ( $activityType == 'colouring' ) {
								$activityType = 'online colouring';
							}
							if ( $activityType == 'puzzle' ) {
								$activityType = 'Puzzles & Activities';
							}
							if ( $activityType == 'app' ) {
								$activityType = 'App';
								$card_type    = 'post';
								$w_class      = 'w-carousel-post';
							}
							if ( $activityType == 'resource' ) {
								$activityType = 'Learning Resources';
							}
							echo '<div class="carousel-item snap-start inline-block ' . $w_class . '">';
							$postID = $carouselPost->ID;
							echo '<div class="' . $outer_class . '">';
							get_template_part(
								'/blocks/cards/' . $card_type,
								null,
								array(
									'image'     => get_the_post_thumbnail_url( $postID, 'large' ) ?? '',
									'title'     => get_the_title( $postID ) ?? '',
									'text'      => limitText( strip_tags( $text ) ) ?? '',
									'tag'       => $activityType ?? '',
									'authors'   => authorNames( $postID ),
									'page_link' => get_permalink( $postID ) ?? '',
								)
							);
							echo '</div>';
							echo '</div>';
						}
					}
				}
				if ( $type == 'post' ) {
					$outer_class = 'whitespace-normal pr-4 translate-x-4 sm:translate-x-8 xl:translate-x-14 xxl:translate-x-carousel';
					if ( $carouselPosts ) {
						foreach ( $carouselPosts as $carouselPost ) {

							$title = get_the_title( $carouselPost );
							if ( ! $title ) {
								continue;
							}
							$text  = limitText( get_the_excerpt( $carouselPost ), 200 );
							$image = get_the_post_thumbnail_url( $carouselPost, 'large' );
							if ( $image ) {
								$image = $image;
							} else {
								$image = get_template_directory_uri() . '/assets/images/placeholder.jpg';
							}
							$categories = get_the_category( $carouselPost );

							echo '<div class="carousel-item snap-start inline-block w-carousel-post">';
							echo '<div class="' . $outer_class . '">';
							get_template_part(
								'/blocks/cards/' . $type,
								null,
								array(
									'image'      => $image ?? '',
									'title'      => $title ?? '',
									'text'       => $text ?? '',
									'categories' => $categories ?? '',
									'page_link'  => get_permalink( $carouselPost ) ?? '',
								)
							);
							echo '</div>';
							echo '</div>';
						}
					}
				}
				if ( $type == 'charity' ) {
					$outer_class = 'whitespace-normal pr-4 translate-x-4 sm:translate-x-8 xl:translate-x-14 xxl:translate-x-carousel';
					if ( $carouselPosts ) {
						foreach ( $carouselPosts as $carouselPost ) {
							echo '<div class="carousel-item snap-start flex items-center mt-12 mr-12 max-w-s">';
							$postID = $carouselPost->ID;
							echo '<div class="' . $outer_class . '">';
							get_template_part(
								'/blocks/cards/' . $type,
								null,
								array(
									'logo' => wp_get_attachment_image_src( get_field( 'logo', $postID ), 'full' )[0] ?? '',
									'link' => get_field( 'website', $postID ) ?? '',
								)
							);
							echo '</div>';
							echo '</div>';
						}
					}
				}
				?>
			</div>
		</div>


		<?php
		if ( ( $heading || $text ) && $type !== 'charity' ) {
			echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 mb-10 text-sky-900 flex justify-center select-none">';
			echo '<div class="nav-wrap hidden flex items-center justify-end -mr-0.5">';
			echo '<div class="w-48 sm:hidden flex text-sky-900 flex-wrap items-center justify-center">';
			echo '<span class="prev flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-current rotate-180' ) . '</span>';
			echo '<span class="next flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-current' ) . '</span>';
			echo '</div>';
			echo '</div>';

			echo '</div>';
		}
		if ( ( $heading || $text ) && $type === 'charity' ) {
			echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 mb-10 text-sky-900 flex justify-center select-none">';
			echo '<div class="nav-wrap flex items-center justify-end -mr-0.5">';
			echo '<div class="w-48  flex text-sky-900 flex-wrap items-center justify-center">';
			echo '<span class="prev flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-current rotate-180' ) . '</span>';
			echo '<span class="next flex items-center justify-center w-14 h-10 border border-sky-900 rounded-3xl m-0.5 cursor-pointer">' . svg( 'arrow', 'w-3 stroke-current' ) . '</span>';
			echo '</div>';
			echo '</div>';

			echo '</div>';
		}

		if ( $type == 'charity' && $button ) {
			echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 mb-10 text-sky-900 flex justify-center select-none">';
			echo '<a class="inline-block font-medium py-3 px-8 bg-sky-900 text-white rounded-3xl" href="' . $button['url'] . '" target="' . $button['target'] . '">' . $button['title'] . '</a>';
			echo '</div>';
		}
		?>

	</div>
</div>
