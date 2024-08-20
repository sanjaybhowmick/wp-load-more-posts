<?php
if (have_posts()) :
    echo '<div id="post-container">';
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
    echo '</div>';
    
    // Show the load more button if there are more posts
    global $wp_query;
    if ($wp_query->max_num_pages > 1) : 
        echo '<button id="load-more" data-page="1" data-url="' . admin_url('admin-ajax.php') . '">Load More</button>';
    endif;
else :
    echo '<p>No posts found.</p>';
endif;
?>
