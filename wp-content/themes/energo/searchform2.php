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
		<input type="hidden" name="faqs" value="faqs" />
		<input type="search" name="s" placeholder="<?php esc_attr_e( 'Enter your keyword...', 'energo' ); ?>" required="">
		<button><i class="fas fa-search"></i></button>
	</div>
</form>
