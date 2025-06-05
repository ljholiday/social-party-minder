<?php
/**
 * Plugin Name: Social Party Minder
 * Description: A plugin for managing social events, including event post types, meta fields, and a custom block.
 * Version: 0.2.3
 * Author: LJHoliday
 */

defined('ABSPATH') or die('No script kiddies please!');

require_once plugin_dir_path(__FILE__) . 'includes/cpt-event.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-boxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/blocks.php';
