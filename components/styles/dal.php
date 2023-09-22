<?php
global $post;
$template = '';
$postType = '';
if(is_page() or $post->ID === ID_FRONT) {
    $postType = 'PAGES';
    switch ($post->ID) {
        case ID_FRONT:
          $template = 'FRONT_PAGE';
          break;
        case ID_PRIVACY_POLICY_PAGE:
          $template = 'PRIVACY_POLICY_PAGE';
          break;
        default:
          $template = 'DEFAULT';
    }
}
else if(is_single()) {
    $postType = 'POSTS';
    switch ($post->post_type) {
        case POST_TYPE_BLOG:
          $template = 'BLOG';
          break;
        case POST_TYPE_GAME:
          $template = 'GAME';
          break;
        default:
          $template = 'DEFAULT';
    }
}
else if(is_category()) {
    $category = get_queried_object();
    $postType = 'CATEGORY';
    switch ($category->cat_ID) {
        default:
          $template = 'DEFAULT';
    }
}
else if(is_tax()) {
    $tax = get_queried_object();
    $postType = 'TAX';
    switch ($tax->term_id) {
        default:
          $template = 'DEFAULT';
    }
}
else {
    $postType = 'POSTS';
    $template = 'DEFAULT';
}
$css = '';
foreach(TEMPLATES_DI_STYLE[$postType][$template] as $component) {
  $fileName = IS_AMP ? 'amp.css' : 'style.css';
  $filePath = THEME_ROOT."/components/".$component."/".$fileName;
  if(file_exists($filePath)) $css .= file_get_contents($filePath);
}
$dirs = scandir(THEME_ROOT."/inc/short_codes/");
foreach($dirs as $dir) {
  if(is_dir(THEME_ROOT.'/inc/short_codes/'.$dir) and isDirLoad($dir)) {
    $fileName = IS_AMP ? 'amp.css' : 'style.css';
    $filePath = THEME_ROOT."/inc/short_codes/".$dir."/".$fileName;
    if(file_exists($filePath)) $css .= file_get_contents($filePath);
  }
}
echo $builder->styles($css);