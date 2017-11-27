<?php
namespace CometWooCarousel;

use CometWooCarousel\Field_Base;

if( ! defined( 'ABSPATH' ) ) exit;

class Field_Select extends Field_Base {
  public static $class = 'comet-input-select';
  public $options;

  public function save( $post_id ) {
    $field_data = $_POST[$this->name];
    var_dump($field_data);
    wp_die();
  }

  public function element( $post_id ) { ?>
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

  public function add_scripts() {
    wp_enqueue_script(
      'lib-select2-js',
      COMET_WOO_CAROUSEL_ASSETS_URL . 'lib/select2/js/select2.min.js',
      [],
      '',
      true
    );

    wp_enqueue_style(
      'lib-select2-css',
      COMET_WOO_CAROUSEL_ASSETS_URL . 'lib/select2/css/select2.min.css'
    );

    wp_enqueue_script(
      'fields-select-js',
      COMET_WOO_CAROUSEL_ASSETS_URL . 'js/select.js',
      [],
      '',
      true
    );
  }

  public function __construct($args) {
    parent::__construct($args);
    $this->options = isset( $args['options'] ) ? $args['options'] : null;

    add_action( 'admin_enqueue_scripts', [$this, 'add_scripts'] );
  }

}
