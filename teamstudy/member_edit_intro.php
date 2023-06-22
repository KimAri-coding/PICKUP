<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit();
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
                location.href="mypage.php";    
            }  
        </script>

    <style>
         .check img {
                margin-left: 50px;
                margin-right: 50px;
                margin-top: 30px;
                text-align: center;
                }

         .check input[type="password"] {
				border: solid 1px #1a237e;
                
			    }         
         
         .check button {
            width: 100px;
				height: 45px;
				font-size: 15px;
				display: inline-flex;
				align-items:center; 
				justify-content: center;
         }

        </style>
    </head>
	<body class="is-preload">

		<!-- 헤더 -->
			<header id="header">
				<a href="index.php" class="title"><img src="images/title1.png" height=:auto></a>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="book_intro.php" target="_blank">예약하기</a></li>
						<li><a href="board.php" target="_blank">게시판</a></li>
						<li><a href="board.php">커뮤니티</a></li>
					</ul>
				</nav>
			</header>

		<!-- 아래 제목 -->
			<div id="wrapper">
				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
                            
							<h1 class="major">개인정보관리
							</h1>
						</div>
					</section>
			</div>				
			<div class="check" style="text-align:center">
            <form method="post" action="member_edit_check.php">
				<img src="images/mypage-lock.png" height="100px">
                <label style="margin-top:10px; font-size:20px; font-weight: bold;">회원정보를 관리하시려면 비밀번호를 입력하셔야 합니다.</label>
                <p style="margin-top:-20px; font-size:15px; margin-bottom:30px;">회원님의 개인정보 보호를 위한 본인 확인 절차이오니, 회원 로그인 시 사용하시는 비밀번호를 입력해주세요.<p>
            <div style="display: flex; justify-content: center;">
                <input type="password" id="pw" name="pw" maxlength="20" placeholder="비밀번호 입력" style="width: 500px; text-align: center;" required>
            </div>

            <!-- 비밀번호 일치하지 않을 때 보이는 메세지 -->
            <?php
                session_start();
                if (isset($_SESSION['error_message'])) {
                    $error_message = $_SESSION['error_message'];
                    echo '<label id="error-message" style="color: red; margin-top:10px; font-size:15px;">'.$error_message.'</label>';
                    unset($_SESSION['error_message']);
                } else {
                    echo '<label id="error-message" style="color: red; font-size:15px;"></label>';
                }
            ?>

            <br>
                <button type="submit" id="btn_ok" style="background-color: #1a237e; color: white">확인</button>
                <button type="button" id="btn_can" onClick="btn()" style="background-color: white; color: #1a237e">취소</button><br>
            </form>
            </div><br>
	<br>
	<br>

	<!-- Footer -->
	<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>
			
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