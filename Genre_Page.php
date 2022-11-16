<?php include('./basic_php_files/session.php'); ?>
<?php include './basic_php_files/Genre_Page_Fetch.php' ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Genre_Page</title>
    <link href="Genre_Page.css?ver=1.01" rel="stylesheet" type="text/css" />
</head>
<body>
    <!-- 메인바 -->
    <div class="div_mainbar">
        <div class="div_logo">
        <hr class="hr_logo">
        <h1 class="text_logo" onclick="location.href='Main_Page.php'">WHO's TT</h1>
        <hr class="hr_logo">
        </div>
        <div class="div_category">
        <nav class="clearfix">
            <ul class="clearfix">
                <li><a onclick="location.href='Season_Page.php'">SEASONS</a></li>
                <li><a onclick="location.href='Favor_Page.php'">OTT SERVICE</a></li>
                <li><a class="text_green" onclick="location.href='Genre_Page.php'">GENRE</a></li>
                <li><a onclick="location.href='Event_Page_autoscroll.php'">EVENT</a></li>
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

    <!-- 장르를 선택하는 section -->
    <div class="div_button">
        <h2 class="text_green_h2">WHAT GENRE DO YOU WANT?</h2>

        <div class="div_center">
            <button class="btn_select">Action & Adventure</button>
            <button class="btn_select">Fantasy & Animation</button>
            <button class="btn_select">Family & Comedy</button>
            <button class="btn_select">Thriller & Horror</button>
            <button class="btn_select">Romance & Music</button>
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

    <!-- 장르1 영화 포스터 및 개수를 보여주는 section -->
    <?php genre_poster($mysqli, 'Action & Adventure', '1', 'text_green_h2', 'btn_movie_detail'); ?>

    <!-- 장르2 영화 포스터 및 개수를 보여주는 section -->
    <?php genre_poster($mysqli, 'Fantasy & Animation', '2', 'text_green_h2', 'btn_movie_detail'); ?>


    <!-- 장르3 영화 포스터 및 개수를 보여주는 section -->
    <?php genre_poster($mysqli, 'Family & Comedy', '3', 'text_green_h2', 'btn_movie_detail'); ?>

    <!-- 장르4 영화 포스터 및 개수를 보여주는 section -->
    <?php genre_poster($mysqli, 'Thriller & Horror', '4', 'text_green_h2', 'btn_movie_detail'); ?>

    <!-- 장르5 영화 포스터 및 개수를 보여주는 section -->
    <?php genre_poster($mysqli, 'Romance & Music', '5', 'text_green_h2', 'btn_movie_detail'); ?>


</body>
</html>