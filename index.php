<!DOCTYPE HTML>
<head>
    <title>h/LoveLive! - Home</title>
    <?php include "global-head.php" ?>
    <?php
        include "get_all_albums.php";
        $count_total = count($results);

    ?>
    ?>
    <meta content="💽 Huzz's Love Live! Music Archive" property="og:title">
    <meta content="<?= $count_total ?> albums in database so far" property="og:description">
    <meta content="<?= $base_url ?>/love-live/assets/favicon.png" property="og:image">
</head>

<body>
<?php include "global-nav.php" ?>
<div class="content-wrapper">
    <div class="side-search">
        <?php include "global-side-search.php"; ?>
    </div>
    <div class="main-content text-only">
        <h1 class="main-title">h/LoveLive - Home</h1>
        <hr class="main-separator">
        <p>Welcome to Huzz's Love Live CD Archive Website!</p>
    </div>
</div>
</body>

