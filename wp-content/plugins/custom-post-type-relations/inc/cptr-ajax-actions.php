<?php

add_action('wp_ajax_cptr_get_posts', 'cptr_ajax_get_posts');
add_action('wp_ajax_cptr_get_relations', 'cptr_ajax_get_relations');
add_action('wp_ajax_nopriv_cptr_get_relations', 'cptr_ajax_get_relations');

function cptr_ajax_get_posts() {
    global $wpdb;
    if (isset($_GET['q']) && isset($_GET['post_type'])) {
        $q = $_REQUEST['q'];
        $post_type = $_GET['post_type'];

        $args = array(
            's' => $q,
            'post_type' => $post_type,
            'post_status' => 'publish',
            'order' => 'ASC',
            'orderby' => 'title',
        );


        $posts = new WP_Query($args);
        $result = array();
        foreach ($posts->get_posts() as $post) {
            $result[] = array('id' => $post->ID, 'name' => $post->post_title);
        }

        echo json_encode($result);
        wp_reset_query();
    }
    die();
}

function cptr_ajax_get_relations() {
    if (isset($_GET['post_id']) && $_GET['relation']) {
        $post_id = $_GET['post_id'];
        $relation = $_GET['relation'];
        $relations = cptr_get_relations($relation, false, $post_id);
        echo json_encode($relations);
    } else {
        echo json_encode(false);
    }
    die();
}
