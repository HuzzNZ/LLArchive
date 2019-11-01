<?php
    include "uranohoshi/db-config/db-connect.php";
    include "otonokizaka/db-config/db-connect.php";
    include "nijigasaki/db-config/db-connect.php";

    $results = array();

    # OTONOKIZAKA QUERY
    $o_query = $o_album_meta->prepare("SELECT * FROM `albums`");
    $o_query->execute();
    $o_query_results = $o_query->get_result();
    $single_result = mysqli_fetch_assoc($o_query_results);
    do {
        array_push($results, $single_result);
    } while (
        $single_result = mysqli_fetch_assoc($o_query_results));

    # URANOHOSHI QUERY
    $u_query = $u_album_meta->prepare("SELECT * FROM `albums`");
    $u_query->execute();
    $u_query_results = $u_query->get_result();
    $single_result = mysqli_fetch_assoc($u_query_results);
    do {
        array_push($results, $single_result);
    } while (
        $single_result = mysqli_fetch_assoc($u_query_results));

    # NIJIGASAKI QUERY
    $n_query = $n_album_meta->prepare("SELECT * FROM `albums`");
    $n_query->execute();
    $n_query_results = $n_query->get_result();
    $single_result = mysqli_fetch_assoc($n_query_results);
    do {
        array_push($results, $single_result);
    } while (
        $single_result = mysqli_fetch_assoc($n_query_results));
