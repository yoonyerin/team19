<?php 
  include 'session.php';

  

  function save_query($login, $mysqli, $query){
    
     
      #$user_id=1;
      $find_id_sql="select user_id from user_db where user_name ='".(string)$_SESSION["user_name"]."'";
      $id_res=mysqli_query($mysqli, $find_id_sql);
      while($id=mysqli_fetch_assoc($id_res)) $user_id=$id["user_id"];

      $user_id=1;

  
      $find_user_sql="select * from user_search_db where user_id ='".$user_id."';";
      $create_sql="insert into user_search_db (user_id, search1) values (' ".$user_id."','".$query."');";
     
      $select_sql="select search1, search2, search3, search4 from user_search_db where user_id='".$user_id."'";
      $select_res=mysqli_query($mysqli, $select_sql); 
      $search_list=[];

      while($search=mysqli_fetch_assoc($select_res)) {
        $search_list[0]=$search["search1"];
        $search_list[1]=$search["search2"];
        $search_list[2]=$search["search3"];
        $search_list[3]=$search["search4"];
      
      }
      for($i=0;$i<4;$i++) if(empty($search_list[$i])) $search_list[$i]=" ";


      $update_sql="update user_search_db set search1='".$query."', search2='".$search_list[0]."', search3='".$search_list[1].
      "', search4='".$search_list[2]."', search5='".$search_list[3]."' where user_id='".$user_id."';";
      
      $find_user_res=mysqli_query($mysqli, $find_user_sql);
      if($login){
                
        if(empty(mysqli_fetch_array($find_user_res)))
            if(!$create_res=mysqli_query($mysqli, $create_sql)) mysqli_error($mysqli) ;
      
         else
            if(!$update_res=mysqli_query($mysqli, $update_sql)) mysqli_error($mysqli) ;      
      }
    

    }
?>
