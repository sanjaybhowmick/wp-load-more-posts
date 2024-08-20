<?php
function load_more_default_ajax_handler() {
    $paged = $_POST['page'] + 1; // Next page to load
    $query_args = array(
        'post_type' => 'post', // Use default post type
        'paged' => $paged,
    );

    query_posts($query_args);

    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <div class="post-item">
                <h2><?php the_title(); ?></h2>
                <div class="post-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </div>
            <?php
        endwhile;
    endif;

    wp_reset_query();
    die(); // Always die() to end AJAX requests
}

add_action('wp_ajax_load_more_default', 'load_more_default_ajax_handler'); // If called from admin panel
add_action('wp_ajax_nopriv_load_more_default', 'load_more_default_ajax_handler'); // If called from elsewhere

?>