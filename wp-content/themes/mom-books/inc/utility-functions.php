<?php
function under_to_dash( $text ): string {
	return str_replace( '_', '-', $text );
}

function svg( $name, $classes ): string {
	if ( $name == 'mom-logo' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 433 259"><path d="M309 2.4c-9.3 3.2-14 5.9-20.9 11.6-8.4 7-17.3 19.3-19.5 27-3.1 10.9-3.7 14.6-3.7 22.7 0 5.1-.4 9.3-.8 9.3-.7 0-6-10.2-28.1-53.5-7.8-15.3-10.7-19.4-10.4-15 0 .8.1 58.4.2 128L226 259l103.3-.2 103.2-.3.3-127.8c.1-70.2-.2-127.7-.6-127.7-.5 0-4.2 6.6-8.4 14.7-4.1 8.2-11 21.5-15.3 29.8-4.3 8.2-8.7 16.8-9.7 19-4.7 10.1-5.3 9.7-5.4-4.8-.1-10.6-.4-13.1-2.7-18.9-8.1-20.9-21.7-34.2-41.6-40.7-9.5-3.1-30.9-2.9-40.1.3Zm-14.5 115.9c6.6 4.2 8.7 5.2 16.9 7.8 8.1 2.5 23.9 3 32.6 1 7.5-1.8 20.6-8.2 25.8-12.6 2.4-2.1 4.6-3.5 4.9-3.1.4.3-.7 3.2-2.4 6.4-1.7 3.1-6.6 12.7-11 21.2s-12.2 23.6-17.4 33.5c-5.1 9.9-10.2 19.9-11.3 22.2-1.2 2.4-2.6 4.2-3.3 4-.6-.1-4.1-5.8-7.6-12.7-33.2-64.7-36.7-71.3-37.8-72.5-.5-.5-.9-1.5-.9-2.3 0-1 1-.6 3.3 1.2 1.7 1.4 5.5 4.1 8.2 5.9ZM204.6 2.9c-.4.5-4.5 8.5-9.2 17.8-4.7 9.2-11.9 23.1-15.9 30.8-4 7.7-11.4 22.1-16.5 32-10.8 20.9-20.8 40.3-31 60-4 7.7-12 23.2-17.7 34.5-5.8 11.3-11 20.6-11.6 20.8-.7.1-1.7-.8-2.3-2-.6-1.3-3.5-7-6.4-12.8-2.8-5.8-7-14.1-9.2-18.5-4.7-9.5-23.6-46.3-32.1-62.5-3.3-6.3-9.9-19.2-14.7-28.5-4.8-9.4-12.5-24.2-17-33-4.6-8.8-10.9-21-13.9-27C4 8.4 1.1 3.7.7 4c-1 .7-.9 253.2.1 254.2.5.5 46.7.7 102.8.6l101.9-.3.5-127.8c.3-70.4.2-128.1-.2-128.3-.4-.2-.9 0-1.2.5Z"/></svg>';
	}
	if ( $name == 'twitter' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 630 512"><path d="M629.864 60.554c-23.139 10.338-48.123 17.23-74.216 20.308 26.708-16 47.139-41.354 56.862-71.508-24.985 14.77-52.677 25.6-82.092 31.384C506.787 15.631 473.187 0 436.018 0c-71.385 0-129.231 57.846-129.231 129.23 0 10.093 1.107 19.94 3.323 29.416-107.446-5.415-202.708-56.861-266.462-135.138a129.258 129.258 0 0 0-17.477 64.984c0 44.8 22.77 84.431 57.477 107.57-21.169-.616-41.107-6.524-58.584-16.124v1.6c0 62.647 44.554 114.954 103.754 126.77a129.497 129.497 0 0 1-34.093 4.554c-8.369 0-16.369-.862-24.369-2.339 16.492 51.323 64.246 88.739 120.738 89.846-44.307 34.708-99.938 55.385-160.615 55.385a257.01 257.01 0 0 1-30.892-1.846C56.94 490.708 124.879 512 197.864 512c237.784 0 367.877-197.046 367.877-367.877 0-5.661-.123-11.2-.37-16.738 25.231-18.093 47.139-40.862 64.493-66.831Z"/></svg>';
	}
	if ( $name == 'facebook' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 24 25"><path d="M13.397 21.674v-8.196h2.765l.411-3.21h-3.176V8.226c0-.926.258-1.56 1.587-1.56h1.684V3.804c-.82-.088-1.643-.13-2.467-.127-2.444 0-4.122 1.492-4.122 4.23v2.356H7.332v3.209h2.753v8.202h3.312Z"/></svg>';
	}
	if ( $name == 'instagram' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 24 25"><path d="M11.999 8.054a4.624 4.624 0 1 0 0 9.247 4.624 4.624 0 0 0 0-9.247Zm0 7.627a3.004 3.004 0 1 1 0-6.009 3.004 3.004 0 0 1 0 6.009ZM16.806 8.962a1.078 1.078 0 1 0 0-2.156 1.078 1.078 0 0 0 0 2.156Z"/><path d="M20.533 6.789A4.605 4.605 0 0 0 17.9 4.157a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.583 6.583 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.614 6.614 0 0 0 2.186-.42 4.613 4.613 0 0 0 2.633-2.632c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.583 6.583 0 0 0-.421-2.217Zm-1.218 9.532a5.046 5.046 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.71c-.535.2-1.1.304-1.67.312-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.961 4.961 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.67c-.043-.95-.053-1.217-.053-3.653 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.79.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.31 2.99 2.99 0 0 1 1.712 1.713c.197.535.302 1.099.311 1.669.043.95.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011v-.001Z"/></svg>';
	}
	if ( $name == 'youtube' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 24 25"><path d="M21.593 7.88a2.506 2.506 0 0 0-1.762-1.766C18.265 5.684 12 5.677 12 5.677s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831ZM9.996 15.682l.005-6 5.207 3.005-5.212 2.995Z"/></svg>';
	}
	if ( $name == 'linkedin' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 512 512"><path d="M192 192h88.553v45.391h1.266C294.139 215.294 324.298 192 369.24 192 462.713 192 480 250.188 480 325.867V480h-92.305V343.361c0-32.592-.667-74.513-48.014-74.513-48.074 0-55.41 35.493-55.41 72.146V480H192V192zM32 192h96v288H32V192zM128 112c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48z"/></svg>';
	}
	if ( $name == 'x' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 18 18"><path d="m10.713 7.375 6.7-7.198h-1.588l-5.818 6.25L5.36.177H0l7.027 9.451L0 17.177h1.588l6.144-6.6 4.908 6.6H18l-7.287-9.802ZM8.537 9.711l-.712-.94L2.16 1.28H4.6L9.17 7.325l.712.941 5.943 7.856h-2.439l-4.85-6.41Z"/></svg>';
	}
	if ( $name == 'search' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 1024 1024"><path d="M437.915 875.775c101.536-.029 194.944-34.804 268.966-93.095l-.928.707 240.612 240.612 77.404-77.404-240.612-240.612c57.624-73.113 92.425-166.537 92.448-268.09v-.008c0-241.44-196.448-437.886-437.886-437.886S.033 196.447.033 437.885s196.448 437.886 437.886 437.886zm0-766.302c181.122 0 328.416 147.296 328.416 328.416S619.035 766.305 437.915 766.305 109.499 619.009 109.499 437.889s147.296-328.416 328.416-328.416z"/></svg>';
	}
	if ( $name == 'chevron' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 1024 1024"><path d="M897.199 192.599 511.894 577.691 126.802 192.599.001 319.4l512 512 512-511.893L897.2 192.599z"/></svg>';
	}
	if ( $name == 'arrow' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 1024 1024"><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="146.286" d="m296 944 432-432L296 80"/></svg>';
	}
	if ( $name == 'hamburger' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . '" viewBox="0 0 1024 1024"><path stroke-width="128" d="M0 153.6h1024M0 512h1024M0 870.4h1024"/></svg>';
	}
	if ( $name == 'download' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . ' fill="none" viewBox="0 0 24 24"><g stroke="#003367" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"/></g></svg>';
	}
	if ( $name == 'undo' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . ' fill="none" viewBox="0 0 24 24"><path stroke="#003367" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 8H5V3m.291 13.357a8 8 0 1 0 .188-8.991"/></svg>';
	}
	if ( $name == 'bin' ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" class="' . $classes . ' fill="none" viewBox="0 0 24 24"><g stroke="#003367" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M3.172 5.818h18M19.172 5.818v14a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2v-14m3 0v-2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M10.172 10.818v6M14.172 10.818v6"/></g></svg>';
	}
	return '';
}

