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

    $query->bind_param("i", intval($album_id));
    $query->execute();
    $query_results = $query->get_result();
    $album_result = mysqli_fetch_assoc($query_results);

    $track_query->bind_param("i", intval($track));
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
    <meta content="🎵 │ <?php echo addslashes($result['Name']); ?> <?php if($track_result["Is_Instrumental"] && !$album_result["Is_OST"]){echo "(Off Vocal)";} ?>" property="og:title">
    <meta content='<?php if ($track_result["Is_Radio"] == 1){echo "Radio Drama";} else {echo "Song";} ?> by <?= str_replace("'", "&apos;", str_replace(",", ", ", $artist))?> - Track <?= $track_result["ID"] ?> of "<?= $album_result["Name"] ?>"' property="og:description">
    <meta content="<?= $base_url ?>/love-live/media/<?= $generation ?>/<?= $album_result['ID'] ?>/cover.jpg" property="og:image">
</head>
<body>
    <?php
        if (!strpos(" ".$_SERVER['HTTP_USER_AGENT'], "Mozilla") && !strpos(" ".$_SERVER['HTTP_USER_AGENT'], "discord")){
        header("Location: $base_url/love-live/media/$generation/$album_id/$track.$file_type");
        }
    ?>
    <script>window.location.href = "<?= $base_url ?>/love-live/<?= $generation ?>/album?id=<?= $album_result["ID"] ?>&highlight=<?= $track_result["ID"] ?>";</script>
</body>