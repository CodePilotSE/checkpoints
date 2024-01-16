<?php
/**
 * Site branding & logo
 *
 * @package checkpoints
 */

namespace Air_Light;

$description = get_bloginfo( 'description', 'display' );
?>

<div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span>
      <?php include get_theme_file_path( THEME_SETTINGS['logo'] ); ?>
    </a>
</div>
