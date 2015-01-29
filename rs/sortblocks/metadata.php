<?php

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    "id" => "rssortblocks",
    "title" => "Template blocks sort",
    "description" => "OXID template blocks sort",
    "thumbnail" => "out/pictures/picture.png",
    "version" => "0.1.0",
    "author" => "",
    "url" => "",
    "email" => "",
    "extend" => array(),
    "files" => array(
        "rsoxblock" => "rs/sortblocks/models/rsoxblock.php",
        "rsoxblockslist" => "rs/sortblocks/models/rsoxblockslist.php",
        "rssortblocks" => "rs/sortblocks/controllers/admin/rssortblocks.php",
    ),
    "templates" => array(
        "rssortblocks.tpl" => "rs/sortblocks/views/admin/rssortblocks.tpl"
    ),
    "blocks" => array(),
    "settings" => array(),
    "events" => array(),
);