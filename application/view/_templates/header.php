<!DOCTYPE html>
<html>
<head>
    <title>Arduiknow</title>
    <!-- META -->
    <meta charset="utf-8">
    <!-- send empty favicon fallback to prevent user's browser hitting the server for lots of favicon requests resulting in 404s -->
    <link rel="icon" href="data:;base64,=">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/style.css" />
    <script src="<?php echo Config::get('URL'); ?>js/ckeditor/ckeditor.js"></script>
    <script src="<?php echo Config::get('URL'); ?>js/javascript.js"></script>
    <!-- CSS For Components -->
</head>
<body>
    <?php
    $pages = ArduinoModel::getAllpages();
    $currCat = NULL;
    $currId = NULL;
    ?>
    <!-- wrapper, to center website -->
        <!-- navigation -->
    <div class="nav">
        <ul>
            <li class="index">
            <a href="<?php echo Config::get('URL'); ?>index/index"><p id="hide">qwertyuio</p></a>
            </li>
            <?php foreach ($pages as $page ) {
                if ($currCat != $page->category_name):
                    $currCat = $page->category_name;?>
                        <li>
                        <a class="category" href="<?php echo Config::get('URL'); ?>index/index/<?=$page->category_id?>"><?=$page->category_name?></a></li>
                <?php endif;?>
                <?php } ?>
        <!-- my account -->
            <div style="float:right">
            <?php
            if (Session::userIsLoggedIn()) {?>
            <li> 
                <a href="<?php echo Config::get('URL');?>component/index">componenten</a>
            </li>
            <li> 
                <a href="<?php echo Config::get('URL');?>admin/index">Admin</a>
            </li>
             <li> 
                <a href="<?php echo Config::get('URL');?>login/logout">logout</a>
            </li>

            <?php 
                $style = "display: none;";
            }else{
                $style = NULL;
                }?>
            <li> 
                <a style="<?=$style?>" href="<?php echo Config::get('URL');?>admin/index">Login</a>
            </li>
            </div>
        </ul>
    </div>
    