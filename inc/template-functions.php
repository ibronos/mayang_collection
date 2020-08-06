<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package mayang-collection
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mc_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'mc_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function mc_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'mc_pingback_header' );

function mc_menu($menuSlug) {
	$menu_name = $menuSlug; //menu slug
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
	$fixmenu = [];

	foreach ($menuitems as $key => $value) {
    	if ($value->menu_item_parent == '' || empty($value->menu_item_parent)) {
    		$fixmenu[$value->ID] = (array) $menuitems[$key];
    		$fixmenu[$value->ID]['menu_child'] = [];
    	}
    	else {
    		$fixmenu[$value->menu_item_parent]['menu_child'][$value->ID] = (array) $menuitems[$key];
    	}
    }
	return $fixmenu;
}

function sale_percent($sale_price, $regular_price) {
	$percent = '';
	if( !empty( $sale_price ) ) { 
		$percent = ( $regular_price - $sale_price ) / $regular_price * 100;
		$percent = round( $percent, 2);
	}
	return $percent;
}
