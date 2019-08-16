<!DOCTYPE HTML>
<title>h/LoveLive! - Album Search</title>
<?php include "../global-head.php" ?>
<?php
    include "db-config/db-connect.php";
    $album_ID = $_GET["id"];
    $sql = "SELECT * FROM `albums` WHERE `ID` = $album_ID ";
    $query = mysqli_query($album_meta, $sql);
    $result = mysqli_fetch_assoc($query);
    $count = mysqli_num_rows($query);
?>
<body>
<?php include "../global-nav.php" ?>
<div class="content-wrapper">
    <div class="side-search">

    </div>
    <div class="main-content">
        <?php include "../global-results.php" ?>
    </div>
</div>
</body>

