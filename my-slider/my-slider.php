<?php
/**
 * Plugin Name: My Slider
 * Description: A custom WordPress image slider.
 * Version: 1.0.0
 * Author: karan
 * License: GPL-2.0-or-later
 * Text Domain: my-slider
 */

namespace MySlider;

defined( 'ABSPATH' ) || exit;


/**
 * Plugin constants.
 */
define( 'MY_SLIDER_VERSION', '1.0.0' );

define( 'MY_SLIDER_FILE', __FILE__ );

define(
    'MY_SLIDER_PATH',
    plugin_dir_path( MY_SLIDER_FILE )
);

define(
    'MY_SLIDER_URL',
    plugin_dir_url( MY_SLIDER_FILE )
);


/**
 * Load plugin class.
 */
require_once MY_SLIDER_PATH . 'includes/class-plugin.php';


/**
 * Initialize plugin.
 */
$plugin = new Plugin();

$plugin->init();
