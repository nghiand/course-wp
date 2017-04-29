<?php

/**
 * BuddyPress - Courses
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

	<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
		<ul>
			<?php bp_get_options_nav(); ?>
		</ul>
	</div>

<?php
switch ( bp_current_action() ) :

	//
	case 'all' :
		bp_get_template_part( 'members/single/courses/all-courses' );
		break;

	//
	case 'certificate' :
		bp_get_template_part( 'members/single/courses/certificate' );
		break;

endswitch;
