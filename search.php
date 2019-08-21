<!DOCTYPE HTML>
<head>
    <?php
    include "uranohoshi/db-config/db-connect.php";
    $title = "%".$_GET["title"]."%";
    $artist = "%".$_GET["artist"]."%";
    $solo = "%".$_GET["solo"]."%";
    $rl_after = $_GET["rl_after"];
    $rl_before = $_GET["rl_before"];

    $catalog = $_GET['catalog'];

    if ($title === "%%") {
        $title = "%";
    }

    if ($artist === "%%") {
        $artist = "%";
    } else {
        if ($solo === "%%") {
            $solo = "HAHA_MIKAN_98_:DDD";
        }
    }

    if ($solo === "%%") {
        $solo = "%";
    } else {
        if ($artist === "%") {
            $artist = "KANAN_WHO??????_LOOOL_XDDDD";
        }
    }

    if ($rl_after === "") {
        $rl_after = "1970-01-01";
    }

    if ($rl_before === "") {
        $rl_before = "2069-12-31";
    }

    if ($catalog) {
        $query = $album_meta->prepare("SELECT * FROM `albums` WHERE (CONVERT(`Catalog_Number` USING utf8) LIKE ?) ORDER BY `Release_Date` DESC");
        $query->bind_param("s", $catalog);
    } else {
        $query = $album_meta->prepare("SELECT * FROM `albums` WHERE (CONVERT(`Name` USING utf8) LIKE ?) AND ((CONVERT(`Artist` USING utf8) LIKE ?) OR (CONVERT(`Artist` USING utf8) LIKE ?)) AND `Release_Date` BETWEEN ? AND ? ORDER BY `Release_Date` DESC");
        $query->bind_param("sssss", $title, $artist, $solo, $rl_after, $rl_before);
    }
    $query->execute();
    $query_results = $query->get_result();
    $result = mysqli_fetch_assoc($query_results);
    $count = mysqli_num_rows($query_results);
    ?>
    <title>h/LoveLive! - Search</title>
    <?php include "global-head.php" ?>
</head>
<body>
<?php include "global-nav.php" ?>
<div class="content-wrapper">
    <div class="side-search">
        <?php include "global-side-search.php";
        echo $artist;
        echo $solo;?>
    </div>
    <div class="main-content">
        <!--
        <h1 class="results-title">Feature not implemented yet! :(</h1>
        <p class="tip">Please check back later.</p> -->
        <?php include "global-check-results.php"; ?>
    </div>
</div>
</body>

