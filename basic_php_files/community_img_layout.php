<?php
include 'mysql_connect.php';
function community_img_layout($mysqli, $query){
    $sql="select mid from movies_ott where original_title like concat('%','".(string)$query."', '%');";
    $res=mysqli_query($mysqli, $sql);
    $count=0;
    echo '<form action="Community_Page.php" method="get">';
    echo '<div class="div_movie_list">';
    while($array=mysqli_fetch_assoc($res)){

        $img_src_sql="select img_src from movies_poster, movies_ott where movies_poster.mid = ".$array["mid"];
        $img_res=mysqli_query($mysqli, $img_src_sql);

        #foreach(mysqli_fetch_array($img_res) as $rank){   
        $poster_res=mysqli_fetch_array($img_res);
        echo '<button class="btn_movie_detail" type="submit" name="movie_id" value="'.$array['mid'].'"><img class="img_movie_list" src="'.$poster_res["img_src"].'" alt="My Image"></button>';                  
        $count+=1;
        if($count>=15)  break;

    }
    echo '</div></form>';
}      
?> 