<?php
include "db-config-albums.php";
$albums = mysqli_connect(servername_a, username_a, password_a, db_name_a);
mysqli_set_charset($albums, "UTF-8");
mysqli_query($albums, "SET NAMES 'utf8'");
include "db-config-album-meta.php";
$album_meta = mysqli_connect(servername_am, username_am, password_am, db_name_am);
mysqli_set_charset($album_meta, "UTF-8");
mysqli_query($album_meta, "SET NAMES 'utf8'");
