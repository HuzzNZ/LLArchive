<?php
include "db-config-albums.php";
$albums = mysqli_connect(servername_a, username_a, password_a, db_name_a);
include "db-config-album-meta.php";
$album_meta = mysqli_connect(servername_am, username_am, password_am, db_name_am);
