<?php
add_action( 'init', 'add_amp_endpoint' );
function add_amp_endpoint() {
    add_rewrite_endpoint( 'amp', EP_ALL );
}
add_action( 'init', 'amp_replace' );
function amp_replace() {
    add_filter( 'posts_clauses_request', function( $pieces, $wp_query ){
        if(is_home()) {
            $id_front = get_option( 'page_on_front' );
            if( isset($wp_query->query['amp']) && $wp_query->is_main_query() ){
                $pieces['where'] = ' AND ID = '.$id_front;
            }
        }
        return $pieces;
    }, 10, 2 );
}