function limitText( $text, $limit = 150 ) {
	$limitedText = substr( $text, 0, $limit );

	$lastPeriodPos       = strrpos( $limitedText, '.' );
	$lastQuestionMarkPos = strrpos( $limitedText, '?' );

	$lastPos = max( $lastPeriodPos, $lastQuestionMarkPos );

	if ( $lastPos !== false ) {
		$limitedText = substr( $limitedText, 0, $lastPos + 1 );
	}

	return $limitedText;
}

function downdownMarkup( $items, $inputName = '', $placeholder = '', $wrapClass = '' ) {

	if ( ! is_array( $items ) || empty( $items ) ) {
		return '';
	}

	$html  = '<div class="relative inline-block text-left text-white ' . $wrapClass . '">';
	$html .= '<div class="group dd-menu">';
	$html .= '<button type="button" class="dd-button inline-block w-full items-center rounded-md bg-sky-900 pl-4 pr-10 py-4 text-white" id="menu-button" aria-expanded="true" aria-haspopup="true">';
	$html .= '<span>' . $placeholder . '</span>';
	$html .= '<svg class="h-8 w-8 absolute right-1 top-1/2 -mt-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">';
	$html .= '<path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />';
	$html .= '</svg>';
	$html .= '</button>';
	$html .= '<input type="hidden" name="' . $inputName . '" value="">';
	$html .= '<div class="dd-content group-[.active]:block absolute z-20 hidden left-0 z-10 mt-2 max-h-64 overflow-y-scroll w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">';
	$html .= '<div class="py-1" role = "none">';
	foreach ( $items as $item ) {
		$name = $item['name'] ?? '';
		$link = $item['link'] ?? '';
		if ( $name && $link ) {
			$html .= '<a href="' . $link . '" class="text-gray-700 block px-4 py-2 text-sm">' . $name . '</a>';
		}
	}
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';

	return $html;
}


