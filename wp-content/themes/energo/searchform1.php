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

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<div class="form-group">
		<input type="search" name="s" placeholder="<?php esc_attr_e( 'Search....', 'energo' ); ?>">
		<button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
	</div>
</form>