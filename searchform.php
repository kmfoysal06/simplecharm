<?php
/**
 * Search Form Template
 * @package SimpleCharm
 * @since 1.4
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

if(!is_search()){
	get_template_part('template-parts/search/search_default');
}else{
	get_template_part('template-parts/search/search');
}