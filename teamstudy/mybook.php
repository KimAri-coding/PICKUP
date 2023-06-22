<?php
session_start();
if (!isset($_COOKIE['LoginUser'])) {
}

 // 세션에서 로그인한 사용자의 ID 값을 가져옴
 $userId = $_SESSION['user_id'];

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Generic - Hyperspace by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

        <script type="text/javascript">
            function btn() {		
                location.href="book_intro.php";    
            }  
        </script>

        <style>
            .mypage-sidebar {
                padding: 2.5em 2.5em 0.5em 2.5em;
                background: #1a237e;
                cursor: default;
                height: 100vh;
                left: 0;
                overflow-x: hidden;
                overflow-y: hidden;
                position: fixed;
                text-align: right;
                top: 0;
                width: 18em;
                z-index: 10000;
                }
                .tab-menu {
                    display: flex;
                    justify-content: center;
                }
                .tab-menu button.tab-button {
                    margin-right: 25px;
                    width: 100px;
                    line-height: 30px; /* 텍스트의 높이와 동일하게 설정 */
                    height: 30px; /* 텍스트의 높이와 동일하게 설정 */
                    text-align: center;
                    justify-content: center;
                    display: flex;
                    background-color: #D9E5FF;
                    border: solid 1px #D9E5FF;
                }

                .booking-list {
                    margin-top: 3em;
                }
                .booking-list th {
                    color: #1a237e;
                    font-size: 0.6em;
                    text-align: center;
                    vertical-align: middle; /* 세로 가운데 정렬 추가 */
                    line-height: normal;
                    background-color: #D9E5FF;
                    font-weight: bold;
                }

                table {
                    width: 80%;
                    border-collapse: collapse;
                    margin: 0 auto; /* 가운데 정렬을 위해 좌우 여백을 auto로 설정 */
                    cursor: pointer;
                }
               
                th, td {
                    padding: 8px;
                    border-bottom: 1px solid #ddd;
                    text-align: center;
                }

                tbody tr:hover {
                    background-color: #f9f9f9;
                }
                
                tbody {
                    margin-top: 30px;
                }

                /* 모달 창 스타일 */
                #reservation-modal {
                    display: none; /* 초기에는 모달 창을 숨김 */
                    position: fixed;
                    z-index: 9999;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgba(0, 0, 0, 0.6); /* 배경색과 투명도 설정 */
                    
                }

                .modal-content {
                  /*  background-color: #ffffff; */
                    background: linear-gradient(to bottom right, #f3e5f5, #b2ebf2); 
                    margin: 10% auto;
                    padding: 20px;
                    border: 1px solid #888;
                    width: 80%;
                    max-width: 400px;
                    height: 65vh; /* 세로 길이를 80%로 지정 */
                    overflow-y: auto; /* 내용이 넘칠 경우 스크롤 생성 */
                    border:solid 2px #1a237e;
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    font-size: 0.8em;
                }

                .close {
                    color: #aaa;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                }

                .close:hover,
                .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
                }

                /* 모달 내부 버튼 스타일 */
                .modal-button {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background-color: #ffffff;
                    color: #1a237e;
                    width: 50px;
                    height: 50px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    margin-right: 10px;
                    text-align: center;
                }

                .modal-button span {
                    display: inline-block;
                    max-width: 100%;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                }

                .modal-button:hover {
                    background-color: #1a237e; /* 마우스 오버 시 배경색 변경 */
                    color: #ffffff;
                }

            </style>

	</head>


        <!-- Sidebar -->
            <section id="sidebar">
            <a href="index.php" class="title"><img src="images/title1.png" height="110px"></a>		
            
                <div class="inner">
                    <nav>
                        <ul>
                        <li><a href="member_edit_intro.php">개인정보관리</a></li>
                        <li><a href="mybook.php">MY 예약내역</a></li>
                        <li><a href="my_board.php">내가 쓴 글</a></li>
                        <li><a href="mypage_agreement.php">이용약관 확인</a></li>
                        <li><a href="member_del_intro.php">탈퇴하기</a></li>
                        </ul>
                    </nav>
                    <div class="row">
                        <ul class="actions stacked">
                            <li style="display: flex; justify-content: flex-end;">
                                <a id="index" href="index.php" class="button primary small" style="display: flex; align-items: center; justify-content: center; margin-right: 10px;">홈으로</a>
                                
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



            <!-- 아래 제목 -->
            <div id="wrapper">
                <!-- Main -->
                <section id="main" class="wrapper">
                    <div class="inner">
                        <h1 class="major">내 예약정보 확인하기</h1>
                    </div>
                </section>

                <!-- 탭 메뉴 -->
                <div class="tab-menu">
                    <button class="tab-button active" data-tab="book-list" >1인석</button>
                    <button class="tab-button" data-tab="books-list" >회의실</button>
                    <button class="tab-button" data-tab="together-list" >함께해요</button>
                    <button class="tab-button" data-tab="community-list" >커뮤니티</button>
                </div>

                <!-- 목록 표시 영역 -->
                <div id="book-list" class="booking-list active">
                <!-- 예약정보 목록을 여기에 뿌려줌 -->
                <table>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>날짜</th>
                                <th>입실시간 - 퇴실시간</th>
                                <th>이용시간</th>
                                <th>좌석</th>
                                <th>가격</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- 예약 정보들을 동적으로 생성 -->
                        </tbody>
                    </table>
                </div>
                <!-- 목록 표시 영역 -->
                <div id="books-list" class="booking-list">
                <!-- 예약정보 목록을 여기에 뿌려줌 -->
                <table>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>날짜</th>
                                <th>입실시간 - 퇴실시간</th>
                                <th>이용시간</th>
                                <th>좌석</th>
                                <th>가격</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- 예약 정보들을 동적으로 생성 -->
                        </tbody>
                    </table>
                </div>
                <!-- 목록 표시 영역 -->
                <div id="together-list" class="booking-list">
                <!-- 예약정보 목록을 여기에 뿌려줌 -->
                <table>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>날짜</th>
                                <th>입실시간 - 퇴실시간</th>
                                <th>이용시간</th>
                                <th>좌석</th>
                                <th>가격</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- 예약 정보들을 동적으로 생성 -->
                        </tbody>
                    </table>
                </div>
                <!-- 목록 표시 영역 -->
                <div id="community-list" class="booking-list">
                <!-- 예약정보 목록을 여기에 뿌려줌 -->
                <table>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>날짜</th>
                                <th>입실시간 - 퇴실시간</th>
                                <th>이용시간</th>
                                <th>좌석</th>
                                <th>가격</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- 예약 정보들을 동적으로 생성 -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 모달 창 -->
            <div id="reservation-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div id="reservation-details"></div>
            </div>
            </div>

            <script>

                // 탭 메뉴 버튼 요소를 선택하고 클릭 이벤트 핸들러 설정
                var tabButtons = document.getElementsByClassName("tab-button");
                for (var i = 0; i < tabButtons.length; i++) {
                    tabButtons[i].addEventListener("click", function() {
                    var tabName = this.getAttribute("data-tab");
                    showTab(tabName);
                    });
                }

                function showTab(tabName) {
                    console.log(tabName);

                    // 모든 목록 숨김
                    var bookingLists = document.getElementsByClassName("booking-list");
                    for (var i = 0; i < bookingLists.length; i++) {
                    bookingLists[i].style.display = "none";
                    }

                    // 선택한 탭에 해당하는 목록 표시
                    var tabToShow = document.getElementById(tabName);
                    tabToShow.style.display = "block";

                    // 활성화된 탭 버튼 스타일 변경
                    var tabButtons = document.getElementsByClassName("tab-button");
                    for (var i = 0; i < tabButtons.length; i++) {
                    tabButtons[i].classList.remove("active");
                    }
                    document.querySelector('[data-tab="' + tabName + '"]').classList.add("active");

                    // 예약정보 가져오기
                    fetchBookingInfo(tabName);
                }

                function fetchBookingInfo(tableName) {
                    var bookingListElement = document.getElementById(tableName);
                    if (!bookingListElement) {
                        console.error('예약 목록 요소를 찾을 수 없습니다.');
                        return;
                    }

                    var tableElement = bookingListElement.querySelector('table');
                    var tableBody = tableElement.querySelector('tbody');
                    tableBody.innerHTML = ''; // 기존 내용 삭제

                    // AJAX 요청을 생성
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'mybook_list.php?tabName=' + tableName, true);

                    // 응답 처리
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // 서버에서 성공적으로 예약 정보를 가져온 경우
                            var bookingData = JSON.parse(xhr.responseText);

                            if (bookingData.length > 0) {
                            // 예약 정보를 테이블에 추가
                            bookingData.forEach(function(booking, index) {
                                var tableRow = document.createElement('tr');

                                var numberCell = document.createElement('td');
                                numberCell.textContent = index + 1; // 인덱스 값에 1을 더하여 번호 표시
                                tableRow.appendChild(numberCell);

                                var dateCell = document.createElement('td');
                                dateCell.textContent = booking.date;
                                tableRow.appendChild(dateCell);

                                var timeCell = document.createElement('td');
                                timeCell.textContent = booking.st_time + ' - ' + booking.end_time;
                                tableRow.appendChild(timeCell);

                                var durationCell = document.createElement('td');
                                durationCell.textContent = booking.hour + '시간';
                                tableRow.appendChild(durationCell);

                                var seatCell = document.createElement('td');
                                seatCell.textContent = booking.seat;
                                tableRow.appendChild(seatCell);

                                var priceCell = document.createElement('td');
                                priceCell.textContent = booking.price + '원';
                                tableRow.appendChild(priceCell);

                                // 예약 정보를 데이터 속성으로 저장
                                tableRow.setAttribute('data-booking-id', booking.id);
                                tableRow.setAttribute('data-date', booking.date);
                                tableRow.setAttribute('data-time', booking.st_time + ' - ' + booking.end_time);
                                tableRow.setAttribute('data-duration', booking.hour + '시간');
                                tableRow.setAttribute('data-seat', booking.seat);
                                tableRow.setAttribute('data-price', booking.price);
                                tableRow.setAttribute('data-tab', tableName); // 탭 메뉴 값 추가

                                tableBody.appendChild(tableRow);
                            });

                                // 모달창 클릭 이벤트 핸들러 등록
                                var rows = tableBody.getElementsByTagName("tr");
                                for (var i = 0; i < rows.length; i++) {
                                    rows[i].addEventListener("click", function(event) {
                                        var target = event.target;
                                        if (target.tagName === "TD") {
                                            var bookingDetails = getBookingDetails(this); // 예약 정보를 가져오는 함수 호출
                                            showReservationDetails(bookingDetails);
                                        }
                                    });
                                }
                            }
                          else {
                            // 값이 없는 경우 메시지 표시
                            tableBody.innerHTML = '<tr><td colspan="6">예약 정보가 없습니다.</td></tr>';
                            }
                        } else {
                            console.error('예약 정보를 가져오는데 실패했습니다.');
                        }
                        }
                    };

                    // AJAX 요청 전송
                    xhr.send();
                    }


                    // 모달 창 요소 가져오기
                    const modal = document.getElementById("reservation-modal");
                    const modalContent = document.querySelector("#reservation-modal .modal-content");
                    const closeBtn = document.querySelector("#reservation-modal .close");
                    const reservationDetailsElement = document.getElementById("reservation-details");

                    // 예약 정보 모달 창 열기
                    function showReservationDetails(bookingDetails) {
                    // 모달 창 내용 초기화
                    modalContent.innerHTML = '';

                    // 상세 예약 정보 라벨 생성 및 설정
                    var titleLabel = document.createElement('h3');
                    titleLabel.textContent = '상세 예약 정보';
                    modalContent.appendChild(titleLabel);

                    // 예약 정보 테이블 생성 및 설정
                    var table = document.createElement('table');
                    table.classList.add('reservation-table');

                    // 예약 정보 행 추가 - 예약 날짜
                    var dateRow = document.createElement('tr');
                    var dateKeyCell = document.createElement('td');
                    dateKeyCell.textContent = '예약날짜:';
                    dateKeyCell.style.whiteSpace = 'nowrap'; // 한 줄에 표시하도록 설정
                    dateRow.appendChild(dateKeyCell);
                    var dateValueCell = document.createElement('td');
                    dateValueCell.textContent = bookingDetails.date;
                    dateKeyCell.style.whiteSpace = 'nowrap'; // 한 줄에 표시하도록 설정
                    dateRow.appendChild(dateValueCell);
                    table.appendChild(dateRow);

                    // 예약 정보 행 추가 - 입실-퇴실
                    var periodRow = document.createElement('tr');
                    var periodKeyCell = document.createElement('td');
                    periodKeyCell.textContent = '입실-퇴실:';
                    periodKeyCell.style.whiteSpace = 'nowrap'; // 한 줄에 표시하도록 설정
                    periodRow.appendChild(periodKeyCell);
                    var periodValueCell = document.createElement('td');
                    periodValueCell.textContent = bookingDetails.start_time;
                    periodValueCell.style.whiteSpace = 'nowrap'; // 한 줄에 표시하도록 설정
                    periodRow.appendChild(periodValueCell);
                    table.appendChild(periodRow);

                    // 예약 정보 행 추가 - 이용시간
                    var durationRow = document.createElement('tr');
                    var durationKeyCell = document.createElement('td');
                    durationKeyCell.textContent = '이용시간:';
                    durationRow.appendChild(durationKeyCell);
                    var durationValueCell = document.createElement('td');
                    durationValueCell.textContent = bookingDetails.hour;
                    durationRow.appendChild(durationValueCell);
                    table.appendChild(durationRow);

                    // 예약 정보 행 추가 - 좌석
                    var seatRow = document.createElement('tr');
                    var seatKeyCell = document.createElement('td');
                    seatKeyCell.textContent = '좌석:';
                    seatRow.appendChild(seatKeyCell);
                    var seatValueCell = document.createElement('td');
                    seatValueCell.textContent = bookingDetails.seat;
                    seatRow.appendChild(seatValueCell);
                    table.appendChild(seatRow);

                    // 예약 정보 행 추가 - 가격
                    var priceRow = document.createElement('tr');
                    var priceKeyCell = document.createElement('td');
                    priceKeyCell.textContent = '가격:';
                    priceRow.appendChild(priceKeyCell);
                    var priceValueCell = document.createElement('td');
                    priceValueCell.textContent = bookingDetails.price + '원';
                    priceRow.appendChild(priceValueCell);
                    table.appendChild(priceRow);

                    // 테이블을 모달 창에 추가
                    modalContent.appendChild(table);

                    // 예약 취소 버튼 생성 및 설정
                    var cancelButton = document.createElement('button');
                    cancelButton.textContent = '예약 취소';
                    cancelButton.classList.add('modal-button');
                    cancelButton.style.marginTop = '30px'; // 버튼 위쪽 여백 설정
                    cancelButton.style.textAlign = 'center'; // 버튼 안의 텍스트 가운데 정렬
                    
                    // 예약 취소 로직 구현
                    cancelButton.addEventListener('click', function() {
                        var tableName = bookingDetails.tableName; // 예약 정보에서 tabName 값을 가져옴
                        console.log(tableName);

                        // AJAX 요청
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'mybook_del.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    alert('예약이 취소되었습니다.');
                                    location.reload();
                                } else {
                                    alert('예약 취소 중 오류가 발생했습니다.');
                                }
                            }
                        };
                        
                        var requestData = {
                            tab:  bookingDetails.tableName, // 탭 메뉴 값 전달
                            date: bookingDetails.date, // 예약 날짜 값을 요청 데이터에 추가
                            seat: bookingDetails.seat, // 예약 좌석 값을 요청 데이터에 추가
                            hour: bookingDetails.hour.replace('시간', ''), // "시간" 문자열 제거하여 예약 시간 값을 요청 데이터에 추가
                            price: bookingDetails.price // 예약 가격 값을 요청 데이터에 추가
                        };

                        xhr.send(JSON.stringify(requestData));
                        
                        // 모달 창 닫기
                        modal.style.display = 'none';
                    });
                    modalContent.appendChild(cancelButton);

                    // 닫기 버튼 생성 및 설정
                    var closeButton = document.createElement('button');
                    closeButton.textContent = '닫기';
                    closeButton.classList.add('modal-button');
                    closeButton.style.marginTop = '30px'; // 버튼 위쪽 여백 설정
                    closeButton.style.textAlign = 'center'; // 버튼 안의 텍스트 가운데 정렬
                    closeButton.addEventListener('click', function() {
                        // 모달 창 닫기
                        modal.style.display = 'none';
                    });
                    modalContent.appendChild(closeButton);

                    // 모달 창 열기
                    modal.style.display = 'block';
                    }

                    // 예약 정보를 가져와서 반환하는 함수
                    function getBookingDetails(row) {
                                            
                    // 예약 정보를 추출하여 반환하는 로직 작성
                    var bookingDetails = {};

                    bookingDetails.date = row.getAttribute("data-date");
                    bookingDetails.start_time = row.getAttribute("data-time");
                    bookingDetails.hour = row.getAttribute("data-duration");
                    bookingDetails.seat = row.getAttribute("data-seat");
                    bookingDetails.price = row.getAttribute("data-price");
                    bookingDetails.tableName = row.getAttribute("data-tab");

                    return bookingDetails;
                    }

                    // 초기 실행
                    showTab('book-list');
                    

            </script>

	<br>
	<br>

			
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