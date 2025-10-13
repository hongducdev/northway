<?php
/**
 * Search Form
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div class="searchform-wrap">
        <input type="text" placeholder="<?php esc_attr_e('Search post...', 'northway'); ?>" name="s" class="search-field" />
    	<button type="submit" class="search-submit"><?php esc_html_e('Search', 'northway'); ?></button>
    </div>
</form>