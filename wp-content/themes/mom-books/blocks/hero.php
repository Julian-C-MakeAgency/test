<?php
$group_2 = get_sub_field( 'group_2' );
$style   = $group_2['style'] ?? '';

get_template_part( '/blocks/heros/' . $style );
