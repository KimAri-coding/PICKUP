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
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- 기존의 main.css 로드 -->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!-- 팝오버 jquery, bootstrap 로드-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!--  팝오버 초기화 -->
	<script>
	jQuery(document).ready(function(){
		jQuery('[data-toggle="popover"]').popover();   
	});
	</script>

		<style>
			/* 좌석 스타일 */
			.seat {
				width: 100px;
				height: 90px;
				margin: 10px;
				border: 2px solid black;
				display: inline-block;
				text-align: center;
				line-height: 50px;
				font-weight: bold;
				cursor: pointer;
				
			}
			
			/* 예약된 좌석 스타일 */
			.reserved {
				background-color: #5052b5;
				color: white;
				cursor: not-allowed;
			}
			/* 예약하지 않은 좌석 스타일 */
			.unreserved {
				background-color: #ffffff;
				color: #4dd0e1;
				cursor: not-allowed;
			}
			
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
			
			h4 {
				margin-bottom: 15px
			}

			h5 {
				margin-top: 35px;
				text-align: center;
				font-size: 0.8em;	
				margin-bottom: 15px
			}
			input {
				border: solid 1px #1a237e;
				
			}
			select {
				border: solid 1px #1a237e;
				height: 2.3em;
			}

			.modal-dialog {
				display: flex;
				align-items: center;
				justify-content: center;
				overflow: hidden;
				width: auto;
				height: auto;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
			}
			.modal-header {
				height: auto;
			}
			.modal-header button{
				flex: 1;
				width: 1.2em;
				height: 1.2em;
				border-radius: 0;
				background-color: "#"; /* 배경색 설정 */
				color: #1a237e !important; /* 텍스트 색상 설정 */
				/* 기타 스타일 속성들 */
				margin-right: 20px;
				margin-left: 20px;
				margin-bottom: 25px;
				display: inline-block ;
				text-align: center ;
				line-height: normal ;
			}

		</style>

	</head>
	
	<body class="is-preload">

		<!-- 헤더 -->
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

			<!-- 다른 페이지로 넘어갈 때 현재 페이지 종료 함수 -->
			<script>
				function closeCurrentPage() {
				window.close();
			}
			</script>

		<!-- 아래 제목 -->
			<div id="wrapper">
				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major" contenteditable="false" >1인석 예약하기</h1>
							<h2> ▶ 좌석배치도  </h2>
							

	<!-- 좌석 배치도 항목 생성 및 배치 -->
	<div class="book-text-container">
		<p onclick="changeSeatMap('RoomA')"> ■ Room A</p>
		<p onclick="changeSeatMap('RoomB')"> ■ Room B</p>
		<p onclick="changeSeatMap('RoomC')"> ■ Room C</p>
		<h6  id="showLayout" style="margin-left:85px  cursor: pointer;"> 
		실제 좌석배치도 보기
		</h6>
		<img src="images/click1.png" height="20px" style="margin-top: 8px; margin-left:5px">
	</div>
	
	<!-- 좌석배치도 모달 창 -->
	<div class="bookmodal" id="myModal" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h3 class="modal-title" id="modalTitle">PICKUP_1인석 실제 좌석배치도</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body" style="display: flex; justify-content: space-between;">
			<img id="roomb" src="images/roomb.png" alt="Image 2" style="margin: 10px;" height="250px">
			<img id="roomc" src="images/roomc.png" alt="Image 3" style="margin: 10px;" height="250px">
			<img id="rooma" src="images/rooma.png" alt="Image 1" style="margin: 10px;" height="250px">
		</div>
		</div>
	</div>
	</div>
		
	<!-- 좌석배치도 모달창 스크립트 -->
	<script>
		// 모달 표시
		var showLayoutBtn = document.getElementById("showLayout");
		var modal = document.getElementById("myModal");
		
		showLayoutBtn.addEventListener("click", function() {
			modal.style.display = "block";
		});
		
		var closeModalBtn = document.querySelector("#myModal .close");
		closeModalBtn.addEventListener("click", function() {
			modal.style.display = "none";
		});
	</script>


	<div class="bookcontainer">
		<div id="seatMap" class="seat-map">
			<!-- 좌석 배치를 동적으로 생성 -->
		</div>
	
	<form id="bookForm" action="book_result.php" method="post">
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
			<label for="seatNumber">■ 좌석번호</label>
			<h5><label for="text" style="text-align: center;" id="selectedSeatNumber" name= "seat">좌석선택</label></h5>
			<input type="hidden" id="seatInput" name="seat" />   
			<input type="hidden" id="hourInput" name="hour" />
  			<input type="hidden" id="priceInput" name="price" />
			</div>
		   <h4><label for="text" >예약정보: </label></h4>
		   <h5><label for="text" id="reservationInfoLabel">입실시간선택 - 퇴실시간선택 / 좌석선택 / 0원</label></h5>
		   <br>
		    <!-- 로그인한 유저 아이디를 가져온 hidden input -->
  			<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
			<div class = "bookbutton-group">
			<input type="button" name = "btnbook" value = "예약하기" onclick="submitForm()"/>
			<input type="reset" name = "reset"/>
			</div>
			
		</div>
	</div>
	</form>

	<script> 

	//예약날짜 값 체크변수 (팝오버 때문에 만듦)
     let dateCheck = false;
	 let selectedRoom = "RoomA";

	let availableTimes = 0;

		// 좌석 정보, const 블록 범위의 상수를 선언
		const seatMap = {
			RoomA: [
			["A1", "A2", "A3", "A4", "A5"],
			["A6", "A7", "A8", "A9", "A10"],
			["A11", "A12", "A13", "A14", "A15"]
			],
			RoomB: [
			["B1", "B2", "B3", "B4", "B5"],
			["B6", "B7", "B8", "B9", "B10"],
			["B11", "B12", "B13", "B14", "B15"]
			],
			RoomC: [
			["C1", "C2", "C3", "C4", "C5"],
			["C6", "C7", "C8", "C9", "C10"],
			["C11", "C12", "C13", "C14", "C15"]
			]
		};

		// 예약된 좌석
		const reservedSeats = [];

		//좌석 생성 배치 함수
		function generateSeatMap(selectedRoom) {
		const seatMapDiv = document.getElementById("seatMap");
		seatMapDiv.innerHTML = "";

		const selectedSeatMap = seatMap[selectedRoom];

		for (let i = 0; i < selectedSeatMap.length; i++) {
			const rowDiv = document.createElement("div");

			for (let j = 0; j < selectedSeatMap[i].length; j++) {
			const seatDiv = document.createElement("div");
			seatDiv.className = "seat";
			seatDiv.textContent = selectedSeatMap[i][j];
			seatDiv.setAttribute("data-seat", selectedSeatMap[i][j]);

			if (reservedSeats.includes(selectedSeatMap[i][j])) {
				seatDiv.classList.add("reserved");
				seatDiv.setAttribute("title", "예약됨");
				seatDiv.disabled = true;
			} else {
				seatDiv.setAttribute("title", "예약 가능");
				seatDiv.addEventListener("click", function () {
					reserveSeat(selectedSeatMap[i][j]);
				});
				
				//팝오버 이벤트 호출
				handleSeatHover(seatDiv);
				
			}

			rowDiv.appendChild(seatDiv);
			}
			seatMapDiv.appendChild(rowDiv);
		}
			// 예약하기에 대한 설명 이미지
			const image = document.createElement("img");
			image.src = "images/bookinfo.png"; // 이미지 파일의 경로
			image.alt = "bookinfo"; // 이미지에 대한 설명 (alt 속성)
			image.style.width = "650px"; // 이미지의 너비를 650px로 설정
			image.style.height = "auto"; // 이미지의 높이를 자동으로 조정
			seatMapDiv.appendChild(image);
		}

		// 팝오버 이벤트 호출 처리 (마우스 올려놓았을 때 아닐 때 팝오버 생성을 설정하기 위해)
		function handleSeatHover(seatDiv) {

			const startTime = "09:00";
			const endTime = "21:00";
			const date = document.getElementById("date").value;

			seatDiv.addEventListener("mouseenter", function () {
				
				if (date == "") 
				{
					//date 값이 없을 때 (예약날짜 선택 안 했을 때)
					seatDiv.setAttribute("data-toggle", "popover"); // 팝오버 대상 요소에 data-toggle 속성 추가
					seatDiv.setAttribute("title", "예약 날짜를 선택하세요"); // 팝오버 제목 설정
					seatDiv.setAttribute("data-content", "예약 가능한 시간을 확인하세요"); // 팝오버 내용 설정
					
					// 팝오버를 초기화합니다
					jQuery('[data-toggle="popover"]').popover();
				} 
				else 
				{
					//date 값이 있을 때 (예약날짜 선택해서 book_load.php 실행되었을때)
					loadBookingInfo(date, startTime, endTime, seatDiv, function(bookingInfo, availableTimes) {

						seatDiv.setAttribute("data-toggle", "popover");
						seatDiv.setAttribute("title", date + " 예약 가능한 시간");
						seatDiv.setAttribute("data-content", availableTimes);

						// 팝오버를 초기화합니다
						jQuery('[data-toggle="popover"]').popover();

						updateSeatColor(seatDiv, availableTimes); // 좌석 색 업데이트 함수 호출
					});
				}
					
					jQuery(this).popover("show");
				});

				seatDiv.addEventListener("mouseleave", function() {
					jQuery(this).popover("hide");
				});
		}

		//팝오버 예약 가능한 내용 구하는 함수
		function generateAvailableTimes(startTime, endTime, bookingInfo, seatDiv) {
			
			let availableTimes = "";

			if (!bookingInfo) {
			// bookingInfo 값이 없는 경우 09:00부터 22:00까지의 내용이 전부 보여집니다.
			for (let hour = Number(startTime.slice(0, 2)); hour <= Number(endTime.slice(0, 2)); hour++) {
				const time = `${hour.toString().padStart(2, "0")}:00`;
				availableTimes += time + "\n";
			}
			} else {
			const bookedSeats = Object.keys(bookingInfo);

			if (bookedSeats.includes(seatDiv.dataset.seat)) {
				// seatDiv와 bookedSeats 값이 일치하는 경우 해당 좌석의 중복된 시간대를 제외합니다.
				const bookings = bookingInfo[seatDiv.dataset.seat];

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


		//겹치는 좌석 정보가 있는지 확인해서 true / false 값 리턴하는 함수 
		function isOverlappingBooking(bookingInfo, seat, time) {
			for (const bookedSeat in bookingInfo) {
				if (bookedSeat !== seat && bookingInfo[bookedSeat].st_time <= time && bookingInfo[bookedSeat].end_time >= time) {
				return true;
				}
			}
			return false;
		}

		// 예약날짜 선택시 date 값을 가지고 팝오버 내용을 업데이트할 예약정보 불러오기
		function loadBookingInfo(date, startTime, endTime, seatDiv, callback) {
			const url = 'book_load.php';

			const xhr = new XMLHttpRequest();
			xhr.open('GET', `${url}?date=${date}`, true);

			xhr.onload = function() {
				if (xhr.status === 200) {
				const bookingInfo = JSON.parse(xhr.responseText);
				const availableTimes = generateAvailableTimes(startTime, endTime, bookingInfo, seatDiv);
				callback(bookingInfo, availableTimes);
			} else {
				console.error('AJAX request failed.');
				}
			};

			xhr.send();
		}

		//예약이 불가한 좌석일 경우 색 변화를 주기 위한 함수
		function updateSeatColor(seatDiv, availableTimes) {
			if (availableTimes.length === 0) {
				// availableTimes 값이 없을 때 (예약이 불가능한 경우)
				seatDiv.style.backgroundColor = 'gray'; // 좌석을 회색으로 표시
			} else {
				// availableTimes 값이 있는 경우
				// 예약 가능한 색상으로 표시
				
			}
		}

		//예약날짜 바뀔 때마다 팝오버 업데이트를 위한 함수
		function popoverCheck(selectedRoom)
		{
			roomCheck = selectedRoom;

			if(roomCheck == "RoomA")
			{
				generateSeatMap(roomCheck);
			}
			else if(roomCheck == "RoomB")
			{
				generateSeatMap(roomCheck);
			}
			else if(roomCheck == "RoomC")
			{
				generateSeatMap(roomCheck);
			}
		}

		// 선택한 항목(selectedRoom)에 따라 좌석 배치도 변경
		function changeSeatMap(selectedRoom) {
			generateSeatMap(selectedRoom);
			handleReservationInfoUpdate();
		}

		// 예약하기 버튼 클릭 이벤트 처리 (공백체크, 0원일 때 제어)
		function submitForm() {
			
			handleReservationInfoUpdate();

			var btnbook = document.getElementById("btnbook");
			var date = document.getElementById("date").value;
			var startTime = document.getElementById("startTime").value;
			var endTime = document.getElementById("endTime").value;
			var seat = document.getElementById("selectedSeatNumber").textContent;
			var price = document.getElementById("priceInput").textContent;

			if(date == ""){ alert('예약날짜를 선택해주세요'); return; }
			if(startTime == "입실시간선택"){ alert('입실시간을 선택해주세요'); return; }
			if(endTime == "퇴실시간선택"){ alert('퇴실시간을 선택해주세요'); return; }
			if(seat == "" || seat == "좌석선택"){ alert('예약할 좌석을 선택해주세요'); return; }
			if(price == "0"){ alert('가격이 0원입니다! 퇴실시간을 확인해주세요'); return; }

			// 중복 예약 확인을 위해 AJAX 요청을 보냅니다.
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState === XMLHttpRequest.DONE) {
				if (xhr.status === 200) {
					var response = JSON.parse(xhr.responseText);
					if (response.allowBooking) {
					// 중복 예약이 아닌 경우 예약을 진행합니다.
					document.getElementById("bookForm").action = "book_result.php";
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
			xhr.open("GET", "book_check.php?date=" + encodeURIComponent(date) + "&seat=" + encodeURIComponent(seat) + "&startTime=" + encodeURIComponent(startTime) + "&endTime=" + encodeURIComponent(endTime), true);
			xhr.send();
		}

		// 선택된 좌석 정보를 저장할 변수
		let selectedSeatNumber = null;

		// 날짜, 입실시간, 퇴실시간 선택 input 요소
		const dateInput = document.getElementById("date");
		const startTimeInput = document.getElementById("startTime");
		const endTimeInput = document.getElementById("endTime");

		// 날짜, 입실시간, 퇴실시간 값이 변경되면 changeSeatMap 함수 호출
		dateInput.addEventListener("change", function() {
			handleSeatSelection();
			popoverCheck(selectedRoom);
			handleReservationInfoUpdate();
		});
		startTimeInput.addEventListener("change", function() {
			handleReservationInfoUpdate();
		});

		endTimeInput.addEventListener("change", function() {
			handleReservationInfoUpdate();
		});

		//예약날짜 < 현재날짜일 경우 예약하지 못하도록 제어하는 함수
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

		// 좌석 클릭했을 때
		function reserveSeat(seatNumber) {
		const seatDiv = document.querySelector(`.seat[data-seat="${seatNumber}"]`);

		if (reservedSeats.includes(seatNumber)) {
			// 이미 예약된 좌석인 경우
			const index = reservedSeats.indexOf(seatNumber);
			reservedSeats.splice(index, 1);

			seatDiv.classList.remove("reserved");
			seatDiv.setAttribute("title", "예약 가능");
			seatDiv.disabled = false;

			// 선택된 좌석 해제
			if (selectedSeatNumber === seatNumber) {
			selectedSeatNumber = null;
			document.getElementById("selectedSeatNumber").textContent = "좌석선택";
			
			seatDiv.classList.remove("selected");
			alert(seatNumber + "번 좌석 예약을 취소합니다.");
			handleReservationInfoUpdate();
			return;
			}

		
		} else {
			// 예약 가능한 좌석인 경우
			if (selectedSeatNumber !== null) {
			// 이미 다른 좌석이 선택된 경우
			alert("이미 좌석이 선택되어 있습니다.");
			return;
			}

			reservedSeats.push(seatNumber);

			seatDiv.classList.add("reserved");
			seatDiv.setAttribute("title", "예약됨");
			seatDiv.disabled = true;

			// 선택된 좌석 설정
			selectedSeatNumber = seatNumber;
			document.getElementById("selectedSeatNumber").textContent = seatNumber;
			}
			handleReservationInfoUpdate();
		}

		// 예약 정보 업데이트 함수 (날짜, 입실시간, 퇴실시간, 좌석선택 변경할 때마다 바로바로 보여지기 위해)
		function handleReservationInfoUpdate() {

		const date = document.getElementById("date").value;
		const startTime = document.getElementById("startTime").value;
		const endTime = document.getElementById("endTime").value;
		const seatNumber = document.getElementById("selectedSeatNumber").textContent;
		const reservationInfoLabel = document.getElementById("reservationInfoLabel");

		// 가격 계산
		const pricePerHour = 2000; // 시간당 가격
		const startDate = new Date(date + " " + startTime);
		const endDate = new Date(date + " " + endTime);
		const timeDiff = endDate - startDate;
		const hours = Math.ceil(timeDiff / (1000 * 60 * 60));
		let totalPrice = pricePerHour * hours;

		if (timeDiff < 0) {
		alert("입실시간보다 퇴실시간이 이릅니다!");
		totalPrice = 0; // totalPrice 값을 0으로 설정
		reservationInfoLabel.textContent = date + " " + startTime + " - " + endTime + " / " + seatNumber + " / " + totalPrice + "원";
		return; // 선택 취소
		} else {
		reservationInfoLabel.textContent = date + " " + startTime + " - " + endTime + " / " + seatNumber + " / " + totalPrice + "원";
		}

		// 숨겨진 입력 필드에 선택된 좌석번호, 이용시간, 가격 설정
		document.getElementById("seatInput").value = seatNumber;
		document.getElementById("hourInput").value = hours; // 추가
		document.getElementById("priceInput").value = totalPrice; // 추가
		
		}	

		// 초기에 RoomA 좌석 배치도를 보여주기 위해 함수 호출
		generateSeatMap(selectedRoom);

		// 초기화 버튼 클릭시 입력필드 초기화 하기
		//'window.addEventListener("DOMContentLoaded", ...)'페이지가 로드될 때 스크립트가 실행되도록 보장하기 위해 사용
		window.addEventListener("DOMContentLoaded", function() {
			const resetButton = document.querySelector("input[type='reset']");
			const reservationInfoLabel = document.getElementById("reservationInfoLabel");
			const selectedSeatNumberElement = document.getElementById("selectedSeatNumber");
			const seatDivs = document.querySelectorAll(".seat");

			resetButton.addEventListener("click", function() {
			// 입력 필드 초기화
			document.getElementById("date").value = "";
			document.getElementById("startTime").value = "입실시간선택";
			document.getElementById("endTime").value = "퇴실시간선택";
			selectedSeatNumberElement.textContent = "좌석선택";
			reservationInfoLabel.textContent = "예약날짜선택 / 입실시간선택 / 퇴실시간선택/ 좌석선택 /0원";
		
			// 좌석 선택 초기화
			seatDivs.forEach(function(seatDiv) {
				if (seatDiv.classList.contains("selected")) {
					seatDiv.classList.remove("selected");
					seatDiv.style.backgroundColor = "#ffffff";
					seatDiv.disabled = false;
				}
				if (seatDiv.classList.contains("reserved")) {
					seatDiv.classList.remove("reserved");
					seatDiv.setAttribute("title", "예약 가능");
				}
				if (seatDiv.classList.contains("unreserved")) {
					seatDiv.classList.remove("unreserved");
				}
			});

			// 선택된 좌석 정보 초기화
			selectedSeatNumber = null;

			 // 페이지 새로고침
			 location.reload();

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