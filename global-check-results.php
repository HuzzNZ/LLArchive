<?php if ($count) { ?>
    <h1 class="results-title">All Results <span class="normal-weight small-text">(<?php echo $real_count; ?> found)</span></h1>
    <?php include "global-results.php" ?>
<?php } else { ?>
    <h1 class="results-title">No Results Found!</h1>
    <p class="tip">Perhaps try a different keyword, or check your spelling?</p>
<?php } ?>