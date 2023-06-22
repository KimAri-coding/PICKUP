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

        
		<script type="text/javascript">
            function page() {		
                location.href="mypage.php";    
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
                            
							<h1 class="major">개인정보관리
							</h1>
						</div>
					</section>
			</div>				
			<div class="check" style="text-align:center">
				<img src="images/checked.png" height="100px">
                <label style="margin-top:10px; font-size:20px; font-weight: bold;">회원님의 정보가 수정되었습니다.</label>
                <p style="margin-top:-20px; font-size:15px; margin-bottom:30px;">잠시 후 마이페이지 메인으로 이동합니다. [바로가기]버튼을 클릭하시면 바로 이동됩니다.<p>
            <br>
                <button type="button" id="btn_ok" onclick="page();" style="background-color: #1a237e; color: white">바로가기</button>
            </div><br>
            <!-- 3초 뒤 페이지 자동이동 -->
            <meta http-equiv="refresh" content="3;url=mypage.php"> 
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