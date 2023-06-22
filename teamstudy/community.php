<?php
    session_start();

    // 세션에서 로그인한 사용자의 ID 값을 가져옴
    $userId = $_SESSION['user_id'];

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

	<style>
	
	.community_container {
		display: flex;
		flex-direction: column;
		align-items: center; /* 세로 방향 가운데 정렬 */
		text-align: center; /* 가로 방향 가운데 정렬 */
		margin: 0 auto; /* 가운데 정렬을 위한 가로 마진 설정 */
	}

	.img_container {
		display: flex;
		justify-content: center; /* 이미지들을 가운데 정렬 */
		align-items: center; /* 세로 방향 가운데 정렬 */
		text-align: center; /* 가로 방향 가운데 정렬 */
		margin: 0 auto; /* 가운데 정렬을 위한 가로 마진 설정 */
		max-width: 800px; /* 이미지 컨테이너의 최대 너비 설정 */
	}

	.img_container img {
		width: 350px; /* 이미지의 너비 설정 */
		height: auto; /* 이미지의 높이는 자동으로 조정됨 */
		margin: 0 10px; /* 이미지 사이에 원하는 간격 설정 */
	}

	.gallery-wrapper {
		max-width: 1100px; /* 원하는 최대 너비 설정 */
		margin: 0 auto; /* 가운데 정렬을 위해 왼쪽/오른쪽 여백을 auto로 설정 */
	}

	.gallery-container {
		display: grid;
		grid-template-columns: repeat(3, minmax(250px, 1fr)); /* 한 줄에 3개의 아이템을 보이도록 설정 */
		grid-gap: 40px;
		justify-content: center; /* 가로 가운데 정렬 */
		align-content: center; /* 세로 가운데 정렬 */
	}

	.gallery-item {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 300px;
		background-color: white;
		border-radius: 5px;
		padding: 20px;
		border:solid 2px #3e4094;
		/* 아이템의 스타일을 추가로 설정 */
	}
	.gallery-item label{
		font-size: 13px;
	}
	.gallery-item [type=button]{
		width: 100px;
		height: 30px;
		font-size: 10px;
		text-align: center;
		line-height: 30px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.button-margin {
		margin-top: 10px; /* 원하는 여백 크기로 조정 */
	}
	
	.major {
		margin: 0 0 1.3em 0;
		position: relative;
		padding-bottom: 0.35em;
	}

	/* 상세페이지 제목 아래 그라데이션 구분선 색상 */
	.major:after {
		background-image: -moz-linear-gradient(to right, #ab64f6, #61dbf7);
		background-image: -webkit-linear-gradient(to right, #ab64f6, #61dbf7);
		background-image: -ms-linear-gradient(to right, #ab64f6, #61dbf7);
		background-image: linear-gradient(to right, #ab64f6, #61dbf7);
		-moz-transition: max-width 0.2s ease;
		-webkit-transition: max-width 0.2s ease;
		-ms-transition: max-width 0.2s ease;
		transition: max-width 0.2s ease;
		border-radius: 0.2em;
		bottom: -100px;
		content: "";
		height: 0.05em;
		position: absolute;
		right: 0;
		width: 100%;
	}

	/* 현재시간을 기준으로 이미 지난 커뮤니티방 비활성화 */
	.expired {
        background-color: #f2f2f2;
        pointer-events: none;
    }
	/* 라벨 비활성화 */
	.expired label {
        color: #888888;
    }
	/* 남은 인원수가 1일 경우 빨간색으로 임박표시 */
    .low-count {
        color: red;
    }
	

	</style>
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
							<div class="major">
								<div class="community_container">
									<h2>PICKUP_COMMUNITY</h2>
									<h5>함께 공부하고 소통하는 공간</h5>
								</div>
								<br><br>
							<div class="img_container">
								<img src="images/together1.png" alt="" data-position="center center"/>
								<img src="images/together2.png" alt="" data-position="center center"/>
								<img src="images/together3.png" alt="" data-position="center center"/>
								<img src="images/together4.png" alt="" data-position="center center"/>
							</div>
						</div>
						</div>
					</section>
			</div>

			<br><br><br>

			<form id="communityForm" action="community_result.php" method="post">
				<div class="gallery-wrapper">
					<div class="gallery-container">
						<?php
						// 데이터베이스 연결
						    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
						mysqli_query($con,'SET NAMES utf8');	

						if ($con->connect_error) {
							die("데이터베이스 연결에 실패했습니다: " . $con->connect_error);
						}

						// 데이터베이스 쿼리 실행
						$sql = "SELECT * FROM together";
						$result = $con->query($sql);
						if ($result->num_rows > 0) {
							// 가져온 값들을 반복하여 아이템으로 표시
							while ($row = $result->fetch_assoc()) {
								$id = $row['id'];
								$title = $row['title'];
								$date = $row['date'];
								$st_time = $row['st_time'];
								$end_time = $row['end_time'];
								$hour = $row['hour'];
								$seat = $row['seat'];
								$price = $row['price'];
								$count = $row['count'];
								?>
								<div class="gallery-item">
									<label><?php echo $id; ?>님의 <?php echo $title; ?></label>
									<label id="date">예약날짜: <?php echo $date; ?></label>
									<label id="time">입실-퇴실: <?php echo $st_time; ?> - <?php echo $end_time; ?></label> 
									<label id="hour"><?php echo $hour; ?>시간</label>
									<label id="seat"><?php echo $seat; ?></label>	
									<label id="count">남은 인원수: <?php echo $count; ?></label>
									<input type="button" value="참여하기" class="button-margin" onclick="joinCommunity()">
								
									<!-- POST로 넘기기 위한 히든 로직 -->
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="hidden" name="date" value="<?php echo $date; ?>">
									<input type="hidden" name="startTime" value="<?php echo $st_time; ?>">
									<input type="hidden" name="endTime" value="<?php echo $end_time; ?>">
									<input type="hidden" name="seat" value="<?php echo $seat; ?>">
									<input type="hidden" name="price" value="<?php echo $price; ?>">
									<input type="hidden" name="hour" value="<?php echo $hour; ?>">
									<input type="hidden" name="title" value="<?php echo $title; ?>">
								</div>
							<?php } ?>
						<?php } else {
							echo "데이터베이스에서 가져온 값이 없습니다.";
						}

						$con->close();
						?>
						<!-- 추가 아이템들을 반복하여 표시 -->
					</div>
				</div>
			</form>
	<br>

	<script>

		//웹페이지가 로드되고 폼값들이 불러와졌을 때 적용할 함수 (비활성화나 남은인원수 임박일 때)
		window.onload = function() {
			// ...

			var galleryItems = document.getElementsByClassName("gallery-item");

			for (var i = 0; i < galleryItems.length; i++) {
				var itemContainer = galleryItems[i];
				var countLabel = itemContainer.querySelector("#count");
				var count = parseInt(countLabel.textContent.split(": ")[1]);

				if (count === 1) {
                	countLabel.classList.add("low-count");
            	}

				// ...

				var currentDate = new Date();
				var dateLabel = itemContainer.querySelector("#date");
				var timeLabel = itemContainer.querySelector("#time");
				var date = dateLabel.textContent.split(": ")[1];
				var startTime = timeLabel.textContent.split(": ")[1].split(" - ")[0];
				var endTime = timeLabel.textContent.split(": ")[1].split(" - ")[1];

				var reserveDate = new Date(date + " " + startTime);
				var expired = reserveDate < currentDate || count === 0;

				// ...

				if (expired) {
					itemContainer.classList.add("expired");
					var joinButton = itemContainer.querySelector("input[type='button']");
					joinButton.disabled = true;
					var labels = itemContainer.querySelectorAll("label");
					for (var j = 0; j < labels.length; j++) {
						labels[j].classList.add("expired");
					}
				}
			}
		}

		//참여하기 버튼 눌렀을 때 로그인 여부 체크 함수
		function joinCommunity() {
			// 세션에서 로그인한 사용자의 ID 값을 가져옴
			var userId = "<?php echo $userId; ?>";

			if (userId === "") {
				// 로그인되지 않은 상태이므로 로그인 페이지로 이동
				alert("로그인이 필요한 서비스입니다");
				return;
			} 
			else 
			{
				// 로그인된 상태이므로 예약 정보와 함께 community_result.php로 전송
				var form = document.createElement("form");
				form.setAttribute("method", "post");
				form.setAttribute("action", "community_result.php");

				var inputId = document.createElement("input");
				inputId.setAttribute("type", "hidden");
				inputId.setAttribute("name", "user_id");
				inputId.setAttribute("value", userId);
				form.appendChild(inputId);

				var itemContainer = event.target.closest(".gallery-item");
				var inputs = itemContainer.getElementsByTagName("input");
				for (var i = 0; i < inputs.length; i++) {
					var input = inputs[i].cloneNode(true);
					form.appendChild(input);
				}

				document.body.appendChild(form);
				form.submit();
			}
		}

	</script>

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