<?php
$supported_langs = array('en', 'ja');
$languages = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);

define("HOME_DIR", explode("/", $_SERVER["SCRIPT_NAME"])[1]);

foreach($languages as $lang) {
    if (in_array($lang, $supported_langs)) {
        // Set the page locale to the first supported language found
        define("LANG", $lang);
        break;
    } else { define("LANG", "en");}
}

if (LANG == "en") {
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/".HOME_DIR."/langs/lang_en.php";
} elseif (LANG == "jp") {
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/".HOME_DIR."/langs/lang_jp.php";
}

include $path;
