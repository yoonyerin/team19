<?php 
  include 'session.php';
  include "mysql_connect.php";
  if($login){
    $sql1 = "delete from user_board where user_id = (select user_id from user_db where user_name = '".$_SESSION['user_name']."')";
    $sql1_res = mysqli_query($mysqli, $sql1);
    $sql2 = "delete from user_fav_db where user_id = (select user_id from user_db where user_name = '".$_SESSION['user_name']."')";
    $sql2_res = mysqli_query($mysqli, $sql2);
    $sql3 = "delete from user_search_db where user_id = (select user_id from user_db where user_name = '".$_SESSION['user_name']."')";
    $sql3_res = mysqli_query($mysqli, $sql3);
    $sql = "delete from user_db where user_name = '".$_SESSION['user_name']."'";
    $signout = mysqli_query($mysqli, $sql);
    session_destroy();
  };
  header('Location: ../Main_Page.php');
  die();
?>