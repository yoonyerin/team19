<?php 
  include 'session.php';
  include "mysql_connect.php";
  if($login){
    $sql = "delete from user_db where user_name = '".$_SESSION['user_name']."'";
    $signout = mysqli_query($mysqli, $sql);
    session_destroy();
  };
  header('Location: ../Main_Page.php');
  die();
?>