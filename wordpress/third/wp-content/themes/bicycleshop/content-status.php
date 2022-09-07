<?php
/**
 * Template used for displaying content of "status" format posts on archive page.
 * It is used only on page with posts list: blog, archive, search
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly


$content = get_the_content();
?>

<div class="formatter">
    <?php bicycleshop_post_meta_data(); ?>
    <h2 class="post-title"<?php bicycleshop_schema_args('headline'); ?>><?php the_title(); ?></h2>
    <?php echo strlen($content)? '<div class="real-content"'.bicycleshop_get_schema_args('headline').'>'.wp_kses_post($content).'</div>' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</div>
