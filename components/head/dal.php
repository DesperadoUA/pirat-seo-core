<?php
if($post->ID === ID_FRONT or is_single() or is_page()) {
    $headData = new HeadData(
        get_post_meta($post->ID, '_aioseo_title', true),
        get_post_meta($post->ID, '_aioseo_description', true)
    );
}
else if(is_category() or is_tax()) {
    $category = get_queried_object();
    $headData = new HeadData($category->name, $category->description);
}
else {
    $headData = new HeadData();
}
echo $builder->wp_head($headData);