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
                    <h3 class="artist">Artist:
                        <?php echo $result['Artist'] ?>
                    </h3>
                    <p class="album-id">Album ID:
                        <?php echo $result['ID'] ?>
                    </p>
                    <p class="catalog-number">Catalog Number:
                        <?php echo $result['Catalog_Number'] ?>
                    </p>
                    <p class="release-date">Release Date:
                        <?php echo $result['Release_Date'] ?>
                    </p>
                    <p class="comments">
                        <?php echo $result['Comments'] ?>
                    </p>
                </div>
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
        </div>
    </div>
    <?php
}
while ($result = mysqli_fetch_assoc($query));
?>