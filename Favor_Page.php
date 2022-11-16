<?php include('./basic_php_files/session.php'); ?>
<?php
include './basic_php_files/mysql_connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Favor_Page</title>
    <link href="Favor_Page.css?ver=1.01" rel="stylesheet" type="text/css" />
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

    <!-- OTT 선택하는 section -->
    <div class="div_otttype_section">
        
        <h2 class="text_green_h2">MOVIES PER OTT TYPE</h2>
        <form action="OTT_Page.php" method="get">
            <div class="div_ott_select">
                <button class="btn_ott_select" type="submit" name="ott_name" value="netflix"><img class="img_ott_select" src="images/netflex.png" alt="netflix"></button>
                <button class="btn_ott_select" type="submit" name="ott_name" value="disney_plus"><img class="img_ott_select" src="images/disney.png" alt="disney plus"></button>
                <button class="btn_ott_select" type="submit" name="ott_name" value="amazon_prime"><img class="img_ott_select" src="images/prime.png" alt="amazon prime"></button>
                <button class="btn_ott_select" type="submit" name="ott_name" value="hulu"><img class="img_ott_select" src="images/hulu.png" alt="hulu"></button>
            </div>
        </form>

        <!--원래 수민이 코드
        <div class="div_ott_select">
            <img class="img_ott_select" src="images/netflex.png" alt="My Image">
            <img class="img_ott_select" src="images/disney.png" alt="My Image">
            <img class="img_ott_select" src="images/prime.png" alt="My Image">
            <img class="img_ott_select" src="images/hulu.png" alt="My Image">
        </div>
        -->




    </div>

    <hr class="hr_division">

    <!-- 사용자가 선호하는 영화를 선택하는 section -->
    <form action="Favor_Page_Result.php" method="post">
        <div class="div_horizontal">
            <h2 class="text_green_h2">WHAT WOULD YOU LIKE TO SEE?</h2>
            <button type="submit" class="btn_submit">SUBMIT</button>
        </div>
        <?php
        /* 수민이가 짠 코드에 php 반복문 넣은것..!*/
            echo '<div class="div_favor_list">';

            $line_changer=0;
            $checked_arr = array();
            
            $sql = 'select * from movies_ott';
            $mid_list_all = mysqli_query($mysqli, $sql);

            while($movie=mysqli_fetch_array($mid_list_all,MYSQLI_ASSOC)){
                $mid = $movie['mid'];
                # $title = $movie['original_title'];
                $q_src_img = 'select img_src from movies_poster where mid =' . $mid;
                $src_img = mysqli_query($mysqli, $q_src_img);
                $f_src_img = mysqli_fetch_array($src_img);
                echo '
                <div class="div_favor_list_chk">
                    <img class="img_favor_list" src="' . $f_src_img['img_src'] .'" alt="My Image">
                    <div class="div_description">
                        <p class="text_title">'. $movie['original_title'].'</p>
                        <p class="text_detail">'. $movie['overview'].'</p>
                    </div>
                    
                    <label for="'. $mid .'" class="chk_box">
                        <input type="checkbox" name="fav_mids[]" value="'. $mid . '"id="'. $mid .'"/>
                        <span class="on"></span>
                        선택
                        </label>
                </div>';
                $line_changer=$line_changer+1;
                if ($line_changer%4==0){
                    echo '</div>
                    <div class="div_favor_list">';
                }
            }
            echo '</div>';
        ?>
</form>
</body>
</html>