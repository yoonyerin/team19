<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Main_Page</title>
    <link href="Community.css" rel="stylesheet" type="text/css" />
    <?php include("./basic_php_files/session.php"); ?>
    <?php include("./basic_php_files/community_get.php") ?>

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
    <h2 class="h2_community_title"><?=$movie["original_title"]?></h2>
        <img class=detail_img src=<?=$poster["img_src"]?> height="500px">
</div>
<div class=board>    
        <!-- method : POST!!! (GET X) -->
        <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
            <tr>
                <td style="height:40; float:center; background-color:#00462A">
                    <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>Write your comment</b></p>
                </td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <form id="community_post" action='./basic_php_files/community_fn.php' method="POST">
                        <input type="hidden" name="mid" value=<?=$_GET['movie_id']?>>
                        <input type="hidden" name="n_url" value="community_read.php">
                        <input type="hidden" name="todo" value="write">
                        <table class="table2">
                            <tr>
                                <td>Name</td>
                                <td><?= $_SESSION["user_name"];?></td>

                            </tr>
                            <tr>
                                <td>Title</td>
                                
                                <td><input type="text" name="title" size=70></td>
                            </tr>
                            <tr>
                                <td>Content</td>
                                <td><textarea name="content" cols=75 rows=15></textarea></td>
                            </tr>

                            <!-- <tr>
                                <td>비밀번호</td>
                                <td><input type="password" name="pw" size=15 maxlength=15></td>
                            </tr> -->
                            
                            
                        </table>
                    </form> 
                    <center>
                            <button style="height:26px; font-size:16px;font-family: Georgia, 'Times New Roman', Times, serif; color:black" type="submit" value="WRITE" form="community_post">WRITE</button>
                    </center>
                        
                   
                </td>
            </tr>
        </table>
</div>    
</body>

</html>