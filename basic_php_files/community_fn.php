<?php include 'session.php'; 
include 'mysql_connect.php';?>
<?php 

function initial_post_community($mysqli, $title, $content, $mid){
    # 현재 세션에 있는 사용자 select
    $find_id_sql="select user_id from user_db where user_name ='".(string)$_SESSION["user_name"]."'";
    $id_res=mysqli_query($mysqli, $find_id_sql);
    while($id=mysqli_fetch_assoc($id_res)) $user_id=$id["user_id"];
    
    # board_db에 title, content, mid insert (board_id는 auto_increment)
    $sql_board="insert into board_db (title, content, mid) values ('".$title."','".$content."','".$mid."');";
    $create_board=mysqli_query($mysqli, $sql_board);

    #넣은 board의 id 바로 다시 가져오기
    $find_board_id="select board_id from board_db where content='".$content."' and title ='".$title."' and mid='".$mid."'";
    $find_board_res=mysqli_query($mysqli, $find_board_id);
    while($row=mysqli_fetch_assoc($find_board_res)) $board_id=$row["board_id"];

    $sql_user_board="insert into user_board (user_id, board_id) values (' ".$user_id."','".$board_id."');";
    $create_user_board=mysqli_query($mysqli, $sql_user_board);

    #community_read로 가도록 해야할듯!
    header('Location: ../Community_Page.php?movie_id='.$mid);
}

function edit_post_community($mysqli, $board_id, $title, $content, $mid){
    # 현재 세션에 있는 사용자 select
    $find_id_sql="select user_id from user_db where user_name ='".(string)$_SESSION["user_name"]."'";
    $id_res=mysqli_query($mysqli, $find_id_sql);
    while($id=mysqli_fetch_assoc($id_res)) $user_id=$id["user_id"];
    
    # board_db에 title, content, mid insert (board_id는 auto_increment) update
    $sql_board="update board_db set title='".$title."', content='".$content."' where board_id = '".$board_id."';";
    $update_board=mysqli_query($mysqli, $sql_board);

    #community_read로 가도록 해야할듯!
    header('Location: ../Community_Page.php?movie_id='.$mid);
}

if($_POST['todo']=='write')  initial_post_community($mysqli, $_POST["title"], $_POST["content"], $_POST["mid"]); 
else edit_post_community($mysqli, $_POST['board_id'], $_POST['title'], $_POST['content'], $_POST['mid']);

    

?>