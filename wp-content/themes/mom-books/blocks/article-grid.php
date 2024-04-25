<?php
/**
 * File documentation comment.
 *
 * @package YourTheme
 */

$group_1   = get_sub_field( 'group_1' ) ?? array();
$group_2   = get_sub_field( 'group_2' ) ?? array();
$bg_colour = get_sub_field( 'background_colour' ) ?? '';
$heading   = $group_1['heading'] ?? '';
$articles  = $group_1['articles'] ?? array();
$count     = 1;
?>

<div class="articles bg-[<?php echo esc_html( $bg_colour ); ?>]">
	<div class="text-sky-900">
		<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-16">
			<div class="pb-10">
				<h2 class="text-4xl sm:text-5xl font-medium text-center sm:text-left"><?php echo esc_html( $heading ); ?></h2>
			</div>
			<div class="grid grid-cols-1 gap-y-8 sm:gap-y-4 md:grid-cols-2 md:grid-rows-3 gap-x-4">

				<?php
				if ( $articles ) {
					foreach ( $articles as $article ) {
						$title_article = esc_html( get_the_title( $article ) );
						if ( ! $title_article ) {
							continue;
						}
						$text  = limitText( esc_html( get_the_excerpt( $article ) ), 200 );
						$image = get_the_post_thumbnail_url( $article, 'large' );
						if ( $image ) {
							$image = $image;
						} else {
							$image = get_template_directory_uri() . '/assets/images/placeholder.jpg';
						}
						$categories = get_the_category( $article );

						if ( 1 === $count ) {
							++$count;
							?>
							<div class="relative rounded-lg bg-slate-100 overflow-hidden sm:row-span-3">
								<div class="flex flex-wrap items-center">
									<div class="w-full h-56 md:h-96 relative">
										<img src="<?php echo esc_html( $image ); ?>" class="absolute inset-0 object-cover w-full h-full">
									</div>
									<div class="w-full p-8 flex">
										<div>
											<?php
											if ( $categories ) {
												foreach ( $categories as $category ) {
													echo '<span class="bg-slate-500 mr-2 text-white text-xs uppercase p-1.5 sm:p-2 rounded mb-4 inline-block tracking-widest leading-3">' . esc_html( $category->name ) . '</span>';
												}
											}
											if ( $title ) {
												echo '<h3 class="text-2xl mb-4 font-medium">' . esc_html( $title ) . '</h3>';
											}
											if ( $text ) {
												echo '<p class="text-lg">' . esc_html( $text ) . '</p>';
											}
											?>
										</div>
									</div>
								</div>
								<?php
								if ( get_the_permalink() ) {
									echo '<a href="' . esc_url( get_the_permalink( $article ) ) . '" class="absolute w-full h-full inset-0 z-10"></a>';
								}
								?>
							</div>
							<?php

						} else {
							?>
							<div class="relative rounded-lg bg-slate-100 overflow-hidden">
								<div class="flex flex-wrap items-center h-full">
									<div class="w-full md:w-1/4 h-56 md:h-full relative">
										<img src="<?php echo esc_html( $image ); ?>" class="absolute inset-0 object-cover w-full h-full">
									</div>
									<div class="w-full md:w-3/4 p-8 flex">
										<div>
											<?php
											if ( $categories ) {
												foreach ( $categories as $category ) {
													echo '<span class="bg-slate-500 mr-2 text-white text-xs uppercase p-1.5 sm:p-2 rounded mb-4 inline-block tracking-widest leading-3">' . esc_html( $category->name ) . '</span>';
												}
											}
											if ( $title ) {
												echo '<h3 class="text-2xl mb-4 font-medium">' . esc_html( $title ) . '</h3>';
											}
											if ( $text ) {
												echo '<p class="text-lg md:hidden">' . esc_html( $text ) . '</p>';
											}
											?>
										</div>
									</div>
								</div>
								<?php
								if ( get_the_permalink() ) {
									echo '<a href="' . esc_url( get_the_permalink( $article ) ) . '" class="absolute w-full h-full inset-0 z-10"></a>';
								}
								?>
							</div>
							<?php
						}
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>