function editionPrice( $id ) {
	$edition_info = get_post_meta( $id, 'edition_info', true ) ?? '';
	$price        = $edition_info[0]['edition_published_price'] ?? '';
	return '£' . $price;
}

function authorNames( $id ) {
	$authorNames        = get_post_meta( $id, 'authors', true ) ?? '';
	$contributorTerms   = wp_get_post_terms( $id, 'contributor' ) ?? '';
	$contributorAuthors = array();
	if ( $contributorTerms ) {
		foreach ( $contributorTerms as $term ) {
			$author = get_term_meta( $term->term_id, 'personrelationship_role', true ) ?? '';
			if ( $author == 'Author' ) {
				$contributorAuthors[] = $term->name;
			}
		}
	}
	$authorNamesArray = ! empty( $authorNames ) && is_array( $authorNames ) ? $authorNames : array();
	return array_unique( array_merge( $authorNamesArray, $contributorAuthors ) );
}


function compare_roles( $a, $b ) {
	// Fetch metadata for each term
	$a_meta = get_term_meta( $a->term_id );
	$b_meta = get_term_meta( $b->term_id );

	// Extract the 'personrelationship_role' values
	$a_role = $a_meta['personrelationship_role'][0] ?? '';
	$b_role = $b_meta['personrelationship_role'][0] ?? '';

	// Prioritize 'author' role
	if ( $a_role == 'author' && $b_role != 'author' ) {
		return -1; // $a comes before $b
	}
	if ( $b_role == 'author' && $a_role != 'author' ) {
		return 1; // $b comes before $a
	}

	// Prioritize 'illustrator' role after 'author'
	if ( $a_role == 'illustrator' && $b_role != 'illustrator' ) {
		return -1; // $a comes before $b
	}
	if ( $b_role == 'illustrator' && $a_role != 'illustrator' ) {
		return 1; // $b comes before $a
	}

	// For all other roles, you might want to sort alphabetically or by some other criteria
	return strcmp( $a_role, $b_role );
}

