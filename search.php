<!DOCTYPE HTML>
<head>
    <?php
    include "otonokizaka/db-config/db-connect.php";
    include "uranohoshi/db-config/db-connect.php";
    include "nijigasaki/db-config/db-connect.php";
    if ($_GET){
        $has_query = true;
    } else {
        $has_query = false;
    }

    if ($has_query) {
        $title = "%" . $_GET["title"] . "%";
        $artist = "%" . $_GET["artist"] . "%";
        $solo = "%" . $_GET["solo"] . "%";
        $rl_after = $_GET["rl_after"];
        $rl_before = $_GET["rl_before"];

        $catalog = $_GET["catalog"];

        if ($title === "%%") {
            $title = "%";
        }

        if ($artist === "%%") {
            $artist = "%";
        } else {
            if ($solo === "%%") {
                $solo = "HAHA_MIKAN_98_:DDD";
            }
        }

        if ($solo === "%%") {
            $solo = "%";
        } else {
            if ($artist === "%") {
                $artist = "KANAN_WHO??????_LOOOL_XDDDD";
            }
        }

        if ($rl_after === "") {
            $rl_after = "1970-01-01";
        }

        if ($rl_before === "") {
            $rl_before = "2069-12-31";
        }

        $results = array();

        if ($catalog) {
            # OTONOKIZAKA QUERY
            $o_query = $o_album_meta->prepare("SELECT * FROM `albums` WHERE (CONVERT(`Catalog_Number` USING utf8) LIKE ?) ORDER BY `Release_Date` DESC");
            $o_query->bind_param("s", $catalog);
            $o_query->execute();
            $o_query_results = $o_query->get_result();
            $single_result = mysqli_fetch_assoc($o_query_results);
            do {
                array_push($results, $single_result);
            } while (
                $single_result = mysqli_fetch_assoc($o_query_results));

            # URANOHOSHI QUERY
            $u_query = $u_album_meta->prepare("SELECT * FROM `albums` WHERE (CONVERT(`Catalog_Number` USING utf8) LIKE ?) ORDER BY `Release_Date` DESC");
            $u_query->bind_param("s", $catalog);
            $u_query->execute();
            $u_query_results = $u_query->get_result();
            $single_result = mysqli_fetch_assoc($u_query_results);
            do {
                array_push($results, $single_result);
            } while (
                $single_result = mysqli_fetch_assoc($u_query_results));

            # NIJIGASAKI QUERY
            $n_query = $n_album_meta->prepare("SELECT * FROM `albums` WHERE (CONVERT(`Catalog_Number` USING utf8) LIKE ?) ORDER BY `Release_Date` DESC");
            $n_query->bind_param("s", $catalog);
            $n_query->execute();
            $n_query_results = $n_query->get_result();
            $single_result = mysqli_fetch_assoc($n_query_results);
            do {
                array_push($results, $single_result);
            } while (
                $single_result = mysqli_fetch_assoc($n_query_results));

        } else {

            # OTONOKIZAKA QUERY
            $o_query = $o_album_meta->prepare("SELECT * FROM `albums` WHERE (CONVERT(`Name` USING utf8) LIKE ?) AND ((CONVERT(`Artist` USING utf8) LIKE ?) OR (CONVERT(`Artist` USING utf8) LIKE ?)) AND `Release_Date` BETWEEN ? AND ? ORDER BY `Release_Date` DESC");
            $o_query->bind_param("sssss", $title, $artist, $solo, $rl_after, $rl_before);
            $o_query->execute();
            $o_query_results = $o_query->get_result();
            $single_result = mysqli_fetch_assoc($o_query_results);
            do {
                array_push($results, $single_result);
            } while (
                $single_result = mysqli_fetch_assoc($o_query_results));

            # URANOHOSHI QUERY
            $u_query = $u_album_meta->prepare("SELECT * FROM `albums` WHERE (CONVERT(`Name` USING utf8) LIKE ?) AND ((CONVERT(`Artist` USING utf8) LIKE ?) OR (CONVERT(`Artist` USING utf8) LIKE ?)) AND `Release_Date` BETWEEN ? AND ? ORDER BY `Release_Date` DESC");
            $u_query->bind_param("sssss", $title, $artist, $solo, $rl_after, $rl_before);
            $u_query->execute();
            $u_query_results = $u_query->get_result();
            $single_result = mysqli_fetch_assoc($u_query_results);
            do {
                array_push($results, $single_result);
            } while (
                $single_result = mysqli_fetch_assoc($u_query_results));

            # NIJIGASAKI QUERY
            $n_query = $n_album_meta->prepare("SELECT * FROM `albums` WHERE (CONVERT(`Name` USING utf8) LIKE ?) AND ((CONVERT(`Artist` USING utf8) LIKE ?) OR (CONVERT(`Artist` USING utf8) LIKE ?)) AND `Release_Date` BETWEEN ? AND ? ORDER BY `Release_Date` DESC");
            $n_query->bind_param("sssss", $title, $artist, $solo, $rl_after, $rl_before);
            $n_query->execute();
            $n_query_results = $n_query->get_result();
            $single_result = mysqli_fetch_assoc($n_query_results);
            do {
                array_push($results, $single_result);
            } while (
                $single_result = mysqli_fetch_assoc($n_query_results));
        }
        # array_multisort($results["Release_Date"], SORT_DESC);

        $count = count($results);
        $real_count = $count;
        for ($i = 0; $i < $count; $i++) {
            $result = $results[$i];
            if ($result) {
                null;
            } else {
                $real_count--;
            }
        }

    } else {
        null;
    }

    ?>
    <title>h/LoveLive! - Search</title>
    <?php include "global-head.php" ?>
