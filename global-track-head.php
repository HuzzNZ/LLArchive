<?php

    include "otonokizaka/db-config/db-connect.php";
    include "uranohoshi/db-config/db-connect.php";
    include "nijigasaki/db-config/db-connect.php";

    if ($gen === "o") {
        $query = $o_album_meta->prepare("SELECT * FROM `albums` WHERE `ID` = ?");
        $track_query = $o_albums->prepare("SELECT * FROM `$album_id` WHERE `ID` = ?");
    } elseif ($gen === "u") {
        $query = $u_album_meta->prepare("SELECT * FROM `albums` WHERE `ID` = ?");
        $track_query = $u_albums->prepare("SELECT * FROM `$album_id` WHERE `ID` = ?");
    } elseif ($gen === "n") {
        $query = $n_album_meta->prepare("SELECT * FROM `albums` WHERE `ID` = ?");
        $track_query = $n_albums->prepare("SELECT * FROM `$album_id` WHERE `ID` = ?");
    }

    $query->bind_param("i", (int)$album_id);
    $query->execute();
    $query_results = $query->get_result();
    $album_result = mysqli_fetch_assoc($query_results);

    $track_query->bind_param("i", (int)$track);
    $track_query->execute();
    $track_query_results = $track_query->get_result();
    $track_result = mysqli_fetch_assoc($track_query_results);
?>

<meta content="🎵 <?= $track_result['Name'] ?>" property="og:title">
<meta content="Album ABCD TESTING <?= $album_result["Name"] ?>" property="og:description">
<meta content="<?= $base_url ?>/love-live/media/<?= $generation ?>/<?= $album_result['ID'] ?>/cover-small.jpg" property="og:image">