function extractNumbersInBrackets( $string ) {
	// Pattern to match numbers inside brackets
	$pattern = '/\((\d+)\)/';

	// Array to hold matches
	$matches = array();

	// Perform the regex match
	preg_match_all( $pattern, $string, $matches );

	// $matches[1] contains the numbers matched inside brackets
	return $matches[1];
}

function letterToAgeGroup( $letter ) {

	$ageGroups = array(
		'A' => '0-5 years',
		'B' => '5-7 years',
		'C' => '7-9 years',
		'D' => '9-11 years',
		'E' => '12+ years',
	);

	if ( array_key_exists( $letter, $ageGroups ) ) {
		return $ageGroups[ $letter ];
	}

	return '';
}


function similarBooks( $search_term, $pageID ) {
	$search_term  = $search_term ?? '';
	$search_terms = explode( ' ', $search_term ) ?? '';
	$max_items    = -1; // Maximum number of items to return

	// Initialize meta query
	$meta_query = array( 'relation' => 'AND' ); // Use AND relation at the top level

	// Sub-query for ISBN search conditions
	$isbn_query = array( 'relation' => 'OR' );
	foreach ( $search_terms as $term ) {
		$isbn_query[] = array(
			'key'     => 'isbn',
			'value'   => $term,
			'compare' => 'LIKE',
		);
		$isbn_query[] = array(
			'key'     => 'isbn13',
			'value'   => $term,
			'compare' => 'LIKE',
		);
	}

	// Add the ISBN query to the main meta query
	$meta_query[] = $isbn_query;

	// Check edition status if necessary
	if ( ! is_user_logged_in() && function_exists( 'ip_filter' ) && ip_filter() === 'blocked' ) {
		$meta_query[] = array(
			'key'     => 'edition_edition_status',
			'value'   => 'Out of Print',
			'compare' => 'NOT LIKE',
		);
	}

	// Query for books
	$query_args = array(
		'post_type'              => 'book',
		'posts_per_page'         => $max_items,
		'meta_query'             => $meta_query,
		'post__not_in'           => array( $pageID ),
		'is_similar_books_query' => true, // Custom query var to bypass global filter
	);

	$simBooks = new WP_Query( $query_args );

	$books = array();

	// Display book posts
	if ( $simBooks->have_posts() ) {
		while ( $simBooks->have_posts() ) {
			$simBooks->the_post();
			$books[] = get_the_ID();
		}
	}

	return $books;
}


function colourFromImprint( $imprintName ) {
	if ( $imprintName == 'Buster Books' ) {
		return 'sky-500';
	} elseif ( $imprintName == 'LOM ART' ) {
		return 'violet-600';
	} elseif ( $imprintName == 'Michael O\'Mara' ) {
		return 'sky-900';
	} else {
		return 'slate-500';
	}
}

if ( session_status() == PHP_SESSION_NONE ) {
	session_start();
}
function ip_filter() {
	// Start the session

	if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
		$ip = $_SERVER['REMOTE_ADDR'];
	} else {
		return '';
	}

	if ( $ip == '::1' ) {
		return '';
	}

	if ( isset( $_SESSION['ip_country'][ $ip ] ) ) {
		$country = $_SESSION['ip_country'][ $ip ];
	} else {
		$url      = 'https://api.country.is/' . $ip;
		$response = wp_remote_get( $url );
		$body     = wp_remote_retrieve_body( $response );
		$data     = json_decode( $body, true );
		if ( is_array( $data ) && isset( $data['country'] ) ) {
			$country                       = $data['country'];
			$_SESSION['ip_country'][ $ip ] = $country;
		}
	}

	if ( isset( $country ) && $country !== 'GB' ) {
		return '';
	}

	return 'blocked';
}

