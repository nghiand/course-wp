<?php get_header(); ?>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 courses">
                <div class="courses-info">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $course_page_args = array(
                        'post_type' => 'course',
                        'posts_per_page' => 8,
                        'paged' => $paged,
                        'order' => 'DESC',
                        'orderby' => 'date'
                    );
                    $course_page_query = new WP_Query($course_page_args);
                    $count = 0;
                    //echo $course_page_query->post_count;
                    //var_dump($course_page_query);
                    if ($course_page_query->have_posts()) :
                    while ($course_page_query->have_posts()) : $course_page_query->the_post();
                    $count++;
                    ?>
                    <?php if ($count % 2 == 1){ ?>
                    <div class="row">
                    <?php } ?>
                    <div class="col-sm-6 col-md-6 course-info">
                        <div class="thumbnail">
                            <a href="<?php the_permalink();?>">
                                <? if (has_post_thumbnail()){
                                    the_post_thumbnail();
                                } else{
                                    echo '<img src="' . get_template_directory_uri() . '/static/img/course/course-thumbnail.jpg" alt="...">';
                                }?>
                            </a>
                            <div class="caption">
                                <a href="<?php the_permalink();?>"><h3><?php the_title(); echo $count;?></h3></a>
                            </div>
                        </div>
                    </div>
                    <?php if ($count % 2 == 0 || $count == $course_page_query->post_count){ ?>
                    </div>
                    <?php } endwhile; wp_reset_postdata(); endif;?>
               </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li><?php previous_posts_link('&laquo;'); ?></li>
                        <li><?php next_posts_link('&raquo;', $course_page_query->max_num_pages); ?></li>
                    </ul>
                </nav>            
            </div>

            <div class="col-md-3 sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading">Категории</div>
                    <ul class="panel-body list-group">
                        <a href=""><li class="list-group-item">Cras justo odio</li></a>
                        <a href=""><li class="list-group-item">Dapibus ac facilisis in</li></a>
                        <a href=""><li class="list-group-item">Morbi leo risus</li></a>
                        <a href=""><li class="list-group-item">Porta ac consectetur ac</li></a>
                        <a href=""><li class="list-group-item">Vestibulum at eros</li></a>
                    </ul>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Популярные курсы</div>
                    <ul class="panel-body list-group">
                        <a href=""><li class="list-group-item">Cras justo odio</li></a>
                        <a href=""><li class="list-group-item">Dapibus ac facilisis in</li></a>
                        <a href=""><li class="list-group-item">Morbi leo risus</li></a>
                        <a href=""><li class="list-group-item">Porta ac consectetur ac</li></a>
                        <a href=""><li class="list-group-item">Vestibulum at eros</li></a>
                    </ul>
                </div>                    
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>