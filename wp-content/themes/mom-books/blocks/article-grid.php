<?php
$group_1   = get_sub_field( 'group_1' ) ?? array();
$group_2   = get_sub_field( 'group_2' ) ?? array();
$bg_colour = get_sub_field( 'background_colour' ) ?? '';
$heading   = $group_1['heading'] ?? '';
$articles  = $group_1['articles'] ?? array();
$count     = 1;
?>

<div class="articles bg-[<?php echo $bg_colour; ?>]">
	<div class="text-sky-900">
		<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-16">
			<div class="pb-10">
				<h2 class=" text-4xl sm:text-5xl font-medium text-center sm:text-left"><?php echo $heading; ?></h2>
			</div>
			<div class="grid grid-cols-1 gap-y-8 sm:gap-y-4 md:grid-cols-2 md:grid-rows-3 gap-x-4">

				<?php
				if ( $articles ) {
					foreach ( $articles as $article ) {
						$title = get_the_title( $article );
						if ( ! $title ) {
							continue;
						}
						$text  = limitText( get_the_excerpt( $article ), 200 );
						$image = get_the_post_thumbnail_url( $article, 'large' );
						if ( $image ) {
							$image = $image;
						} else {
							$image = get_template_directory_uri() . '/assets/images/placeholder.jpg';
						}
						$categories = get_the_category( $article );

						if ( $count == 1 ) {
							++$count;
							?>
							<div class="relative rounded-lg bg-slate-100 overflow-hidden sm:row-span-3">
								<div class="flex flex-wrap items-center">
									<div class="w-full h-56 md:h-96 relative">
										<img src="<?php echo $image; ?>" class="absolute inset-0 object-cover w-full h-full">
									</div>
									<div class="w-full p-8 flex">
										<div>
											<?php
											if ( $categories ) {
												foreach ( $categories as $category ) {
													echo '<span class="bg-slate-500 mr-2 text-white text-xs uppercase p-1.5 sm:p-2 rounded mb-4 inline-block tracking-widest leading-3">' . $category->name . '</span>';
												}
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
								<?php
								if ( get_the_permalink() ) {
									echo '<a href="' . get_the_permalink( $article ) . '" class="absolute w-full h-full inset-0 z-10"></a>';
								}
								?>
							</div>
							<?php

						} else {
							?>
							<div class="relative rounded-lg bg-slate-100 overflow-hidden">
								<div class="flex flex-wrap items-center h-full">
									<div class="w-full md:w-1/4 h-56 md:h-full relative">
										<img src="<?php echo $image; ?>" class="absolute inset-0 object-cover w-full h-full">
									</div>
									<div class="w-full md:w-3/4 p-8 flex">
										<div>
											<?php
											if ( $categories ) {
												foreach ( $categories as $category ) {
													echo '<span class="bg-slate-500 mr-2 text-white text-xs uppercase p-1.5 sm:p-2 rounded mb-4 inline-block tracking-widest leading-3">' . $category->name . '</span>';
												}
											}
											if ( $title ) {
												echo '<h3 class="text-2xl mb-4 font-medium">' . $title . '</h3>';
											}
											if ( $text ) {
												echo '<p class="text-lg md:hidden">' . $text . '</p>';
											}
											?>
										</div>
									</div>
								</div>
								<?php
								if ( get_the_permalink() ) {
									echo '<a href="' . get_the_permalink( $article ) . '" class="absolute w-full h-full inset-0 z-10"></a>';
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
