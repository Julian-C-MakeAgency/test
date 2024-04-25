<?php

get_header();
echo '<div class="m-auto max-w-8xl px-2 sm:px-6 xl:px-12 flex flex-wrap pt-24 pb-12">';
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();?>

		<?php
		$work                                     = get_post_meta( get_the_ID(), 'work', true ) ?? '';
		$edition_info                             = get_post_meta( get_the_ID(), 'edition_info', true ) ?? '';
		$edition_edition_status                   = $edition_info[0]['edition_status'] ?? '';
		$edition_copy_sales_pointsdouble_new_line = get_post_meta( get_the_ID(), 'edition_copy_sales_pointsdouble_new_line', true ) ?? '';
		$review_copy_colon                        = get_post_meta( get_the_ID(), 'review_copy_colon', true ) ?? '';
		$work_fiction_non_fiction                 = get_post_meta( get_the_ID(), 'work_fiction', true ) ?? '';
		$similar_titles                           = get_post_meta( get_the_ID(), 'similar_titles', true ) ?? '';
		$lookinside                               = get_post_meta( get_the_ID(), 'lookinside', true ) ?? '';
		$price                                    = $edition_info[0]['edition_published_price'] ?? '';
		$edition_publication_date                 = $edition_info[0]['edition_publication_date'] ?? '';
		$isbn                                     = get_post_meta( get_the_ID(), 'isbn', true ) ?? '';
		$isbn13                                   = get_post_meta( get_the_ID(), 'isbn13', true ) ?? '';
		$book_category                            = wp_get_post_terms( get_the_ID(), 'book-category' ) ?? '';
		$edition_binding                          = $edition_info[0]['edition_binding'] ?? '';
		$edition_format                           = $edition_info[0]['edition_format'] ?? '';
		$edition_extent                           = $edition_info[0]['edition_extent'] ?? '';
		$edition_edition_target                   = $edition_info[0]['edition_target_audience'] ?? '';
		$edition_territory                        = $edition_info[0]['edition_territory'] ?? '';
		$group_code_cbmc_age1                     = $edition_info[0]['group_code_cbmc_age1'] ?? '';
		$edition_illustration_details             = $edition_info[0]['edition_illustration_details'] ?? '';
		$authorNames                              = get_post_meta( get_the_ID(), 'authors', true ) ?? '';
		$contributorTerms                         = wp_get_post_terms( get_the_ID(), 'contributor' ) ?? '';
		$contributorAuthors                       = array();
		if ( $contributorTerms ) {
			foreach ( $contributorTerms as $term ) {
				$author = get_term_meta( $term->term_id, 'personrelationship_role', true ) ?? '';
				if ( $author == 'Author' ) {
					$contributorAuthors[] = $term->name;
				}
			}
		}
		$authorNamesArray = ! empty( $authorNames ) && is_array( $authorNames ) ? $authorNames : array();
		$authors          = array_unique( array_merge( $authorNamesArray, $contributorAuthors ) );
		$tag              = wp_get_post_terms( get_the_ID(), 'imprint' )[0]->name ?? '';
		if ( $tag == 'Buster Books' ) {
			$tagClass = 'bg-sky-500';
		} elseif ( $tag == 'LOM ART' ) {
			$tagClass = 'bg-violet-600';
		} else {
			$tagClass = 'bg-sky-900';
		}
		?>
		<div class="w-full md:w-6/12 px-2">
			<div class="pr-12">
				<?php
				$image = get_post_meta( get_the_ID(), 'jacket_image_url_onix_image', true );
				echo '<div class="w-full">';

				get_template_part(
					'/blocks/cards/' . 'book',
					null,
					array(
						'image' => $image,
						'big'   => true,
					)
				);

				echo '</div>';
				?>


			</div>
		</div>
		<div class="w-full md:w-6/12 px-4">
			<?php

			if ( $authors ) {
				if ( is_array( $authors ) ) {
					$authors = implode( ', ', $authors );
				}
				echo '<p class="text-slate-500 uppercase mb-4 text-xs font-medium">' . $authors . '</p>';
			}

			if ( get_the_title() ) {
				echo '<h3 class="text-3xl sm:text-5xl text-sky-900 mb-6 font-medium leading-tight">' . get_the_title() . '</h3>';
			}
			if ( get_field( 'edition_subtitle' ) ) {
				echo '<p class="text-slate-600 text-2xl mb-6">' . get_field( 'edition_subtitle' ) . '</p>';
			}

			if ( $price ) {
				echo '<p class="text-sky-900 mb-4 text-xl font-medium mb-6">Price: £' . $price . '</p>';
			}
			if ( $lookinside ) {
				echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js" integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ==" crossorigin="anonymous"></script>';
				echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
				echo '<div>';
				// Button to open Lightbox
				echo '<button id="lookInsideBtn" class="inline-block font-medium py-3 px-8 bg-sky-900 text-white rounded-3xl cursor-pointer">Look Inside</button>';
				echo '</div>';

				// Assuming you have an array of image URLs
				foreach ( $lookinside as $url ) {
					echo '<a href="' . $url . '" data-lightbox="image-set" style="display:none;"></a>';
				}

				// JavaScript to trigger Lightbox
				echo '<script>';
				echo 'document.getElementById("lookInsideBtn").addEventListener("click", function() {';
				echo 'document.querySelectorAll("[data-lightbox=\'image-set\']")[0].click();';
				echo '});';
				echo '</script>';
			}



			// echo '<div class="my-10"><a class="inline-block font-medium py-3 px-8 bg-sky-900 text-white rounded-3xl">See inside book</a></div>';


			if ( $edition_info ) {

				if ( count( $edition_info ) > 1 ) {
					echo '<div class="mt-16 mb-6">';
					echo '<h2 class="text-3xl sm:text-4xl font-medium text-left text-sky-900">Select a format:</h2>';
					echo '</div>';
					echo '<div class="max-w-48">';
					echo '<select class="edition-select styled">';
					$es_count = 1;
					foreach ( $edition_info as $item ) {
						$type = $item['edition_product_type'] ?? '';
						if ( $type == 'Book' ) {
							if ( $item['edition_binding'] == 'Hardback' ) {
								$type = 'Hardback';
							} elseif ( $item['edition_binding'] == 'Paperback' ) {
								$type = 'Paperback';
							} elseif ( $item['edition_binding'] == 'Trade Paperback' ) {
								$type = 'Trade Paperback';
							}
						}
						if ( $type ) {
							echo '<option value="' . $es_count++ . '">' . $type . '</option>';
						}
					}
					echo '</select>';
					echo '</div>';
				}
				?>

				<?php
			}


			if ( $isbn || $isbn13 ) {
				if ( $isbn ) {
					$isbn = explode( ',', $isbn );
				}
				if ( $isbn13 ) {
					$isbn13 = explode( ',', $isbn13 );
				}
				echo '<div class="mt-16 mb-6">';
				echo '<h2 class="text-3xl sm:text-4xl font-medium text-left text-sky-900">Select a retailer:</h2>';
				echo '</div>';
				echo '<div class="max-w-60">';
				echo '<select class="retailer-select styled">';
				echo '<option value="">Select a retailer</option>';
				if ( $isbn ) {
					echo '<option value="https://www.amazon.co.uk/dp/' . $isbn[0] . '">Amazon</option>';
				}
				if ( $isbn13 ) {
					print_r( $isbn13 );
					echo '<option value="https://uk.bookshop.org/a/596/' . $isbn13[0] . '">Bookshop</option>';
					echo '<option value="https://www.hive.co.uk/Search/Keyword?keyword=' . $isbn13[0] . '&productType=0">Hive</option>';
					echo '<option value="https://www.waterstones.com/book/' . $isbn13[0] . '">Waterstones</option>';
					echo '<option value="https://blackwells.co.uk/bookshop/product/' . $isbn13[0] . '">Blackwells</option>';
					echo '<option value="https://www.wordery.com/search?term=' . $isbn13[0] . '">Wordery</option>';
					echo '<option value="https://www.whsmith.co.uk/search?q=' . $isbn13[0] . '">WHSmith</option>';
					echo '<option value="https://www.foyles.co.uk/all?term=' . $isbn13[0] . '">Foyles</option>';
					echo '<option value="https://www.easons.com/Search?q=' . $isbn13[0] . '">Easons</option>';
				}
				echo '</select>';
				echo '</div>';
			}



			?>
		</div>
		<div class="w-full md:w-6/12 px-4 order-4 md:order-3" id="details-section">
			<div class="md:pr-12">

				<?php
				if ( $edition_info ) {
					$edition_info_count = 0;
					echo '<div class="w-full md:max-w-80">';
					foreach ( $edition_info as $item ) {
						$hide = $edition_info_count > 0 ? 'hidden' : '';
						++$edition_info_count;
						echo '<div>';
						echo '<div class="' . $hide . ' edition-info" data-edition="' . $edition_info_count . '">';
						echo '<h2 class="accord group text-3xl md:text-2xl font-medium text-left py-7 text-sky-900 relative cursor-pointer">Details';
						echo '<div class="absolute right-0 top-1/2 w-[20px] h-[20px] -mt-[10px] cursor-pointer toggle"><div class="w-[20px] h-[20px] flex flex-wrap justify-center items-center relative"><span class="w-[20px] h-[2px] bg-sky-900 my-1 inline-block absolute"></span><span class="w-[20px] h-[2px] bg-sky-900 my-1 inline-block absolute -rotate-90 group-[.open]:rotate-0 transition-all"></span></div></div>';
						echo '</h2>';
						echo '<div class="group open">';
						echo '<div class="max-h-0 group-[.open]:max-h-none overflow-hidden transition-all">';
						echo '<div class="mb-8 pb-4 text-sky-900 border-b border-slate-500">';
						if ( $tag ) {
							echo '<p class="text-lg font-medium mb-4">Imprint: <span class="' . $tagClass . ' ml-1 text-white text-xs uppercase p-2 rounded inline-block tracking-widest leading-3">' . $tag . '</span></p>';
						}
						if ( $item['edition_publication_date'] ) {
							echo '<p class="text-lg font-medium mb-4">Publication date: <span class="font-light ml-1">' . $item['edition_publication_date'] . '</span></p>';
						}
						if ( $item['edition_isbn13'] ) {
							echo '<p class="text-lg font-medium mb-4">ISBN: <span class="font-light ml-1">' . $item['edition_isbn13'] . '</span></p>';
						}
						echo '</div>';

						echo '<div class="mb-8 pb-4 text-sky-900 border-b border-slate-500">';
						if ( $item['group_code_cbmc_age1'] ?? '' ) {
							$age_range = letterToAgeGroup( $item['group_code_cbmc_age1'] );
							echo '<p class="text-lg font-medium mb-4">Age: <span class="font-light ml-1">' . $age_range . '</span></p>';
						}
						if ( $work_fiction_non_fiction ) {
							$fictionTitle = $work_fiction_non_fiction == 'Yes' ? 'Fiction' : 'Non-Fiction';
							if ( $fictionTitle ) {
								echo '<p class="text-lg font-medium mb-4">Subject: <span class="font-light ml-1">' . $fictionTitle . '</span></p>';
							}
						}
						if ( $book_category ) {
							$countTotal = count( $book_category );
							$title      = $countTotal > 1 ? 'Categories' : 'Category';
							echo '<p class="text-lg font-medium mb-4">' . $title . ': <span class="font-light">';
							$count = 1;
							foreach ( $book_category as $cat ) {
								$cat = $cat->name;
								echo $cat;
								if ( $count < $countTotal ) {
									echo ', ';
								}
								++$count;
							}
							echo '</span></p>';
						}
						echo '</div>';

						echo '<div class="mb-8 pb-4 text-sky-900">';
						if ( $item['edition_binding'] ?? '' ) {
							echo '<p class="text-lg font-medium mb-4">Binding: <span class="font-light ml-1">' . $item['edition_binding'] . '</span></p>';
						}
						if ( $item['edition_format'] ?? '' ) {
							echo '<p class="text-lg font-medium mb-4">Size: <span class="font-light ml-1">' . $item['edition_format'] . '</span></p>';
						}
						if ( $item['edition_extent'] ?? '' ) {
							echo '<p class="text-lg font-medium mb-4">Extent: <span class="font-light ml-1">' . $item['edition_extent'] . ' pages</span></p>';
						}
						if ( $item['edition_illustration_details'] ?? '' ) {
							echo '<p class="text-lg font-medium mb-4">Illustration: <span class="font-light ml-1">' . $item['edition_illustration_details'] . '</span></p>';
						}
						if ( $item['edition_territory'] ?? '' ) {
							echo '<p class="text-lg font-medium mb-4">Territorial Rights: <span class="font-light ml-1">' . $item['edition_territory'] . '</span></p>';
						}
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';

					}

					// Trade options fields
					$trade       = get_field( 'trade', 'options' );
					$trade_title = $trade['title'];
					$trade_text  = $trade['text'];
					?>
					<div class="trade text-sky-900 pt-8 mb-8 pb-8 border-b border-t border-slate-500">
						<?php
						echo $trade_title ? '<p class="text-2xl mb-4">' . $trade_title . '</p>' : '';
						echo $trade_text ? '<p class="mb-4">' . $trade['text'] . '</p>' : '';
						?>
						<a class="inline-block font-medium py-3 px-8 bg-sky-900 text-white rounded-3xl" href="<?php echo get_home_url() . '/trade-enquiry/?workid=' . get_the_title() . ' - ' . $work; ?>" target="">Enquire now</a>
					</div>
					<div class="share-page text-sky-900 mt-8 mb-8">
						<p class="text-2xl mb-4">Share</p>
						<div class="flex items-center">
							<a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title() . ' ' . get_the_permalink(); ?>" target="_blank" class="inline-block h-10 w-10 flex items-center justify-center"><?php echo svg( 'x', 'w-5 h-5 fill-current' ); ?></a>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank" class="inline-block h-10 w-10 flex items-center justify-center"><?php echo svg( 'facebook', 'w-7 h-7 -mt-0.5 fill-current' ); ?></a>
							<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>&summary=&source=" target="_blank" class="inline-block h-10 w-10 flex items-center justify-center"><?php echo svg( 'linkedin', 'w-6 h-6 fill-current -mt-0.5' ); ?></a>
						</div>
					</div>
					<?php
					echo '</div>';
				}
				?>

			</div>
		</div>
		<div class="w-full md:w-6/12 px-4 md:order-4">
			<?php

			if ( get_field( 'edition_copy_description' ) ) {
				echo '<div class="mt-16 pb-16 border-b border-slate-500">';
				echo '<h2 class="text-3xl sm:text-4xl font-medium text-left text-sky-900 mb-6">Summary:</h2>';
				$description         = get_field( 'edition_copy_description' );
				$decoded_description = html_entity_decode( $description, ENT_QUOTES, 'UTF-8' );
				echo '<div class="text-slate-600 sm:text-lg prose-xl">' . nl2br( $decoded_description ) . '</div>';
				echo '</div>';
			}


			if ( $review_copy_colon ) {
				echo '<div class="border-b border-slate-500 my-6">';
				echo '<h2 class="text-3xl sm:text-4xl font-medium text-left text-sky-900 mb-6">Reviews:</h2>';
				echo '<div class="text-slate-600 sm:text-xl prose-xl">';
				foreach ( splitReviews( $review_copy_colon ) as $review ) {
					echo '<div class="mb-4">';
					echo '<p class="font-medium mb-2 italic text-lg">' . $review['review'] . '</p>';
					echo '<p class="mb-4 mt-0 uppercase text-slate-500 text-sm">' . $review['by'] . '</p>';
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
			}
			if ( $edition_copy_sales_pointsdouble_new_line ) {
				echo '<div>';
				echo '<div class="border-b border-slate-500 py-6">';
				echo '<h2 class="group accord cursor-pointer select-none text-3xl sm:text-4xl font-medium text-left text-sky-900 relative">Sales points:';
				echo '<div class="absolute right-0 top-1/2 w-[20px] h-[20px] -mt-[10px] cursor-pointer toggle"><div class="w-[20px] h-[20px] flex flex-wrap justify-center items-center relative"><span class="w-[20px] h-[2px] bg-sky-900 my-1 inline-block absolute"></span><span class="w-[20px] h-[2px] bg-sky-900 my-1 inline-block absolute -rotate-90 group-[.open]:rotate-0 transition-all"></span></div></div>';
				echo '</h2>';
				echo '<div class="group open">';
				echo '<ul class="text-slate-600 sm:text-xl prose-xl list-disc pl-6 max-h-0 group-[.open]:max-h-none overflow-hidden transition-all">';
				foreach ( splitKeyInfo( $edition_copy_sales_pointsdouble_new_line ) as $info ) {
					echo '<li class="mb-4">';
					echo '<p class="mb-2 text-lg">' . $info . '</p>';
					echo '</li>';
				}
				echo '</ul>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			if ( $contributorTerms ) {

				usort( $contributorTerms, 'compare_roles' );

				foreach ( $contributorTerms as $term ) {
					$meta      = get_term_meta( $term->term_id );
					$image     = $meta['image'][0] ?? '';
					$type      = $meta['personrelationship_role'][0] ?? '';
					$permalink = get_term_link( $term->term_id );
					?>
					<div>
						<div class="flex flex-wrap border-b border-slate-500 relative py-6">
							<?php
							if ( $type ) {
								echo '<h2 class="group accord cursor-pointer select-nonetext-3xl sm:text-4xl font-medium text-left text-sky-900 relative w-full">About the ' . $type . ':';
								echo '<div class="absolute right-0 top-1/2 w-[20px] h-[20px] -mt-[10px] cursor-pointer toggle"><div class="w-[20px] h-[20px] flex flex-wrap justify-center items-center relative"><span class="w-[20px] h-[2px] bg-sky-900 my-1 inline-block absolute"></span><span class="w-[20px] h-[2px] bg-sky-900 my-1 inline-block absolute -rotate-90 group-[.open]:rotate-0 transition-all"></span></div></div>';
								echo '</h2>';
							}
							?>
							<div class="group open">
								<div class="w-full relative max-h-0 group-[.open]:max-h-none overflow-hidden transition-all">
									<div class="pt-6 flex flex-wrap">
										<div class="xs:w-3/12">
											<div class="xs:pr-8">
												<div class="shadow max-h-full rounded-md mb-4 overflow-hidden"><?php echo $image; ?></div>
											</div>
										</div>
										<div class="xs:w-9/12 flex lg:block items-center">
											<div class="lg:pr-4">
												<?php
												if ( $term->name ) {
													echo '<h3 class="text-2xl text-sky-900 mb-4 font-medium">';
													if ( $permalink ) {
														echo '<a href="' . $permalink . '">' . $term->name . '</a>';
													} else {
														echo $term->name;
													}
													echo '</h3>';
												}
												if ( $term->description ) {
													echo '<p class="text-slate-600 text-base">' . $term->description . '</p>';
												}
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			}

			?>
		</div>
		<?php
	endwhile;

endif;
echo '</div>';

?>
	<div class="m-auto max-w-8xl px-2 sm:px-6 xl:px-12 py-12">
		<?php


		$similar_titles = implode( ' ', extractNumbersInBrackets( $similar_titles ) ) ?? '';
		$similar_titles = $similar_titles ? similarBooks( $similar_titles, get_the_ID() ) : '';
		if ( $similar_titles ) {

			?>
			<div class="">
				<div class="relative pt-16 pb-8">
					<?php
					echo '<div class=" pb-10 text-sky-900">';
					echo '<h2 class="text-4xl sm:text-5xl font-medium text-left">Related titles</h2>';
					echo '</div>';
					?>
					<div class=" flex flex-wrap">
						<?php


						foreach ( $similar_titles as $item ) {

							$outer_class = 'w-full sm:w-1/2 md:w-1/3 px-2 mb-8';
							$card        = 'book';
							$image       = get_post_meta( $item, 'jacket_image_url_onix_image', true );
							$title       = get_the_title( $item );
							$text        = limitText( strip_tags( get_post_meta( $item, 'edition_copy_description', true ) ), 300 );
							$terms       = wp_get_post_terms( $item, 'imprint' );
							$tag         = $terms[0]->name ?? '';
							$author      = get_post_meta( $item, 'authors', true ) ?? '';
							$page_link   = get_permalink( $item ) ?? '';
							echo '<div class="' . $outer_class . '">';
							get_template_part(
								'/blocks/cards/' . $card,
								null,
								array(
									'image'     => $image,
									'title'     => $title,
									'text'      => $text,
									'tag'       => $tag,
									'author'    => $author,
									'page_link' => $page_link,
								)
							);
							echo '</div>';
						}
						?>
					</div>
				</div>
			</div>



			<?php
		}
		?>
	</div>
<?php
get_footer();
