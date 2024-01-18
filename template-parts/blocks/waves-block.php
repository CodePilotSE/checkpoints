<?php
$rotation = get_field('waves-rotation');
$color_one = get_field('waves-background');
$color_two = get_field('waves-background-two');
$background_one = 'var(--color-' . $color_one.')';
$background_two = 'var(--color-' . $color_two.')';
$selected_wave = get_field('waves-selected-wave');
$selected_wave_url = get_theme_file_path().'/svg/waves/'.$selected_wave.'.php'; 

$classes = [];

isset($rotation) && $rotation ? $classes[] = 'rotation-'. $rotation: '';
$classes[] = 'wave-block alignfull';
if ( ! empty( $block['backgroundColor'] ) ) {
  $classes[] = 'has-background';
  $classes[] = 'has-' . $block['backgroundColor'] . '-background-color';
}
if ( ! empty( $block['gradient'] ) ) {
  $classes[] = 'has-gradient';
  $classes[] = 'has-'.$block['gradient'].'-background';
}
$classes[] = 'col-1-' . $color_one;
$classes[] = 'col-2-' . $color_two;


!empty($block['style']['color']['gradient'])? $background = $block['style']['color']['gradient']: '';
!empty($block['style']['color']['background']) ? $background = $block['style']['color']['background']: '';
?>


<section class="<?= esc_attr( join( ' ', $classes ) ) ?>" <?= !empty($background) ? 'style="background:'. $background .';"':'' ?> >
  <?php
  include $selected_wave_url;
  ?>

</section>