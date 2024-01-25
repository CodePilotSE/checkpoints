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
class cp_block_areas extends Post_Type {

  public function register() {

    $generated_labels = [
      'menu_name'          => __( 'Block areas', 'checkpoints' ),
      'name'               => _x( 'Block areas', 'post type general name', 'checkpoints' ),
      'singular_name'      => _x( 'Block area', 'post type singular name', 'checkpoints' ),
      'name_admin_bar'     => _x( 'Block areas', 'add new on admin bar', 'checkpoints' ),
      'add_new'            => _x( 'Lägg till nytt', 'thing', 'checkpoints' ),
      'add_new_item'       => __( 'Lägg till Block area', 'checkpoints' ),
      'new_item'           => __( 'Nytt Block area', 'checkpoints' ),
      'edit_item'          => __( 'Redigera Block area', 'checkpoints' ),
      'view_item'          => __( 'Visa Block area', 'checkpoints' ),
      'all_items'          => __( 'Alla Block areas', 'checkpoints' ),
      'search_items'       => __( 'Sök Block areas', 'checkpoints' ),
      'parent_item_colon'  => __( 'Förälder-Block area:', 'checkpoints' ),
      'not_found'          => __( 'Hittade inga Block areas.', 'checkpoints' ),
      'not_found_in_trash' => __( 'Hittade inga Block areas i papperskorgen.', 'checkpoints' ),
    ];
    $args = [
      'labels'              => $generated_labels,
      'menu_icon'           => null,
      'public'              => true,
      'show_ui'             => false,
      'has_archive'         => false,
      'exclude_from_search' => true,
      'show_in_rest'        => true,
      'pll_translatable'    => true,
      'supports'            => [ 'title', 'editor', 'thumbnail', 'revisions' ],
      'taxonomies'          => [],
    ];

    $this->register_wp_post_type( $this->slug, $args );
  }
}
