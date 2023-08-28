<?php
$classes = [];
$classes[] = 'feature-highlight-block';
$classes[] = $block['className'];
if (!empty($block['backgroundColor'])) {
  $classes[] = 'has-background';
  $classes[] = 'has-' . $block['backgroundColor'] . '-background-color';
}
if (!empty($block['gradient'])) {
  $classes[] = 'has-gradient';
  $classes[] = 'has-' . $block['gradient'] . '-background';
}

$block['style']['color']['gradient'] ? $background = $block['style']['color']['gradient'] : '';
$block['style']['color']['background'] ? $background = $block['style']['color']['background'] : '';
?>
<?php
$title = get_field('feat-highlight-text-group')['feat-highlight-title'];
$content = get_field('feat-highlight-text-group')['feat-highlight-content'];
$image = get_field('feat-highlight-image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

?>
<section class="<?= esc_attr(join(' ', $classes)) ?>" <?= $background ? 'style="background:' . $background . ';"' : '' ?>>

  <div class="feature-highlight-block__inner">
    <div class="feature-highlight-block__text-side">
      <h3 class="feature-highlight-block__title"> <?= $title ? $title : '' ?> </h3>
      <p class="feature-highlight-block__content"> <?= $content ? $content : '' ?> </p>
    </div>
    <div class="feature-highlight-block__image-side">
      <?= $image ? wp_get_attachment_image($image, $size, "", array("class" => "feature-highlight-block__image")) : '' ?>
    </div>
  </div>
</section>