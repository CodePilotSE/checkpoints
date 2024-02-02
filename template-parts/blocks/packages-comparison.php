<?php
$classes = [];
$classes[] = 'package-comparison__block alignwide';
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
  <div class="package-comparison__inner" dir="ltr">

  <?php 
  $features = get_field('package-comparison-features');
  $check_icon_path = get_theme_file_path().'/svg/checkpoints-icons/check.php'; 
  $cross_icon_path = get_theme_file_path().'/svg/checkpoints-icons/cross.php'; 

  if( have_rows('package-comparison-packages') ):
    while( have_rows('package-comparison-packages') ) : the_row();

    $package_name = get_sub_field('name');
    $package_icon = get_sub_field('icon');
    $package_price = get_sub_field('price');
    $package_button = get_sub_field('button');
    $package_nice_name = strtolower($package_name);

    ?>
    <div class="package-comparison__single-package <?= $package_nice_name ?>">
      <div class="package-comparison__package-head">
        <?= $package_icon ? wp_get_attachment_image($package_icon, 'thumbnail', "", array("class" => "package-comparison__icon")) : '' ?>
        <h3 class="package-comparison__title"><?= $package_name ?> </h3>
        <span class="package-comparison__price"><?= $package_price ?></span>
      </div>
      <ul class="package-comparison__feature-list">
        <?php 
        foreach($features as $feature):
          $row_classes = array();
          $row_classes[] = 'package-comparison__feature-list-item';
          if(in_array($package_nice_name, $feature['package'])):
            $row_classes[] = 'package-comparison__feature-list-item--enabled';
            $icon = file_get_contents( $check_icon_path);
          else:
            $row_classes[] = 'package-comparison__feature-list-item--disabled';
            $icon = file_get_contents( $cross_icon_path);
          endif; 
          ?>
          <li class="<?= esc_attr( join( ' ', $row_classes )) ?>">
            <?= $icon ?>
            <span> <?= $feature['feature'] ?> </span>
            <?php 
            // this is the feature description styling - start of style is in compare-packages.scss
            // if(!empty($feature['with-description'])):
              // echo '<div class="package-comparison__feature-description">';
              //   echo  '<div class="package-comparison__feature-description__arrow"></div>';
              //   echo '<p>' . $feature['feature-description'] . '</p>';
              // echo '</div>';
            // endif;
            ?>
          </li>
          <?php
        endforeach;
        ?>
      </ul>
      <?php
      if($package_button['url'] && $package_button['title']):
        ?><a href="<?= $package_button['url'] ?>" target="_blank" class="button button--no-bg no-external-link-indicator"><?= $package_button['title'] ?></a>
        <?php
      endif; 
      ?>
    </div>
    <?php
endwhile;
endif;
  ?>
    </div>
</section>