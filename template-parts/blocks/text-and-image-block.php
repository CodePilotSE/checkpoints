<?php
$image = get_field('text-and-image-image');
$size = 'large';

$classes = [];
$classes[] = 'text-and-image-block';
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
  <div class="text-and-image-block__inner">
    <div class="text-and-image-block__gutenberg-content" >
      <InnerBlocks />
    </div>
    <?= $image ? wp_get_attachment_image($image, $size, "", array("class" => "text-and-image-block__image")) : '' ?>
  </div>
</section>