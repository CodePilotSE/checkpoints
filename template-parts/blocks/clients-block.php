<?php
$size = 'thumbnail';

$classes = [];
$classes[] = 'clients-block alignwide';
if ( ! empty( $block['backgroundColor'] ) ) {
  $classes[] = 'has-background';
  $classes[] = 'has-' . $block['backgroundColor'] . '-background-color';
}
if ( ! empty( $block['gradient'] ) ) {
  $classes[] = 'has-gradient';
  $classes[] = 'has-'.$block['gradient'].'-background';
}

!empty($block['style']['color']['gradient']) ? $background = $block['style']['color']['gradient']: '';
!empty($block['style']['color']['background']) ? $background = $block['style']['color']['background']: '';
?>
<section class="<?= esc_attr( join( ' ', $classes ) ) ?>" <?= !empty($background) ? 'style="background:'. $background .';"':'' ?> >
  <?php if( have_rows('clients-repeater') ): ?>
    <div class="clients-block__inner">
      <?php
      while( have_rows('clients-repeater') ) : the_row();
        $logo = get_sub_field('client-logo');
        if(!empty($logo)):
          ?>
          <div class="clients-block__link">
            <?= wp_get_attachment_image($logo, 'medium') ?>
          </div>
          <?php
        endif;
      endwhile;
      ?>
    </div>
  <?php endif; ?>
</section>