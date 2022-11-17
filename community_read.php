<?php include './basic_php_files/mysql_connect.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Main_Page</title>
    <link href="Community.css?ver=1.00" rel="stylesheet" type="text/css" />
    <?php include("./basic_php_files/session.php"); ?>
</head>

<body>
<div class="div_mainbar">

    <div class="div_logo">
        <hr class="hr_logo">
        <h1 class="h1_logo" onclick="location.href='Main_Page.php'">WHO's TT</h1>
        <hr class="hr_logo">
    </div>

    <div class="div_category">
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a onclick="location.href='Season_Page.php'">SEASONS</a></li>
            <li><a onclick="location.href='Favor_Page.php'">OTT SERVICE</a></li>
            <li><a onclick="location.href='Genre_Page.php'">GENRE</a></li>
            <li><a onclick="location.href='Event_Page_autoscroll.php'">EVENT</a></li>
            <li><a  class="text_green" onclick="location.href='Community_Result_Page.php'">COMMUNITY</a></li>
            <li><a onclick="location.href='Actor_Page.php'">KOREAN ACTOR</a></li>
        </ul>
    </nav>
    </div>

    <div class="div_img">
        <img src="images/alarm.png" alt="alarm" width="30px" height="30px">
        <img src="images/user.png" alt="alarm" width="30px" height="30px">
    </div>

</div>



    <hr class="hr_division">

</body>
</html>
<body>

<?php 
#현재 접속한 사용자 확인하기
if($login) {
    $user_name = $_SESSION['user_name'];
    $find_id_sql="select user_id from user_db where user_name ='".$user_name."'";
    $find_id_res=mysqli_query($mysqli, $find_id_sql);
    while($id=mysqli_fetch_assoc($find_id_res)) $user_id = $id['user_id'];
} else $user_id=NULL;

$board_id = $_GET['board_id'];
$find_mid_sql="select * from board_db where board_id = '".$board_id."'";
$find_mid_res=mysqli_query($mysqli, $find_mid_sql);
while($mid=mysqli_fetch_assoc($find_mid_res)) {
    $movie_id = $mid['mid'];
    $b_title = $mid['title'];
    $content = $mid['content'];
    $date = $mid['last_chg_date'];
}

$find_det_sql="select original_title, img_src from movies_ott, movies_poster where movies_ott.mid='".$movie_id."' and movies_poster.mid='".$movie_id."'";
$find_det_res=mysqli_query($mysqli, $find_det_sql);
while($movie=mysqli_fetch_assoc($find_det_res)) {
    $title = $movie['original_title'];
    $img_src = $movie['img_src'];
}

$find_wid_sql="select * from user_board where board_id = '".$board_id."'";
$find_wid_res=mysqli_query($mysqli, $find_wid_sql);
while($wid=mysqli_fetch_assoc($find_wid_res)) $writer_id=$wid['user_id'];

$find_wname_sql="select user_name from user_db where user_id ='".$writer_id."'";
$find_wname_res=mysqli_query($mysqli, $find_wname_sql);
while($wname=mysqli_fetch_assoc($find_wname_res)) $writer_name = $wname['user_name'];

?>


<div class=poster>
    <h2 class="h2_community_title"><?=$title;?></h2>
        <img class=detail_img src=<?=$img_src;?> height="500px">
</div>
<div class=board>
    <!-- Php 삽입 -->
    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title"><?=$b_title;?></td>
        </tr>
        <tr>
            <td class="read_id">Name</td>
            <td class="read_id2"><?=$writer_name;?></td>
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?=$content;?></td>
        </tr>
    </table>

    <!-- MODIFY & DELETE 추후 세션처리로 보완 예정 -->
    <div class="read_btn">
        <?php 
        $back_url = 'Community_Page.php?movie_id='.$movie_id;
        $edit_url = '';?>
        <form action = 'basic_php_files/community_read_btn.php' method='post' id='back_btn'>
            <input type="hidden" name="where" value="back">
            <input type="hidden" name="mid" value=<?=$movie_id?>>
        </form>
        <button class="read_btn1" form='back_btn'>BACK</button>&nbsp;&nbsp; <!-- Community_Page로-->
        <?php if($user_id == $writer_id){ ?>
        <!-- 수정버튼 -->
        <form action = 'basic_php_files/community_read_btn.php' method='post' id='edit_btn'>
            <input type="hidden" name="where" value="edit">
            <input type="hidden" name="bid" value=<?=$board_id?>>
        </form>
        <button class="read_btn1" form='edit_btn'>EDIT</button>&nbsp;&nbsp; <!--communiy_modify.php로-->
        <!-- 삭제버튼 -->
        <form action = 'basic_php_files/community_read_btn.php' method='post' id='delete_btn'>
            <input type="hidden" name="where" value="delete">
            <input type="hidden" name="bid" value=<?=$board_id?>>
            <input type="hidden" name="mid" value=<?=$movie_id?>>
        </form>
        <button class="read_btn1" form='delete_btn'>DELETE</button>

        <script>
            function ask() {
                if (confirm("게시글을 삭제하시겠습니까?")) {
                    window.location = "community_delete.php"
                }
            }
        </script>
        <?php }?>
        <!-- 여기까지 -->
    </div>
</div>    
</body>

</html>
