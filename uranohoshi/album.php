<!DOCTYPE HTML>
<head>
    <?php
        include "db-config/db-connect.php";
        $album_ID = $_GET["id"];
        $sql = "SELECT * FROM `albums` WHERE `ID` = $album_ID ";
        $query = mysqli_query($album_meta, $sql);
        $result = mysqli_fetch_assoc($query);
        $count = mysqli_num_rows($query);
    ?>
    <title>h/LoveLive! - <?php echo $result['Name'] ?></title>
    <?php include "../global-head.php" ?>
    <meta name="description" content="An Album by <?php echo $result['Artist'] ?>, released <?php $date  = date_create($result['Release_Date']); echo date_format($date,"M jS, Y"); ?>">
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

