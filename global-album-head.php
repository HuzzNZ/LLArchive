<?php
    $generation = "";
    if ($result["Parent"] === "o") {
        $generation = "otonokizaka";
    } elseif ($result["Parent"] === "u") {
        $generation = "uranohoshi";
    } elseif ($result["Parent"] === "n") {
        $generation = "nijigasaki";
    }
?>
<meta content="h/LL - <?= $result['Name'] ?>" property="og:title">
<meta content="Album by <?php echo $result['Artist'] ?>, released <?php $date  = date_create($single_result['Release_Date']); echo date_format($date,"M j Y"); ?>" property="og:description">
<meta content="<?= $base_url ?>/love-live/media/<?= $generation ?>/<?= $result['ID'] ?>/cover-small.jpg" property="og:image">