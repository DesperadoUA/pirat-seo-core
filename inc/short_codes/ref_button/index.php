<?php
add_shortcode( 'ref_button', 'ref_button_shortcode' );
function ref_button_shortcode($attr) {
    return "<div class='ref_button'>Ref button</div>";
}