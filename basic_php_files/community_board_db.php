<?php 
include("./basic_php_files/community_get.php"); 


    function print_db($mysqli, $mid){
        $sql="select * from board_db where mid='".(string)$mid."';";
        $result = mysqli_query($mysqli, $sql);

        while($board = mysqli_fetch_assoc($result)){
            
            $sql2 ="select * from user_db, user_board where user_board.board_id = '".$board['board_id']."' and user_db.user_id = user_board.user_id";
            $res2 = mysqli_query($mysqli, $sql2);
            while($user = mysqli_fetch_assoc($res2)) {
                echo '<tbody>
                        <tr class="even">
                        <td width="50" align="center">'.$board["board_id"].'</td>
                        <td width="500" align="center"><form action="community_read.php" method="get">
                        <input type="hidden" name="board_id" value="'.$board["board_id"].'">
                        <input type="submit" value="'.$board["title"].'" style="border:0; background-color: transparent;">'
                        .'</td></form>
                        <td width="200" align="center">'.$board["last_chg_date"].'</td>
                        <td width="50" align="center">'.$user["user_name"].'</td>
                        </tr>
                </tbody>';
            }
        }
    }






?>