</head>
<body>
<?php include "global-nav.php" ?>
<div class="content-wrapper">
    <div class="side-search">
        <?php include "global-side-search.php"; ?>
    </div>
    <div class="main-content <?php if ($has_query) {null;} else {echo "text-only";} ?>">
        <!--
        <h1 class="results-title">Feature not implemented yet! :(</h1>
        <p class="tip">Please check back later.</p> -->
        <?php if ($has_query){
            include "global-check-results.php";
        } else { ?>
            <h1 class="main-title">
                Search
            </h1>
            <hr class="main-separator">
            <p>Find your favourite Love Live albums - they're all here on this website! <b>FLAC & MP3 320kbps</b> downloads to
                the riiiiiiiiiight~ <br><br>There might even be raw <b>FLAC+CUE</b> album downloads too!</p>
            <h3>Search by Keyword:</h3>
            <p class="indent">Search for albums by keyword on the right sidebar!<br><br>Note that the title only returns
                results for album titles, for example: The song <b>SKY JOURNEY</b>, which is part of the <b>HAPPY PARTY TRAIN</b>
                album will not be returned when you search for <i>"SKY JOURNEY"</i>.<br><br>For song search, please use the
                All page for each generation and <b>CTRL+F</b> to find in page for a specific song.<br><br>
                <a href="otonokizaka/all.php">Otonokizaka All Page</a><br>
                <a href="uranohoshi/all.php">Uranohoshi All Page</a><br>
                <a href="nijigasaki/all.php">Nijigasaki All Page</a>
            </p>
            <h3>Search by Catalog Number:</h3>
            <p class="indent">
                For you enthusiasts there who know exactly what you're looking for, enter the Catalog Number on the bottom
                search element to get there quick!<br><br>Catalog Numbers come in the format of: <b>[4 Letters]-[4-5 Digits]</b>.
                Some examples include:<br><br><b>LACM-14470</b> - <a href="/love-live/search.php?catalog=LACM-14470">Koi ni
                Naritai AQUARIUM</a><br><b>BCXA-1175</b> - <a href="/love-live/search.php?catalog=BCXA-1175">Thrilling
                · One Way</a><br><b>LACA-9580</b> - <a href="/love-live/search.php?catalog=LACA-9580">Journey to the Sunshine
                (CD 1)</a>
            </p>
        <?php } ?>
    </div>
</div>
</body>

