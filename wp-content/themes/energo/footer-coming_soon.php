<?php
/**
 * Footer Main File.
 *
 * @package ENERGO
 * @author  Theme Kalia
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
$options = energo_WSH()->option(); 
$allowed_html = wp_kses_allowed_html( 'post' ); ?>

<div class="clearfix"></div>
</div>

<?php wp_footer(); ?>
</body>
</html>
