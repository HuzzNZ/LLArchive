<!DOCTYPE HTML>
<head>
    <?php
    include "uranohoshi/db-config/db-connect.php";
    include "otonokizaka/db-config/db-connect.php";
    include "nijigasaki/db-config/db-connect.php";

        $results = array();

        # OTONOKIZAKA QUERY
        $o_query = $o_album_meta->prepare("SELECT * FROM `albums` ORDER BY `Release_Date` DESC");
        $o_query->execute();
        $o_query_results = $o_query->get_result();
        $single_result = mysqli_fetch_assoc($o_query_results);
        do {
            array_push($results, $single_result);
        } while (
            $single_result = mysqli_fetch_assoc($o_query_results));

        # URANOHOSHI QUERY
        $u_query = $u_album_meta->prepare("SELECT * FROM `albums` ORDER BY `Release_Date` DESC");
        $u_query->execute();
        $u_query_results = $u_query->get_result();
        $single_result = mysqli_fetch_assoc($u_query_results);
        do {
            array_push($results, $single_result);
        } while (
            $single_result = mysqli_fetch_assoc($u_query_results));

        # NIJIGASAKI QUERY
        $n_query = $n_album_meta->prepare("SELECT * FROM `albums` ORDER BY `Release_Date` DESC");
        $n_query->execute();
        $n_query_results = $n_query->get_result();
        $single_result = mysqli_fetch_assoc($n_query_results);
        do {
            array_push($results, $single_result);
        } while (
            $single_result = mysqli_fetch_assoc($n_query_results));

        usort($results, function($a, $b) {
            return $a['Release_Date'] <=> $b['Release_Date'];
        });

        $results = array_reverse($results);

        $count = count($results);
        $real_count = $count;
        for ($i = 0; $i < $count; $i++) {
            $result = $results[$i];
            if ($result) {
                null;
            } else {
                $real_count--;
            }
        }
    ?>
    <title>h/LoveLive! - Random</title>
    <?php include "global-head.php" ?>
</head>

<body>
<?php include "global-nav.php" ?>
<div class="content-wrapper">
    <div class="side-search">
        <?php include "global-side-search.php"; ?>
    </div>
    <div class="main-content">
        <?php include "global-check-results.php"; ?>
    </div>
</div>
</body>

