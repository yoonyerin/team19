<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Main_Page</title>
    <link href="Community.css" rel="stylesheet" type="text/css" />
    <?php include("./basic_php_files/session.php"); ?>
</head>
<body>
    <div class="div_mainbar">

        <div class="div_logo">
        <hr class="hr_logo">
        <h1 class="h1_logo">WHO's TT</h1>
        <hr class="hr_logo">
        </div>
        
        <div class="div_category">
        <nav class="clearfix">
            <ul class="clearfix">
                <li><a onclick="location.href='Season_Page.php'">SEASONS</a></li>
                <li><a onclick="location.href='Favor_Page.php'">OTT SERVICE</a></li>
                <li><a onclick="location.href='Genre_Page.php'">GENRE</a></li>
                <li><a class="text_green" onclick="location.href='Event_Page_autoscroll.php'">EVENT</a></li>
                <li><a onclick="location.href='Community_Result_Page.php'">COMMUNITY</a></li>
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
<div class=poster>
    <h2 class="h2_community_title">{MOVIE TITLE}</h2>
        <img class=detail_img src=https://www.themoviedb.org/t/p/w600_and_h900_bestv2/xr3oGJYQWLunuw7L5myo4VT8DBz.jpg height="500px">
</div>
<div class=board>
    <!-- Php 삽입 -->
    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title">재밌어요</td>
        </tr>
        <tr>
            <td class="read_id">Name</td>
            <td class="read_id2">나혜성</td>
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                content</td>
        </tr>
    </table>

    <!-- MODIFY & DELETE 추후 세션처리로 보완 예정 -->
    <div class="read_btn">
        <button class="read_btn1" onclick="location.href='Community_Page.php'">BACK</button>&nbsp;&nbsp;
        <button class="read_btn1" onclick="location.href='community_modify.php'">EDIT</button>&nbsp;&nbsp;
        <button class="read_btn1" a onclick="ask();">DELETE</button>

        <script>
            function ask() {
                if (confirm("게시글을 삭제하시겠습니까?")) {
                    window.location = "community_delete.php"
                }
            }
        </script>
        <!-- 여기까지 -->
    </div>
</div>    
</body>

</html>
