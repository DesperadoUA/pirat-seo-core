<?php
$files = scandir(__DIR__);
foreach($files as $file) {
    $path = __DIR__.'/'.$file;
    if(is_dir($path) and isDirLoad($file)) {
        autoloadFilesInDirectory($path.'/');
    } 
}