<?php
for ($i = 0; $i < $count; $i++) {
    $result = $results[$i];
    if ($result) {
        null;
    } else {
        continue;
    }
    $generation = "";
    if ($result["Parent"] === "o") {
        $generation = "otonokizaka";
    } elseif ($result["Parent"] === "u") {
        $generation = "uranohoshi";
    } elseif ($result["Parent"] === "n") {
        $generation = "nijigasaki";
    } else {
        echo $result["Parent"];
    }
    ?>
    <div class="result-wrapper" id="album-<?php echo $result['ID'] ?>">
        <div class="top-strip"></div>
        <div class="result">
            <div class="result-header">
                <img class="cover-art" src='/love-live/media/<?php echo $generation ?>/<?= $result['ID']?>/cover-small.jpg' alt="Album <?php echo $result['ID'] ?> Cover">
                <div class="result-album-data">
                    <h1 class="title">
                        <?php echo $result['Name'] ?>
                    </h1>
                    <p class="title-jp">
                        <?php echo $result['Name_JP'] ?>
                    </p>
                    <h3 class="artist">
                        <?php echo trim(str_replace(",", ", ", $result['Artist']))?>
                    </h3>
                    <p class="catalog-number">
                        <?php if ($result['Catalog_Number']){
                            echo "/ ";
                            echo $result['Catalog_Number'];
                        } else {
                            echo "&nbsp;";
                        }?>
                    </p>
                    <p class="release-date">
                        <?php
                            $date  = date_create($result['Release_Date']);
                            echo date_format($date,"F jS, Y");
                        ?>
                    </p>
                    <p class="comment">
                        *<?php echo $result['Comments'] ?>
                    </p>
                    <div class="album-download">
                        <img class="download-icon" alt="Download Icon" src="/love-live/assets/download.png">
                        <a class="download flac <?php if ($result["Has_CUE"] != 1) {echo "locked";}?>" <?php if ($result["Has_CUE"]) {?>href="/love-live/media/<?php echo $generation ?>/<?php echo $result['ID'] ?>/cd.flac" download="<?php echo $result['Catalog_Number'] ?>.flac"<?php } ?>>.flac</a>
                        <a class="download cue <?php if ($result["Has_CUE"] != 1) {echo "locked";}?>" <?php if ($result["Has_CUE"]) {?>href="/love-live/media/<?php echo $generation ?>/<?php echo $result['ID'] ?>/cd.cue" download="<?php echo $result['Catalog_Number'] ?>.cue"<?php } ?>>.cue</a>
                        <div class="permalink-wrapper">
                            <a class="copy-link" title="Copy Permalink" data-clipboard-text="<?php echo $base_url ?>/love-live/<?php echo $generation ?>/album.php?id=<?php echo $result['ID'] ?>" href="javascript:void(0);">
                                <img class="permalink-icon" alt="Link Icon" src="/love-live/assets/link.png">
                            </a>
                            <p class="copy-tooltip">Copied to Clipboard!</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $album_id = $result['ID'];
                $song_sql = "SELECT * FROM `$album_id`";
                if ($result["Parent"] === "o") {
                    $song_query = mysqli_query($o_albums, $song_sql);
                } elseif ($result["Parent"] === "u") {
                    $song_query = mysqli_query($u_albums, $song_sql);
                } elseif ($result["Parent"] === "n") {
                    $song_query = mysqli_query($n_albums, $song_sql);
                }
                $song_result = mysqli_fetch_assoc($song_query);
                $song_count = mysqli_num_rows($song_query);
            ?>
            <div class="album-listing">
            <?php
            if ($song_result) { ?>
                <div class="list-header tl-grid">
                    <div class="header-title">No.</div>
                    <div class="header-title">Artist</div>
                    <div class="header-title">Track Title</div>
                    <div class="header-title">Duration</div>
                    <div class="header-title">Download</div>
                </div>
            <?php
                do {
                    $song_id = $song_result["ID"];
                    ?>
                    <div class="track tl-grid">
                        <div class="track-id"><p>
                                <?php echo str_pad(strval($song_id), 2, "0", STR_PAD_LEFT) ?>
                            </p></div>
                        <div class="track-artist">
                            <div class="track-artist-wrapper">
                                <p class="no-wrap">
                                    <?php
                                    if ($song_result["Artist"]) {
                                        echo trim(str_replace(",", ", ", $song_result["Artist"]));
                                    } else {
                                        echo trim(str_replace(",", ", ", $result["Artist"]));
                                    }
                                    ?>
                                </p>
                                <p class="jp no-wrap">
                                    <?php
                                    if ($song_result["Artist_JP"]) {
                                        echo trim(str_replace(",", ", ", $song_result["Artist_JP"]));
                                    } else {
                                        echo trim(str_replace(",", ", ", $result["Artist_JP"]));
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="track-title">
                            <div class="track-title-wrapper">
                                <p>
                                    <?php
                                    echo $song_result['Name'];
                                    if ($song_result["Is_Instrumental"]) {
                                        if ($result["Is_OST"]) {
                                            ?>
                                            <span class="track-type instrumental">INSTRUMENTAL</span>
                                        <? } else { ?>
                                            <span class="track-type instrumental">OFF VOCAL</span>
                                        <? }}
                                    if ($song_result["Is_Radio"]) {
                                        ?>
                                        <span class="track-type radio">RADIO DRAMA</span>
                                        <?php
                                    }
                                    ?>
                                </p>
                                <p class="jp">
                                    <?php echo $song_result['Name_JP'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="track-duration">
                            <p>
                                <?php
                                $minutes = intdiv($song_result['Length'], 60);
                                $seconds = $song_result["Length"] - ($minutes * 60);
                                echo str_pad(strval($minutes), 2, "0", STR_PAD_LEFT);
                                echo ":";
                                echo str_pad(strval($seconds), 2, "0", STR_PAD_LEFT);
                                ?>
                            </p>
                        </div>
                        <div class="track-downloads">
                            <div class="track-downloads-wrapper">
                                <a class="download flac small"
                                   href="/love-live/media/<?php echo $generation ?>/<?php echo $result['ID'] ?>/<?php echo $song_id ?>.flac"
                                   download="<?php echo $song_id ?>. <?php
                                       if ($song_result["Artist"]) {
                                           echo trim(str_replace(",", ", ", $song_result["Artist"]));
                                       } else {
                                           echo trim(str_replace(",", ", ", $result["Artist"]));
                                       }
                                   ?> - <?php echo str_replace("\"", "&quot;", $song_result['Name']);

                                   if ($song_result["Is_Instrumental"]) {
                                       if (!$result["Is_OST"]) {
                                           echo " (Off Vocal)";
                                       }
                                   } ?>.flac">.flac</a>
                                <a class="download mp3 small"
                                   href="/love-live/media/<?php echo $generation ?>/<?= $result['ID'] ?>/<?= $song_id ?>.mp3"
                                   download="<?php echo $song_id ?>. <?php
                                       if ($song_result["Artist"]) {
                                           echo trim(str_replace(",", ", ", $song_result["Artist"]));
                                       } else {
                                           echo trim(str_replace(",", ", ", $result["Artist"]));
                                       }
                                   ?> - <?php echo str_replace("\"", "&quot;", $song_result['Name']);
                                   if ($song_result["Is_Instrumental"]) {
                                       if (!$result["Is_OST"]) {
                                           echo " (Off Vocal)";
                                       }
                                   } ?>.mp3">.mp3</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } while ($song_result = mysqli_fetch_assoc($song_query));
            } else { ?>
                <h3 class="no-track">There doesn't seem to be anything here yet...</h3>
            <?php } ?>
            </div>
        </div>
    </div>
    <?php
}
?>

<script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
<script>
    new ClipboardJS('.copy-link');
</script>

<!--
<span class="track-type radio">RADIO DRAMA</span>
<span class="track-type instrumental">INSTRUMENTAL</span>
-->
