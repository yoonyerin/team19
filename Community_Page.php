<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Community_Page</title>
    <link href="Community.css" rel="stylesheet" type="text/css" />
    <?php include("./basic_php_files/session.php"); ?>
    <?php include("./basic_php_files/community_get.php") ?>
    <?php include "./basic_php_files/community_board_db.php" ?>
    
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
<div class=poster>
    <h2 class="h2_community_title"><?=$movie["original_title"] ?></h2>
        <img class=detail_img src=<?=$poster["img_src"]?> height="500px">
</div>    
<div class=board>
    <!-- php 삽입 -->
    <h2 class="h2_community_title"><b>Community</b></h2>
    <table align=center>
        <thead align="center">
            <tr>
                <td width="50" align="center">Index</td>
                <td width="500" align="center">Title</td>
                <td width="100" align="center">Date</td>
                <td width="200" align="center">Name</td>
            </tr>
        </thead>
        <?php  print_db($mysqli, $movie["mid"]); ?>

        
    </table>

    <div class=text>
    <form action="community_write.php" method="post">
    <input type="hidden" name="mid" value=<?= $movie["mid"]?> />
        <button id=writeButton style="cursor: hand" >WRITE</button>
        </form>
    </div>
</div>
</body>

</html>