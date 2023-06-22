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
            max-width: 700px; /* 원하는 최대 너비 설정 */
            max-height: 400px; /* 원하는 최대 높이 설정 */
        }

        .content label [type="text"]
				   {
					color: #1a237e;
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
                location.href="index.php";    
            }  
        </script>
    
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
							<img src="images/thankyou.jpg" alt="" class="image" />
							<p><label><br>회원탈퇴가 완료되었습니다.
                            <br>그동안 PICKUP 스터디카페를 이용해 주셔서 감사합니다.</label></p>
						</div>
					</section>
                    <button type="button" id="btn_ok" onclick="page();" style="background-color: #1a237e; color: white">홈으로</button>
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