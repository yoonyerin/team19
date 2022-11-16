<?php
    include 'session.php';
    include "mysql_connect.php";
    function query_print($mysqli, $i){
        if(isset($_SESSION["user_name"])){
            $query="search".(string)$i;
            $sql="select ".$query." from user_search_db where user_search_db.user_id = ( select user_db.user_id from user_db where user_name = '".$_SESSION["user_name"]."');";
            $res=mysqli_query($mysqli, $sql);
            
            if(empty($row=mysqli_fetch_row($res)))   echo "";
            else echo $row;
        }
        else    echo "";
    }

    ?>