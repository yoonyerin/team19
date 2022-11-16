<?php include('./basic_php_files/session.php'); ?>
<?php include './basic_php_files/Event_Page_Fetch.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Event_Page</title>
    <link href="Event_Page.css?ver=1.10" rel="stylesheet" type="text/css" />
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

    <div class="div_button">

        <div class="div_horizontal">
            <h2 class="h2_text">CHOOSE TODAY'S EVENT</h2>
        </div>

        <div class="div_center">
            <button class="btn_select">CHRISTMAS</button>
            <button class="btn_select">WEDDING</button>
            <button class="btn_select">FAMILY EVENT</button>
            <button class="btn_select">TEACHER'S DAY</button>
            <button class="btn_select">BIRTHDAY</button>
        </div>
    </div>
    <script> /* 자동 스크롤 기능.js */
        const Autoscroll = document.getElementsByTagName('button');

        for(let i = 0; i < Autoscroll.length; i++){

            Autoscroll[i].addEventListener('click',function(e){
            e.preventDefault();
            document.querySelector('.div_horizontal' + (i + 1)).scrollIntoView({ behavior: 'smooth' });
        });

        }
    </script>

    <hr class="hr_division">
    <!-- 이벤트별 영화 목록 추출 -->
    <!-- 데이터 : 이벤트별 영화 이미지 url, 이벤트별 영화 갯수
    테이블, 필드값: 
    1) movies Table[discription]에서 이벤트 키워드가 포함된 영화 리스트의 image TABLE[image_url], 
    2) movies TABLE 에서 장르별로 Group 해서 Count
    -->


    <div class="div_movie_section">
        
        <!-- 이벤트1 영화 포스터 및 개수를 보여주는 section -->
        <?php event_poster($mysqli, 'CHRISTMAS', '1', 'h2_text', 'btn_movie_detail'); ?>

        <!-- 이벤트2 영화 포스터 및 개수를 보여주는 section -->
        <?php event_poster($mysqli, 'WEDDING', '2', 'h2_text', 'btn_movie_detail'); ?>

        <!-- 이벤트3 영화 포스터 및 개수를 보여주는 section -->
        <?php event_poster($mysqli, 'FAMILY EVENT', '3', 'h2_text', 'btn_movie_detail'); ?>

        <!-- 이벤트4 영화 포스터 및 개수를 보여주는 section -->
        <?php event_poster($mysqli, "TEACHER'S DAY", '4', 'h2_text', 'btn_movie_detail'); ?>

        <!-- 이벤트5 영화 포스터 및 개수를 보여주는 section -->
        <?php event_poster($mysqli, 'BIRTHDAY', '5', 'h2_text', 'btn_movie_detail'); ?>

    </div>


</body>
</html>