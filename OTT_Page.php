<?php
include './basic_php_files/mysql_connect.php';
include("./basic_php_files/session.php");

$ott_name=$_GET['ott_name'];

if ($ott_name=='netflix') {
    $text = 'NETFLIX';
} elseif ($ott_name=='disney_plus') {
    $text = 'DISNEY PLUS';
} elseif ($ott_name=='amazon_prime') {
    $text = 'AMAZON PRIME';
} else {
    $text = 'HULU';
}

$sql1 = "select * from movies_". $ott_name;
$movie_list=mysqli_query($mysqli, $sql1);
$val_count = mysqli_num_rows($movie_list);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>OTT_Page</title>
    <link href="OTT_Page.css?ver=1.02" rel="stylesheet" type="text/css" />
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
                <li><a class="text_green" onclick="location.href='Favor_Page.php'">OTT SERVICE</a></li>
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

    <!-- 사용자가 선택한 OTT에 따른 영화를 보여주는 section -->
    <div class="div_ott_section">
        <h2 class="text_subtitle"><?php echo $text;?></h2>
    </div>

    <div class="div_center">

        <!-- 
            데이터: 영화 포스터 이미지
            테이블, 필드값: ex. image TABLE, image_url
            데이터가 들어갈 위치: <img class="img_favor_list" src="[실제 데이터]" alt="My Image">
            비고: [반복문] 하나의 div마다 img가 최대 4개 포함, 아래 코드는 20개의 데이터일 경우
        -->

<?php
$line_changer = 0;

while($movie=mysqli_fetch_array($movie_list,MYSQLI_ASSOC)) {
  $mid = $movie['mid'];
  $title = $movie['original_title'];
  $q_src_img = 'select img_src from movies_poster where mid =' . $mid;
  $src_img = mysqli_query($mysqli, $q_src_img);
  $f_src_img = mysqli_fetch_array($src_img);
  echo '<img class="img_favor_list" src="' . $f_src_img['img_src'] .'" alt="My Image">';

  $line_changer = $line_changer + 1;
  if ($line_changer % 4 == 0) {
    echo '</div>
    <div class="div_center">';
  }
}
    echo '</div>';
?>

    </div>

</body>
</html>