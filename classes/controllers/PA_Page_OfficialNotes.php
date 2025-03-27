<?php

get_header(); 
?>

<div class="notas-oficiais-container">
    <h1><?php the_title(); ?></h1> 

    <?php
    $args = array(
        'post_type'      => 'officialnotes', 
        'posts_per_page' => 10, 
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
            ?>
            <div class="nota-oficial-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
                <p><?php the_excerpt(); ?></p> 
            </div>
            <?php
        endwhile;

        echo '<div class="pagination">';
        echo paginate_links();
        echo '</div>';

    else :
        echo '<p>' . __('No official notes found.', 'iasd') . '</p>';
    endif;

    wp_reset_postdata(); 
    ?>
</div>

<?php
get_footer(); 
?>
