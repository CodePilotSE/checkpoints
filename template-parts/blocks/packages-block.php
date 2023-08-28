<?php
$classes = [];
$classes[] = 'package-pricing-block';
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
  <?php 
  if( have_rows('compare-package-pricing') ):
    ?><div class="<?= $enabled ? '' : 'disabled' ?> package-pricing-block__inner"><?php
    while( have_rows('compare-package-pricing') ) : the_row();

        $title = get_sub_field('name');
        $offer = get_sub_field('offer');
        $pricing = get_sub_field('pricing');
        $sale_price = get_sub_field('sale-price');
        $desc = get_sub_field('description');
        $features = get_sub_field('package-features');
        $more_features_text = get_sub_field('more-features-text');
        $button = get_sub_field('button-link');
        $enabled = get_sub_field('enabled');
    ?>
    <div class="<?= $enabled ? '' : 'disabled' ?> package-pricing-block__card">
      <div class="background-effect" id="up-down"></div>
      <div class="background-effect" id="left-right"></div>
      <?= $offer ? '<span class="package-pricing-block__offer">'. $offer .'</span>' : '' ?>
      <h2 class="package-pricing-block__title"><?= $title?></h2>
      <span class="package-pricing-block__price"><?= $pricing?></span>
      <?= $sale_price ? '<span class="package-pricing-block__sale_price" >'. $sale_price .'</span>' : '' ?>
      <?php

      // package feature rows
      if( have_rows('package-features') ):?>  
        <ul class="package-pricing-block__feature-list"> <?php
          while( have_rows('package-features') ) : the_row();
          
            $icon = get_sub_field('icon');
            $feat = get_sub_field('single-feature');
            $icon_url = get_template_directory().'/svg/checkpoints-icons/'. $icon .'.php';
            ?>

            <li class="package-pricing-block__single-feature">
              <?php  include $icon_url; ?>
              <span>  <?= $feat; ?> </span>
            </li>
            <?php
          endwhile; ?> 
         </ul> <?php
        endif;
        
        // end of package feature rows

        if($button):
          ?><a href="<?=  $button['url']  ?>" aria-disabled="<?= $enabled ? 'false' :'true' ?>" target="_blank" class="package-pricing-block__link no-external-link-indicator">
          <button class="button button--no-bg">
            <?= $button['title']; ?>
            </button>
          </a>
          <?php
            
        endif;
        ?>
      

    </div>
    <?php

    endwhile;
    ?></div><?php
endif;
  
?>
    
</section>