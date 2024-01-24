<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @Date:   2019-10-15 12:30:02
 * @Last Modified by:   Timi Wahalahti
 * @Last Modified time: 2021-01-12 15:13:28
 *
 * @package checkpoints
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

namespace Air_Light;

get_header(); ?>

<main class="site-main">

  <section class="block block-error-404">
    <div class="container">
      <div class="content">

        <h1 id="content"><?= __('Oj då! <br> Nu har du hamnat fel.','checkpoints') ?> <span class="screen-reader-text"><?php echo esc_html( get_default_localization( 'Page not found.' ) ); ?></span></h1>
        <h2 aria-hidden="true"><?= 'Sidan du letar efter finns inte.' ?></h2>

      </div>
    </div>
  </section>

</main>

<?php

// Enable visible footer if fits project:
// get_footer();

// WordPress scripts and hooks
wp_footer();
