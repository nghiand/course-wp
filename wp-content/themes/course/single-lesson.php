<?php get_header(); ?>

    <section id="content">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="course-info">
                        <?php if (has_post_thumbnail()){?>
                         <div class="thumbnail-img">
                            <?php echo the_post_thumbnail('full', array('class' => "img-responsive"));?>
                        </div>                           
                        <?php }?>
                        <h1 class="lesson-header"><?php echo the_title(); ?></h1>
                        <div class="lesson-detail">
                            <?php echo the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; endif; ?>
            <div class="row">
                <div class="col-md-6 col-sm-6 vertical-align">
                    <?php
                    $connected = new WP_Query(array(
                        'connected_type' => 'previous',
                        'connected_items' => get_queried_object(),
                        'nopaging' => true,
                    ));
                    if ($connected->have_posts()) : while ($connected->have_posts()) : $connected->the_post();
                    ?>                
                    <a href="<?php echo the_permalink();?>">
                        <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
                        Предыдущий урок
                    </a>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>            
                <div class="col-md-6 col-sm-6 text-right vertical-align">
                    <?php
                    $connected = new WP_Query(array(
                        'connected_type' => 'next',
                        'connected_items' => get_queried_object(),
                        'nopaging' => true,
                    ));
                    if ($connected->have_posts()) : while ($connected->have_posts()) : $connected->the_post();
                    ?>
                    <a href="<?php echo the_permalink();?>">
                        Следущий урок
                        <i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                    </a>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>

            </div>
        </div>
    </section>

<?php get_footer(); ?>