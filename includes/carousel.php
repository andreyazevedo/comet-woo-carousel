<?php
namespace CometWooCarousel;

if( ! defined( 'ABSPATH' ) ) exit;

class Carousel {

  const CPT = 'comet-woo-carousel';

  public function __construct() {
    $this->register_post_type();
    $this->register_metabox();
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
    new Metabox();
  }
}
