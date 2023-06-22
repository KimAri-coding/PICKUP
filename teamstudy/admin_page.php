<?php
session_start();
if (!isset($_COOKIE['LoginUser'])) {
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Generic - Hyperspace by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

        <script type="text/javascript">
            function btn() {		
                location.href="book_intro.php";    
            }  
        </script>


        <style>
            .mypage-sidebar {
                padding: 2.5em 2.5em 0.5em 2.5em;
                background: #1a237e;
                cursor: default;
                height: 100vh;
                left: 0;
                overflow-x: hidden;
                overflow-y: hidden;
                position: fixed;
                text-align: right;
                top: 0;
                width: 18em;
                z-index: 10000;
                }

                .box1{
                    background-color: #EBF7FF;
                    width: 580px;
                    height: 250px;
                    margin-left: 715px;
                }

                .box1 p{
                    font-weight: bold;
                    font-size: 23px;
                    margin-left: 200px;
                    margin-top: -80px;
                }

                .box1 img {
                margin-left: 50px;
                margin-right: 50px;
                margin-top: 30px;
                }

                .box2 p{
                    font-weight: bold;
                    font-size: 18px;
                    margin-top: -50px;
                    color: #8C8C8C;
                    margin-left: 200px;
                }

                .box3 img{
                    margin: 10px;
                    text-align:center;
                }


                .box4 {
                   margin-top: -124px;
                   margin-left: -159px;
                }

                .box4 p{
                    color: #1a237e;
                    margin-top: -45px;
                    font-weight: normal;
                }

                .box4 a{
                    color: red;
                    margin-top: -45px;
                    font-weight: normal;
                }

                .box2 button {
                width: 100px;
				height: 45px;
				font-size: 15px;
				display: inline-flex;
				align-items:center; 
				justify-content: center;
                color: #1a237e;
                margin-left: 420px;
         }

        </style>
	</head>

<!-- Sidebar -->
    <section id="sidebar">
        <img src="images/title1.png" height="110px">		
      
        <div class="inner">
            <nav>
                <ul>
                    <li><a href="admin_memberlist.php">회원목록</a></li>
                    <li><a href="#one">MY 예약내역</a></li>
                    <li><a href="my_board.php">내가 쓴 글</a></li>
                    <li><a href="#three">이용약관 확인</a></li>
                    <li><a href="member_del_intro.php">탈퇴하기</a></li>
                </ul>
            </nav>
            <div class="row">
                <ul class="actions stacked">
                    <li style="display: flex; justify-content: flex-end;">
                        <a id="index" href="index.php" class="button primary small" style="display: flex; align-items: center; justify-content: center; margin-right: 10px;">홈으로</a>
                        
                        <?php
          if($_SESSION['login_check']==true)
          {
          ?>				
               <a id="mainlogin" class="button primary small" href="logout.php" style="text-align: center;">로그아웃</a>
          <?php                 
          }else
          {
          ?>
                <a id="mainlogin" class="button primary small" href="login.php" style="text-align: center;">로그인</a>
          <?php                 
          }
          ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </section>



		<!-- 아래 제목 -->
			<div id="wrapper">
				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">관리자페이지</h1>
						</div>
					</section>
			</div>			

            <div class="box1">
          <img src="images/profile.png" height="100px">
          <?php
                    if (isset($_SESSION['login_check']) && $_SESSION['login_check'] === "true") {
                        echo "<p>{$_SESSION['user_name']}님, 환영합니다!</p>";
                    } else {
                        // 로그인되지 않은 경우에 대한 처리
                        if (isset($_COOKIE['LoginUser']) && isset($_POST['auto_login'])) {
                            // 자동 로그인 체크박스가 체크되어 있을 때 쿠키는 있지만 세션은 만료된 경우
                            echo "<a>{$_COOKIE['LoginUser']}님, 환영합니다!</a>";
                            $_SESSION['login_check'] = "true"; // 세션 재설정
                        } else {
                            // 로그인이 필요한 경우
                            header("Location: login.php");
                            exit; 
                        }
                    }
                    ?>

        <div class="box2">
            <?php
                     if (isset($_SESSION['user_id'])) {
                        echo "<p>{$_SESSION['user_id']}</p>";
                    }
                ?>	

               <button type="button" onClick="btn()">예약하기</button><br>

                <div class="box3" style="margin-left:600px; margin-top:-220px;">
				<a href="mypage.php">
					<img src="images/use.png" height="250px">
				</a>
                </div>
                <div class="box4">
                <p style= "font-size:19px" display: inline-block;>회원님의 등급은 <a>일반</a> 입니다.</p>
                <p style= "font-size:17px">피크업의 다양한 예약서비스를 이용하시고</p>
                <p style= "font-size:17px">VIP 혜택을 받아보세요.</p></div>
            </form>
                </div>
        </div>
			<div class="box3" style="margin-left:420px; text-align:center;">
				<a href="member_edit_intro.php" name="mydata">
					<img src="images/edit.png" height="250px">
				</a>
				<a href="member_del_intro.php">
				<img src="images/booking.png" height="250px">
				</a>
            
                <a href="my_board.php">
					<img src="images/write.png" height="250px">
				</a>
			</div>
	    <br>
	<br>
			
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>