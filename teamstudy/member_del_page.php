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

         .box1 {

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
                            
							<h1 class="major">회원탈퇴
							</h1>
						</div>
					</section>
			</div>				
			<form method="POST" action="member_del.php" >
			<div class="check" style="text-align:center">
				<img src="images/title2.png" height="120px">
                <label style="margin-top:10px; font-size:20px; font-weight: bold;">회원 탈퇴 전 꼭 읽어주세요!</label>
                <p style="margin-top:-10px; font-size:15px; margin-bottom:30px;">PICKUP 스터디카페 회원 탈퇴를 하시면 회원 약관 및 개인정보 제공, 활용에 관한 약관 동의가 모두 철회되며 <p>
                <p style="margin-top:-45px; font-size:15px; margin-bottom:30px;">PICKUP 스터디카페 회원 서비스 및 웹사이트로부터 탈퇴됩니다. <p>
            <br>
                <button type="submit" style="background-color: #1a237e; color: white">탈퇴하기</button>
                <button type="button" onclick="page();" onClick="btn()">취소</button>&nbsp;
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