function custom_book_filtering( $query ) {

	if ( is_admin() || $query->get( 'post_type' ) !== 'book' || $query->get( 'is_similar_books_query' ) ) {
		return;
	}

	$query->set( 'author', '' );

	// Initialize tax_query from the existing query, if any.
	$tax_query = $query->get( 'tax_query' ) ?: array();
	if ( ! is_array( $tax_query ) ) {
		$tax_query = array();
	}

	$tax_query['relation'] = 'AND';

	if ( isset( $_GET['category'] ) && ! empty( $_GET['category'] ) ) {
		$tax_query[] = array(
			'taxonomy' => 'book-category',
			'field'    => 'slug',
			'terms'    => sanitize_text_field( $_GET['category'] ),
		);
	}

	if ( isset( $_GET['imprint'] ) && ! empty( $_GET['imprint'] ) ) {
		$tax_query[] = array(
			'taxonomy' => 'imprint',
			'field'    => 'slug',
			'terms'    => sanitize_text_field( $_GET['imprint'] ),
		);
	}

	if ( isset( $_GET['author'] ) && ! empty( $_GET['author'] ) ) {
		$tax_query[] = array(
			'taxonomy' => 'contributor',
			'field'    => 'slug',
			'terms'    => sanitize_text_field( $_GET['author'] ),
		);
	}

	// Only set tax_query if it's not empty
	if ( count( $tax_query ) > 1 ) {
		$query->set( 'tax_query', $tax_query );
	}

	// Initialize meta_query from the existing query, if any.
	$meta_query = $query->get( 'meta_query' ) ?: array();
	if ( ! is_array( $meta_query ) ) {
		$meta_query = array();
	}

	$meta_query['relation'] = 'AND';

	if ( isset( $_GET['search'] ) && ! empty( $_GET['search'] ) ) {
		$search_term       = sanitize_text_field( $_GET['search'] );
		$search_term       = preg_replace( '/[^A-Za-z0-9 ]/', '', $search_term );
		$search_meta_query = array(
			'relation' => 'OR',
			array(
				'key'     => 'work_cover_title',
				'value'   => $search_term,
				'compare' => 'LIKE',
			),
			array(
				'key'     => 'isbn',
				'value'   => $search_term,
				'compare' => 'LIKE',
			),
			array(
				'key'     => 'isbn13',
				'value'   => $search_term,
				'compare' => 'LIKE',
			),
			array(
				'key'     => 'authors',
				'value'   => $search_term,
				'compare' => 'LIKE',
			),
		);
		$meta_query[]      = $search_meta_query;
	}

	if ( ! is_user_logged_in() && function_exists( 'ip_filter' ) && ip_filter() === 'blocked' ) {
		$meta_query[] = array(
			'key'     => 'edition_edition_status',
			'value'   => 'Out of Print',
			'compare' => 'NOT LIKE',
		);
	}

	// Only set meta_query if it's not empty
	if ( count( $meta_query ) > 1 ) {
		$query->set( 'meta_query', $meta_query );
	}

	if ( ! $query->get( 'orderby' ) ) {
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'meta_key', 'published_date' );
		$query->set( 'order', 'DESC' );
	}
}

add_action( 'pre_get_posts', 'custom_book_filtering' );




function timeToRead( $content, $wpm = 200 ) {

	if ( ! $content ) {
		return '';
	}

	$words = str_word_count( $content, 0 );
	$time  = ceil( $words / $wpm );

	if ( $time ) {
		$formattedTime = 1 . ' MIN READ';
	} else {
		$formattedTime = $time . ' MIN READ';
	}
	return $formattedTime;
}



