<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

class Utils {

  public static function current_page( $page ) {
    $current_screen = get_current_screen();

    if ( $current_screen->id == $page ) {
      return true;
    }
    return false;
  }

}
