<?php get_header(); ?>

    <section id="slider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo get_template_directory_uri();?>/static/img/slider/1.jpg" alt="...">
                <!--
                <div class="carousel-caption">
                    <h3>Heading 2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                -->
            </div>
            <div class="item">
                <img src="<?php echo get_template_directory_uri();?>/static/img/slider/2.jpg" alt="...">
                <!--
                <div class="carousel-caption">
                    <h3>Heading 2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                -->
            </div>
            <div class="item">
                <img src="<?php echo get_template_directory_uri();?>/static/img/slider/3.jpg" alt="...">
                <!--
                <div class="carousel-caption">
                    <h3>Heading 2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                -->
            </div>            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>        
    </section>

    
    <!-- #service -->
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <div class="service-single">
                            <span class="fa fa-book"></span>
                            <h3>Онлайн</h3>
                        </div>
                        <div class="service-single">
                            <span class="fa fa-users"></span>
                            <h3>Экспертные учителя</h3>
                        </div>
                        <div class="service-single">
                            <span class="fa fa-table"></span>
                            <h3>Ваше время</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about us -->
    <section id="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>О нас</h2>              
                    </div>
                    <!-- End Title -->
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum pariatur fuga eveniet soluta aspernatur rem, nam voluptatibus voluptate voluptates sapiente, inventore. Voluptatem, maiores esse molestiae.</p>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        <li>Saepe a minima quod iste libero rerum dicta!</li>
                        <li>Voluptas obcaecati, iste porro fugit soluta consequuntur. Veritatis?</li>
                        <li>Ipsam deserunt numquam ad error rem unde, omnis.</li>
                        <li>Repellat assumenda adipisci pariatur ipsam eos similique, explicabo.</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quaerat harum facilis excepturi et? Mollitia!</p>
                </div>
            </div>
        </div>
    </section>  

    <!-- new courses -->
    <section id="latest-courses">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Последние курсы</h2>
                    </div>                    
                    <!-- start course content container -->
                    <div class="course-container">
                        <div class="row">
                        <?php
                        $args = array(
                        'numberposts' => 6,
                        'offset' => 0,
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'post_type' => 'course',
                        );
                        $recent_posts = wp_get_recent_posts($args, ARRAY_A);
                        foreach($recent_posts as $recent){?>
                            <div class="col-md-4 col-sm-6">
                                <div class="latest-course-single">
                                    <figure class="latest-course-img">
                                        <a href="<? echo get_permalink($recent["ID"]);?>">
                                            <? if (has_post_thumbnail($recent["ID"])){
                                                echo get_the_post_thumbnail($recent["ID"]);
                                            } else{
                                                echo '<img src="' . get_template_directory_uri() . '/static/img/course/course-thumbnail.jpg" alt="...">';
                                            }?>
                                        </a>
                                    </figure>
                                    <div class="latest-course-single-content">
                                        <h4><a href="<? echo get_permalink($recent["ID"]);?>"><? echo $recent["post_title"]; ?></a></h4>
                                        <p><? echo wp_trim_excerpt($recent["post_excerpt"]); ?></p>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        wp_reset_query();
                        ?>
                        <!--
                            <div class="col-md-4 col-sm-6">
                                <div class="latest-course-single">
                                    <figure class="latest-course-img">
                                        <a href="#"><img src="img/courses/1.jpg" alt="img"></a>
                                    </figure>
                                    <div class="latest-course-single-content">
                                        <h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>
                                    </div>
                                </div>
                            </div>
                        -->

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>