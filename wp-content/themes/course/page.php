<?php get_header(); ?>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php while (have_posts()) : the_post();
                the_content();
                endwhile;
                ?>
                <!--
                <h2 class="text-center">Регистрация</h2>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Логин</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Логин">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Пароль</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Пароль">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Регистрировать</button>
                        </div>
                    </div>
                </form>
                -->
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>