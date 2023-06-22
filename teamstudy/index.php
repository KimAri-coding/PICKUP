<?php
session_start();
$userId = $_SESSION['user_id'];


?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>PICKUP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		
	</head>
	<style>
		
		#main {
		background-image: url("images/intro.png");
		background-size: cover;
		background-position: center;
		}
	</style>
	<body class="is-preload">

		<!-- Sidebar -->
		<section id="sidebar">
				<img src="images/title1.png" height="110px">				
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">카페소개</a></li>
							<li><a href="#one">예약하기</a></li>
							<li><a href="#two">커뮤니티</a></li>
							<li><a href="#three">게시판</a></li>
							<li><a href="#four">오시는길</a></li>
						</ul>
					</nav>
					<div class="row">
						<ul class="actions stacked">
						  <li style="display: flex; justify-content: flex-end;">
						  <a id="mypage" href="check_role.php" class="button primary small" style="display: flex; align-items: center; justify-content: center; margin-right: 10px;">마이페이지</a>

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

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Intro -->
					<section id="main" class="wrapper style1 fullscreen fade-up" >
						<div class="inner">
							<h1> PICKUP AREA</h1>
							<p> 어서오세요 피크업 스터디카페입니다 </a></p>
							<ul class="actions">
								<li><a href="#intro" class="button scrolly">피크업 이용안내</a></li>
							</ul>
						</div>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style2 spotlights">
						<section>
					<!--	<a href="#" class="image"><img src="images/main1.png" alt="" data-position="center center" /></a> -->
							<div class="content">
								<div class="inner">
									<h2>예약하기</h2>
									<p>원하는공간 원하는시간 자유롭게 이용해보세요</p>
									<ul class="actions">
										<li><a href="book_intro.php" class="button">바로 예약하기</a></li>
									</ul>
								</div>
							</div>
						</section>
					</section>
					<section id="two" class="wrapper style4 spotlights">
						<section>
							<div class="content">
								<div class="inner">
									<h2>커뮤니티</h2>
									<p> 혼자 다인실을 사용하기 부담스럽다면 커뮤니티에서 함께해요</p>
									<ul class="actions">
										<li><a href="community.php" class="button">커뮤니티 바로가기</a></li>
									</ul>
								</div>
							</div>
						</section>
					</section>
					<section id="three" class="wrapper style5 spotlights">
						<section>
							<div class="content">
								<div class="inner">
									<h2>게시판</h2>
									<p> 피크업에 대한 문의사항을 자유롭게 남겨주세요!</p>
									<ul class="actions">
										<li><a href="board.php" class="button">게시판 바로가기</a></li>
									</ul>
								</div>
							</div>
						</section>
					</section>

				<!-- intro -->
					<section id="intro" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>피크업 이용안내</h2>
							<p>피크업 스터디카페는 이런 공간이에요</p>
							<div class="features">
								<section>
									<span class="icon solid major fa-code"></span>
									<h3>쾌적한 공간</h3>
									<p> 넓은 실내공간과 넉넉한 좌석 간격으로 편안한 스터디 환경을 제공합니다.  </p>
								</section>
								<section>
									<span class="icon solid major fa-lock"></span>
									<h3>청결한 환경</h3>
									<p>직원들이 항시 청결유지에 힘쓰며, 쾌적한 공간에서 스터디에 집중할 수 있도록 관리합니다.</p>
								</section>
								<section>
									<span class="icon solid major fa-cog"></span>
									<h3>초고속 인터넷</h3>
									<p>고속 Wi-Fi와 전용 콘센트를 제공하여 원활한 인터넷 연결과 기기 충전을 동시에 할 수 있습니다.</p>
								</section>
								<section>
									<span class="icon solid major fa-desktop"></span>
									<h3>다양한 시설과 편의</h3>
									<p>편리한 음료 서비스와 간식 코너를 통해 스터디 중에도 에너지를 보충할 수 있습니다.</p>
								</section>
								<section>
									<span class="icon solid major fa-link"></span>
									<h3>조용한 분위기</h3>
									<p>소음이 최소화된 환경에서 자신만의 공간을 마련하고, 몰입도 높은 스터디를 경험하세요.</p>
								</section>
								<section>
									<span class="icon major fa-gem"></span>
									<h3>편리한 예약 시스템</h3>
									<p>편리한 예약 시스템을 통해 원하는 시간대와 좌석을 미리 예약하고, 효율적으로 스케줄을 조절할 수 있습니다.</p>
								</section>
							</div>
						</div>
					</section>

				<!-- four -->
					<section id="four" class="wrapper style1 fade-up">
						<div class="inner">
							<h2>피크업 스터디카페 오시는길</h2>
							<p>인근 버스정류장, 지하철 평균 도보 10분거리 전용 주차장 완비</p>
							<div class="split style1">
								<section class="map">
								<a href="https://map.kakao.com/?urlX=584757&urlY=792164&urlLevel=3&map_type=TYPE_MAP&map_hybrid=false" target="_blank"><img width="600" height="400" src="https://map2.daum.net/map/mapservice?FORMAT=PNG&SCALE=2.5&MX=584757&MY=792164&S=0&IW=504&IH=310&LANG=0&COORDSTM=WCONGNAMUL&logo=kakao_logo" style="border:1px solid #ccc"></a><div class="hide" style="overflow:hidden;padding:7px 11px;border:1px solid #dfdfdf;border-color:rgba(0,0,0,.1);border-radius:0 0 2px 2px;background-color:#f9f9f9;width:482px;"><strong style="float: left;"><img src="//t1.daumcdn.net/localimg/localimages/07/2018/pc/common/logo_kakaomap.png" width="72" height="16" alt="카카오맵"></strong><div style="float: right;position:relative"><a style="font-size:12px;text-decoration:none;float:left;height:15px;padding-top:1px;line-height:15px;color:#000" target="_blank" href="https://map.kakao.com/?urlX=584757&urlY=792164&urlLevel=3&map_type=TYPE_MAP&map_hybrid=false">지도 크게 보기</a></div></div>
								</section>
								<section>
									<ul class="contact">
										<li>
											<h3>Address</h3>
											<span>대전 서구 대덕대로 182 오라클빌딩 3층, (둔산동 1160)<br />
											</span>
										</li>
										<li>
											<h3>Traffic</h3>
											<a >시청역 도보 10분, 은하수네거리 정류장에서 100m</a>
										</li>
										<li>
											<h3>Call</h3>
											<span>042-476-2111</span>
										</li>
										<li>
											<h3>Social</h3>
											<ul class="icons">
												<li><a href="https://www.facebook.com/greenartofficial/" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
												<li><a href="https://www.youtube.com/channel/UCSInYflXkRs4hWAb4s6qpfA" class="icon brands fa-youtube"><span class="label">GitHub</span></a></li>
												<li><a href="https://www.instagram.com/greenart_official/" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="daejeon.greenart.co.kr" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
											</ul>
										</li>
									</ul>
								</section>
							</div>
						</div>
					</section>
				</div>

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