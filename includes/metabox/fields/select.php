<?php
namespace CometWooCarousel;

use CometWooCarousel\Field_Base;

if( ! defined( 'ABSPATH' ) ) exit;

class Field_Select extends Field_Base {
  public static $class = 'comet-input-select';
  public $options;

  public function element() { ?>

    <select
    name="<?php echo $this->name ?>"
    class="<?php echo self::$class ?>"
    >

    <?php echo $this->get_options() ?>

    </select>

  <?php }

  public function get_options() {
    $select_data = $this->options;

    if ( ! $select_data == null ) {
      $html = '';

      foreach( $this->options as $option ) {
        $option_html = '<option value="%s">%s</option>';
        $item = sprintf( $option_html, $option['value'], $option['label'] );
        $html .= $item;
      }

      return $html;

    } else {
      return false;
    }
  }

  public function __construct($name = null, $label = null, $description = null, $options = null) {
    $this->name = $name;
    $this->label = $label;
    $this->description = $description;
    $this->options = $options;
  }

}
