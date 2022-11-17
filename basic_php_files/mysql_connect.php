<?php
  $mysqli = mysqli_connect("localhost", "team19","team19", "team19");
  if(mysqli_connect_errno()){
    printf("Connect failed:%s\n", mysqli_connect_error());
    exit();
  }
?>