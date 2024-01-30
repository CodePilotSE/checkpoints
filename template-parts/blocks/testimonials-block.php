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

!empty($block['style']['color']['gradient'])? $background = $block['style']['color']['gradient']: '';
!empty($block['style']['color']['background']) ? $background = $block['style']['color']['background']: '';
?>
<section class="<?= esc_attr( join( ' ', $classes ) ) ?>" <?= !empty($background) ? 'style="background:'. $background .';"':'' ?> >
  <div class="testimonials-inner">
    <?php 
    // build post type and query it
    $args = array(
      'post_type'   =>  'cp_testimonials',
      'posts_per_page'  =>  3,
      'orderby'     => 'rand'
      );
    $the_query = new WP_Query( $args );
    
    if ( $the_query->have_posts() ) : 
      while ( $the_query->have_posts() ) :
        $the_query->the_post();
        global $post;

        $name    =  get_field('testimonial-name', $post->ID);
        $company =  get_field('testimonial-company', $post->ID);
        ?>
        <div class="testimonials-single">
          <h6 class="testimonials-single__quote"><?= get_the_title() ?></h6>  

          <div class="testimonials-single__citee">
            <?= !empty($name)    ? '<span class="testimonials-single__name">'. $name    . '</span>' : '' ?>
            <?= !empty($company) ? '<span class="testimonials-single__company">'. $company . '</span>' : '' ?>
          </div>
        </div>
      <?php endwhile?>
    <?php endif?>
  </div>
</section>