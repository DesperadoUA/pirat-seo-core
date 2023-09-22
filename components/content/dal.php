<?php
$content = '';
if(is_category()) {
    $cid = get_query_var('cat');
    $content = do_shortcode(category_description( $cid ));
}
elseif (is_tax()) {
    $content = do_shortcode(term_description());
    $content = parseAmpContent($content);
}
else {
    global $post;
    $content = do_shortcode($post->post_content);
    $content = parseAmpContent($content);
}
if(!empty($content)) echo $builder->content($content);