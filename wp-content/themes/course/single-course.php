<?php get_header(); ?>

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 courses">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="course-info">
                        <div class="thumbnail-img">
                        <?php if (has_post_thumbnail()){?>
                            <?php echo the_post_thumbnail('full', array('class' => "img-responsive"));?>
                        <?php } else{
                            echo '<img src="' . get_template_directory_uri() . '/static/img/course/course-thumbnail.jpg" alt="...">';
                        }?>
                        </div>                           

                        <h1 class="course-header"><?php echo the_title(); ?></h1>
                        <button type="button" class="btn btn-primary">Зачислять</button>
                        <div class="course-info">
                            <h3>Информация</h3>
                            <p>Автор: <span id="author"><?php echo the_author_nickname(); ?></span></p>
                            <p>Количество уроков: <span id="unit-cnt">20</span></p>
                            <p>Количество участников: <span id="participant-cnt">250</span></p>
                        </div>
                        <div class="course-description">
                            <h3>Описание</h3>
                            <?php echo the_content(); ?>
                        </div>
                        <div class="course-curriculum">
                            <h3>Учебный план</h3>
                            <ol class="unit-list">                            
                            <?php
                            $child_posts = types_child_posts("lesson");
                            $child_posts = array_reverse($child_posts);
                            foreach ($child_posts as $child_post){
                                echo '<li><a href="' . get_post_permalink($child_post->ID) . '">' . $child_post->post_title . '</a></li>';
                                echo $child_post->fields['description'];
                            }
                            ?>
                            </ol>
                        </div>
                        <!--
                        <div class="course-review">
                            <h3>Отзыв</h3>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="input-mark" class="col-sm-2 control-label">Оценка</label>
                                        <div class="col-sm-10">
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="point1"> 1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="point2"> 2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="point3"> 3
                                            </label>                                            
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio4" value="point4"> 4
                                            </label>                                            
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio5" value="point5"> 5
                                            </label>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-message" class="col-sm-2 control-label">Сообщение</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">Отправить</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
						<hr>
						<div class="course-reviews">
							<h3>Отзывы</h3>
							<div class="table-responsive">							
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>User</th>
											<th>Review</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>nghiand</td>
											<td>
												<div class="course-review-rating">
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
												</div>
												<div class="course-review-message">
													Good course
												</div>										
											</td>
										</tr>
										<tr>
											<td>nghiand</td>
											<td>
												<div class="course-review-rating">
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
												</div>
												<div class="course-review-message">
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque orci quis faucibus gravida. Integer mattis tincidunt nibh eu facilisis. Vestibulum odio urna, pulvinar et pellentesque eu, luctus eu risus.
												</div>										
											</td>
										</tr>
										<tr>
											<td>nghiand</td>
											<td>
												<div class="course-review-rating">
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
													<i class="fa fa-star" aria-hidden="true"></i>										
												</div>
												<div class="course-review-message">
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque orci quis faucibus gravida. Integer mattis tincidunt nibh eu facilisis. Vestibulum odio urna, pulvinar et pellentesque eu, luctus eu risus.
												</div>										
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
                        -->
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>