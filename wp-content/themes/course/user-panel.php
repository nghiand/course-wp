<div class="col-log-6 col-md-6">
    <div class="header-top-right">
        <div class="top-user">
            <?php if (is_user_logged_in()){ $current_user = wp_get_current_user(); //var_dump($current_user);?>
                <i class="fa fa-user-circle-o fa-2x"></i>
                <a href="<?php echo get_home_url();?>/profile/"><?php echo $current_user->user_login; ?></a> | <a href="<?php echo wp_logout_url(home_url());?>">Выйти</a>
            <?php } else { ?>
                <a href="<?php echo get_home_url();?>/login/">Войти</a> | <a href="<?php echo get_home_url();?>/register/">Зарегистрировать</a>
            <?php }?>
        </div>
    </div>
</div>
