<footer>
	<div class="relative">
		<div>
			<div class="absolute w-full h-full inset-0">
				<img class="w-full h-full object-cover" src="<?php echo get_home_url(); ?>/wp-content/uploads/2024/02/39929312697c19610ec867388ebc087a-1024x683.jpeg">
			</div>
			<div class="absolute bg-black opacity-60 w-full h-full inset-0"></div>
			<div class="relative text-white m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-16">
				<div class="max-w-2xl text-center m-auto">
					<div class="">
						<div class="m-auto w-28 h-28 flex items-center justify-center rounded-full bg-white mb-6">
							<?php echo svg( 'mom-logo', 'w-16 fill-sky-900' ); ?>
						</div>
					</div>
					<div class="prose prose-h2:text-3xl prose-headings:font-medium prose-headings:text-white prose-p:text-white prose-a:text-white mx-auto my-12 text-white">
						<?php

						echo do_shortcode( '[gravityform id="1" title="false" description="false" ajax="true"]' );
						echo '<p>By signing up, I confirm that I’m over 16. To find out what personal data we collect and how we use it, please visit our <a href="' . get_home_url() . '/privacy-policy/">Privacy Policy</a>.</p>';
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="relative text-white">
			<div class="absolute bg-black opacity-60 w-full h-full inset-0"></div>
			<div class="relative text-white m-auto max-w-8xl px-4 sm:px-8 xl:px-14 pt-20 flex flex-wrap">
				<div class="w-3/12 my-4">
					<div>
						<?php echo svg( 'mom-logo', 'fill-current w-28' ); ?>
					</div>
				</div>
				<div class="w-full md:w-2/12 my-4">
					<div>
						<ul>
							<?php
							$menu_name = 'footerone';
							$locations = get_nav_menu_locations();

							if ( $locations && isset( $locations[ $menu_name ] ) ) {
								$menu       = wp_get_nav_menu_object( $locations[ $menu_name ] );
								$menu_items = wp_get_nav_menu_items( $menu->term_id );
								$menu_name  = $menu->name;
								if ( strpos( $menu_name, 'oote' ) === false ) {
									echo '<h4 class="mb-4 text-xl font-semibold">' . $menu_name . '</h4>';
								}
								foreach ( $menu_items as $item ) {
									echo '<li class="mb-4"><a href="' . $item->url . '" target="' . $item->target . '">' . $item->title . '</a></li>';
								}
							}

							?>
						</ul>
					</div>
				</div>
				<div class="w-full md:w-2/12 my-4">
					<div>
						<ul>
							<?php
							$menu_name = 'footertwo';
							$locations = get_nav_menu_locations();

							if ( $locations && isset( $locations[ $menu_name ] ) ) {
								$menu       = wp_get_nav_menu_object( $locations[ $menu_name ] );
								$menu_items = wp_get_nav_menu_items( $menu->term_id );
								$menu_name  = $menu->name;
								if ( strpos( $menu_name, 'oote' ) === false ) {
									echo '<h4 class="mb-4 text-xl font-semibold">' . $menu_name . '</h4>';
								}
								foreach ( $menu_items as $item ) {
									echo '<li class="mb-4"><a href="' . $item->url . '" target="' . $item->target . '">' . $item->title . '</a></li>';
								}
							}

							?>
						</ul>
					</div>
				</div>
				<div class="w-full md:w-2/12 my-4">
					<div>
						<ul>
							<?php
							$menu_name = 'footerthree';
							$locations = get_nav_menu_locations();

							if ( $locations && isset( $locations[ $menu_name ] ) ) {
								$menu       = wp_get_nav_menu_object( $locations[ $menu_name ] );
								$menu_items = wp_get_nav_menu_items( $menu->term_id );
								$menu_name  = $menu->name;
								if ( strpos( $menu_name, 'oote' ) === false ) {
									echo '<h4 class="mb-4 text-xl font-semibold">' . $menu_name . '</h4>';
								}
								foreach ( $menu_items as $item ) {
									echo '<li class="mb-4"><a href="' . $item->url . '" target="' . $item->target . '">' . $item->title . '</a></li>';
								}
							}

							?>
						</ul>
					</div>
				</div>
				<div class="w-full md:w-3/12 my-4">
					<div>
						<?php
						$socials = get_field( 'socials', 'option' );
						if ( $socials ) {
							foreach ( $socials as $social ) {
								echo '<ul class="flex mb-6 pb-6 border-b border-white items-center">';
								$logo      = $social['logo'] ? wp_get_attachment_image_src( $social['logo'], 'large' )[0] : '';
								$x         = $social['x'] ?? '';
								$youtube   = $social['youtube'] ? : '';
								$instagram = $social['instagram'] ? : '';
								$facebook  = $social['facebook'] ? : '';
								echo '<li class="mr-6 w-12 text-center">' . ( $logo ? '<img class="max-w-10 max-h-10 inline-block" src="' . $logo . '">' : '' ) . '</li>';
								if ( $x ) {
									echo '<li class="mx-3"><a target="_blank" href="' . $x . '">' . svg( 'x', 'fill-current w-5' ) . '</a></li>';
								}
								if ( $youtube ) {
									echo '<li class="mx-3"><a target="_blank" href="' . $youtube . '">' . svg( 'youtube', 'fill-current w-8' ) . '</a></li>';
								}
								if ( $instagram ) {
									echo '<li class="mx-3"><a target="_blank" href="' . $instagram . '">' . svg( 'instagram', 'fill-current w-7' ) . '</a></li>';
								}
								if ( $facebook ) {
									echo '<li class="mx-3"><a target="_blank" href="' . $facebook . '">' . svg( 'facebook', 'fill-current w-7' ) . '</a></li>';
								}
								echo '</ul>';
							}
						}
						?>
					</div>
				</div>
				<div class="w-full my-12">
					<div class="pt-6 border-t border-white">
						<p class="inline-block mr-6">©<?php echo date( 'Y' ); ?> MOM Books. All rights reserved.</p>
						<ul class="inline-block">
							<?php
							$menu_name = 'footer';
							$locations = get_nav_menu_locations();

							if ( $locations && isset( $locations[ $menu_name ] ) ) {
								$menu       = wp_get_nav_menu_object( $locations[ $menu_name ] );
								$menu_items = wp_get_nav_menu_items( $menu->term_id );
								foreach ( $menu_items as $item ) {
									echo '<li class="inline-block mr-4"><a href="' . $item->url . '">' . $item->title . '</a></li>';
								}
							}

							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>



<?php wp_footer(); ?>
</body>
</html>
