<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Result_Page</title>
    <link href="Result_Page.css?ver=1.00" rel="stylesheet" type="text/css" />
    <?php include("./basic_php_files/session.php"); ?>
    <?php include("./basic_php_files/community_img_layout.php")?>
    <?php if(!isset($_POST['input_event'])) $_POST["input_event"]="";?>
     
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

    <hr>
    <div class="div_inputwrapper">
        <h2 class="h2_title">Search for the movie you want to talk about</h2>
        <form  method="POST" id="eventForm">
        <input id='searchEvent' type="text" name="input_event" placeholder="search keyword">
        <input id='searchButton' type="submit" value="ENTER" >
        </form>
    </div>
    <hr>
    <div class="div_movie_section">
        
        <div class="div_horizontal">
            <h2 class="h2_title">CHOOSE THE MOVIE</h2>
        </div>
        <div class="div_movie_list">
            <!-- php 검색한 키워드로 검색 결과 노출 기능--> 
            <!-- 테이블, 필드값: movie TABLE image url
            데이터 위치: src= 링크 -->
             
            <?php $query=$_POST["input_event"];
            community_img_layout($mysqli, $query) ?>
            <!-- 반복문 종료 -->
        </div>
        <br><br>
    </div>
</body>
</html>