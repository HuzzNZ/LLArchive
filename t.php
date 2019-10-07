<!DOCTYPE HTML>
<head>
    <?php
        $album = $_GET["a"];
        $track = $_GET["t"];
        $file_type = $_GET["f"];

        if (!$file_type){
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
    ?>
    <title>h/LoveLive! - Track</title>
    <?php include "global-head.php" ?>
</head>

<body>
<audio controls src="<?= $base_url ?>/love-live/media/<?= $generation ?>/<?= $album_id ?>/<?= $track ?>.<?= $file_type?>"></audio>
