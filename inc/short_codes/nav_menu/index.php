<?php
add_shortcode( 'nav_menu', 'nav_menu_shortcode' );
function nav_menu_shortcode() {
    return "<div style='border: 1px solid red;'>Nav menu shortcode</div>";
}