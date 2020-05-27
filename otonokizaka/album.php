<!DOCTYPE HTML>
<?php include "global-lang.php" ?>
<html lang="<?= LANG ?>">
<head>
    <?php
        include "db-config/db-connect.php";
        $query = $o_album_meta->prepare("SELECT * FROM `albums` WHERE `ID` = ?");
        $query->bind_param("i", $_GET["id"]);
        $query->execute();
        $query_results = $query->get_result();
        $results = array();
        $single_result = mysqli_fetch_assoc($query_results);
        do {
            array_push($results, $single_result);
        } while (
            $single_result = mysqli_fetch_assoc($query_results));
        $count = 1;
        $real_count = $count;
        $result = $results[0];
    ?>
    <title>h/LoveLive! - <?php echo $result['Name'] ?></title>
    <?php include "../global-head.php" ?>
    <?php include "../global-album-head.php" ?>
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
</html>

