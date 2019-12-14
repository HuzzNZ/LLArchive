<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<title>h/LoveLive!</title>

<meta name="description" content="💽 Huzz's Love Live! Music Archive">
<meta name="author" content="Huzz#0009">
<meta name="theme-color" content="#7289DA">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="huzz.io/love-live" property="og:site_name">
<link rel="stylesheet" type="text/css" href="/love-live/css/main.css">
<link rel="icon" type="png/ico" href="/love-live/assets/favicon.png">

<?php $base_url = "https://huzz.io" ;

    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
        if(!headers_sent()) {
            header("Status: 301 Moved Permanently");
            header(sprintf(
                'Location: https://%s%s',
                $_SERVER['HTTP_HOST'],
                $_SERVER['REQUEST_URI']
            ));
            exit();
        }
    }

    $title = "";
    if (!isset($artist)) {
        $artist = "";
    }
    $solo = "";
    $rl_after = "";
    $rl_before = "";

    $catalog = "";

    function human_filesize($bytes, $dec = 2)
    {
        $size   = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }
?>