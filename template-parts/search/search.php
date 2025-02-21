<?php
/**
 * Search Form With Different Filters
 * @package SimpleCharm
 * @since 1.4
 */
$search = SIMPLECHARM_THEME\Inc\Classes\Search::get_instance();


?>
<form role="search" method="post" class="search-form" id="simplecharm-advanced-search-form">
	<label class="search-field-container">
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" placeholder="Search …" name="s" value="<?php echo isset($_GET['s']) ? esc_attr($_GET['s']) : '' ?>">
	</label>
	<label class="simplecharm-multiselect-core-container">
		<span class="screen-reader-text categories">Categories</span>
		<?php get_template_part("template-parts/components/multiselect-dropdown", '', ['cats' => $search->list_categories()]); ?>
	</label>
	<label class="submit-button-container">
		<input type="submit" class="search-submit" value="Search">
	</label>
</form>
