<?php
/* Template Name: Party Minder Create Event */
get_header(); ?>
<div class="spm-container">
    <h1>Create a New Event</h1>
    <?php echo do_shortcode('[spm_nav]'); ?>
    <form method="post" action="">
        <?php wp_nonce_field('spm_create_event', 'spm_event_nonce'); ?>
        <p><label for="event_title">Event Title:</label><br />
        <input type="text" name="event_title" id="event_title" required /></p>

        <p><label for="event_image_url">Event Image URL (optional):</label><br />
        <input type="text" name="event_image_url" id="event_image_url" /></p>

        <p><label for="event_location">Location:</label><br />
        <input type="text" name="event_location" id="event_location" /></p>

        <p><label for="event_date">Date:</label><br />
        <input type="date" name="event_date" id="event_date" /></p>

        <p><label for="event_time">Time:</label><br />
        <input type="time" name="event_time" id="event_time" /></p>

        <p><label for="event_description">Description:</label><br />
        <textarea name="event_description" id="event_description" rows="5"></textarea></p>

        <p><label for="guest_emails">Invite Guests (comma-separated emails):</label><br />
        <textarea name="guest_emails" id="guest_emails" rows="3" placeholder="e.g., alice@example.com, bob@example.com"></textarea></p>

        <p><button type="submit">Create Event</button></p>
    </form>
</div>
<?php get_footer(); ?>
