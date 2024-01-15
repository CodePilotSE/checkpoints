<?php
$size = 'thumbnail';

$classes = [];
$classes[] = 'testimonials-block';
if ( ! empty( $block['backgroundColor'] ) ) {
  $classes[] = 'has-background';
  $classes[] = 'has-' . $block['backgroundColor'] . '-background-color';
}
if ( ! empty( $block['gradient'] ) ) {
  $classes[] = 'has-gradient';
  $classes[] = 'has-'.$block['gradient'].'-background';
}

$block['style']['color']['gradient'] ? $background = $block['style']['color']['gradient']: '';
$block['style']['color']['background'] ? $background = $block['style']['color']['background']: '';
?>
<section class="<?= esc_attr( join( ' ', $classes ) ) ?>" <?= $background ? 'style="background:'. $background .';"':'' ?> >
  <div class="testamonials">
    <?php 
    // build post type and query it
    $args = array(
      'post_type'   =>  'cp_testimonials',
      'posts_per_page'  =>  3,
      'orderby'     => 'rand'
      );
    $the_query = new WP_Query( $args );
    
    echo '<pre>';
    // print_r($the_query);
    echo '</pre>';
    if ( $the_query->have_posts() ) : 
      while ( $the_query->have_posts() ) :
        $the_query->the_post();
        global $post;

        $name    =  get_field('testimonial-name', $post->ID);
        $company =  get_field('testimonial-company', $post->ID);
        ?>
        <div class="testamonials">
          <h6><?= get_the_title() ?></h6>  

          <?= get_the_post_thumbnail('','thumbnail') ?>
          <?= !empty($name)    ? '<span>'. $name    . '</span>' : '' ?>
          <?= !empty($company) ? '<span>'. $company . '</span>' : '' ?>
        </div>
      <?php endwhile?>
    <?php endif?>
  </div>
</section>