<?php
namespace CometWooCarousel;

use CometWooCarousel\Field_Base;

if( ! defined( 'ABSPATH' ) ) exit;

class Field_Text extends Field_Base {
  public static $type = 'text';
  public static $class = 'comet-input-text';

  public function element( $post_id ) {
    $value = get_post_meta( $post_id, $this->name, true );

    ?>
    <input
      name="<?php echo $this->name ?>"
      type="<?php echo self::$type ?>"
      class="<?php echo self::$class ?>"
      value="<?php echo $value ?>"
      autocomplete="off"
    >
  <?php }

  public function save($post_id) {
    $field_data = $_POST[$this->name];

    if ( $field_data ) {
      $field_data = sanitize_text_field( $field_data );
      update_post_meta( $post_id, $this->name, $field_data );

      return true;
    }
    return;
  }

}
