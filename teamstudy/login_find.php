<?php
session_start();
if (!isset($_SESSION['user_id'])) {
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

         .loginform input[type="text"],
				   input[type="password"]
				   {
					border: solid 1px #1a237e;
                    width: 300px;
				    height: 45px;
					font-size: 15px;
				   }
		.loginform label[type="text"]
				   {
					color: #1a237e;
				   }

        </style>

    <script>

        function login() {		
            location.href="login.php";    
        }  

		function index() {		
            location.href="index.php";    
        }  
    </script>
        
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
                            
							<h1 class="major">회원계정찾기</h1>
						</div>
					</section>
			</div>				
			<div class="check" style="text-align:center">
            <form method="post" action="login_find_id.php">
				<img src="images/find.png" height="130px">
				<label style="margin-top:10px; font-size:20px; font-weight: bold;">회원님의 정보를 잊어버리셨나요?</label><br>
                <label style="margin-top:10px; font-size:20px; font-weight: bold;">아이디 찾기</label>
                <div class="loginform" style="display: flex; justify-content: center;">
                      <p><input type="text" id="name" name="name" maxlength="20" placeholder="이름" style="margin-bottom: 10px;" autocomplete="off" required>
					  <input type="text" id="hp" name="hp" maxlength="20" placeholder="연락처" autocomplete="off" required></p>&emsp;
                      <button type="submit" id="btn_ok" style="background-color: #1a237e; color: white">찾기</button>
                      </div>
                      </form>

                <form method="post" action="login_find_pw.php">
                <label style="margin-top:10px; font-size:20px; font-weight: bold;">비밀번호 찾기</label>
                <div class="loginform" style="display: flex; justify-content: center;">
                      <p><input type="text" id="id" name="id" maxlength="20" placeholder="아이디" style="margin-bottom: -30px;" autocomplete="off"></p>&emsp;
                      <button type="submit" id="btn_ok" style="background-color: #1a237e; color: white">찾기</button>  
                    </div>
                    </form>        

            <br>
                <button type="button" id="btn_can" onClick="login()" style="background-color: white; color: #1a237e; margin-top:-40px;">로그인</button>
                <button type="button" id="btn_can" onClick="index()" style="background-color: white; color: #1a237e">홈으로</button><br>
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