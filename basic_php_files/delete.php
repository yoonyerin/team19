<?php 
  include 'session.php';
  include "mysql_connect.php";
  function delete_all($mysql, $user_name){
    $delete_sql="delete from user_search_db where user_search_db.user_id = (select user_id from user_db where user_db.user_name = '".$_SESSION["user_name"]."')";
    $delete_res=mysqli_query($mysql, $delete_sql);
  }
  
?>
