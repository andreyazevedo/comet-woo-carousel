<?php
/**
 * Plugin Name: Comet Woo Carousel
 * Description: Show a Carousel of products in Woocommerce.
 * Plugin URI:  https://plugins.andreyazevedo.me/comet-woo-carousel
 * Version:     1.0
 * Author:      Andrey Azevedo
 * Author URI:  https://andreyazevedo.me
 * Text Domain: comet-woo-carousel
 */
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'COMET_WOO_CAROUSEL_VERSION', '0.1' );

define( 'COMET_WOO_CAROUSEL__FILE__', __FILE__ );
define( 'COMET_WOO_CAROUSEL_PLUGIN_BASE', plugin_basename( COMET_WOO_CAROUSEL__FILE__ ) );
define( 'COMET_WOO_CAROUSEL_URL', plugins_url( '/', COMET_WOO_CAROUSEL__FILE__ ) );
define( 'COMET_WOO_CAROUSEL_PATH', plugin_dir_path( COMET_WOO_CAROUSEL__FILE__ ) );
define( 'COMET_WOO_CAROUSEL_ASSETS_URL', COMET_WOO_CAROUSEL_URL . 'assets/' );

require(COMET_WOO_CAROUSEL_PATH . 'includes/plugin.php');
