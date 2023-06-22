<?php
//세션 데이터에 접근하기 위해 세션 시작
session_start();
$userId = $_SESSION['user_id'];	
?>

<?php
        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');	

$page = (isset($_GET["page"]) && $_GET["page"]) ? $_GET["page"] : 1;


if (empty($page)) { $page = 1; }

$select_query = "select COUNT(*) as size FROM board";        
$result = mysqli_query($con, $select_query); 
$row = mysqli_fetch_array($result);
$nums = $row['size'];


//화면에 목록 줄수
$listSize = 8;

//페이지 표시 최대 숫자
$blockSize = 8; // 추가 !!
$prevBlock="";
$nextBlock="";
$start = ($page - 1) * $listSize;


$totalListCount = ceil($nums/ $listSize); // 추가해주기

$no = $nums - $start; // 추가

$totalBlockCount = ceil($totalListCount/$blockSize);
$currentBlock = ceil($page / $blockSize);

$startPage = ($currentBlock - 1) * $blockSize + 1;

if ($currentBlock >= $totalBlockCount) {
    $endPage = $totalListCount;
} else {
    $endPage = $currentBlock * $blockSize;
}

if ($currentBlock > 1) {
    $prevBlock = "
        <a class='page-link' href='./teamstudy/my_board.php?page=".($startPage - 1)."' aria-label='Previous'>
            <span aria-hidden='true'>&laquo;</span>
        </a>";
}

