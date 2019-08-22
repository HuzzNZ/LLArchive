<?php
include "db-config-albums.php";
$n_albums = mysqli_connect(n_servername_a, n_username_a, n_password_a, n_db_name_a);
mysqli_set_charset($n_albums, "UTF-8");
mysqli_query($n_albums, "SET NAMES 'utf8'");
include "db-config-album-meta.php";
$n_album_meta = mysqli_connect(n_servername_am, n_username_am, n_password_am, n_db_name_am);
mysqli_set_charset($n_album_meta, "UTF-8");
mysqli_query($n_album_meta, "SET NAMES 'utf8'");
