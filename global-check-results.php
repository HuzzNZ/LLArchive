<?php if ($is_random_page){ ?>
    <span class="result-count normal-weight small-text <?= $has_header ?>"><?php echo $count_total; ?><?= _RANDOM_BOTTOM2 ?></span>
    <?php include "global-results.php" ?>
<?php } elseif (isset($_GET["id"])) { include "global-results.php"; } elseif ($real_count != 0) { ?>
    <h1 class="results-title" <?php if ($has_header) {echo 'style="display: none;"';} ?> ><?= _SEARCH_HINT ?><?php if (LANG != "ja"){ echo "&nbsp;"; } ?></h1><span class="result-count normal-weight small-text <?= $has_header ?>"><?php echo _LEFT_PARENTHESES; echo $real_count; if (LANG != "ja"){ echo " "; } echo _FOUND; echo _RIGHT_PARENTHESES ?></span>
    <?php include "global-results.php" ?>
<?php } else { ?>
    <h1 class="results-title"><?= _NO_RESULT_TITLE ?></h1>
    <p class="tip"><?= _NO_RESULT_HINT ?></p>
<?php } ?>