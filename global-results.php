<?php
do {
    ?>
    <div class="result-wrapper">
        <div class="top-strip"></div>
        <div class="result">
            <div class="result-header">
                <img class="cover-art" src='/love-live/media/uranohoshi/<?php echo $result['ID'] ?>/cover.jpg' alt="Album <?php echo $result['ID'] ?> Cover">
                <div class="result-album-data">
                    <h1 class="title">
                        <?php echo $result['Name'] ?>
                    </h1>
                    <p class="title-jp">
                        <?php echo $result['Name_JP'] ?>
                    </p>
                    <h3 class="artist">
                        <?php echo $result['Artist'] ?>
                    </h3>
                    <p class="catalog-number">
                        <?php if ($result['Catalog_Number']){
                            echo "/ ";
                            echo $result['Catalog_Number'];
                        } ?>
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
                        <a class="download flac" href="/love-live/media/uranohoshi/<?php echo $result['ID'] ?>/cd.flac" download="<?php echo $result['Catalog_Number'] ?>.flac">.flac</a>
                        <a class="download cue" href="/love-live/media/uranohoshi/<?php echo $result['ID'] ?>/cd.cue" download="<?php echo $result['Catalog_Number'] ?>.cue">.cue</a>
                    </div>
                </div>
            </div>
            <div class="album-listing">
                <div class="list-header tl-grid">
                    <div class="header-title">No.</div>
                    <div class="header-title">Artist</div>
                    <div class="header-title">Track Title</div>
                    <div class="header-title">Duration</div>
                    <div class="header-title">Download</div>
                </div>
            <?php
            $album_id = $result['ID'];
            $song_sql = "SELECT * FROM `$album_id`";
            $song_query = mysqli_query($albums, $song_sql);
            $song_result = mysqli_fetch_assoc($song_query);
            $song_count = mysqli_num_rows($song_query);
            do {
                $song_id = $song_result["ID"];
                ?>
                <div class="track tl-grid">
                    <div class="track-id"><p>
                            <?php echo str_pad(strval($song_id), 2, "0", STR_PAD_LEFT) ?>
                        </p></div>
                    <div class="track-artist">
                        <div class="track-artist-wrapper">
                            <p>
                                <?php
                                    if($song_result["Artist"]){
                                        echo $song_result["Artist"];
                                    } else {
                                        echo $result["Artist"];
                                    }
                                ?>
                            </p>
                            <p class="jp">
                                <?php
                                if($song_result["Artist_JP"]){
                                    echo $song_result["Artist_JP"];
                                } else {
                                    echo $result["Artist_JP"];
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
                                    if($song_result["Is_Instrumental"]){
                                ?>
                                        <span class="track-type instrumental">OFF VOCAL</span>
                                <?php
                                    }
                                    if($song_result["Is_Radio"]){
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
                            <a class="download flac small" href="/love-live/media/uranohoshi/<?php echo $result['ID'] ?>/<?php echo $song_id ?>.flac" download="<?php echo $song_id ?>. <?php echo $song_result['Name']; if($song_result["Is_Instrumental"]){echo " (Off Vocal)";} ?>.flac">.flac</a>
                            <a class="download mp3 small" href="/love-live/media/uranohoshi/<?php echo $result['ID'] ?>/<?php echo $song_id ?>.mp3" download="<?php echo $song_id ?>. <?php echo $song_result['Name']; if($song_result["Is_Instrumental"]){echo " (Off Vocal)";} ?>.mp3">.mp3</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            while ($song_result = mysqli_fetch_assoc($song_query));
            ?>
            </div>
        </div>
    </div>
    <?php
}
while ($result = mysqli_fetch_assoc($query));
?>
<!--
<span class="track-type radio">RADIO DRAMA</span>
<span class="track-type instrumental">OFF VOCAL</span>
-->
