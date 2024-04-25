<?php
get_header();
echo '<div class="m-auto max-w-8xl px-4 sm:px-8 xl:px-14 text-sky-900 my-24 text-center sm:text-left min-h-96">';
echo '<h1 class="text-4xl sm:text-7xl font-medium mb-8">Sorry, this page doesn\'t exist.</h1>';
echo '<p class="mb-8 text-lg">The link you clicked may be broken or the page may have been removed.</p>';
echo '<p class="mb-8 text-lg">Visit our <a class="font-medium underline" href="' . get_home_url() . '">homepage</a> or <a class="font-medium underline" href="' . get_home_url() . '/contact">contact us</a> if you need help.</p>';
echo '</div>';
get_footer();
