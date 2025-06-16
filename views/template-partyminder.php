<?php
/* Template Name: Party Minder Template */
get_header(); ?>

<div class="spm-container">
    <h1><?php the_title(); ?></h1>

    <?php echo do_shortcode('[spm_nav]'); ?>

    <div class="spm-placeholder">
        <p>This is the <strong><?php echo get_the_title(); ?></strong> page content placeholder.</p>
    </div>
</div>

<?php get_footer(); ?>
