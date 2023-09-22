<?php
include 'helpers/index.php';
autoloadFilesInDirectory(__DIR__."/constants/");
autoloadFilesInDirectory(__DIR__."/interfaces/");
autoloadFilesInDirectory(__DIR__."/models/");
autoloadFilesInDirectory(__DIR__."/traits/");
$files = scandir(__DIR__."/inc/");
foreach($files as $file) {
    $path = __DIR__.'/inc/'.$file;
    if(is_dir($path) and isDirLoad($file)) autoloadFilesInDirectory($path.'/');
}
$builder = is_amp() ? new AmpBuilder() : new DefaultBuilder();