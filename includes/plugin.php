<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

class Plugin {
  private static $instance = null;

  public $shortcode;
  public $carousel;

  public function __clone() {
    _doing_it_wrong( __FUNCTION__, __( 'Not Today.', 'comet-woo-carousel' ), '0.1' );
  }

  public function __wakeup() {
    _doing_it_wrong( __FUNCTION__, __( 'Not Today.', 'comet-woo-carousel' ), '0.1' );
  }

  public static function instance() {
    if ( is_null( self::$instance ) ) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function init_autoloader() {
    require( COMET_WOO_CAROUSEL_PATH . 'includes/autoloader.php') ;
    Autoloader::init();
  }

  public function components() {
    $this->shortcode = new Shortcode();
    $this->carousel = new Carousel();
  }

  public function __construct() {
    $this->init_autoloader();
    add_action( 'init', [$this, 'components'] );
  }

}

Plugin::instance();
