<!DOCTYPE HTML>
<head>
    <?php
        include "db-config/db-connect.php";
        $sql = "SELECT * FROM `albums` ORDER BY `ID`";
        $query_results = mysqli_query($u_album_meta, $sql);
        $count = mysqli_num_rows($query_results);
        $results = array();
        $single_result = mysqli_fetch_assoc($query_results);
        do {
            array_push($results, $single_result);
        } while (
            $single_result = mysqli_fetch_assoc($query_results));
        $real_count = $count;
    ?>
    <title>h/LoveLive! - Uranohoshi - All Albums</title>
    <?php include "../global-head.php" ?>
</head>

<body>
<?php include "../global-nav.php" ?>
<div class="content-wrapper">
    <div class="side-search">
        <?php include "../global-side-search.php"; ?>
    </div>
    <div class="main-content">
        <?php include "../global-check-results.php"; ?>
    </div>
</div>
</body>

