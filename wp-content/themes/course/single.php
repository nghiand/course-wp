<?php get_header(); ?>

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_title(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php get_header(); ?>