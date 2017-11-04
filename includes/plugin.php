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

  public function includes() {
    include( COMET_WOO_CAROUSEL_PATH . 'includes/metabox/fields/base.php' );
    include( COMET_WOO_CAROUSEL_PATH . 'includes/metabox/fields/text.php' );
    include( COMET_WOO_CAROUSEL_PATH . 'includes/metabox/fields/select.php' );

    include( COMET_WOO_CAROUSEL_PATH . 'includes/utils.php' );
    include( COMET_WOO_CAROUSEL_PATH . 'includes/carousel.php' );
    include( COMET_WOO_CAROUSEL_PATH . 'includes/template.php' );
    include( COMET_WOO_CAROUSEL_PATH . 'includes/shortcode.php' );
  }

  public function components() {
    $this->shortcode = new Shortcode();
    $this->carousel = new Carousel();
    $args = [
      'post_type' => 'product',
      'posts_per_page' => 40,
    ];
    //Carousel::get_items($args);
  }

  public function __construct() {
    $this->includes();

    add_action( 'init', [$this, 'components'] );
  }

}

Plugin::instance();
