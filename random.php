<!DOCTYPE HTML>
<?php include "global-lang.php" ?>
<html lang="<?= LANG ?>">
<head>
    <?php
    include "get_all_albums.php";

    $count_total = count($results);
    $has_header = "has-header";
    $is_random_page = true;
    $rand_key = array_rand($results);
    $count = 1;
    $real_count = $count;
    $result = $results[$rand_key];
    $results = array($result);
    ?>
    <title>h/LoveLive! - Randomly Selected</title>
    <?php include "global-head.php" ?>
</head>

<body>
<?php include "global-nav.php" ?>
<div class="content-wrapper">
    <div class="side-search">
        <?php include "global-side-search.php"; ?>
    </div>
    <div class="main-content">
        <h1 class="main-title" id="<?php if (LANG == "ja"){ echo "ja-l"; } ?>">
            <?= _RANDOM_TITLE ?>
        </h1>
        <hr class="main-separator">
        <span class="result-count has-header normal-weight small-text"><?= _RANDOM_BOTTOM1 ?></span>
        <?php include "global-check-results.php"; ?>
    </div>
</div>
</body>

