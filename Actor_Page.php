<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Actor_Page</title>
    <link href="Actor_Page.css?ver=1.1" rel="stylesheet" type="text/css" />
    
    <?php include('./basic_php_files/session.php'); ?>
    <?php include("./basic_php_files/mysql_connect.php");?>
    <?php include("./basic_php_files/actor_fn.php");?>
    <?php include("./basic_php_files/actor_page_img_layout.php");?>
    <?php include("./basic_php_files/query_print.php"); ?>
    <?php include("./basic_php_files/search.php"); ?>
    <?php include("./basic_php_files/delete.php"); ?>
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
                <li><a onclick="location.href='Community_Result_Page.php'">COMMUNITY</a></li>
                <li><a class="text_green" onclick="location.href='Actor_Page.php'">KOREAN ACTOR</a></li>
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
        <h2 class="h2_title">WHO'S THE KOREAN ACTOR YOU ARE INTERESTED IN?</h2>
        <!-- 배우 이름 입력 폼: 검색한 키워드가 korean_actor DB 필터링용으로 사용됨 -->
        <form method="POST" id="eventForm" action=<?=$_SERVER['PHP_SELF']?>></form> 
            <input id='searchEvent' type="text" name="input_event" placeholder="search keyword" form="eventForm">
            <input id='searchButton' type="submit" value="ENTER" form="eventForm">
        
        <?php  $input_event = $_POST["input_event"];
         save_query($login, $mysqli, $input_event); ?>
        <br><b class="recent_keyword_title"> Recently Searched</b>
        <form method="POST" id="deleteform" target="back">     
        <button class="delete_keyword" form="deleteform">Delete Keyword</button>
</form>
        <?php delete_all($mysqli, $_SESSION["user_name"]); ?>
        
        <table class="recent_keyword_table">
            <tr>
                <td></td>
                <td><?php query_print($mysqli, 1)?></td>
                <td><?php query_print($mysqli, 2)?></td>
                <td><?php query_print($mysqli, 3)?></td>
                <td><?php query_print($mysqli, 4)?></td>
            </tr>
        </table>
    </div>
    <hr>
    <div class="div_result">
    <div class="div_movie_section">
       
        <div class="div_horizontal">
            <h2 class="h2_text">THE MOVIES WITH 
                <?php 
                    echo $_POST["input_event"];
                ?>
            </h2> <!-- 배우 이름 출력 -->
           
            <h2 class="h2_text">
                <?php find_actors_movie($mysqli, $input_event); ?>
            </h2>
        </div>
        <!-- TABLE: Korean Actor 
        DATA: name={배우이름}에 해당하는 영화의 포스터 url-->
        <?php a_img_layout($mysqli,$input_event );?>

        <!-- 반복문 종료 -->
        </div>
    </div> 
        <?php actors_movie_genre($mysqli, $input_event);  ?> 
         <?php actors_movie_year($mysqli, $input_event); ?>
<!--    <div class="div_stat">
        <div class="div_horizontal_left">
            <h2 class="h2_text">Statistics By Genre</h2>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <div>
            <canvas id="myChart"></canvas>
            </div>
            
            <script>
            // === include 'setup' then 'config' above ===
            // 막대 그래프: 해당 배우의 장르별 영화 갯수
           const labels = ['horror','romance','family','comedy','drama','SF']; //php 장르 라벨링
            const data = {
                labels: labels,
                datasets: [{
                label: 'The number of Film',
                data: [1,4,7,6,2,10],//php 삽입: 각 장르별 영화 갯수: korean_actor table의 genre count 
                backgroundColor: [
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)'
                ],
                borderColor: [
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)'
                ],
                borderWidth: 1
                }]
            };
            

            const config = {
                type: 'bar', // 그래프 타입 bar
                data: data,
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                },
            };

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
            </script> 
        </div>
        <div class="div_horizontal_right">
            <h2 class="h2_text">Statistics By Year</h2>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <div>
            <canvas id="myLineChart"></canvas>
            </div>
            <script>
                // === include 'setup' then 'config' above ===
            // 꺾은선 그래프: 해당 배우의 연도별 영화 갯수(추이)
            /*
            const labels2 = ['2012','2013','2014','2015','2016','2017','2018','2019','2020','2021']; // php 연도 라벨링
            const data2 = {
                labels: labels2,
                datasets: [{
                label: 'The number of Film',
                data: [1,4,7,6,2,10,1,4,6,3], // php 삽입: 각 연도별 영화 갯수. korean_actor table의 개봉년도 year count 
                backgroundColor: [
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                    'rgba(0, 70, 42)',
                ],
                borderColor: [
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)',
                    'rgb(0, 70, 42)'
                ],
                borderWidth: 1
                }]
            };*/

            const config2 = {
                type: 'line', // 그래프 타입 line
                data: data2,
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                },
            };

            var myLineChart = new Chart(
                document.getElementById('myLineChart'),
                config2
            );
            </script>
            <h3 class="average">10년간 평균 영화 촬영 수: 개</h3> 
        -->
         
           
            
            
            
            
        </div> 
    </div>
  
    
</body>
</html>