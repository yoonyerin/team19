<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Main_Page</title>
    <link href="Main_Page.css?ver=1.04" rel="stylesheet" type="text/css" />
    <?php include('./basic_php_files/session.php'); ?>



    <!-- 사용자 이미지 누르면 정보 띄우기 -->
    <script type="text/javascript"> 
        var bDisplay = true; function doDisplay(){ 	
            var con = document.getElementById("div_login_id"); 	
            if(con.style.display=='none'){ 		
                con.style.display = 'block'; 	
            }else{ 		
                con.style.display = 'none'; 	
            } 
        }
    </script>
    <?php
      include("./basic_php_files/mysql_connect.php");
      include("./basic_php_files/Main_Page_Layout.php");
      $rank_arr=array("popularity", "vote_average", "vote_count");
    ?>

</head>
<body>
    <div id="wrap">
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
                        <li><a onclick="location.href='Genre_Page.php'">GENRE</a></li>
                        <li><a onclick="location.href='Event_Page_autoscroll.php'">EVENT</a></li>
                        <li><a onclick="location.href='Community_Result_Page.php'">COMMUNITY</a></li>
                        <li><a onclick="location.href='Actor_Page.php'">KOREAN ACTOR</a></li>
                    </ul>
                </nav>
            </div>
            

            <div class="div_img">
                <img src="images/alarm.png" alt="alarm" width="30px" height="30px">
                <img onclick="javascript:doDisplay();" src="images/user.png" alt="alarm" width="30px" height="30px">
            </div>

        </div>

        <?php
        $text="로그인이 필요해요 :)";
        if($login){
            $_class_login="btn_login";
            $_class_not_login="hidden";
            $text=$_SESSION['user_name']."님 환영합니다:)";
        }
        else{
            $_class_login="hidden";
            $_class_not_login="btn_login";
        }
        ?>
        

        <div class="div_login" id="div_login_id">
            <h2 class="text_login"><?=$text?></h2>

            <hr class="hr_login_division">
            <div class="div_horizontal">
                <button id="btn_login_id" class="<?=$_class_not_login ?> ">로그인</button>
                <button id="btn_register_id" class="<?=$_class_not_login ?>">회원가입</button>
                <button id="btn_modify_id" class="<?=$_class_login ?>">정보수정</button>
                <button id="btn_delete_id" class="<?=$_class_login ?>">로그아웃</button>
            </div>
        </div>

        <hr class="hr_division">

        <h1 class="text_main_section">What should I watch?</h1>

        <!-- 인지도에 따른 영화 순위 -->
        <div class="div_ott_section">
            <h2 class="text_subtitle">AWARENESS</h2>
        </div>
        
        <?php img_layout($mysqli, $rank_arr[0]) ?>

        <!-- 
            데이터: 영화 포스터 이미지
            테이블, 필드값: ex. image TABLE, image_url
            데이터가 들어갈 위치: <img class="img_rank_list" src="[실제 데이터]" alt="My Image">
            비고: X
        -->
           


        <!-- 별점에 따른 영화 순위 -->
        <div class="div_ott_section">
            <h2 class="text_subtitle">RATING</h2>
        </div>
        <?php img_layout($mysqli, $rank_arr[1]) ?>

        
        <!-- 
            데이터: 영화 포스터 이미지
            테이블, 필드값: ex. image TABLE, image_url
            데이터가 들어갈 위치: <img class="img_rank_list" src="[실제 데이터]" alt="My Image">
            비고: X
        -->

        <!-- 수익에 따른 영화 순위 -->
        <div class="div_ott_section">
            <h2 class="text_subtitle">PROFIT</h2>
        </div>

        <?php img_layout($mysqli, $rank_arr[2]) ?>

        <!-- 
            데이터: 영화 포스터 이미지
            테이블, 필드값: ex. image TABLE, image_url
            데이터가 들어갈 위치: <img class="img_rank_list" src="[실제 데이터]" alt="My Image">
            비고: X
        -->
        
    </div>
    
    <!-- ////////// -->
    <!-- modal 영역 -->
    <!-- ////////// -->

    <!-- Login_Page Modal -->
    <div id="id_login_modal" class="modal hidden">
        <div id="id_login_bg" class="bg"></div>
        <div class="modalBox">

        <!-- 오른쪽 상단의 X 버튼 -->
        <img id="id_login_close" class="img_btn_close" src="images/btn_close.png" alt="close">
                    
            <div class="div_vertical_middle">                
                <hr class="hr_division">
                <h2 class="text_gray">WELCOME TO</h2>

                <div class="div_logo">
                    <hr class="hr_logo">
                    <h1 class="text_green2">WHO's TT</h1>
                    <hr class="hr_logo">
                </div>

                <br>
                <hr class="hr_division">

                <!-- id 입력 -->
                <form action="./basic_php_files/login_result.php" method="POST" id="login_form">
                    <input type="hidden" name="login_n_url" value="Main_Page.php">
                <div class="div_horizontal">
                    <h2 class="text_green2">ID</h2>
                    <input class="input_login" name="user_name" type="text" size="15" placeholder="사용자의 ID를 입력하세요.">
                    
                </div>
                
                <!-- pw 입력 -->
                <div class="div_horizontal">
                    <h2 class="text_green2">PW</h2>
                    <input class="input_login" name="_password" type="password" size="15" placeholder="사용자의 PW를 입력하세요.">
                </div>

                <br>
                
                <!-- 로그인 버튼 -->
                </form>
                <button class="btn_login_modal" type="submit" form="login_form">LOGIN</button>
                
                <br>

                <!-- 아이디/비밀번호 찾기 -->
                <div class="div_horizontal">
                    <p class="text_gray_p">FORGOT ID/PW?</p>
                    <p class="text_gray_p">HERE</p>
                </div>

                <!-- 회원가입 -->
                <div class="div_horizontal">
                    <p class="text_gray_p">DON'T HAVE AN ACCOUNT?</p>
                    <p class="text_gray_p">HERE</p>
                </div>
            </div>   

            
        </div>
    </div>

    <!-- Register_Page Modal -->
    <div id="id_register_modal" class="modal hidden">
        <div id="id_register_bg" class="bg"></div>
        <div class="modalBox">

        <img id="id_register_close" class="img_btn_close" src="images/btn_close.png" alt="close">
            
            <div class="div_vertical_middle">                
                <hr class="hr_division">
                <h2 class="text_gray">JOIN TO</h2>

                <div class="div_logo">
                    <hr class="hr_logo">
                    <h1 class="text_logo">WHO's TT</h1>
                    <hr class="hr_logo">
                </div>

                <br>
                <form action="./basic_php_files/register.php" method="POST" id="register">
                <hr class="hr_division">

                <div class="div_horizontal">
                    <p class="text_green2">이름</p>
                    
                        <input class="input_login" name="user_name" type="text" size="15" placeholder="사용자의 이름를 입력하세요.">
                 
                </div>
                
                <div class="div_horizontal">
                    <p class="text_green2">비밀번호</p>
               
                        <input class="input_login" name="_password" type="password" size="15" placeholder="사용자의 비밀번호를 입력하세요.">
                   
                </div>

                <div class="div_horizontal">
                    <p class="text_green2">비밀번호 확인</p>
                    
                        <input class="input_login" name="check_password" type="password" size="15" placeholder="비밀번호를 한 번 더 입력하세요.">
                    
                </div>

                <div class="div_horizontal">
                    <p class="text_green2">이메일</p>
                    
                        <input class="input_login" name="user_email" type="text" size="15" placeholder="사용자의 이메일을 입력하세요.">
                
                </div>
                </form>    
                <button class="btn_login_modal" type="submit" form="register">Confirm</button>
            </div>

        </div>
    </div>

    <!-- Modify_Page Modal -->
    <div id="id_modify_modal" class="modal hidden">
        <div id="id_modify_bg" class="bg"></div>
        <div class="modalBox">

        <img id="id_modify_close" class="img_btn_close" src="images/btn_close.png" alt="close">
            
            <div class="div_vertical_middle">                
                <hr class="hr_division">
                <h2 class="text_gray">MODIFY FROM</h2>

                <div class="div_logo">
                    <hr class="hr_logo">
                    <h1 class="text_logo">WHO's TT</h1>
                    <hr class="hr_logo">
                </div>
                <form action="./basic_php_files/modify.php" method="POST" id="modify">
                    <input type="hidden" name="modify_n_url" value="Main_Page.php"/>
                <br>
                <hr class="hr_division">

                <div class="div_horizontal">
                    <p class="text_green2">이름</p>
                    
                        <input class="input_login" name="user_name" type="text" size="15" placeholder="NEW NAME">
    
                </div>
                
                <div class="div_horizontal">
                    <p class="text_green2">비밀번호</p>
                    
                        <input class="input_login" name="_password" type="password" size="15" placeholder="NEW PW">
                    
                </div>

                <div class="div_horizontal">
                    <p class="text_green2">이메일</p>
                        <input class="input_login" name="user_email" type="text" size="15" placeholder="NEW EMAIL">    
                </div>
            </form>

                <button class="btn_login_modal" type="submit" form="modify">Confirm</button>
            </div>

        </div>
    </div>

    <!-- Logout_Page Modal -->
    <div id="id_delete_modal" class="modal hidden">
        <div id="id_delete_bg" class="bg"></div>
        <div class="modalBox">

        <img id="id_delete_close" class="img_btn_close" src="images/btn_close.png" alt="close">
            
            <div class="div_vertical_middle">                
                <hr class="hr_division">
                <h2 class="text_gray">WANT TO LOGOUT</h2>

                <div class="div_logo">
                    <hr class="hr_logo">
                    <h1 class="text_logo">?WHO's TT?</h1>
                    <hr class="hr_logo">
                </div>

                <br>
                <hr class="hr_division">
                <br><br>
                <form action="./basic_php_files/logout.php" method="POST" id="logout_form">
                    <input type="hidden" name="logout_n_url" value="Main_Page.php"/>
                </form>
                <div class="div_horizontal">
                    <button class="btn_login_modal" type="submit" form="logout_form">YES</button>
                    <button class="btn_login_modal" type="submit">NO</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        // 로그인
        const login_open = () => {
            document.querySelector("#id_login_modal").classList.remove("hidden");
        }
        const login_close = () => {
            document.querySelector("#id_login_modal").classList.add("hidden");
        }

        // 회원가입
        const register_open = () => {
            document.querySelector("#id_register_modal").classList.remove("hidden");
        }
        const register_close = () => {
            document.querySelector("#id_register_modal").classList.add("hidden");
        }

        // 정보수정
        const modify_open = () => {
            document.querySelector("#id_modify_modal").classList.remove("hidden");
        }
        const modify_close = () => {
            document.querySelector("#id_modify_modal").classList.add("hidden");
        }

        // 탈퇴
        const delete_open = () => {
            document.querySelector("#id_delete_modal").classList.remove("hidden");
        }
        const delete_close = () => {
            document.querySelector("#id_delete_modal").classList.add("hidden");
        }

        

        // 로그인 모달창 open OR close
        document.querySelector("#btn_login_id").addEventListener("click", login_open);
        document.querySelector("#id_login_close").addEventListener("click", login_close);
        document.querySelector("#id_login_bg").addEventListener("click", login_close);

        // 회원가입 모달창 open OR close
        document.querySelector("#btn_register_id").addEventListener("click", register_open);
        document.querySelector("#id_register_close").addEventListener("click", register_close);
        document.querySelector("#id_register_bg").addEventListener("click", register_close);

        // 정보수정 모달창 open OR close
        document.querySelector("#btn_modify_id").addEventListener("click", modify_open);
        document.querySelector("#id_modify_close").addEventListener("click", modify_close);
        document.querySelector("#id_modify_bg").addEventListener("click", modify_close);

        // 회원탈퇴 모달창 open OR close
        document.querySelector("#btn_delete_id").addEventListener("click", delete_open);
        document.querySelector("#id_delete_close").addEventListener("click", delete_close);
        document.querySelector("#id_delete_bg").addEventListener("click", delete_close);
        

    </script>

</body>
</html>