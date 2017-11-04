<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

class Carousel {

  const CPT = 'comet-woo-carousel';

  public function __construct() {
    $this->register_post_type();

    add_action( 'add_meta_boxes', [$this, 'register_metabox'] );
    add_action('admin_enqueue_scripts', [$this, 'add_scripts']);
  }

  public function register_post_type() {
    $labels = [
      'name' => __( 'Carroséis' ),
      'singular_name' => __( 'Carrossel' ),
      'add_new_item' => __( 'Adicionar Novo Carrossel' ),
      'edit_item' => __( 'Editar Carrossel' ),
      'all_items' => __( 'Todos os Carroséis' )
    ];

    $args = [
      'supports' => ['title'],
      'menu_icon' => 'dashicons-admin-network',
      'query_var' => true,
      'menu_position' => 5,
      'labels' => $labels,
      'public' => true,
      'as_archive' => false,
      'show_in_menu' => true,
      'rewrite' => ['slug' => self::CPT]
    ];

    register_post_type(self::CPT, $args);
  }

  public function register_metabox() {
    add_meta_box(
      'carousel_metabox',
      __( 'Configurações' ),
      [$this, 'metabox_render'],
      self::CPT,
      'normal',
      'high'
    );
  }

  public function metabox_render() {
    $field = new Field_Text('tipo', 'Fonte de Dados');
    //echo $field->render();

    $options = [
      ['value' => 'pages', 'label' => 'Páginas'],
      ['value' => 'posts', 'label' => 'Posts'],
    ];

    //$field2 = new Field_Select('tipo', 'Tipo de Página', '', $options);
    //echo $field2->render();
      include('templates/metabox/metabox_options.php');
  }

  public function add_scripts() {
    if ( Utils::current_page( self::CPT ) ) {
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

      wp_enqueue_style(
        'comet-woo-carousel-admin-css',
        COMET_WOO_CAROUSEL_ASSETS_URL . 'css/style.css'
      );
    }
  }
}
