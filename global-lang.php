<?php
$supported_langs = array('en', 'ja');
$languages = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);

define("HOME_DIR", explode("/", $_SERVER["SCRIPT_NAME"])[1]);

$t_lang = "en";

foreach($languages as $lang) {
    if (in_array($lang, $supported_langs)) {
        // Set the page locale to the first supported language found
        $t_lang = $lang;
        break;
    }
}

define("LANG", $t_lang);

if (LANG == "en") {
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/".HOME_DIR."/langs/lang_en.php";
} elseif (LANG == "ja") {
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/".HOME_DIR."/langs/lang_ja.php";
    setlocale(LC_ALL, "ja");
}

include $path;
