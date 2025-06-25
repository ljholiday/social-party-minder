<?php
/* Template Name: Party Minder Template */
get_header(); ?>

<div class="spm-container">
    <h1><?php the_title(); ?></h1>
    <p>Did the party minder template load?</p>

    <?php echo do_shortcode('[spm_nav]'); ?>

    <div class="spm-placeholder">
        <p>This is the <strong><?php echo get_the_title(); ?></strong> page content placeholder.</p>
    </div>
</div>

<?php get_footer(); ?>
