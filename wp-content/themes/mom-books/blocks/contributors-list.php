<div class="contributors-list">
	<div class="text-sky-900">
		<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 text-sky-900 mt-24 mb-8">
			<div class="pb-10">
				<h2 class=" text-4xl sm:text-6xl font-medium text-center sm:text-left">Authors & </br>illustrators</h2>
			</div>
			<?php
			$contributors = get_terms(
				array(
					'taxonomy'   => 'contributor',
					'hide_empty' => false,
					'orderby'    => 'name',
					'order'      => 'ASC',
				)
			);


			usort(
				$contributors,
				function ( $a, $b ) {
					$person_surname_a = get_term_meta( $a->term_id, 'person_surname' )[0] ?? '';
					$person_surname_b = get_term_meta( $b->term_id, 'person_surname' )[0] ?? '';
					return $person_surname_a <=> $person_surname_b;
				}
			);

			$authors                 = array();
			$illustrators            = array();
			$lettersWithAuthors      = array();
			$lettersWithIllustrators = array();

			foreach ( $contributors as $contributor ) {
				$role           = get_term_meta( $contributor->term_id, 'personrelationship_role' )[0] ?? '';
				$surname        = get_term_meta( $contributor->term_id, 'person_surname' )[0] ?? '';
				$surnameInitial = strtoupper( $surname[0] ?? '' );
				if ( $role == 'Author' ) {
					$authors[]                             = $contributor;
					$lettersWithAuthors[ $surnameInitial ] = true;
				} elseif ( $role == 'Illustrator' ) {
					$illustrators[]                             = $contributor;
					$lettersWithIllustrators[ $surnameInitial ] = true;
				}
			}

			?>

			<?php

			if ( $lettersWithAuthors ) {
				echo '<div class="alphabet-navigation mt-12">';
				echo '<h2 class="text-4xl border-b border-slate-500 pb-4">Search for authors</h2>';
				echo '<div class="letter-wrap py-6 select-none">';
				foreach ( range( 'A', 'Z' ) as $letter ) {
					$class = isset( $lettersWithIllustrators[ $letter ] ) ? 'active' : 'inactive';
					if ( $class == 'active' ) {
						echo '<a href="#author-' . $letter . '" class="letter w-12 inline-block text-center my-2 ' . $class . '">' . $letter . '</a>';
					} else {
						echo '<span href="" class="letter w-12 inline-block text-center my-2 text-slate-200 ' . $class . '">' . $letter . '</span>';

					}
				}
				echo '</div>';
				echo '</div>';

				echo '<div class="authors">';
				foreach ( range( 'A', 'Z' ) as $letter ) {
					if ( ! isset( $lettersWithAuthors[ $letter ] ) ) {
						continue;
					}
					echo '<div id="author-' . $letter . '" class="author-letter flex flex-wrap border-t border-slate-500 py-10">';
					echo '<div class="w-3/12"><h3 class="text-8xl font-medium mt-8">' . $letter . '</h3></div>';
					echo '<div class="w-9/12 flex flex-wrap">';
					foreach ( $authors as $author ) {
						$permalink      = get_term_link( $author );
						$surname        = get_term_meta( $author->term_id, 'person_surname' )[0] ?? '';
						$surnameInitial = strtoupper( $surname[0] ?? '' );
						if ( $surnameInitial == $letter ) {
							echo '<div class="author w-1/2 my-2">';
							echo '<a href="' . $permalink . '">';
							echo '<p class="text-lg">' . get_term_meta( $author->term_id, 'person_first_name' )[0] . ' ' . get_term_meta( $author->term_id, 'person_surname' )[0] . '</p>';
							echo '</a>';
							echo '</div>';
						}
					}
					echo '</div>';
					echo '</div>';
				}


				echo '</div>';
			}

			if ( $lettersWithIllustrators ) {
				echo '<div class="alphabet-navigation mt-12">';
				echo '<h2 class="text-4xl border-b border-slate-500 pb-4">Search for illustrators</h2>';
				echo '<div class="letter-wrap py-6">';
				foreach ( range( 'A', 'Z' ) as $letter ) {
					$class = isset( $lettersWithIllustrators[ $letter ] ) ? 'active' : 'inactive';
					echo '<a href="#illustrator-' . $letter . '" class="letter w-12 inline-block text-center my-2 ' . $class . '">' . $letter . '</a>';
				}
				echo '</div>';
				echo '</div>';

				echo '<div class="illustrators">';
				foreach ( range( 'A', 'Z' ) as $letter ) {
					if ( ! isset( $lettersWithIllustrators[ $letter ] ) ) {
						continue;
					}
					echo '<div id="illustrator-' . $letter . '" class="illustrator-letter flex flex-wrap border-t border-slate-500 py-10">';
					echo '<div class="w-3/12"><h3 class="text-8xl font-medium mt-8">' . $letter . '</h3></div>';
					echo '<div class="w-9/12 flex flex-wrap">';
					foreach ( $illustrators as $illustrator ) {
						$permalink      = get_term_link( $illustrator );
						$surname        = get_term_meta( $illustrator->term_id, 'person_surname' )[0] ?? '';
						$surnameInitial = strtoupper( $surname[0] ?? '' );
						if ( $surnameInitial == $letter ) {
							echo '<div class="illustrator w-1/2 my-2">';
							echo '<a href="' . $permalink . '">';
							echo '<p class="text-lg">' . get_term_meta( $illustrator->term_id, 'person_first_name' )[0] . ' ' . get_term_meta( $illustrator->term_id, 'person_surname' )[0] . '</p>';
							echo '</a>';
							echo '</div>';
						}
					}
					echo '</div>';
					echo '</div>';
				}
				echo '</div>';
			}




			?>

		</div>
	</div>
</div>
