<?php if ($is_random_page){ ?>
    <span class="result-count normal-weight small-text <?= $has_header ?>"><?php echo $count_total; ?><?= _RANDOM_BOTTOM2 ?></span>
    <?php include "global-results.php" ?>
<?php } elseif (isset($_GET["id"])) { include "global-results.php"; } elseif ($count) { ?>
    <h1 class="results-title" <?php if ($has_header) {echo 'style="display: none;"';} ?> >All Results&nbsp;</h1><span class="result-count normal-weight small-text <?= $has_header ?>">(<?php echo $real_count; ?> found)</span>
    <?php include "global-results.php" ?>
<?php } else { ?>
    <h1 class="results-title">No Results Found!</h1>
    <p class="tip">Perhaps try a different keyword, or check your spelling?</p>
<?php } ?>