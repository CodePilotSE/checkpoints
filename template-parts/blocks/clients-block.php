<?php
$size = 'thumbnail';

$classes = [];
$classes[] = 'clients-block';
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
  <?php if( have_rows('clients-repeater') ): ?>
    <div class="clients-block__inner">
      <?php
      while( have_rows('clients-repeater') ) : the_row();
        $link = get_sub_field('client-link');
        $logo = get_sub_field('client-logo');
        if(!empty($link) && !empty($logo)):
          ?>
          <a class="clients-block__link" target="_blank" href="<?= $link ?>">
            <?= wp_get_attachment_image($logo, 'medium') ?>
          </a>
          <?php
        endif;
      endwhile;
      ?>
    </div>
  <?php endif; ?>
</section>