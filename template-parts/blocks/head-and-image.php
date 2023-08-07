<?php
/**
 * 
 *
 * @package airclean
 */

namespace Air_Light;
$title = get_field('title-block_title');
$image = get_field('title-block_bg-img');

?>
<section class="block-wrapper image-title-block"  style=" <?= $image ? ' background-image: url('. $image .');' : '' ?> " >
    <?= $title  ? '<h2>'. $title  . '</h2>'   : '' ?>
</section>