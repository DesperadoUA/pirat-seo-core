<?php
global $post;
$template = getTemplate($post);
$postType = getPostType($post);
$css = '';
$fileName = IS_AMP ? 'amp.css' : '.css';
$filePath = THEME_ROOT."/webpack_dist/".TEMPLATES_DI_STYLE[$postType][$template].$fileName;
if(file_exists($filePath)) $css .= file_get_contents($filePath);
$dirs = scandir(THEME_ROOT."/inc/short_codes/");
foreach($dirs as $dir) {
  if(is_dir(THEME_ROOT.'/inc/short_codes/'.$dir) and isDirLoad($dir)) {
    $fileName = IS_AMP ? 'amp.css' : 'style.css';
    $filePath = THEME_ROOT."/inc/short_codes/".$dir."/".$fileName;
    if(file_exists($filePath)) $css .= file_get_contents($filePath);
  }
}

echo $builder->styles($css);