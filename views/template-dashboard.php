<?php
/* Template Name: Party Minder Dashboard */
get_header(); ?>
<div class="spm-container">
    <h1>My Events</h1>
    <?php echo do_shortcode('[spm_nav]'); ?>

    <?php
    $args = array(
        'post_type' => 'pm_event',
        'author' => get_current_user_id(),
        'post_status' => 'publish',
        'posts_per_page' => -1
    );
    $events = new WP_Query($args);

    if ($events->have_posts()) :
        echo '<ul>';
        while ($events->have_posts()) : $events->the_post();
            echo '<li>';
            echo '<strong>' . get_the_title() . '</strong><br />';
            echo 'Created on: ' . get_the_date() . '<br />';
            echo '<a href="' . get_permalink() . '">View Event</a>';
            echo '</li><hr />';
        endwhile;
        echo '</ul>';
        wp_reset_postdata();
    else :
        echo '<p>You haven’t created any events yet.</p>';
    endif;
    ?>
</div>
<?php get_footer(); ?>
