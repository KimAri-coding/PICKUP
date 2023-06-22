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
        <a class='page-link' href='./board.php?page=".($startPage - 1)."' aria-label='Previous'>
            <span aria-hidden='true'>&laquo;</span>
        </a>";
}

if ($currentBlock < $totalBlockCount) {
    $nextBlock = "
        <a class='page-link' href='.board.php?page=".($endPage + 1)."' aria-label='Next'>
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
      
		/* 글쓰기 로그인 모달창 */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
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

    #passwordModal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 400px;
      text-align: center;
      align-items:center;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    input[type="password"] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      background: #f5f5f5;
      box-sizing: border-box;
      border: 1px;
    }

    .modal-button {
      background-color: white;
      color: white;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 50%;
      height: 50px;
      text-align:center;
      align-items:center;
    }

    .modal-button:hover {
      opacity: 0.8;
    }
    a:hover {
    border-bottom-color: transparent;
    color: #448aff;
  }
		</style>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a href="index.php" class="title"><img src="images/title1.png" alt="" /></a>
				<nav>
				<ul>
				<li><a href="index.php">Home</a></li>
        <li><a href="book_intro.php" target="_blank">예약하기</a></li>
				<li><a href="board.php" target="_blank">게시판</a></li>
				<li><a href="community.php">커뮤니티</a></li>
				</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">게시판</h1>
						<!-- 게시판-->
						
<div class="">
	<div class="container">
		 <div id="">
          <div class="board_list_section">
            <ul>
                <!-- 게시목록  -->
                <li>
                    <ul id ="board_list_table">
                        <li>
                            <ul>
                                <li>번호</li>
                                <li>제목</li>
								                <li>작성자</li>
                                <li>작성일</li>
                                <li>조회수</li>								
                            </ul>
                        </li>
                        <!-- 게시 정보 반복 출력구간 -->
                        <?php
                        $query = "SELECT b.*
                                  FROM board b
                                  JOIN member m ON b.writer = m.id
                                  ORDER BY CASE WHEN m.role = 'admin' THEN 0 ELSE 1 END, b.idx DESC
                                  LIMIT $start, $listSize";
                        $result = $con->query($query);
                        while ($row = $result->fetch_assoc()) {
                      ?>
                <li>
                <ul>
                <li><?=$row["idx"]?></li>
                <li>
                <a href="board_detail.php?idx=<?php echo $row['idx']; ?>&hit=<?php echo $row['hit']; ?>" <?php if ($row["lo_post"] == 1): ?>onclick="openModal(<?php echo $row['idx']; ?>); return false;"<?php endif; ?>>
                <?=$row["title"]?>
                <?php if ($row["lo_post"] == 1): ?>
                    <img src="images/lock.png" style="width:20px; height:20px; display: inline-block; margin: 0 auto; margin-top: 5px;"/> <!-- 비밀글 아이콘 이미지 경로 -->
                <?php endif; ?>
            </a>
            </li>

            <li><?=$row["writer"]?></li>
            <li><?=$row["date"]?></li>
            <li><?=$row["hit"]?></li>
        </ul>
    </li>
<?php
}
?>
                    </ul>
                </li>
                
                
                <!-- 게시판 페이징 영역 -->
                <li>
					  <div id="sub1_2_divPaging">
						<div style="font-size:1em;color:#005b91; ">◀</div>
						<?php									
						for ($i = $startPage; $i <= $endPage; $i++) {
							$active = $page == $i ? "disabled" : "";
							echo "<div class='pagingbox'><a  ".$active."' href='./board.php?page=".$i."'>".$i."</a></div>";
							}	
						?>
						<div style="font-size:1em; color:#005b91;">▶</div>
						</div>
            </li>
            </ul>
		        </div>
		        <div >
            <button type="button" class="btn_write" id="btn_write" onclick="joinCommunity()" >글쓰기</button>
        		</div>
   	  </div>
      <!-- 게시판영역 종료-->
	</div>
</div>
</section>
			</div>
            
			<!-- 비밀글 비밀번호 입력 모달 창 -->
    <div id="passwordModal" class="modal">
    <div class="modal-content">
    <span class="close">&times;</span>
    <h3>비밀번호 입력</h3>
    <form id="passwordForm" action="lock_post_result.php" method="POST">
        <input type="password" name="password" placeholder="비밀번호 입력">
        <input type="hidden" name="post_id" id="postID">
        <input type="submit" value="확인">
    </form>
    </div>
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

      <!--
			<script type="text/javascript">
    		function boardWrite() {		
			location.href="board_write.php";    
      }  
      </script>
    -->

    <script>
  	function joinCommunity() {
			// 세션에서 로그인한 사용자의 ID 값을 가져옴
			var userId = "<?php echo $userId; ?>";

			if (userId === "") {
				// 로그인되지 않은 상태이므로 로그인 페이지로 이동
				alert("로그인이 필요한 서비스입니다");
        location.href='login.php';
				return;
			} 
			else 
			{
				// 로그인된 상태이므로 예약 정보와 함께 community_result.php로 전송
				var form = document.getElementById("communityForm");
				location.href='board_write.php';
			}
		}
    </script>

<script>
// 비밀글 모달창
var modal = document.getElementById("passwordModal");
var closeBtn = document.getElementsByClassName("close")[0];
var passwordForm = document.getElementById("passwordForm");

// 비밀번호 입력 모달 창 열기
function openModal(postID) {
    modal.style.display = "block";
    document.getElementById("postID").value = postID;
}

// 비밀번호 입력 모달 창 닫기
closeBtn.onclick = function() {
    modal.style.display = "none";
}

// 비밀번호 입력 폼 제출 시 처리
passwordForm.addEventListener("submit", function(event) {
  event.preventDefault(); // 폼 제출 동작 중단
  var formData = new FormData(passwordForm);
  
  fetch("lock_post_result.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert(data.message);
      var postID = document.getElementById("postID").value;
      window.location.href = "board_detail.php?idx=" + postID;
    } else {
      alert(data.message);
    }
  })
  .catch(error => {
    console.error("Error:", error);
  });
});
</script>


	</body>
</html>