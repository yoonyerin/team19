<?php include('./basic_php_files/session.php'); ?>
<?php include "mysql_connect.php";?>
<?php 

    $sql = 'select *  from movies_ott where mid = '.$_POST['mid'];
    $poster_sql = 'select * from movies_poster where mid = '.$_POST['mid'];
    $result = mysqli_query($mysqli, $sql);
    $poster_res = mysqli_query($mysqli, $poster_sql);
    $movie = mysqli_fetch_assoc($result);
    $poster = mysqli_fetch_assoc($poster_res);

    ?>