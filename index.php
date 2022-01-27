<?php
/**
 * @package modified_after support
 * @version 1.0
 */
/*
Plugin Name: modified_after support
Version: 1.0
*/

add_filter('woocommerce_rest_orders_prepare_object_query', function(array $args, \WP_REST_Request $request) {
    $modified_after = $request->get_param('modified_after');

    if (!$modified_after) {
        return $args;
    }

    $args['date_query'][0]['column'] = 'post_modified';
    $args['date_query'][0]['after']  = $modified_after;

    return $args;

}, 10, 2);

?>