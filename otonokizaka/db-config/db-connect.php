<?php
include "db-config-albums.php";
$o_albums = mysqli_connect(o_servername_a, o_username_a, o_password_a, o_db_name_a);
mysqli_set_charset($o_albums, "UTF-8");
mysqli_query($o_albums, "SET NAMES 'utf8'");
include "db-config-album-meta.php";
$o_album_meta = mysqli_connect(o_servername_am, o_username_am, o_password_am, o_db_name_am);
mysqli_set_charset($o_album_meta, "UTF-8");
mysqli_query($o_album_meta, "SET NAMES 'utf8'");
