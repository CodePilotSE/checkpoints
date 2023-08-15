<section>


  <?php 
  if( have_rows('compare-package-pricing') ):
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
    <div class="<?= $enabled ? '' : 'disabled' ?>">
      <?= $offer ? "<span>". $offer ."</span>" : '' ?>
      <h2><?= $title?></h2>
      <span><?= $pricing?></span>
      <?= $sale_price ? "<span>". $sale_price ."</span>" : '' ?>
      <div>
      <?php

      // package feature rows
      if( have_rows('package-features') ):
        while( have_rows('package-features') ) : the_row();
        
          $icon = get_sub_field('icon');
          $feat = get_sub_field('single-feature');
          $icon_url = get_template_directory().'/svg/checkpoints-icons/'. $icon .'.php';
          ?>

          <span>
           <?php 
            include $icon_url; 
            echo $feat; 
            ?>
          </span>
          <?php
          endwhile;
        endif;
        
        // end of package feature rows

        if($button):
          ?><a href="<?= $button['url'] ?>"><button>
            <?= $button['title']; ?>
            </button></a>
          <?php
            
        endif;
        ?>
      </div>

    </div>
    <?php

    endwhile;
endif;
  
?>
    
</section>