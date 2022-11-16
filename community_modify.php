<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Main_Page</title>
    <link href="Community.css" rel="stylesheet" type="text/css" />
    <?php include("./basic_php_files/session.php"); 
        include './basic_php_files/mysql_connect.php';?>
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

</html>
<body>
<div class=poster>
    <h2 class="h2_community_title"><?=$title?></h2>
        <img class=detail_img src=<?=$img_src?> height="500px">
</div>
<div class=board>   
    <!-- php 데이터 연결 -->
            <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
                <tr>
                    <td style="height:40; float:center; background-color:#00462A">
                        <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>Edit your comment</b></p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor=white>
                    <form id="community_post" action='./basic_php_files/community_fn.php' method="POST">
                        <input type="hidden" name="mid" value=<?=$movie_id?>>
                        <input type="hidden" name="n_url" value="community_read.php">
                        <input type="hidden" name="todo" value="edit">
                        <input type="hidden" name="board_id" value=<?=$board_id?>>
                        <table class="table2">
                            <tr>
                                <td>Name</td>
                                <td><input type="hidden" name="id" value="기존 이름"><?=$_SESSION['user_name']?></td>
                            </tr>

                            <tr>
                                <td>Title</td>
                                <td><input type=text name=title size=87 value=<?=$b_title?>></td>
                            </tr>

                            <tr>
                                <td>Content</td>
                                <td><textarea name=content cols=75 rows=15><?=$content?></textarea></td>
                            </tr>

                        </table>

                        <center>
                            <input type="hidden" name="number" value="기존 Number">
                            <input style="height:26px; font-size:16px; font-family: Georgia, 'Times New Roman', Times, serif;" type="submit" value="EDIT">
                        </center>
                    </td>
                </tr>
            </table>
        </form>
</div>        
</body>

</html>