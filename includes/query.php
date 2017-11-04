<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

class Query {

  private static $items;

  static function get_items($args = null) {
    if ( self::query($args) ) {
      self::sanitize_items();
    }
  }

  private static function query($args) {
    $query = new \WP_Query($args);

    if ($query->post_count == 0) {
      return false;
    }

    self::$items = $query->posts;
    return true;
  }

  private static function sanitize_items() {
    $items = [];

    foreach(self::$items as $product) {
      $item = [
        'ID' => $product->ID,
        'title' => $product->post_title
      ];
      $items[] = $item;
    }

    self::$items = $items;
  }

  public static function render() {

  }

  private static function debug() {
    ?> <script>console.log( <?= json_encode(self::$items) ?> )</script> <?php
  }

}
