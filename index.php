<?php
/**
 * @package Dativery: modified_after and number support
 * @version 1.1
 */
/*
Plugin Name: Dativery: modified_after and number support
Version: 1.1
*/

add_filter('woocommerce_rest_orders_prepare_object_query', function(array $args, \WP_REST_Request $request) {
	$modified_after = $request->get_param('modified_after');
	$number = $request->get_param('number');

	if ($modified_after) {
	    $args['date_query'][0]['column'] = 'post_modified';
	    $args['date_query'][0]['after']  = $modified_after;
	    $args['orderby'] = 'post_modified';
	    $args['order'] = 'asc';
	}

	if ($number) {
		$args['post__in'] = array( intval( $number ) );
	}

    return $args;

}, 10, 2);
?>
