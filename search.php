<!DOCTYPE HTML>
<head>
    <?php
    include "uranohoshi/db-config/db-connect.php";
    $title = "%".$_GET["title"]."%";
    $query = $album_meta->prepare("SELECT * FROM `albums` WHERE (CONVERT(`Name` USING utf8) LIKE ?)");
    $query->bind_param("s", $title);
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
        <?php include "global-side-search.php"; ?>
    </div>
    <div class="main-content">
        <!--
        <h1 class="results-title">Feature not implemented yet! :(</h1>
        <p class="tip">Please check back later.</p> -->
        <?php include "global-check-results.php"; ?>
    </div>
</div>
</body>

