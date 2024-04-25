<?php
get_header();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();?>
		<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-24">
			<div class="w-full md:max-w-5xl px-2 sm:px-6 xl:px-7 m-auto">
				<div class="w-full">
					<?php
					// echo '<span class="bg-slate-500 mr-2 text-white text-xs uppercase p-1.5 sm:p-2 rounded mb-4 inline-block tracking-widest leading-3">Press Release</span>';
					if ( get_the_title() ) {
						echo '<h2 class="text-sky-900 text-4xl sm:text-5xl leading-tight sm:leading-tight font-medium mb-6">' . get_the_title() . '</h2>';
					}
					echo '<p class="text-slate-500 font-medium uppercase pb-12"><span>' . get_the_date() . '</span><span class="w-2 h-2 bg-slate-500 inline-block rounded mx-4 relative -top-0.5"></span></spa><span>' . timeToRead( get_the_content() ) . '</span></p>';
					$image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
					if ( get_the_content() ) {
						echo '<div class="max-w-full text-sky-900 mb-6 [&_img.alignleft]:float-left [&_img.alignleft]:my-0 [&_img.alignleft]:pr-4 [&_img.alignleft]:pb-4 [&_ul]:list-disc [&_ol]:list-decimal prose-hr:border-sky-900 prose-lg prose-headings:text-sky-900 prose-headings:font-medium prose-h2:text-3xl">';
						if ( $image ) {
							echo '<img class="rounded-xl" src="' . $image . '">';
						}
						the_content();
						echo '</div>';
					}
					?>
				</div>
			</div>
		</div>
		<?php
	endwhile;
endif;
get_footer();
