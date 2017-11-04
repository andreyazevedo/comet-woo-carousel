<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

abstract class Field_Base {
  public $name;
  public $label;
  public $description;
  private $value;

  abstract public function element();

  public function render() { ?>

    <div class="comet-field">
      <div class="comet-label">
        <label for=""><?php echo $this->label ?></label>
        <p class="description"><?php echo $this->description ?></p>
      </div>
      <div class="comet-input">
        <div class="comet-input-wrap">
          <?php $this->element() ?>
        </div>
      </div>
    </div>

  <?php }

  public function __construct($name = null, $label = null, $description = null) {
    $this->name = $name;
    $this->label = $label;
    $this->description = $description;
  }

}
