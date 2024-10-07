<?php
/**
 * Search Form With Different Filters
 * @package SimpleCharm
 * @since 1.4
 */
?>
<form role="search" method="post" class="search-form">
	<label class="search-field-container">
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" placeholder="Search …" name="s">
	</label>
	<label class="select2-core-container">
		<span class="screen-reader-text categories">Categories</span>
		<select class="search-categories" name="categories[]" id="search-by-categories" multiple>
		  <option value="uncategorized">Uncategorized</option>
		  <option value="html">HTML</option>
		</select>
		<div id="selected-count"></div>
	</label>
	<label class="submit-button-container">
		<input type="submit" class="search-submit" value="Search">
	</label>
</form>