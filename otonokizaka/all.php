<!DOCTYPE HTML>
<head>
    <?php
        include "db-config/db-connect.php";
        $sql = "SELECT * FROM `albums` ORDER BY `ID`";
        $query_results = mysqli_query($o_album_meta, $sql);
        $result = mysqli_fetch_assoc($query_results);
        $count = mysqli_num_rows($query_results);
        $real_count = $count;
    ?>
    <title>h/LoveLive! - Otonokizaka - All Albums</title>
    <?php include "../global-head.php" ?>
</head>

<body>
<?php include "../global-nav.php" ?>
<div class="content-wrapper">
    <div class="side-search">
        <?php include "../global-side-search.php"; ?>
    </div>
    <div class="main-content">
        <h1 class="results-title">Feature not implemented yet! :(</h1>
        <p class="tip">Please check back later.</p>
        <?php # include "global-check-results.php"; ?>
    </div>
</div>
</body>

