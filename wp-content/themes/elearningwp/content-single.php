<?php
/**
 * @package thim
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
        /* Video, Audio, Image, Gallery, Default will get thumb */
        do_action( 'thim_entry_top', 'full' ); 
    ?>

    <div class="page-content-inner">
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
             <?php thim_entry_meta(); ?>
        </header>
        <!-- .entry-header -->
        <div class="entry-content">
            <?php the_content(); ?>
            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'thim' ),
                'after'  => '</div>',
            ) );
            ?>
        </div>
        <?php
            get_template_part( 'inc/related' );
        ?>
    </div>
</article><!-- #post-## -->
<!---->
<!-- --><?php
//    if (thim_is_enable_social()) {
//        $class_has_social = " col-2-3";
//    }else {
//        $class_has_social = "";
//    }
//    /* translators: used between list items, there is a space after the comma */
//    $tag_list = get_the_tag_list( '<div class="tags-post'.$class_has_social.'"><div class="tags-post-inner"><span>Tags: </span>', __( ', ', 'thim' ), '</div></div>' );
//    if ($tag_list) {
//        $class_has_tag = " col-1-3";
//        echo esc_html($tag_list);
//    }else {
//        $class_has_tag = "";
//    }
//
//if (thim_is_enable_social()) { ?>
<!--    <div class="share-post--><?php //echo esc_attr($class_has_tag);?><!--">-->
<!--        <div class="share-post-inner">-->
<!--        Share --><?php //get_template_part( 'inc/post-share' ); ?>
<!--        </div>-->
<!--    </div>-->
<?php //} ?>
<!--<div class="clear"></div>-->