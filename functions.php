<?php
//add theme support for post thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'featured-image', 200, 200, true ); // width, height, crop
add_image_size( 'banner-image', 800, 400, array( 'center', 'center' ) ); // width, height, crop
add_image_size( 'slider-image', 800, 400, array( 'center', 'center' ) ); // width, height, crop
add_image_size( 'single-post-thumbnail', 590, 180 ); // width, height, crop
add_image_size( 'related-post-thumbnail', 100, 100, true ); // width, height, crop
add_image_size( 'archive-post-thumbnail', 200, 200, true ); // width, height, crop

