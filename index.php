<!DOCTYPE HTML>
<?php include "global-lang.php" ?>
<html lang="<?= LANG ?>">
<head>
    <title>h/LoveLive! - Home</title>
    <?php include "global-head.php" ?>
    <?php
        include "get_all_albums.php";
        $count_total = count($results);

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
        <h1 class="main-title">Home</h1>
        <hr class="main-separator">
        <p><b>Welcome to Huzz's Love Live CD Archive Website!</b></p><br>
        <img src="assets/banner.png" alt="Website Banner" style="max-width: 100%;">
        <div class="spacer-20px"></div>
        <p>This website is being maintained by <b>Huzz</b>. All the latest albums/singles released on CD under
        the Love Live! project labels will be archived here.</p>
        <h3>Update 2020/04/05:</h3>
        <p class="indent">This website has been refreshed with a new font and some new CSS! Feel free to look around, or give
        any suggestions by finding me below.</p>
        <hr class="main-separator">
        <h3>Find me here!</h3>
        <p class="indent">
            <u>Twitter</u>: <a href="https://twitter.com/HuzzNZ">@HuzzNZ</a><br>
            <u>Discord</u>: <b><i>Huzz#0009</i></b></p>
        <br>
        <p>Currently, this website has <b><?= $count_total ?> albums</b> archived so far!</p>
        <h3>Navigating this website:</h3>
        <p class="indent">The sidebar is your primary search bar, and you can use this to access any CD. The navigation bar contains links to listing pages, where you can find any song using your browser's built-in search, usually <b>Ctrl+F</b>.<br>
        <br>Check out the <a href="recent">Recent</a> page to see any new-releases, it is updated very frequently and often as early as possible.<br>
            <br>The generation specific pages have a listing for every CD released under each label.</p>
        <hr class="main-separator">
        <p><b class="special"><i>We are all Setsuna oshis on this blessed day</i></b></p>
        <hr class="main-separator">
        <h3>Disclaimer:</h3>
        <p class="indent">
            I do not own any downloadable content on this website. <b>Please support the Love Live! Series
                by purchasing these albums / other official merchandise if you enjoyed listening to them!</b> This
            website only provides downloadable content for archival purposes.
        </p>
        <div class="spacer-20px"></div>

    </div>
</div>
</body>
</html>
