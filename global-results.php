
<?php
for ($i = 0; $i < $count; $i++) {
    if (isset($_GET["highlight"])){
        $highlighted =  $_GET["highlight"];
    } else {
        $highlighted = 0;
    }
    $result = $results[$i];
    if (!$result) {
        continue;
    }
    $generation = "";
    if ($result["Parent"] === "o") {
        $generation = "otonokizaka";
        $placeholder_image = "";
    } elseif ($result["Parent"] === "u") {
        $generation = "uranohoshi";
        $placeholder_image = "/love-live/assets/placeholder-aqours.png";
    } elseif ($result["Parent"] === "n") {
        $generation = "nijigasaki";
        $placeholder_image = "/love-live/assets/placeholder-pdp.png";
    } else {
        echo $result["Parent"];
    }
    $a_id = $result["ID"];
    ?>
    <div class="result-wrapper" id="album-<?php echo $result['ID'] ?>">
        <div class="top-strip"></div>
        <div class="result">
            <div class="result-header">
                <img class="cover-art" id="album-<?php echo $result['ID'] ?>-cover" src='/love-live/media/<?= $generation?>/<?= $a_id ?>/cover-small.jpg' alt="Album <?php echo $result['ID'] ?> Cover"
                    <?php if ($generation === "otonokizaka") {?>
                     onerror="this.onerror = null; this.src='/love-live/assets/placeholder-sip.png'"
                    <?php } elseif ($generation === "uranohoshi") { ?>
                     onerror="this.onerror = null; this.src='/love-live/assets/placeholder-aqours.png'"
                    <?php } elseif ($generation === "nijigasaki") { ?>
                     onerror="this.onerror = null; this.src = '/love-live/assets/placeholder-pdp.png'"
                    <?php } ?>
                >
                <img class="cover-art-mobile mobile-only" id="album-<?php echo $result['ID'] ?>-cover" src='/love-live/media/<?= $generation?>/<?= $a_id ?>/cover-thumb.jpg' alt="Album <?php echo $result['ID'] ?> Cover"
                    <?php if ($generation === "otonokizaka") {?>
                        onerror="this.onerror = null; this.src='/love-live/assets/placeholder-sip.png'"
                    <?php } elseif ($generation === "uranohoshi") { ?>
                        onerror="this.onerror = null; this.src='/love-live/assets/placeholder-aqours.png'"
                    <?php } elseif ($generation === "nijigasaki") { ?>
                        onerror="this.onerror = null; this.src = '/love-live/assets/placeholder-pdp.png'"
                    <?php } ?>
                >
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
                            <a class="copy-link" title="Copy Permalink" data-clipboard-text="<?php echo $base_url ?>/love-live/<?php echo $generation ?>/album?id=<?php echo $result['ID'] ?>" href="javascript:void(0);">
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
                <div class="list-header-mobile mobile-only"></div>
            <?php
                do {
                    $song_id = $song_result["ID"];
                    ?>
                    <div id="<?= $result["Parent"] ?><?= $album_id ?>-<?= $song_id ?>" class="track tl-grid <?php if ($song_id === $highlighted) {echo "highlight ";} if  ($song_id % 2) {echo "darker-background";}?>">
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
                                <p class="title-no-wrap">
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
                                <p class="jp title-no-wrap">
                                    <?php echo $song_result['Name_JP'] ?>
                                </p>
                            </div>
                            <div class="track-type-mobile <?php if ($song_result["Is_Instrumental"]) { echo "instrumental";} if ($song_result["Is_Radio"]) { echo "radio";} ?>">
                            </div>
                        </div>
                        <div class="track-duration">
                            <p class="track-duration-text">
                                <?php
                                $minutes = intdiv($song_result['Length'], 60);
                                $seconds = $song_result["Length"] - ($minutes * 60);
                                echo str_pad(strval($minutes), 2, "0", STR_PAD_LEFT);
                                echo ":";
                                echo str_pad(strval($seconds), 2, "0", STR_PAD_LEFT);
                                ?>
                            </p>
                        </div>
                        <div class="mobile-downloads mobile-only">
                            <a class="download-text" id="<?= $result["Parent"] ?><?= $album_id ?>-<?= $song_id ?>-dt" href="javascript:toggleDownloadable('<?= $result["Parent"] ?>', '<?= $album_id ?>', '<?= $song_id ?>')">Download ▼</a>
                        </div>
                        <div class="track-downloads">
                            <div class="track-downloads-wrapper">
                                <a class="download flac small <?php if (!$song_result['Length']){echo "locked";} ?>"
                                   href="/love-live/media/<?php echo $generation ?>/<?php echo $result['ID'] ?>/<?php echo $song_id ?>.flac"
                                   download="<?php echo $song_id ?>. <?php
                                       if (!$result["Is_OST"] && $song_result["Is_Instrumental"]) {
                                           if ($song_result["Artist"]) {
                                               echo trim(str_replace(",", ", ", $song_result["Artist"]));
                                           } else {
                                               echo trim(str_replace(",", ", ", $result["Artist"]));
                                           }
                                       }
                                   ?><?php if(!$result["Is_OST"]) {echo " - ";} ?><?php echo str_replace("\"", "&quot;", $song_result['Name']);

                                   if ($song_result["Is_Instrumental"]) {
                                       if (!$result["Is_OST"]) {
                                           echo " (Off Vocal)";
                                       }
                                   } ?>.flac">.flac</a>
                                <a class="download mp3 small <?php if (!$song_result['Length']){echo "locked";} ?>"
                                   href="/love-live/media/<?php echo $generation ?>/<?= $result['ID'] ?>/<?= $song_id ?>.mp3"
                                   download="<?php echo $song_id ?>. <?php
                                       if (!$result["Is_OST"] && $song_result["Is_Instrumental"]) {
                                           if ($song_result["Artist"]) {
                                               echo trim(str_replace(",", ", ", $song_result["Artist"]));
                                           } else {
                                               echo trim(str_replace(",", ", ", $result["Artist"]));
                                           }
                                       }
                                   ?><?php if(!$result["Is_OST"]) {echo " - ";} ?><?php echo str_replace("\"", "&quot;", $song_result['Name']);
                                   if ($song_result["Is_Instrumental"]) {
                                       if (!$result["Is_OST"]) {
                                           echo " (Off Vocal)";
                                       }
                                   } ?>.mp3">.mp3</a>
                                <a class="copy-link small" title="Press to copy direct link to MP3" data-clipboard-text="<?php echo $base_url ?>/love-live/t?a=<?php echo $generation[0] ?><?php echo $result['ID'] ?>&t=<?= $song_id ?>" href="javascript:void(0);">
                                    <img class="permalink-icon small" alt="Link Icon" src="/love-live/assets/link.png">
                                </a>
                            </div>
                        </div>
                        <div class="mobile-downloads-box mobile-only" id="<?= $result["Parent"] ?><?= $album_id ?>-<?= $song_id ?>-md">
                            <div class="mobile-downloads-inner-box mobile-dl-flac">
                                <p class="md-text">· Lossless</p>
                                <a class="mobile-download-button md-flac <?php if (!$song_result['Length']){echo "locked";} ?>"
                                   href="/love-live/media/<?php echo $generation ?>/<?php echo $result['ID'] ?>/<?php echo $song_id ?>.flac"
                                   download="<?php echo $song_id ?>. <?php
                                       if (!$result["Is_OST"] && $song_result["Is_Instrumental"]) {
                                           if ($song_result["Artist"]) {
                                               echo trim(str_replace(",", ", ", $song_result["Artist"]));
                                           } else {
                                               echo trim(str_replace(",", ", ", $result["Artist"]));
                                           }
                                       }
                                   ?><?php if(!$result["Is_OST"]) {echo " - ";} ?><?php echo str_replace("\"", "&quot;", $song_result['Name']);

                                   if ($song_result["Is_Instrumental"]) {
                                       if (!$result["Is_OST"]) {
                                           echo " (Off Vocal)";
                                       }
                                   } ?>.flac">.flac</a>
                            </div>
                            <div class="mobile-downloads-inner-box mobile-dl-mp3">
                                <p class="md-text">· MP3 (320kbps)</p>
                                <a class="mobile-download-button md-mp3 <?php if (!$song_result['Length']){echo "locked";} ?>"
                                   href="/love-live/media/<?php echo $generation ?>/<?= $result['ID'] ?>/<?= $song_id ?>.mp3"
                                   download="<?php echo $song_id ?>. <?php
                                       if (!$result["Is_OST"] && $song_result["Is_Instrumental"]) {
                                           if ($song_result["Artist"]) {
                                               echo trim(str_replace(",", ", ", $song_result["Artist"]));
                                           } else {
                                               echo trim(str_replace(",", ", ", $result["Artist"]));
                                           }
                                       }
                                   ?><?php if(!$result["Is_OST"]) {echo " - ";} ?><?php echo str_replace("\"", "&quot;", $song_result['Name']);
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
    function toggleDownloadable (generation, album, track){
        let md = document.getElementById(generation + album + "-" + track + "-md");
        let mg = document.getElementById(generation + album + "-" + track);
        let dt = document.getElementById(generation + album + "-" + track + "-dt");
            if (md.style.display === "grid") {
                md.style.display = "none";
                mg.style.gridTemplateRows = "30px 18px";
                mg.style.height = "48px";
                dt.innerHTML = "Download ▼"
            } else {
                md.style.display = "grid";
                mg.style.gridTemplateRows = "30px 18px 40px";
                mg.style.height = "88px";
                dt.innerHTML = "Download ▲"
        }
    }
</script>

<!--
<span class="track-type radio">RADIO DRAMA</span>
<span class="track-type instrumental">INSTRUMENTAL</span>
-->
