<?php
/**
 * Searchform
 *
 * Custom template for search form
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="row collapse">
	    <div class="small-8 columns">
	     <input type="text" name="s" id="s" placeholder="<?php esc_attr_e( 'Search' ); ?>" />
	    </div>
	    <div class="small-4 columns">
	      <input type="submit" class="prefix" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search' ); ?>" />
	    </div>
	</div>
</form>