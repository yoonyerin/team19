<?php include('session.php'); ?>
<?php include "mysql_connect.php";?>
<?php 

    $sql = 'select *  from movies_ott where mid = '.$_GET['movie_id'];
    $poster_sql = 'select * from movies_poster where mid = '.$_GET['movie_id'];
    $result = mysqli_query($mysqli, $sql);
    $poster_res = mysqli_query($mysqli, $poster_sql);
    $movie = mysqli_fetch_assoc($result);
    $poster = mysqli_fetch_assoc($poster_res);

    ?>