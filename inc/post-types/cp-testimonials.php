<?php
/**
 * @Author: Niku Hietanen
 * @Date: 2020-02-18 15:06:45
 * @Last Modified by:   Timi Wahalahti
 * @Last Modified time: 2023-03-31 14:39:55
 *
 * @package checkpoints
 **/

namespace Air_Light;

/**
 * Registers the Testimoinals post type.
 * 
 */
class cp_testimonials extends Post_Type {

  public function register() {

    $generated_labels = [
      'menu_name'          => __( 'Omdömen', 'checkpoints' ),
      'name'               => _x( 'Omdömens', 'post type general name', 'checkpoints' ),
      'singular_name'      => _x( 'Omdöme', 'post type singular name', 'checkpoints' ),
      'name_admin_bar'     => _x( 'Omdömen', 'add new on admin bar', 'checkpoints' ),
      'add_new'            => _x( 'Lägg till nytt', 'thing', 'checkpoints' ),
      'add_new_item'       => __( 'Lägg till Omdöme', 'checkpoints' ),
      'new_item'           => __( 'Nytt Omdöme', 'checkpoints' ),
      'edit_item'          => __( 'Redigera Omdöme', 'checkpoints' ),
      'view_item'          => __( 'Visa Omdöme', 'checkpoints' ),
      'all_items'          => __( 'Alla Omdömen', 'checkpoints' ),
      'search_items'       => __( 'Sök Omdömen', 'checkpoints' ),
      'parent_item_colon'  => __( 'Förälder-Omdöme:', 'checkpoints' ),
      'not_found'          => __( 'Hittade inga Omdömen.', 'checkpoints' ),
      'not_found_in_trash' => __( 'Hittade inga Omdömen i papperskorgen.', 'checkpoints' ),
    ];
    $args = [
      'labels'              => $generated_labels,
      'menu_icon'           => null,
      'public'              => false,
      'show_ui'             => true,
      'has_archive'         => false,
      'exclude_from_search' => true,
      'show_in_rest'        => false,
      'pll_translatable'    => true,
      'supports'            => [ 'title', 'thumbnail', 'revisions' ],
      'taxonomies'          => [],
    ];

    $this->register_wp_post_type( $this->slug, $args );
  }
}
