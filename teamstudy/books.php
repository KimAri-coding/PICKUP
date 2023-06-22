<?php
    session_start();

    // 세션에서 로그인한 사용자의 ID 값을 가져옴
    $userId = $_SESSION['user_id'];

    // 이후 예약 정보와 함께 book_result.php로 전달할 수 있음
?>

<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<title>pickup studycafe bookpage</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- 기존의 main.css 로드 -->
	<link rel="stylesheet" href="assets/css/main.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!--  팝오버 이벤트 및 내용 설정 -->
	<script>
	jQuery(document).ready(function(){
		jQuery('[data-toggle="popover"]').popover();   
	});
	</script>

		<style>
			/* 예약정보 입력 폼 */
			.reservation-form-container {
				width: 450px;
				height: auto;
				background: linear-gradient(to bottom right, #f3e5f5, #b2ebf2); 
				padding: 10px;
				margin-left: 20px;
				border: 1px solid #1a237e;
				
			}

			.reservation-form-container h4 {
				margin-top: 0;
			}

			.reservation-form-container label {
				display: block;
				margin-bottom: 5px;
			}

			.reservation-form-container input[type="text"],
			.reservation-form-container input[type="date"],
			.reservation-form-container button {
				width: 100%;
				padding: 5px;
				margin-bottom: 10px;
				display: inline-block;
				margin-right: 5px;
			}

			.timecontainer label {
				display: inline-block;
				vertical-align: top;
			}

			.timecontainer select {
				display: inline-block;
			}
			
			h5 {
				margin-top: 35px;
				text-align: center;
				font-size: 0.8em;	
			}
			h6 {
				margin-top: 35px;
				text-align: right;
				font-size: 0.8em;	
			}

			input {
				border: solid 1px #1a237e;
				
			}

			select {
				border: solid 1px #1a237e;
				height: 2.3em;
			}

			#imgquestion {
				margin-right: 200px;
			}
			/* 함께해요 스위치 */
			.switch {
			position: relative;
			display: inline-block;
			width: 60px;
			height: 34px;
			}

			.switch input {
			opacity: 0;
			width: 0;
			height: 0;
			}

			.slider {
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ccc;
			-webkit-transition: .4s;
			transition: .4s;
			}

			.slider:before {
			position: absolute;
			content: "";
			height: 26px;
			width: 26px;
			left: 4px;
			bottom: 4px;
			background-color: white;
			-webkit-transition: .4s;
			transition: .4s;
			}

			/* 슬라이더 체크했을 때 색상 */
			input:checked + .slider {
			background-color: #3e4094;
			}

			/* 슬라이더 체크 안 했을 때 색상 */
			input:focus + .slider {
			box-shadow: 0 0 1px #2196F3;
			}

			input:checked + .slider:before {
			-webkit-transform: translateX(26px);
			-ms-transform: translateX(26px);
			transform: translateX(26px);
			}

			.slider.round {
			border-radius: 34px;
			}

			.slider.round:before {
			border-radius: 50%;
			}
		</style>

	</head>
	<body class="is-preload">

		<!-- 헤더 -->
			<header id="header">
				<a href="index.php" class="title"><img src="images/title1.png" height=:auto></a>
				<nav>
					<ul>
					<li>
					<li><a href="index.php" onclick="closeCurrentPage()" >Home</a></li>
						<li><a href="book_intro.php" onclick="closeCurrentPage()" target="_blank">예약하기</a></li>
						<li><a href="board.php" onclick="closeCurrentPage()" target="_blank">게시판</a></li>
						<li><a href="mypage.php"onclick="closeCurrentPage()">커뮤니티</a></li>
					</ul>
				</nav>
			</header>

		<!-- 아래 제목 -->
			<div id="wrapper">
				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">회의실 예약하기</h1>
							
							<h2> ▶ 좌석배치도</h2>
		<br>

	<!-- 좌석 배치도 항목 생성 및 배치 -->
	
	<div class="book-text-container">
		<p onclick="changeSeatMap('Share4')"> ■ Share4</p>
		<p onclick="changeSeatMap('Share6')"> ■ Share6</p>
		<p onclick="changeSeatMap('Share8')"> ■ Share8</p>
	</div>
	<br>
	<div class="bookcontainer">
		<div id="seatMap" class="seat-map">
			<!-- 좌석 배치를 동적으로 생성 -->
			<img id="seatImage" src="./images/share4.png" data-toggle="popover" alt="Seat Map" height = "500px" style="margin-left: 50px"> <!-- 좌석 이미지를 표시할 이미지 요소 -->
			<img id="imginfo" src="./images/booksinfo.png" alt="" height = "300px" style="margin-top: 20px">
		</div>
		
	<form id= "bookForm" action="books_result.php" method="post">
		<div class="reservation-form-container">
	
		<!-- 예약 정보 입력 폼 -->
		<h4>▶ 예약 정보 입력하기</h4>
		<h4><label for="date"> ■ 날짜</label>
			<input type="date" id="date" name="date" required /></h4>
			<h4><label for="time">■ 이용시간선택</label></h4>
			<div class="timecontainer">
				<label for="time">  입실시간</label>
				<select id="startTime" name="startTime" style="width: 300px;" required>
				<option value="입실시간선택" >입실시간선택</option>
				<option value="09:00" >09:00</option>
				<option value="10:00" >10:00</option>
				<option value="11:00" >11:00</option>
				<option value="12:00" >12:00</option>
				<option value="13:00" >13:00</option>
				<option value="14:00" >14:00</option>
				<option value="15:00" >15:00</option>
				<option value="16:00" >16:00</option>
				<option value="17:00" >17:00</option>
				<option value="18:00" >18:00</option>
				<option value="19:00" >19:00</option>
				<option value="20:00" >20:00</option>
				<option value="21:00" >21:00</option>
				<option value="22:00" >22:00</option>
			</select>
		   </div>
		   <div class="timecontainer">
		   	<label for="time"> 퇴실시간</label>
			    <select id="endTime" name="endTime" style="width: 300px;" required>
				<option value="퇴실시간선택" >퇴실시간선택</option>
				<option value="09:00" >09:00</option>
				<option value="10:00" >10:00</option>
				<option value="11:00" >11:00</option>
				<option value="12:00" >12:00</option>
				<option value="13:00" >13:00</option>
				<option value="14:00" >14:00</option>
				<option value="15:00" >15:00</option>
				<option value="16:00" >16:00</option>
				<option value="17:00" >17:00</option>
				<option value="18:00" >18:00</option>
				<option value="19:00" >19:00</option>
				<option value="20:00" >20:00</option>
				<option value="21:00" >21:00</option>
				<option value="22:00" >22:00</option>
			</select>
		   </div>
		   <div class="timecontainer"> 
			<label for="seatNumber">■ 룸선택</label>
			<select id="seat" name="seat" style="width: 300px;" required>
				<option value="룸선택" >룸선택</option>	
				<option value="Share4" >Share4(4인)</option>
				<option value="Share6" >Share6(6인)</option>
				<option value="Share8" >Share8(8인)</option>
			</select>
			<input type="hidden" id="hourInput" name="hour" />
  			<input type="hidden" id="priceInput" name="price" />
			<input type="hidden" id="countInput" name="count" />
			</div>
			<div class="timecontainer">
			<label for="text">■ 함께해요</label>
			<div class = "popover-trigger"  data-toggle="popover"  data-placement="bottom" title="PICKUP_커뮤니티" 
			data-content="회의실을 다른 사람과 같이 쓰며 모임을 가질 수 있는 서비스입니다.   혹은 커뮤니티에 들어가 다른 사람이 만든 모임에 참여해보세요!">
			<img id="imgquestion" src="./images/question.png" alt="" height = "35px">	
			</div>
			<label class="switch">
				<input type="checkbox" id="btnWith" onclick="toggleTitleInput()">
				<span class="slider round"></span>
			</label>
			</div>
			<label for="bookstitle" id="titleInputLabel" style="display: none;">■ 커뮤니티 방 이름</label>
			<input type="text" id="bookstitle" name="bookstitle" style="width: 400px; display: none; border: solid 1px #1a237e; height: 2.3em;" />
		   <h4><label for="text" >예약정보: </label></h4>
		   <h5><label for="text" id="reservationInfoLabel">날짜 / 시간 / 좌석 / 가격</label></h5>
		   <br>
		    <!-- 로그인한 유저 아이디를 가져온 hidden input -->
			<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
			<div class = "bookbutton-group">
			<input type="button" name = "book" value = "예약하기" onclick="submitForm()"/>
			<input type="reset" name = "reset"/>
			</div>
			
		</div>
	</div>
	</form>
	
	<script> 

	// 예약된 좌석
	const reservedSeats = [];

	// 초기 페이지 로드 시 좌석 배치 초기 설정
	changeSeatMap("Share4");

	// 이미지에 마우스를 올렸을 때 팝오버 호출
	$(document).ready(function() {
		$('#seatImage').mouseenter(function() {
			showSeatPopover();
		});

		// 팝오버에서 마우스가 벗어났을 때 팝오버 숨김
		$('#seatImage').mouseleave(function() {
			$(this).popover('hide');
		});
	});

	// 팝오버 예약 가능한 내용 구하는 함수
	function showSeatPopover() {
		$(this).popover('show');

		const date = document.getElementById("date").value;
		const startTime = "09:00";
		const endTime = "21:00";
		const seatimage = document.getElementById("seatImage");

		if (date == "") {
			$('#seatImage').attr("data-toggle", "popover");
			$('#seatImage').attr("data-original-title", "예약 날짜를 선택하세요");
			$('#seatImage').attr("data-content", "예약 가능한 시간을 확인하세요");
		} else {
			const seatimageSrc = seatimage.getAttribute('src');
			const imageName = seatimageSrc.replace('./images/', '').replace('.png', '');

			let seatType;

			if (imageName.toLowerCase() === 'share4') {
			seatType = 'Share4';
			} else if (imageName.toLowerCase() === 'share6') {
			seatType = 'Share6';
			} else if (imageName.toLowerCase() === 'share8') {
			seatType = 'Share8';
			} else {
			seatType = 'Unknown';
			}

			loadBookingInfo(date, startTime, endTime, seatType, function(bookingInfo, availableTimes) {
			$('#seatImage').attr("data-toggle", "popover");
			$('#seatImage').attr("data-original-title", date + " _예약가능한 시간");
			$('#seatImage').attr("data-content", availableTimes);
			});
		}
	}

	// 예약날짜 선택시 date 값을 가지고 팝오버 내용을 업데이트할 예약정보 불러오기
	function loadBookingInfo(date, startTime, endTime, seatType, callback) {
		const url = 'books_load.php';

		const xhr = new XMLHttpRequest();
		xhr.open('GET', `${url}?date=${date}`, true);

		xhr.onload = function() {
		if (xhr.status === 200) {
			const bookingInfo = JSON.parse(xhr.responseText);
			const seatimage = document.getElementById("seatImage"); // seatimage 요소 가져오기
			const availableTimes = generateAvailableTimes(startTime, endTime, bookingInfo, seatType);
			callback(bookingInfo, availableTimes);
		} else {s
			console.error('AJAX request failed.');
		}
		};

		xhr.send();
	}

	// 팝오버 예약 가능한 내용 구하는 함수
	function generateAvailableTimes(startTime, endTime, bookingInfo, seatType) {

		let availableTimes = "";

		if (!bookingInfo) {
			// bookingInfo 값이 없는 경우 09:00부터 22:00까지의 내용이 전부 보여집니다.
			for (let hour = Number(startTime.slice(0, 2)); hour <= Number(endTime.slice(0, 2)); hour++) {
				const time = `${hour.toString().padStart(2, "0")}:00`;
				availableTimes += time + "\n";
			}
		} else {
			const bookedSeats = Object.keys(bookingInfo);

			if (bookedSeats.includes(seatType)) {
				// seatDiv와 bookedSeats 값이 일치하는 경우 해당 좌석의 중복된 시간대를 제외합니다.
				const bookings = bookingInfo[seatType];

				// 중복된 시간대를 저장할 Set을 생성합니다.
				const overlappingTimes = new Set();

				// 예약된 시간대를 확인하면서 중복된 시간대를 찾습니다.
				for (const booking of bookings) {
					const startTimeHour = Number(booking.st_time.slice(0, 2));
					const endTimeHour = Number(booking.end_time.slice(0, 2));

					for (let hour = startTimeHour; hour < endTimeHour; hour++) {
						const time = `${hour.toString().padStart(2, "0")}:00`;
						overlappingTimes.add(time);
					}
				}

				const startTimeHour = Number(startTime.slice(0, 2));
				const endTimeHour = Number(endTime.slice(0, 2));

				for (let hour = startTimeHour; hour <= endTimeHour; hour++) {
					const time = `${hour.toString().padStart(2, "0")}:00`;

					if (!overlappingTimes.has(time)) {
						availableTimes += time + "\n";
					}
				}
			} else {
				// seatDiv와 bookedSeats 값이 일치하지 않는 경우 09:00부터 22:00까지의 내용이 전부 보여집니다.
				for (let hour = Number(startTime.slice(0, 2)); hour <= Number(endTime.slice(0, 2)); hour++) {
					const time = `${hour.toString().padStart(2, "0")}:00`;
					availableTimes += time + "\n";
				}
			}
		}

		return availableTimes;
	}


  	/* 선택한 항목에 따라 좌석 배치도 변경 */
	function changeSeatMap(selectedRoom) {
	var imageElement  = document.getElementById("seatImage"); // 이미지를 표시할 컨테이너 요소 선택
    var imagePath = ""; // 선택된 항목에 따라 이미지 경로 설정
	let imgcheck = "";
    // 선택된 항목에 따라 이미지 경로 설정
    if (selectedRoom === "Share4") {
      imagePath = "./images/share4.png";
    } else if (selectedRoom === "Share6") {
      imagePath = "./images/share6.png";
    } else if (selectedRoom === "Share8") {
      imagePath = "./images/share8.png";
    }
		// 이미지 요소에 이미지 경로 설정
		imageElement.src = imagePath;

	}

	let btnCheck = false; // 함께해요 체크변수
	/* 토글버튼 이벤트 처리 */
	function toggleTitleInput() {
		var titleInput = document.getElementById("bookstitle");
		var btnWith = document.getElementById("btnWith");
		var titleInputLabel = document.getElementById("titleInputLabel");
		
		if (btnWith.checked) {
			btnCheck = true;
			titleInput.style.display = "block";
			titleInput.setAttribute("required", "required");
			titleInputLabel.style.display = "block";
		} else {
			btnCheck = false;
			titleInput.style.display = "none";
			titleInput.removeAttribute("required");
			titleInputLabel.style.display = "none";
		}
	}

	// 예약하기 버튼 클릭 이벤트 처리 (공백체크, 0원일 때 제어)
	function submitForm() {
	var btnWith = document.getElementById("btnWith");
	var bookstitle = document.getElementById("bookstitle").value;
	var date = document.getElementById("date").value;
	var startTime = document.getElementById("startTime").value;
	var endTime = document.getElementById("endTime").value;
	var seat = document.getElementById("seat").value;
	var price = document.getElementById("priceInput").textContent;

	if (btnWith.checked && btnCheck) {
		// 함께해요 체크되어 있고 btnCheck가 true인 경우
		if(bookstitle == ""){ alert('커뮤니티방 이름을 입력해주세요'); return; }
		if(date == ""){ alert('예약날짜를 선택해주세요'); return; }
		if(startTime == "입실시간선택"){ alert('입실시간을 선택해주세요'); return; }
		if(endTime == "퇴실시간선택"){ alert('퇴실시간을 선택해주세요'); return; }
		if(seat == "룸선택"){ alert('예약할 방을 선택해주세요'); return; }
		if(price == "0"){ alert('가격이 0원입니다! 퇴실시간을 확인해주세요'); return; }

		// 중복 예약 확인을 위해 AJAX 요청을 보냅니다.
		var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState === XMLHttpRequest.DONE) {
				if (xhr.status === 200) {
					var response = JSON.parse(xhr.responseText);
					if (response.allowBooking) {
					// 중복 예약이 아닌 경우 예약을 진행합니다.
					document.getElementById("bookForm").action = "together_result.php";
					document.getElementById("bookForm").submit();
					} else {
					// 중복 예약인 경우 경고 메시지를 표시합니다.
					alert('중복된 예약이 존재합니다. 다른 시간대를 선택해주세요.');
					}
				} else {
					// 요청 실패 시 예외 처리합니다.
					alert('예약 확인에 실패했습니다. 다시 시도해주세요.');
				}
				}
			};
			xhr.open("GET", "together_check.php?date=" + encodeURIComponent(date) + "&seat=" + encodeURIComponent(seat) + "&startTime=" + encodeURIComponent(startTime) + "&endTime=" + encodeURIComponent(endTime), true);
			xhr.send();
		}
	else {
		// 기존 동작인 books_result.php로 이동
		if(date == ""){ alert('예약날짜를 선택해주세요'); return; }
		if(startTime == "입실시간선택"){ alert('입실시간을 선택해주세요'); return; }
		if(endTime == "퇴실시간선택"){ alert('퇴실시간을 선택해주세요'); return; }
		if(seat == "룸선택"){ alert('예약할 방을 선택해주세요'); return; }
		if(price == "0"){ alert('가격이 0원입니다! 퇴실시간을 확인해주세요'); return; }

		// 중복 예약 확인을 위해 AJAX 요청을 보냅니다.
		var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState === XMLHttpRequest.DONE) {
				if (xhr.status === 200) {
					var response = JSON.parse(xhr.responseText);
					if (response.allowBooking) {
					// 중복 예약이 아닌 경우 예약을 진행합니다.
					document.getElementById("bookForm").action = "books_result.php";
					document.getElementById("bookForm").submit();
					} else {
					// 중복 예약인 경우 경고 메시지를 표시합니다.
					alert('중복된 예약이 존재합니다. 다른 시간대를 선택해주세요.');
					}
				} else {
					// 요청 실패 시 예외 처리합니다.
					alert('예약 확인에 실패했습니다. 다시 시도해주세요.');
				}
				}
			};
			xhr.open("GET", "books_check.php?date=" + encodeURIComponent(date) + "&seat=" + encodeURIComponent(seat) + "&startTime=" + encodeURIComponent(startTime) + "&endTime=" + encodeURIComponent(endTime), true);
			xhr.send();
		}
	}

	// 날짜, 입실시간, 퇴실시간, 룸 선택 input 요소
	const dateInput = document.getElementById("date");
	const startTimeInput = document.getElementById("startTime");
	const endTimeInput = document.getElementById("endTime");
	const seatInput = document.getElementById("seat");

	// 날짜, 입실시간, 퇴실시간, 룸 값이 변경되면 handleReservationInfoUpdate(); 함수 호출
	dateInput.addEventListener("change", function() {
		handleSeatSelection();
		showSeatPopover();
		handleReservationInfoUpdate();
	});
	
	startTimeInput.addEventListener("change", function() {
	handleReservationInfoUpdate();
	});

	endTimeInput.addEventListener("change", function() {
	handleReservationInfoUpdate();
	});
	seatInput.addEventListener("change", function() {
	handleReservationInfoUpdate();
	});

  // 예약 정보 업데이트
  handleReservationInfoUpdate();

  // 예약 정보 업데이트 함수 (날짜, 입실시간, 퇴실시간, 좌석선택 변경할 때마다 바로바로 보여지기 위해)
  function handleReservationInfoUpdate() {
  const date = document.getElementById("date").value;
  const startTime = document.getElementById("startTime").value;
  const endTime = document.getElementById("endTime").value;
  const seat = document.getElementById("seat").value;
  const reservationInfoLabel = document.getElementById("reservationInfoLabel"); 
  let pricePerHour; // 가격변수 선언 
  let countCheck; // together count 저장값을 위한 변수 선언
  console.log(reservationInfoLabel); // 디버깅용 출력
			
	// 가격 계산
	if(seat == "Share4")
	{
		 pricePerHour = 5000; // 시간당 가격
		 countCheck = 3; // 예약자를 뺀 3인
	}
	else if(seat == "Share6")
	{
		 pricePerHour = 7000; // 시간당 가격
		 countCheck = 5; // 예약자를 뺀 5인
	}
	else
	{
		 pricePerHour = 10000; // 시간당 가격
		 countCheck = 7; // 예약자를 뺀 7인
	}
	const startDate = new Date(date + " " + startTime);
	const endDate = new Date(date + " " + endTime);
	const timeDiff = endDate - startDate;
	const hours = Math.ceil(timeDiff / (1000 * 60 * 60));
	const totalPrice = pricePerHour * hours;

	// 숨겨진 입력 필드에 선택된 이용시간, 가격, 함께해요일 때(인원수) 설정
	document.getElementById("hourInput").value = hours; // 추가
	document.getElementById("priceInput").value = totalPrice; // 추가
	document.getElementById("countInput").value = countCheck; // 추가

	if (timeDiff < 0) {
	alert("입실시간보다 퇴실시간이 이릅니다!");
	reservationInfoLabel.textContent = date + " " + startTime + " - " + endTime + " / " + seat + " / " + "0원";
	return; // 선택 취소
	} else {
	reservationInfoLabel.textContent = date + " " + startTime + " - " + endTime + " / " + seat + " / " + totalPrice + "원";
	}


	}	

	//예약날짜 < 현재날짜일 경우 선택하지 못하도록 제어하는 함수
	function handleSeatSelection() {
			const startTime = "09:00";
			const endTime = "21:00";
			const selectedDate = document.getElementById("date").value;

			// 오늘 날짜 구하기
			const today = new Date();
			const todayString = today.toISOString().split("T")[0]; // YYYY-MM-DD 형식으로 변환

			 // 현재 시간 구하기
  			const currentTime = getCurrentTime();

			// 예약 가능 여부 확인
			if (selectedDate < todayString) 
			{
				// 선택한 날짜가 오늘보다 작거나 같은 경우 예약 불가능
				alert("예약이 불가능한 날짜입니다. 유효한 예약 날짜를 선택하세요.");
				document.getElementById("date").value = ""; // date 값을 빈 문자열로 설정
				return;
			}
	}

		// 현재 시간을 반환하는 함수 (2자리 숫자로 반환)
		function getCurrentTime() {
		const now = new Date();
		const hours = String(now.getHours()).padStart(2, "0");
		const minutes = String(now.getMinutes()).padStart(2, "0");
		return `${hours}:${minutes}`;
		}

	

  	// 초기화 버튼 클릭시 입력필드 초기화 하기
    //'window.addEventListener("DOMContentLoaded", ...)'페이지가 로드될 때 스크립트가 실행되도록 보장하기 위해 사용
	window.addEventListener("DOMContentLoaded", function() {
	const resetButton = document.querySelector("input[type='reset']");

	resetButton.addEventListener("click", function() {
		// 입력 필드 초기화
		document.getElementById("date").value = "";
		document.getElementById("startTime").value = "입실시간선택";
		document.getElementById("endTime").value = "퇴실시간선택";
		document.getElementById("seat").value = "룸 선택";
		document.getElementById("reservationInfoLabel").textContent = "예약날짜 / 입실시간선택 / 퇴실시간선택 / 좌석 / 가격";
		});
	});

	</script>
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
		<!--	<script src="assets/js/jquery.min.js"></script> -->
			<script src="assets/js/jquery.scrollex.min.js"></script> 
			<script src="assets/js/jquery.scrolly.min.js"></script> 
			<script src="assets/js/browser.min.js"></script> 
			<script src="assets/js/breakpoints.min.js"></script> 
			<script src="assets/js/util.js"></script> 
			<script src="assets/js/main.js"></script> 
		</body>
</html>