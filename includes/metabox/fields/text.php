<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

class Field_Text extends Field_Base {
  public static $type = 'text';
  public static $class = 'comet-input-text';

  public function element() { ?>

    <input
      name="<?php echo $this->name ?>"
      type="<?php echo self::$type ?>"
      class="<?php echo self::$class ?>"
    >

  <?php }

}
