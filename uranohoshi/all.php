<!DOCTYPE HTML>
<?php include "../global-head.php" ?>
<?php
    include "db-config/db-connect.php";
    $sql = "SELECT * FROM `albums`";
    $query = mysqli_query($album_meta, $sql);
    $result = mysqli_fetch_assoc($query);
    $count = mysqli_num_rows($query);
?>
<body>
<?php include "../global-nav.php" ?>
<div class="content">
    <?php
        do {
    ?>
    <div class="result">
        <h1 class="title">
            <?php echo $result['Name'] ?>
        </h1>
        <h3 class="artist">Artist:
            <?php echo $result['Artist'] ?>
        </h3>
        <p class="album-id">Album ID:
            <?php echo $result['ID'] ?>
        </p>
        <p class="catalog-number">Catalog Number:
            <?php echo $result['Catalog_Number'] ?>
        </p>
        <p class="release-date">Release Date:
            <?php echo $result['Release_Date'] ?>
        </p>
        <p class="comments">
            <?php echo $result['Comments'] ?>
        </p>
    </div>
    <?php
        }
        while ($result = mysqli_fetch_assoc($query));
    ?>
</div>
</body>

