<?php
    session_start();

    // 로그인 여부 확인
    if (!isset($_SESSION['user_id'])) {
        // 로그인하지 않은 경우, 이용 제한 메시지를 표시하고 페이지를 이동시킴
        echo "<script>alert('서비스를 이용하기 위해서는 로그인이 필요합니다.');</script>";
        echo "<script>location.href='./login.php';</script>";
        exit; // 이후 코드 실행을 중단하고 스크립트를 종료함
    }

    // 로그인한 사용자의 ID 값을 가져옴
    $userId = $_SESSION['user_id'];

    // 이후 book.php로 이동하거나 다른 작업을 수행할 수 있음
    // ...
?>

<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Generic - Hyperspace by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
							<h1 class="major">룸 선택하기</h1>
						</div>
					</section>
			</div>				
			<div class="age-selection">
				<a href="book.php">
					<img src="images/book1.png" height="400px">
				</a>
				<a href="books.php">
				<img src="images/book2.png" height="400px">
				</a>
			</div>
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