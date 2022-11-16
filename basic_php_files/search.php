<?php 
  include 'session.php';
  include "mysql_connect.php";

  
  function save_query($login, $mysql, $query, $user_name) {
    # (1) user_name에 해당하는 user_id 찾아주기
    $find_id_sql="select user_id from user_db where user_name ='".(string)$_SESSION["user_name"]."'";
    $find_id_res=mysqli_query($mysql, $find_id_sql);
    ### note: session이 있을때에만 이 함수가 쓰이기 때문에 반드시 $user_id가 만들어짐
    while($id=mysqli_fetch_assoc($find_id_res)) $user_id = $id['user_id'];

    # (2) user_search_db에서 user_id 찾기
    $find_user_sql="select * from user_search_db where user_id ='".$user_id."';";
    $find_user_res=mysqli_query($mysql, $find_user_sql);
    if(empty(mysqli_fetch_array($find_user_res))) {
      $create_sql="insert into user_search_db (user_id, search1) values (' ".$user_id."','".$query."');";
      $c_res = mysqli_query($mysql, $create_sql);
    } else {
      $select_sql="select search1, search2, search3, search4 from user_search_db where user_id='".$user_id."'";
      $select_res=mysqli_query($mysql, $select_sql);
      while($search=mysqli_fetch_array($select_res, MYSQLI_NUM)) {
        for ($i = 0; $i < 4; $i++) {
          if(empty($search[$i])) {break;}
          $update_sql = "update user_search_db set search".($i+2)." = '".$search[$i]."' where user_id = '".$user_id."'";
          $update = mysqli_query($mysql, $update_sql);
        }
        $update_sql = "update user_search_db set search1 = '".$query."' where user_id = '".$user_id."'";
        $update = mysqli_query($mysql, $update_sql);
      }
    }


  }

  ?>
