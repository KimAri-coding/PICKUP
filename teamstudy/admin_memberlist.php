<?php
//세션 데이터에 접근하기 위해 세션 시작
session_start();
$userId = $_SESSION['user_id'];	
$userRole = $_SESSION['role'];

// admin일 경우 admin_page로 이동
if ($userRole === 'admin') {
  header("Location: admin_page.php");
  exit;
}
?>

<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');	

$page = (isset($_GET["page"]) && $_GET["page"]) ? $_GET["page"] : 1;


if (empty($page)) { $page = 1; }

$select_query = "select COUNT(*) as size FROM member";        
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
        <a class='page-link' href='./teamstudy/board.php?page=".($startPage - 1)."' aria-label='Previous'>
            <span aria-hidden='true'>&laquo;</span>
        </a>";
}

if ($currentBlock < $totalBlockCount) {
    $nextBlock = "
        <a class='page-link' href='./teamstudy/board.php?page=".($endPage + 1)."' aria-label='Next'>
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
      
      #board_list_table > li > ul > li:first-child {
        width: 10%;
      } /*번호*/
      #board_list_table > li > ul > li:first-child + li {
        width: 25%;
      } /*아이디*/
      #board_list_table > li > ul > li:first-child + li + li {
        width: 20%;
      } /*이름*/
      #board_list_table > li > ul > li:first-child + li + li + li {
        width: 20%;
      } /*연락처*/
      #board_list_table > li > ul > li:first-child + li + li + li + li {
        width: 25%;
      } /*이메일*/
    
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
				<li><a href="board.php">커뮤니티</a></li>
				</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">회원목록</h1>
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
                                <li>아이디</li>
								                <li>이름</li>
                                <li>연락처</li>
                                <li>이메일</li>								
                            </ul>
                        </li>
                        <!-- 게시 정보 반복 출력구간 -->
                        <?php	
						$query = "select * FROM member ORDER BY idx desc LIMIT $start, $listSize";
						$result = $con->query($query);		
						while($row = $result->fetch_assoc())
						{
						?>   
                        <li>
                           <ul>
                                <li><?=$row["idx"]?></li>
                                <li ><?=$row["id"]?></li>                               
                                <li><?=$row["name"]?></li>
                                <li><?=$row["hp"]?></li>
								<li><?=$row["email"]?></li>
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
							
						<div style="font-size:0.8em;color:#005b91; ">◀</div>
						<?php									
						for ($i = $startPage; $i <= $endPage; $i++) {
							$active = $page == $i ? "disabled" : "";
							echo "<div class='pagingbox'><a  ".$active."' href='./board.php?page=".$i."'>".$i."</a></div>";
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

	</body>
</html>