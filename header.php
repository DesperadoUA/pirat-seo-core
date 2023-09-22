<?php 
global $builder;
?>
<!DOCTYPE html>
<html lang="<?= HTML_ATTRS[LANG] ?>" <?= $builder->ampAttrHead(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include 'components/head/dal.php';
        include 'components/canonical/view.php';
        include 'components/styles/dal.php';
    ?>
</head>
<body>
   <?php
        include 'components/header/dal.php';
   ?>