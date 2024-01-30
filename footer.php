<?php
/**
 * Template for displaying the footer
 *
 * Description for template.
 *
 * @Author: Roni Laukkarinen
 * @Date: 2020-05-11 13:33:49
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-09-07 11:57:45
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package checkpoints
 */

namespace Air_Light;

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
  <?php
  if($post_id = get_footer_edit_id()):
    $text = __('Redigera sidfoten', 'checkpoints'); 
    $before = ''; 
    $after ='';
    $css_class = 'footer-edit-link no-link-styling';
    echo edit_post_link($text, $before, $after, $post_id, $css_class);
  endif;


  $args = array(
    'slug'           => 'footer',
    'post_type'      => 'cp_block_areas',
    'post_status'    => 'publish',
    'posts_per_page' => 1,
);
$query = new \WP_Query( $args );
?>
<div class="footer-content">
  <?php
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    the_content(); 
  }
  wp_reset_postdata();
}
?>
</div>
<div class="copi-link-wrapper">
  <a class="copi-link no-external-link-indicator" href="https://codepilot.se/"><?= __('Checkpoints är en produkt utvecklad av Codepilot AB', 'checkpoints') ?></a>
</div>

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
