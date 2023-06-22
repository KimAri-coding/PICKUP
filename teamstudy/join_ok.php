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
	
        <style>
        .image {
            max-width: 500px; /* 원하는 최대 너비 설정 */
            max-height: 200px; /* 원하는 최대 높이 설정 */
        }

        .content label [type="text"]
				   {
					color: #1a237e;
				   }
        </style>
    
    </head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a href="index.php" class="title"><img src="images/title1.png" height=:auto></a>
				<nav>
					<ul>
						<li><a href="index.php" onclick="closeCurrentPage()" >Home</a></li>
						<li><a href="book_intro.php" onclick="closeCurrentPage()" target="_blank">예약하기</a></li>
						<li><a href="board.php" onclick="closeCurrentPage()" target="_blank">게시판</a></li>
						<li><a href="mypage.php"onclick="closeCurrentPage()">커뮤니티</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper" style="text-align : center;">
            <br><br><br><br>
				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="content">
							<img src="images/welcome2.png" alt="" class="image" />
							<p><label><br>회원가입이 완료되었습니다.
                            <br>로그인 후 피크업 스터디카페의 서비스를 이용해보세요.</label></p>
						</div>
					</section>
                    <input id="btn" type="button" value="로그인" onclick="location.href = 'login.php';">
                    <input id="btn" type="button" value="홈으로" onclick="location.href = 'index.php';">
                    <br><br><br><br>
                </div>

		<!-- Footer -->
			<footer id="footer" class="wrapper alt">
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