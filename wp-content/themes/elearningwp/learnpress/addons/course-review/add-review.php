<?php
$user_id = get_current_user_id();
$course_id = get_the_ID();
$user_review    = learn_press_get_user_review_title( $course_id, $user_id );
if( $user_review ) {
    return 0;
}
?>
<button class="write-a-review"><?php _e( 'Write a Review', 'thim' );?></button>
<div class="review-wrapper" id="review">
    <div class="review-content" id="reviewTarget">
        <h3>
            <?php _e( 'Write a review', 'thim' );?>
            <a href="" class="close dashicons dashicons-no-alt"></a>
        </h3>
        <ul class="review-fields">
            <li>
                <label><?php _e( 'Title', 'thim' );?> <span class="required">*</span></label>
                <input type="text" name="review-title" />
            </li>
            <li>
                <label><?php _e( 'Content', 'thim' );?><span class="required">*</span></label>
                <textarea name="review-content"></textarea>
            </li>
            <li>
                <label><?php _e( 'Rating', 'thim' );?><span class="required">*</span></label>
                <ul class="review-stars">
                    <?php for( $i = 1; $i <= 5; $i ++ ){?>
                        <li class="review-title" title="<?php echo esc_attr($i);?>"><span class="dashicons dashicons-star-empty"></span> </li>
                    <?php }?>
                </ul>
            </li>
            <li class="review-actions">
                <span class="submitting"><?php _e( 'Please wait...', 'thim' );?></span>
                <button type="button" class="submit-review" data-id="<?php the_ID();?>"><?php _e( 'Add review', 'thim' );?></button>
                <button type="button" class="cancel"><?php _e( 'Cancel', 'thim' );?></button>
            </li>
        </ul>        
    </div>
</div>