<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<title>h/LoveLive!</title>

<meta name="description" content="Love Live! Music Archive">
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
    $artist = "";
    $solo = "";
    $rl_after = "";
    $rl_before = "";

    $catalog = "";
?>