if ($currentBlock < $totalBlockCount) {
    $nextBlock = "
        <a class='page-link' href='./teamstudy/my_board.php?page=".($endPage + 1)."' aria-label='Next'>
            <span aria-hidden='true'>&raquo;</span>
        </a>";
}

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

                .board-list {
                    margin-top: 3em;
                }
                .board-list th {
                    color: #1a237e;
                    font-size: 0.8em;
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
    
		</style>
	</head>
	<body class="is-preload">

		<!-- Sidebar -->
    <section id="sidebar">
    <a href="index.php" class="title"><img src="images/title1.png" height="110px"></a>		
            
                <div class="inner">
                    <nav>
                        <ul>
                        <li><a href="member_edit_intro.php">개인정보관리</a></li>
                            <li><a href="mybook.php">예약정보확인</a></li>
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

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">내가 쓴 글</h1>
						<!-- 게시판-->

						<!-- 탭 메뉴 -->
            <div class="tab-menu">
                    <button class="tab-button" data-tab="board_list" >게시글</button>
                    <button class="tab-button" data-tab="comment_list" >댓글</button>
            </div>
            <div class="">
	          <div class="container">
		        <div id="">
            <div class="board_list_section">
            <ul>
                <!-- 게시글 목록을 표시하는 테이블 -->
<div id="board_list" class="board-list">
  <table>
    <thead>
      <tr>
        <th>번호</th>
        <th>제목</th>
        <th>작성자</th>
        <th>작성일</th>
        <th>조회수</th>
      </tr>
    </thead>
    <tbody id="board-list-body">
      <!-- 예약 정보들을 동적으로 생성 -->
    </tbody>
  </table>
</div>

<!-- 댓글 목록을 표시하는 테이블 -->
<div id="comment_list" class="board-list">
  <table>
    <thead>
      <tr>
        <th>번호</th>
        <th>글제목</th>
        <th>내용</th>
        <th>날짜</th>
      </tr>
    </thead>
    <tbody id="comment-list-body">
      <!-- 예약 정보들을 동적으로 생성 -->
    </tbody>
  </table>
</div>

                
                <!-- 게시판 페이징 영역 -->
                <li>
					  <div id="sub1_2_divPaging">
							
						<div style="font-size:0.8em;color:#005b91; ">◀</div>
						<?php									
						for ($i = $startPage; $i <= $endPage; $i++) {
							$active = $page == $i ? "disabled" : "";
							echo "<div class='pagingbox'><a  ".$active."' href='./my_board.php?page=".$i."'>".$i."</a></div>";
							}	
						?>
						<div style="font-size:0.8em; color:#005b91;">▶</div>
						</div>
            </li>
            </ul>
		        </div>
   	  </div>
      <!-- 게시판영역 종료-->
	    </div>
      </div>
      </section>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

      <!--
			<script type="text/javascript">
    		function boardWrite() {		
			location.href="board_write.php";    
      }  
      </script>
    -->

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
                    var boardLists = document.getElementsByClassName("board-list");
                    for (var i = 0; i < boardLists.length; i++) {
                      boardLists[i].style.display = "none";
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

                    // 글정보 가져오기
                    if(tabName == "board_list"){
                      fetchBoardInfo(tabName);
                    } else {
                      fetchCommentInfo(tabName);
                    }
                }

                function fetchBoardInfo(tableName) {
                var boardListElement = document.getElementById(tableName);
                if (!boardListElement) {
                    console.error('게시글을 찾을 수 없습니다.');
                    return;
                }

                var tableElement = boardListElement.querySelector('table');
                var tableBody = tableElement.querySelector('tbody');
                tableBody.innerHTML = ''; // 기존 내용 삭제

                // AJAX 요청을 생성
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'myboard_list.php?tabName=' + tableName, true);

                // 응답 처리
                xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                // 서버에서 성공적으로 예약 정보를 가져온 경우
                var boardData = JSON.parse(xhr.responseText);

                if (boardData.length > 0) {
                    // 예약 정보를 테이블에 추가
                    boardData.forEach(function(board, index) {
                        var tableRow = document.createElement('tr');

                        var numberCell = document.createElement('td');
                        numberCell.textContent = index + 1; // 인덱스 값에 1을 더하여 번호 표시
                        tableRow.appendChild(numberCell);

                        var titleCell = document.createElement('td');
                        titleCell.textContent = board.title; // 수정된 부분
                        tableRow.appendChild(titleCell);

                        var writerCell = document.createElement('td');
                        writerCell.textContent = board.writer; // 수정된 부분
                        tableRow.appendChild(writerCell);

                        var dateCell = document.createElement('td');
                        dateCell.textContent = board.date; // 수정된 부분
                        tableRow.appendChild(dateCell);

                        var hitCell = document.createElement('td');
                        hitCell.textContent = board.hit; // 수정된 부분
                        tableRow.appendChild(hitCell);

                        // 예약 정보를 데이터 속성으로 저장
                        tableRow.setAttribute('data-title', board.title);
                        tableRow.setAttribute('data-writer', board.writer);
                        tableRow.setAttribute('data-date', board.date);
                        tableRow.setAttribute('data-hit', board.hit);

                        // 클릭 이벤트 핸들러 추가
                        tableRow.addEventListener('click', function() {
                            // 해당 글의 상세 화면으로 이동
                            var boardId = board.idx; // 글의 고유 ID를 가져옴
                            window.location.href = 'board_detail.php?idx=' + boardId;
                        });

                        tableBody.appendChild(tableRow);
                    });
                } else {
                    // 값이 없는 경우 메시지 표시
                    tableBody.innerHTML = '<tr><td colspan="6">작성한 게시글이 없습니다.</td></tr>';
                }
            } else {
                console.error('게시글 정보를 가져오는데 실패했습니다.');
            }
            }
          };

          // AJAX 요청 전송
          xhr.send();
      }

                    function fetchCommentInfo(tableName) {
                    var commentListElement = document.getElementById(tableName);
                    if (!commentListElement) {
                        console.error('작성한 댓글이 없습니다');
                        return;
                    }

                    var tableElement = commentListElement.querySelector('table');
                    var tableBody = tableElement.querySelector('tbody');
                    tableBody.innerHTML = ''; // 기존 내용 삭제

                    // AJAX 요청을 생성
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'myboard_list.php?tabName=' + tableName, true);

                    // 응답 처리
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // 서버에서 성공적으로 예약 정보를 가져온 경우
                            var commentData = JSON.parse(xhr.responseText);

                            if (commentData.length > 0) {
                            // 예약 정보를 테이블에 추가
                            commentData.forEach(function(comment, index) {
                                var tableRow = document.createElement('tr');

                                var numberCell = document.createElement('td');
                                numberCell.textContent = index + 1; // 인덱스 값에 1을 더하여 번호 표시
                                tableRow.appendChild(numberCell);

                                var titleCell = document.createElement('td');
                                titleCell.textContent = comment.post_title;
                                tableRow.appendChild(titleCell);

                                var contentCell = document.createElement('td');
                                contentCell.textContent = comment.content;
                                tableRow.appendChild(contentCell);

                                var dateCell = document.createElement('td');
                                dateCell.textContent = comment.date;
                                tableRow.appendChild(dateCell);

                                // 예약 정보를 데이터 속성으로 저장
                               
                                tableRow.setAttribute('data-post_title', comment.post_title);
                                tableRow.setAttribute('data-content', comment.content);
                                tableRow.setAttribute('data-datw', comment.date);

                                
                            // 클릭 이벤트 핸들러 추가
                            tableRow.addEventListener('click', function() {
                            // 해당 글의 상세 화면으로 이동
                            var boardId = comment.com_num; // 글의 고유 ID를 가져옴
                            window.location.href = 'board_detail2.php?com_num=' + boardId;
                        });
                      

                                tableBody.appendChild(tableRow);
                            });
                            }
                          else {
                            // 값이 없는 경우 메시지 표시
                            tableBody.innerHTML = '<tr><td colspan="6">작성한 댓글이 없습니다.</td></tr>';
                            }
                        } else {
                            console.error('댓글 정보를 가져오는데 실패했습니다.');
                        }
                        }
                    };

                    // AJAX 요청 전송
                    xhr.send();
                    }

                    // 초기 실행
                    showTab('board_list');
                </script>






