<?php
function spm_nav_menu() {
    echo '<nav class="spm-nav">';
    echo '<ul>';
    echo '<li><a href="/dashboard">Dashboard</a></li>';
    echo '<li><a href="/create-event">Create Event</a></li>';
    echo '<li><a href="/invitations">Invitations</a></li>';
    echo '<li><a href="/profile">Profile</a></li>';
    echo '<li><a href="/preferences">Preferences</a></li>';
    echo '</ul>';
    echo '</nav>';
}
add_shortcode('spm_nav', 'spm_nav_menu');
