<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

class Metabox {

  const NONCE_ACTION = 'metabox_nonce';
  public $fields = [];

  public function __construct() {
    $this->create_metabox_fields();

    add_action( 'add_meta_boxes', [$this, 'register_metabox'] );
    add_action( 'admin_enqueue_scripts', [$this, 'add_scripts'] );
    add_action('save_post', [$this, 'save_metabox_fields']);
  }

  public function register_metabox() {
    add_meta_box(
      'carousel_metabox',
      __( 'Configurações' ),
      [$this, 'metabox_render'],
      Carousel::CPT,
      'normal',
      'high'
    );
  }

  public function metabox_render( $post ) {
    foreach ($this->fields as $field) {
      $field->render( $post->ID );
    }

    wp_nonce_field( 'metabox_nonce', 'metabox_nonce_field' );
  }

  public function create_metabox_fields() {

    $args = [
      'name' => 'title',
      'label' => __( 'Título', 'comet-woo-carousel' )
    ];

    $this->fields[] = new Field_Text( $args );

    $options = [
      [ 'value' => 'latest', 'label' => __('Mais Recentes', 'comet-woo-carousel') ],
      [ 'value' => 'category', 'label' => __('Categorias', 'comet-woo-carousel') ],
    ];

    $args = [
      'name' => 'source',
      'label' => __('Fonte', 'comet-woo-carousel'),
      'description' => __('Selecione a origem de seleção dos produtos', 'comet-woo-carousel'),
      'options' => $options
    ];

    $this->fields[] = new Field_Select( $args );

  }

  public function save_metabox_fields( $post_id ) {
    $metabox_nonce = isset( $_POST['metabox_nonce_field'] );
    $metabox_nonce_check = wp_verify_nonce( $_POST['metabox_nonce_field'], self::NONCE_ACTION );

    if ( $metabox_nonce && $metabox_nonce_check  ) {
      foreach( $this->fields as $field) {
        $field->save( $post_id );
      }
    }
  }

  public function add_scripts() {
    if ( Utils::current_page( Carousel::CPT ) ) {
      wp_enqueue_style(
        'comet-woo-carousel-admin-css',
        COMET_WOO_CAROUSEL_ASSETS_URL . 'css/style.css'
      );
    }
  }

  public function notices_save_post( $handler ) {
    $messages = [
      'nonce_field' => __( 'Esse formulário não parece algo válido.', 'comet-woo-carousel' ),
    ]; ?>

    <div class="notice notice-success is-dismissible">
      <p><?php echo $messages[ $handler ]; ?></p>
    </div>

  <?php
  }

}