<!-- 글불러오기 스크립트 

<script>
  // 버튼 요소들을 선택합니다.
var tabButtons = document.getElementsByClassName("tab-button");

// 버튼을 클릭했을 때 해당하는 콘텐츠를 표시하는 함수를 정의합니다.
function showTabContent(event) {
    // 모든 탭 콘텐츠를 숨깁니다.
    var tabContents = document.getElementsByClassName("tab-content");
    for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = "none";
    }

    // 클릭한 버튼의 data-tab 속성 값을 가져옵니다.
    var targetTab = event.target.getAttribute("data-tab");

    // 해당하는 콘텐츠를 표시합니다.
    document.getElementById(targetTab).style.display = "block";

    // 게시글 버튼을 클릭한 경우
    if (targetTab === "board_list_table") {
        // 서버로부터 게시글 목록을 가져옵니다.
        fetchBoardList();
    }
    // 댓글 버튼을 클릭한 경우
    else if (targetTab === "comment-list") {
        // 서버로부터 댓글 목록을 가져옵니다.
        fetchCommentList();
    }
}

// 버튼에 클릭 이벤트를 추가합니다.
for (var i = 0; i < tabButtons.length; i++) {
    tabButtons[i].addEventListener("click", showTabContent);
}

// 게시글 목록을 가져오는 함수
function fetchBoardList() {
    fetch("myboard_list.php?tabName=board_list_table")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            displayBoardList(data);
        })
        .catch(function (error) {
            console.log("Error:", error);
        });
}

// 댓글 목록을 가져오는 함수
function fetchCommentList() {
    fetch("my_board.php?tabName=comment_list")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            displayCommentList(data);
        })
        .catch(function (error) {
            console.log("Error:", error);
        });
}


// 게시글 목록을 화면에 표시하는 함수
function displayBoardList(data) {
    var boardListContainer = document.getElementById("board_list_table");

    // 기존에 표시된 목록을 비웁니다.
    boardListContainer.innerHTML = "";

    // 데이터를 기반으로 게시글 목록을 생성합니다.
    for (var i = 0; i < data.length; i++) {
        var boardItem = document.createElement("div");
        boardItem.innerHTML = data[i].title; // 예시로 게시글의 제목을 표시합니다.
        boardListContainer.appendChild(boardItem);
    }
}

// 댓글 목록을 화면에 표시하는 함수
function displayCommentList(data) {
    var commentListContainer = document.getElementById("comment-list");

    // 기존에 표시된 목록을 비웁니다.
    commentListContainer.innerHTML = "";

    // 데이터를 기반으로 댓글 목록을 생성합니다.
    for (var i = 0; i < data.length; i++) {
        var commentItem = document.createElement("div");
        commentItem.innerHTML = data[i].content; // 예시로 댓글의 내용을 표시합니다.
        commentListContainer.appendChild(commentItem);
    }
}

  </script>
-->
	</body>
</html>