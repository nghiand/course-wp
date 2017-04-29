<div class="col-log-6 col-md-6">
    <div class="header-top-right">
        <div class="top-user">
            <?php if (is_user_logged_in()){ $current_user = wp_get_current_user();?>
                <i class="fa fa-user-circle-o fa-2x"></i>
                <a href="/profile/"><?php $current_user->username ?></a> | <a href="/logout/">Выйти</a>
            <?php } else { ?>
                <a href="/login/">Войти</a> | <a href="/register/">Зарегистрировать</a>
            <?php }?>
        </div>
    </div>
</div>
