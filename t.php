<!DOCTYPE HTML>
<head>
    <?php
    $album = $_GET["a"];
    $track = $_GET["t"];
    if (isset($_GET["f"])){
        $file_type = $_GET["f"];
    } else {
        $file_type = "mp3";
    }

    $gen = $album[0];
    $album_id = substr($album, 1);
    $generation = "";
    if ($gen === "o") {
        $generation = "otonokizaka";
    } elseif ($gen === "u") {
        $generation = "uranohoshi";
    } elseif ($gen === "n") {
        $generation = "nijigasaki";
    }

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

    $query->bind_param("i", $album_id);
    $query->execute();
    $query_results = $query->get_result();
    $album_result = mysqli_fetch_assoc($query_results);

    $track_query->bind_param("i", $track);
    $track_query->execute();
    $track_query_results = $track_query->get_result();
    $track_result = mysqli_fetch_assoc($track_query_results);

    if (!is_null($track_result["Artist"])){
        $artist = $track_result["Artist"];
    } else {
        $artist = $album_result["Artist"];
    }

    ?>
    <title>h/LoveLive! - Track</title>
    <?php include "global-head.php" ?>
    <meta name="theme-color" content="#00e37d">
    <meta content="🎵 <?= $track_result['Name'] ?>" property="og:title">
    <meta content="Song by <?= str_replace(",", ", ", $artist)?>" property="og:description">
    <meta content="<?= $base_url ?>/love-live/media/<?= $generation ?>/<?= $album_result['ID'] ?>/cover-small.jpg" property="og:image">
</head>
<body>
    <?php // header("Location: $base_url/love-live/media/$generation/$album_id/$track.$file_type");
        $file = "media/$generation/$album_id/$track.$file_type";
        $off_vocal_label = "";
        if ($track_result["Is_Instrumental"]) {
            if (!$album_result["Is_OST"]) {
                $off_vocal_label = " (Off Vocal)";
        }
        $file_name = $track." "."".trim(str_replace(",", ", ", $artist))." - ".$track_result["Name"].$off_vocal_label.$file_type;
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.$file_name.'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
        }
    ?>
</body>