function custom_breadcrumbs( $text_color = 'text-white' ) {
	// Settings
	$separator  = ' / ';
	$home_title = 'Home';

	// Get the query & post information
	global $post, $wp_query;

	// Do not display on the homepage
	if ( ! is_front_page() ) {

		// Start the breadcrumb with a link to your homepage
		echo '<div class="breadcrumbs w-full z-10 absolute">';
		echo '<div class="' . $text_color . ' m-auto max-w-8xl px-4 sm:px-8 xl:px-14 py-8">';
		echo '<a href="' . get_home_url() . '">' . $home_title . '</a>' . $separator;

		// Check if current post type is 'book' for single book page
		if ( get_post_type() == 'book' && is_single() ) {
			// Adjusted breadcrumb for 'book' post type
			echo '<a href="' . get_post_type_archive_link( 'book' ) . '">Books</a>' . $separator;
			the_title(); // Display current book title
		} elseif ( get_post_type() == 'online-activity' && is_single() ) {
			echo '<a href="' . get_home_url() . '/online-activities/">Online activities</a>' . $separator;
			the_title(); // Display current book title
		} elseif ( get_post_type() == 'press-release' ) {
			echo '<a href="' . get_home_url() . '/press-releases/">Press releases</a>' . $separator;
			if ( is_single() ) {
				the_title();
			}
		} elseif ( is_category() || is_single() ) {
			the_category( $separator );
			if ( is_single() ) {
				echo $separator;
				the_title();
			}
		} elseif ( is_page() ) {
			// Handle parent pages
			$parents   = array();
			$parent_id = $post->post_parent;
			while ( $parent_id ) {
				$page = get_page( $parent_id );
				// Check if the 'hide_page' custom field is true for this page
				$hide_page = get_field( 'hide_page', $page->ID );
				if ( ! $hide_page ) {
					// Only add the page to breadcrumbs if 'hide_page' is not true
					$parents[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				} else {
					// If 'hide_page' is true, add the page title without a link
					$parents[] = get_the_title( $page->ID );
				}
				$parent_id = $page->post_parent;
			}
			$parents = array_reverse( $parents );
			foreach ( $parents as $parent ) {
				echo $parent . $separator;
			}

			// Display the current post or page title
			echo the_title();
		}
		echo '</div>';
		echo '</div>';
	}
}



function custom_redirect_to_404() {
	if ( is_singular() ) {
		$hide_page = get_field( 'hide_page' );
		if ( $hide_page ) {
			global $wp_query;
			$wp_query->set_404();
			status_header( 404 );
			get_template_part( 404 );
			exit();
		}
	}
}
add_action( 'template_redirect', 'custom_redirect_to_404' );



function buildMenuTree( $menu_name, $parent_id = 0 ) {
	$menuList  = array();
	$locations = get_nav_menu_locations();
	if ( $locations && isset( $locations[ $menu_name ] ) ) {
		$menu_items = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ $menu_name ] )->term_id );
		foreach ( $menu_items as $item ) {
			if ( $item->menu_item_parent == $parent_id ) {
				$menuList[ $item->ID ] = array(
					'item'     => $item,
					'children' => buildMenuTree( $menu_name, $item->ID ),
				);
			}
		}
	}
	return $menuList;
}


function splitReviews( $reviewsString ) {
	// Split the string into parts using ':' as the delimiter for each review
	$reviewParts = explode( ':', $reviewsString );

	$reviews = array();

	foreach ( $reviewParts as $reviewPart ) {
		// For each part, split again using ',' to separate the review from the author
		$reviewAndAuthor = explode( "',", $reviewPart, 2 ); // Limiting to 2 parts ensures only the first ',' is used for splitting

		if ( count( $reviewAndAuthor ) == 2 ) {
			// Clean up the data (trim and remove unwanted characters)
			$review = trim( $reviewAndAuthor[0], "[]' " );
			$author = trim( $reviewAndAuthor[1], "[]' " );

			// Add to the results array
			$reviews[] = array(
				'review' => $review,
				'by'     => $author,
			);
		}
	}

	return $reviews;
}


function splitKeyInfo( $reviewsString ) {
	// Split the string into parts using '[[[DOUBLECRLF]]]' as the delimiter for each review
	$reviewParts = explode( '[[[DOUBLECRLF]]]', $reviewsString );

	$reviews = array();

	foreach ( $reviewParts as $reviewPart ) {
		$reviews[] = $reviewPart;
	}

	return $reviews;
}
