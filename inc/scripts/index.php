<?php
function remove_jquery_migrate( &$scripts ) {
    if( !is_admin() ) {
        $scripts->remove( 'jquery' );
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
    }
}
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

// register scripts and styles
add_action('wp_enqueue_scripts', 'front_scripts');
function front_scripts() {
    wp_enqueue_script('main-js', get_template_directory_uri() . '/webpack_dist/bundle.js', null, null, true);
}

wp_deregister_script('jquery');
/// Удаление редактора Gutenberg с фронтовой части
function wpassist_remove_block_library_css() {
    wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');