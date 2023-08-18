<?php
$classes = [];
$classes[] = 'feature-highlight-block';
$classes[] = $block['className'];
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
<?php
$title = get_field('feat-highlight-text-group')['feat-highlight-title'];
$content = get_field('feat-highlight-text-group')['feat-highlight-content'];
$image = get_field('feat-highlight-image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

?>
<section class="<?= esc_attr( join( ' ', $classes ) ) ?>" <?= $background ? 'style="background:'. $background .';"':'' ?> >
  <div class="feature-highlight-block--inner">
    <div class="feature-highlight-block--text-side">
      <h3 class="feature-highlight-block--title">    <?= $title ? $title : '' ?>     </h3>
      <p class="feature-highlight-block--content">  <?= $content ? $content : '' ?> </p>
    </div>
    <?= $image ? wp_get_attachment_image( $image, $size ) : '' ?>
  </div>
</section>