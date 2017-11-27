<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

abstract class Field_Base {
  public $name;
  public $label;
  public $description;
  private $value;

  abstract public function element( $post_id );
  abstract public function save( $post_id );

  public function render( $post_id ) { ?>

    <div class="comet-field">
      <div class="comet-label">
        <label for=""><?php echo $this->label ?></label>
        <p class="description"><?php echo $this->description ?></p>
      </div>
      <div class="comet-input">
        <div class="comet-input-wrap">
          <?php $this->element( $post_id ) ?>
        </div>
      </div>
    </div>

  <?php }

  public function __construct($args) {
    $default_args = [
      'name' => null,
      'label' => null,
      'description' => null
    ];

    $args = array_merge( $default_args, $args );

    $this->name = $args['name'];
    $this->label = $args['label'];
    $this->description = $args['description'];
  }

}
