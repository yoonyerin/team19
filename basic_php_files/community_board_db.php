<?php 
include("./basic_php_files/community_get.php"); 


    function print_db($mysqli, $mid){
        $sql="select * from board_db where mid='".(string)$mid."';";
        $result = mysqli_query($mysqli, $sql);
        while($board = mysqli_fetch_assoc($result)){

            echo '<tbody>
                        <tr class="even">
                        <td width="50" align="center">'.$board["board_id"].'</td>
                        <td width="500" align="center">'.$board["title"].'<a href=community_read.php>'.$board["content"]
                        .'</a></td>
                        <td width="200" align="center">'.$board["last_chg_date"].'</td>
                        <td width="50" align="center">'.$_SESSION["user_name"].'</td>
                        </tr>
            </tbody>';
        }
    }






?>