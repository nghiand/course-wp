<?php

if ( !is_user_logged_in() ) {
	echo '<div class="thim-link-login btn btn-primary"><a href="' . get_site_url() . '/wp-login.php">' . $instance['text_login'] . '</a></div>';
} else {
	echo '<div class="btn btn-primary"><a href="' . wp_logout_url() . '">' . $instance['text_logout'] . '</a></div>';
}
