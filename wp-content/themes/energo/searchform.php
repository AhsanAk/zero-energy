<?php
/**
 * Search Form template
 *
 * @package ENERGO
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="search-widget">
	<div class="search-inner">
		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
			<div class="form-group">
				<input type="search" name="s" placeholder="<?php esc_attr_e( 'Search...', 'energo' ); ?>">
				<button type="submit"><i class="fa fa-search"></i></button>
			</div>
		</form>
	</div>
</div>
