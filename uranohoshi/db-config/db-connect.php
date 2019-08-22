<?php
include "db-config-albums.php";
$u_albums = mysqli_connect(u_servername_a, u_username_a, u_password_a, u_db_name_a);
mysqli_set_charset($u_albums, "UTF-8");
mysqli_query($u_albums, "SET NAMES 'utf8'");
include "db-config-album-meta.php";
$u_album_meta = mysqli_connect(u_servername_am, u_username_am, u_password_am, u_db_name_am);
mysqli_set_charset($u_album_meta, "UTF-8");
mysqli_query($u_album_meta, "SET NAMES 'utf8'");
