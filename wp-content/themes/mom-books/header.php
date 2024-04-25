<!doctype html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-62SX8QLZX4"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-62SX8QLZX4'); </script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="select-none">
	<div class="h-[76px] relative z-50">
		<div class="text-sky-900 bg-white fixed w-full z-50 shadow-sm">
			<div class="bg-white py-3.5 m-auto max-w-8xl px-4 sm:px-8 xl:px-14 flex justify-between h-[76px]">
				<div class="flex items-center md:hidden">
					<?php echo svg( 'hamburger', 'w-6 stroke-current mob-toggle cursor-pointer' ); ?>
				</div>
				<div class="flex items-center">
					<a href="<?php echo home_url(); ?>"><?php echo svg( 'mom-logo', 'w-16 fill-current' ); ?></a>
					<div class="pl-9 hidden md:block">

						<?php




						$menuList = buildMenuTree( 'primary' );
						if ( $menuList ) {

							foreach ( $menuList as $item ) {
								// print_r( $item);
								$chevron = $item['children'] ? svg( 'chevron', 'w-3 fill-current inline-block ml-2 group-[.open]:rotate-180 -mt-0.5' ) : '';
								echo '<div class="inline-block nav-block group">';
								echo '<ul><li><a class="sky-900 mx-1.5 px-1.5 nav-link" href="' . esc_attr( $item['item']->url ) . '" class="inline-block text-base md:text-base">' . esc_html( $item['item']->title ) . $chevron . '</a></li></ul>';
								if ( ! empty( $item['children'] ) ) {
									echo '<div class="shadow-md absolute inset-x-0 top-0 -z-50 bg-white pt-[76px] overflow-hidden opacity-0 -translate-y-full group-[.open]:translate-y-0 group-[.open]:opacity-100">';
									echo '<div class=" relative max-w-8xl m-auto flex flex-wrap -z-20 bg-white px-4 sm:px-8 xl:px-14">';
									echo '<div class="w-4/12 xl:w-2/12 relative py-12">';
									echo '<div class="bg-slate-100 absolute h-full w-screen top-0 right-12 -z-20"></div>';
									$secondChildCount = 1;
									foreach ( $item['children'] as $child ) {
										$url = $child['item']->url;
										if ( $url == '#' ) {
											echo '<h3 class="sky-900 text-2xl relative pr-14 mb-6 second-menu-level" data-item-num="' . $secondChildCount++ . '">' . esc_html( $child['item']->title ) . '</h3>';
										} else {
											echo '<a href="' . $url . '" class="block sky-900 text-2xl relative pr-14 mb-6 second-menu-level" data-item-num="' . $secondChildCount++ . '">' . esc_html( $child['item']->title ) . '</a>';
										}
									}
									echo '</div>';
									echo '<div class="w-4/12 xl:w-4/12 relative py-12">';
									echo '<p class="uppercase text-slate-500 text-xs pb-6">categories</p>';
									$thirdChildCount = 1;
									foreach ( $item['children'] as $child ) {
										$thirdChildren = $child['children'] ?? '';
										if ( $thirdChildren ) {
											$moreThanFive = count( $thirdChildren ) > 5 ? 'grid grid-cols-2 gap-y-2 gap-x-6 pr-4' : '';
											$hidden       = $thirdChildCount > 1 ? 'hidden' : '';
											echo '<ul class="third-menu-level w-full ' . $moreThanFive . ' ' . $hidden . '" data-item-num="' . $thirdChildCount++ . '">';
											foreach ( $thirdChildren as $thirdChild ) {
												echo '<li class="mb-4"><a href="' . esc_attr( $thirdChild['item']->url ) . '" class="inline-block">' . esc_html( $thirdChild['item']->title ) . '</a></li>';
											}
											echo '</ul>';
										}
									}
									echo '</div>';

									echo '<div class="w-4/12 xl:w-6/12 relative py-12">';
									echo '<p class="uppercase text-slate-500 text-xs pb-6">imprints</p>';



									echo '<div class="flex flex-wrap">';

									$imprints = get_terms(
										array(
											'taxonomy'   => 'imprint',
											'hide_empty' => false,
											'orderby'    => 'name',
											'order'      => 'DESC',
										)
									);

									foreach ( $imprints as $imprint ) {
										$fields       = get_fields( 'imprint_' . $imprint->term_id ) ?? array();
										$imprint_page = $fields['imprint_page'] ?? '';
										$alt_name     = $fields['alternative_name'] ? : $imprint->name;
										$image        = ( $image = $fields['banner_image'] ) ? wp_get_attachment_image_src( $image, 'large' )[0] : '';
										$logo         = ( $logo = $fields['logo'] ) ? wp_get_attachment_image_src( $logo, 'large' )[0] : '';
										$menu_image   = ( $menu_image = $fields['menu_image'] ?? '' ) ? wp_get_attachment_image_src( $menu_image, 'large' )[0] : '';
										if ( $menu_image && $imprint_page ) {
											echo '<div class="w-1/3 relative px-1">';
											echo '<div class="h-56 lg:h-96 relative">';
											echo '<img class="absolute h-full w-full inset-0 object-cover" src="' . $menu_image . '">';
											echo '<div class="absolute w-full h-full inset-0 bg-black opacity-40"></div>';
											echo '<div class="absolute w-full bottom-0 text-white p-6 text-center">';
											echo '<img class="max-w-12 max-h-8 inline-block mb-2" src="' . $logo . '">';
											echo '<p>' . $alt_name . '</p>';
											echo '</div>';
											echo '<a class="absolute w-full h-full inset-0" href="' . $imprint_page . '"></a>';
											echo '</div>';
											echo '</div>';
										}
									}

									echo '</div>';



									echo '</div>';

									echo '</div>';
									echo '</div>';
								}
								echo '</div>';
							}
						}
						?>

					</div>
				</div>
				<div class="flex items-center">
					<div class="mr-2 xl:mr-6 hidden xl:block">
						<div class="relative">
							<form method="get" action="<?php echo home_url(); ?>/books">
								<input id="searchInput1" class="searchInput outline-0 inline-block border border-sky-900 pl-4 pr-12 py-2.5 text-sm rounded-3xl w-72 placeholder:text-sky-900 placeholder:opacity-60" type="text" autocomplete="off" placeholder="Search for book, author or ISBN" name="search">
								<input type="submit" id="searchSubmit" class="hidden">
								<label for="searchSubmit" class="hover:cursor-pointer absolute right-4 top-1/2 -mt-2.5">
									<?php echo svg( 'search', 'w-5 fill-current' ); ?>
								</label>
							</form>
							<div id="searchResults1" class="px-6 w-full top-14 rounded-md bg-white shadow-md absolute text-sm max-h-50vh overflow-scroll"></div>
						</div>
					</div>
					<div class="items-center -mr-2 flex">
						<a href="#" class="inline-block mx-2 xl:hidden search-open"><?php echo svg( 'search', 'w-6 p-0.5 fill-current' ); ?></a>
						<?php
						$socials = get_field( 'socials', 'option' );
						if ( $socials ) {
							$count = 0;
							foreach ( $socials as $social ) {
								if ( $count != 0 ) {
									break;
								}
								++$count;
								$logo      = $social['logo'] ? wp_get_attachment_image_src( $social['logo'], 'large' )[0] : '';
								$x         = $social['x'] ?? '';
								$youtube   = $social['youtube'] ? : '';
								$instagram = $social['instagram'] ? : '';
								$facebook  = $social['facebook'] ? : '';
								if ( $x ) {
									echo '<li class="hidden lg:inline-block mx-2 list-none"><a target="_blank" href="' . $x . '">' . svg( 'x', 'w-5 p-0.5 fill-current' ) . '</a></li>';
								}
								if ( $youtube ) {
									echo '<li class="hidden lg:inline-block mx-2 list-none"><a target="_blank" href="' . $youtube . '">' . svg( 'youtube', 'w-7 p-0.5 fill-current' ) . '</a></li>';
								}
								if ( $instagram ) {
									echo '<li class="hidden lg:inline-block mx-2 list-none"><a target="_blank" href="' . $instagram . '">' . svg( 'instagram', 'w-7 p-0.5 fill-current' ) . '</a></li>';
								}
								if ( $facebook ) {
									echo '<li class="hidden lg:inline-block mx-2 list-none"><a target="_blank" href="' . $facebook . '">' . svg( 'facebook', 'w-7 p-0.5 fill-current' ) . '</a></li>';
								}
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="search-block group">
		<div class="shadow px-4 md:px-14 text-sky-900 bg-white fixed w-full z-40 -translate-y-full group-[.open]:translate-y-0 opacity-0 group-[.open]:opacity-100 select-none transition-all duration-300">
			<div class="py-2 sm:py-6 max-w-8xl m-auto relative">
				<form method="get" action="<?php echo home_url(); ?>/books" class="relative">
					<input id="searchInput2" class="searchInput outline-0 text-base sm:text-2xl inline-block border-b-2 border-slate-100 outline-0 pl-8 pr-0 py-2.5 w-full placeholder:text-sky-900 placeholder:opacity-60" type="text" autocomplete="off" placeholder="Search for book, author or ISBN" name="search">
					<input type="submit" id="searchFullSubmit" class="hidden">
					<label for="searchFullSubmit" class="hover:cursor-pointer absolute left-0 top-1/2 -mt-2.5">
						<?php echo svg( 'search', 'w-5 fill-current' ); ?>
					</label>
				</form>
				<div id="searchResults2" class="px-8 pt-2 max-h-50vh overflow-scroll"></div>
			</div>
		</div>
	</div>

	<div class="bg-slate-100 text-sky-900 px-4 py-8 hidden md:hidden mob-menu fixed w-full z-40 pt-[120px] top-0 h-full overflow-y-scroll">
		<?php
		$menuList = buildMenuTree( 'primary' );

		if ( $menuList ) {
			$chevron = '<svg xmlns="http://www.w3.org/2000/svg" class="inline-block ml-2 absolute right-0 top-1/2 -mt-3" width="24" height="25" viewBox="0 0 24 25" fill="none"><path  class="group-[.open]:rotate-90 transition-all" d="M12 5.5V19.5" stroke="#6E8B99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 12.5H19" stroke="#6E8B99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
			echo '<ul>';
			foreach ( $menuList as $first ) {
				$item     = $first['item'];
				$children = $first['children'];
				echo '<li class="mb-4">';
				$classes = '';
				if ( $children ) {
					$classes = 'has-children';
				}
				echo '<a class="text-2xl w-full block relative pr-12 group ' . $classes . '" href="' . $item->url . '">' . $item->title;
				if ( $children ) {
					echo $chevron;
				}
				echo '</a>';
				echo '<div class="hidden">';
				if ( $children ) {
					$firstChildCount = count( $children );
					foreach ( $children as $child ) {
						$item     = $child['item'];
						$children = $child['children'];
						echo '<ul class="my-2">';
						echo '<li class="my-2">';
						if ( $firstChildCount > 1 ) {
							if ( $item->url == '#' ) {
								echo '<div>' . $item->title . '</div>';
							} else {
								echo '<a href="' . $item->url . '">' . $item->title . '</a>';
							}
						}
						if ( $children ) {
							foreach ( $children as $child ) {
								$item = $child['item'];
								echo '<ul class="my-2 ml-2">';
								echo '<li class="mb-2">';
								echo '<a href="' . $item->url . '">' . $item->title . '</a>';
								echo '</li>';
								echo '</ul>';
							}
						}
						echo '</li>';
						echo '</ul>';

					}
				}
				echo '</div>';
				echo '</li>';
			}
			echo '</ul>';
		}


		echo '<div class="w-full">';
		echo '<p class="uppercase text-slate-500 text-xs pb-6">imprints</p>';



		echo '<div class="flex flex-wrap">';

		$imprints = get_terms(
			array(
				'taxonomy'   => 'imprint',
				'hide_empty' => false,
				'orderby'    => 'name',
				'order'      => 'DESC',
			)
		);

		foreach ( $imprints as $imprint ) {
			$fields       = get_fields( 'imprint_' . $imprint->term_id ) ?? array();
			$imprint_page = $fields['imprint_page'] ?? '';
			$alt_name     = $fields['alternative_name'] ? : $imprint->name;
			$image        = ( $image = $fields['banner_image'] ) ? wp_get_attachment_image_src( $image, 'large' )[0] : '';
			$logo         = ( $logo = $fields['logo'] ) ? wp_get_attachment_image_src( $logo, 'large' )[0] : '';
			$menu_image   = ( $menu_image = $fields['menu_image'] ?? '' ) ? wp_get_attachment_image_src( $menu_image, 'large' )[0] : '';
			if ( $alt_name == 'Buster Books' ) {
				$imprintClass = 'bg-sky-500';
			} elseif ( $alt_name == 'LOM ART' ) {
				$imprintClass = 'bg-violet-600';
			} else {
				$imprintClass = 'bg-sky-900';
			}
			if ( $menu_image && $imprint_page ) {
				echo '<div class="w-1/3 relative px-1">';
				echo '<div class="h-28 rounded-2xl relative ' . $imprintClass . '">';
				echo '<div class="absolute w-full h-full flex items-center justify-center text-white p-6 text-center">';
				echo '<img class="max-w-16 max-h-12 inline-block" src="' . $logo . '">';
				echo '</div>';
				echo '<a class="absolute w-full h-full inset-0" href="' . $imprint_page . '"></a>';
				echo '</div>';
				echo '</div>';
			}
		}

		echo '</div>';



		echo '</div>';
		?>
	</div>
</header>

<?php
if ( ! is_404() ) {
	$builder         = get_field( 'builder' )[0] ?? null;
	$has_hero        = $builder['acf_fc_layout'] ?? false;
	$has_hero_simple = $builder['group_2']['style'] ?? false;


	if ( $has_hero == 'hero' && ( $has_hero_simple != 'simple' && $has_hero_simple != 'contact' ) ) {
		$text_colour = 'text-white';
	} else {
		$text_colour = 'text-sky-900';
	}

	custom_breadcrumbs( $text_colour );
}
