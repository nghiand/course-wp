<?php
/**
 * User Profile tabs
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}
$first_key = key( $tabs );
?>
<ul class="nav nav-tabs" role="tablist">
	<?php foreach ( $tabs as $key => $tab ) : ?>
		<?php
		if ( !learn_press_current_user_can_view_profile_section( $key, $user ) ) {
			continue;
		}
		?>
		<li class="<?php echo ( $key ==  $first_key ) ? 'active' : ''; ?>">
			<a href="#tab-<?php echo esc_attr( $key ); ?>" data-toggle="tab"><?php echo apply_filters( 'learn_press_profile_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
		</li>
	<?php endforeach; ?>
</ul>
<div  class="tab-content">
	<?php foreach ( $tabs as $key => $tab ) : ?>
		<?php if ( learn_press_current_user_can_view_profile_section( $key, $user ) ) { ?>
			<div  class="tab-pane <?php echo ( $key == $first_key ) ? 'active' : ''; ?>" id="tab-<?php echo esc_attr( $key ); ?>">
				<?php if ( is_callable( $tab['callback'] ) ): ?>
					<?php echo call_user_func_array( $tab['callback'], array( $key, $tab, $user ) ); ?>
				<?php endif; ?>
			</div>
		<?php } ?>
	<?php endforeach; ?>
</div>
<div class="clearfix"></div>
