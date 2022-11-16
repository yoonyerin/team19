<!-- community_read.php에서 들어옵니다.-->
<?php
include 'session.php';
include 'mysql_connect.php';

if($_POST["where"]=='back') {
  header('Location: ../Community_Page.php?movie_id='.$_POST['mid']);
} elseif($_POST["where"]=='edit') {
  header('Location: ../community_modify.php?board_id='.$_POST['bid']);
} else {
  $board_id = $_POST['bid'];
  $sql1="delete from user_board where board_id ='" . $board_id . "'";
  $delete_board=mysqli_query($mysqli, $sql1);
  $sql2="delete from board_db where board_id = '" . $board_id . "'";
  $delete_board=mysqli_query($mysqli, $sql2);
  header('Location: ../Community_Page.php?movie_id='.$_POST['mid']);
}
?>