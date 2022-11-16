<?php include './basic_php_files/Season_Page_Fetch.php'?>
<?php include("./basic_php_files/session.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Season_Page</title>
    <link href="Season_Page.css?ver=1.01" rel="stylesheet" type="text/css" />
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
                    <li><a class="text_green" onclick="location.href='Season_Page.php'">SEASONS</a></li>
                    <li><a onclick="location.href='Favor_Page.php'">OTT SERVICE</a></li>
                    <li><a onclick="location.href='Genre_Page.php'">GENRE</a></li>
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

    <!-- 사용자가 원하는 연도 및 decade를 설정하는 section -->
    <div class="div_button">
        <div class="div_horizontal">
            <h2 class="h2_text">WHAT SEASON DO YOU WANT?</h2>
            <form action="" name="frm">
                <select class="select_decade" name="list" onchange="location.href=document.frm.list.value">
                    <option value="Season_Page.php" selected="selected">Select</option>
                    <option value="Season_Page.php">Decade: 10 year</option>
                    <option value="Season_Page_5Decade.php">Decade: 5 year</option>
                </select>
            </form>
        </div>

        <div class="div_center">
            <button class="btn_select">~ 1990</button>
            <button class="btn_select">1991 ~ 2000</button>
            <button class="btn_select">2001 ~ 2010</button>
            <button class="btn_select">2011 ~ 2020</button>
            <button class="btn_select">2021 ~</button>
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

    <?php 
    /* requirement satisfying rollup */
    $groupby_with_rollup_sql = "select decade, decade5, count(*) as counting from (select ceil(year(release_date) / 10) * 10 as decade, ceil(year(release_date) / 5) * 5 as decade5 from movies_ott) t group by decade, decade5 with rollup";
    $movie_count_list=mysqli_query($mysqli, $groupby_with_rollup_sql);

    ?>
    <!-- 연도별(~1990) 영화 이미지 포스터 및 개수를 보여주는 section -->
    <?php season_poster($mysqli, $movie_count_list, 0, 1990, '1', 'h2_text', 'btn_movie_detail', 10);?>

    <!-- 연도별(1991~2000) 영화 포스터 및 개수를 보여주는 section -->
    <?php season_poster($mysqli, $movie_count_list, 1991, 2000, '2', 'h2_text', 'btn_movie_detail', 10);?>

    <!-- 연도별(2001~2010) 영화 포스터 및 개수를 보여주는 section -->
    <!-- 이하 동일 -->
    <?php season_poster($mysqli, $movie_count_list, 2001, 2010, '3', 'h2_text', 'btn_movie_detail', 10);?>

    <!-- 연도별(2011~2020) 영화 포스터 및 개수를 보여주는 section -->
    <!-- 이하 동일 -->
    <?php season_poster($mysqli, $movie_count_list, 2011, 2020, '4', 'h2_text', 'btn_movie_detail', 10);?>

    <!-- 연도별(2021~) 영화 포스터 및 개수를 보여주는 section -->
    <!-- 이하 동일 -->
    <?php season_poster($mysqli, $movie_count_list, 2021, date('Y'), '5', 'h2_text', 'btn_movie_detail', 10);?>

</body>
</html>