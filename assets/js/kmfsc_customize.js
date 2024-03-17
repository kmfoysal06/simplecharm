/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {
		function isValidURL(url) {
			try {
				new URL(url);
				return true;
			} catch (error) {
				return false;
			}
		}
	wp.customize( 'kmfsc_setting', function( value ) {
		value.bind( function( newval ) {
		if(newval){
			if(isValidURL(kmfsc_header_info.header_image)){
				$("header").css("background-image",`url(${kmfsc_header_info["header_image"]})`);
				$("header").css("background-repeat","no-repeat");
				$("header").css("background-size","cover");
				$("header").css("padding","20px");
				$("header").css("background-position","center");
				$(".kmfsc-header-image").css("display","none");
			}
		}else{
			$("header").css("background-image","unset");
			$("header").css("background-repeat","unset");
			$("header").css("background-size","unset");
			$("header").css("padding","unset");
			$("header").css("background-position","unset");
			$(".kmfsc-header-image").css("display","unset");
			}
		} );
	} );
	
} )( jQuery );
