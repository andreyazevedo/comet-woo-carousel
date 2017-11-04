<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

/*
This Autoloader Class is based on Elementor Autoloader Class
Github: https://github.com/pojome/elementor/blob/master/includes/autoloader.php
*/
class Autoloader {

private static $classes_list = [
  'Carousel' => 'includes/carousel.php',
  'Field_Base' => 'includes/metabox/fields/base.php',
  'Field_Select' => 'includes/metabox/fields/select.php',
  'Field_Text' => 'includes/metabox/fields/text.php',
  'Metabox' => 'includes/metabox/metabox.php',
  'Query' => 'includes/query.php',
  'Shortcode' => 'includes/shortcode.php',
  'Template' => 'includes/template.php',
  'Utils' => 'includes/utils.php'
];

public static function init() {
  spl_autoload_register( [ __CLASS__, 'autoload' ] );
}

private static function load_class( $class_name ) {
  if ( isset( self::$classes_list[$class_name] ) ) {
    $filename = COMET_WOO_CAROUSEL_PATH . '/' . self::$classes_list[$class_name];
    if ( is_readable( $filename ) ) {
      require ( $filename );
    }
  }
}

private static function autoload( $class ) {
  $relative_class_name = preg_replace( '/^' . __NAMESPACE__ . '\\\/', '', $class );
  self::load_class( $relative_class_name );
}

}
