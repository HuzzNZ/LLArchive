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
                    <p class="catalog-number"> /
                        <?php echo $result['Catalog_Number'] ?>
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
            <!--
            <?php
            $album_id = $result['ID'];
            $song_sql = "SELECT * FROM `$album_id`";
            $song_query = mysqli_query($albums, $song_sql);
            $song_result = mysqli_fetch_assoc($song_query);
            $song_count = mysqli_num_rows($song_query);
            do {
                $song_id = $song_result["ID"];
                ?>
                <div class="song">
                    <p class="song-id">
                        <?php echo $song_result['ID'] ?>.
                    </p>
                    <h3 class="song-name">
                        <?php echo $song_result['Name'] ?>
                    </h3>
                    <p class="song-duration"> Length:
                        <?php echo $song_result['Length'] ?>
                    </p>
                    <a href="/love-live/media/uranohoshi/<?php echo $album_id ?>/<?php echo $song_id ?>.flac" download="<?php echo $song_result['Name']?>.flac">Download</a>
                </div>
                <?php
            }
            while ($song_result = mysqli_fetch_assoc($song_query));
            ?>
            -->
        </div>
    </div>
    <?php
}
while ($result = mysqli_fetch_assoc($query));
?>