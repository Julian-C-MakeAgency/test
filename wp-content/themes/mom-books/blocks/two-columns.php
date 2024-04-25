<?php
$group_1 = get_sub_field( 'group_1' );
$group_2 = get_sub_field( 'group_2' );
$heading = $group_1['heading'] ?? '';
$text    = $group_1['text'] ?? '';
$type    = $group_2['type'] ?? '';
?>


<div class="cards">
	<div class="relative py-16 bg-slate-100">
		<?php
		if ( $heading || $text ) {
			echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 pb-14 text-sky-900">';
			if ( $heading ) {
				echo '<h2 class="text-4xl sm:text-5xl font-medium text-center sm:text-left">' . $heading . '</h2>';
			}
			if ( $text ) {
				echo '<p class="text-lg text-center sm:text-left mt-4">' . $text . '</p>';
			}
			echo '</div>';
		}
		?>
		<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 grid grid-cols-1 lg:grid-cols-2 gap-x-4 gap-y-12">
			<?php

			$items = array();
			if ( $type == 'book' ) {
				$items = get_posts(
					array(
						'post_type'      => 'book',
						'posts_per_page' => 12,
						'orderby'        => 'post__in',
						'post__in'       => $group_2['books'] ?? array(),
					)
				);
			} elseif ( $type == 'contributor' ) {
				$items = get_terms(
					array(
						'taxonomy'       => 'contributor',
						'posts_per_page' => 12,
						'hide_empty'     => false,
						'include'        => $group_2['contributors'] ?? array(),
						'orderby'        => 'include',
					)
				);
			}


			if ( $items ) {
				foreach ( $items as $item ) {
					if ( $type == 'book' ) {
						$item = $item->ID;
						$text = strip_tags( html_entity_decode( get_post_meta( $item, 'edition_copy_description', true ) ) );
						echo '<div>';
						get_template_part(
							'/blocks/cards/' . 'two-col',
							null,
							array(
								'image'  => '<img src="' . get_post_meta( $item, 'jacket_image_url_onix_image', true ) . '">',
								'title'  => get_post_meta( $item, 'work_cover_title', true ),
								'text'   => limitText( $text ),
								'tag'    => get_post_meta( $item, 'edition_imprint', true ),
								'price'  => get_post_meta( $item, 'edition_published_price', true ),
								'author' => get_post_meta( $item, 'author_forename', true ) . ' ' . get_post_meta( $item, 'author_surname', true ),
							)
						);
						echo '</div>';
					} elseif ( $type == 'contributor' ) {
						$description = $item->description ?? '';
						$text        = strip_tags( html_entity_decode( $description ) );
						echo '<div>';
						get_template_part(
							'/blocks/cards/' . 'two-col',
							null,
							array(
								'image' => get_term_meta( $item->term_id, 'image' )[0] ?? '',
								'title' => get_term_meta( $item->term_id, 'personrelationship_role' )[0] ? 'About the ' . get_term_meta( $item->term_id, 'personrelationship_role' )[0] : '',
								'text'  => limitText( $text ),
							)
						);
						echo '</div>';
					}
				}
			}
			?>
		</div>
	</div>
</div>
