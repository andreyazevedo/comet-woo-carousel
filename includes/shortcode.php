<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

class Shortcode {

  private static $slug = 'comet-woo-carousel';

  public function __construct() {
    add_shortcode( self::$slug, [$this, 'render'] );
  }

  public function render() {
    return "Lista de Produtos";
  }

}
