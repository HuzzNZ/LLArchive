<!DOCTYPE HTML>
<head>
    <?php
        include "db-config/db-connect.php";
        $sql = "SELECT * FROM `albums`";
        $query = mysqli_query($album_meta, $sql);
        $result = mysqli_fetch_assoc($query);
        $count = mysqli_num_rows($query);
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

