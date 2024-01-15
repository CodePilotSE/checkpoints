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
  $a = ['a','b','c'];
  foreach($a as $b): ?>
    <div class="testamonials">
      <h6>Good job!</h6>  
      <img src="" alt="">
      <span>Name</span>
      <span>Workplace</span>
    </div>
      <?php endforeach?>
    </div>
</section>