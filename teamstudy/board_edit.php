<?php
        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');	
	
//세션 데이터에 접근하기 위해 세션 시작
if (!session_id()) {
	session_start();
  }


  $idx = $_GET['idx'];                                             
  $sql = "select * from board where idx ='$idx'"; 
  
  $result = mysqli_query($con, $sql); 
  $row = mysqli_fetch_array($result);  

?>
<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>PICKUP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		<style>
			
		</style>
	</head>
	<body class="is-preload">

		<!-- 헤더 -->
			<header id="header">
				<a href="index.php" class="title"><img src="images/title1.png" height=:auto></a>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="book.php" target="_blank">예약하기</a></li>
						<li><a href="board.php" target="_blank">게시판</a></li>
						<li><a href="mypage.php">마이페이지</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
		<div id="wrapper">

		<!-- Main -->
		<section id="main" class="wrapper">
		<div class="inner">
			<h1 class="major">글 수정</h1>
			<!-- 본문 -->
		<div class="container">	
	<form action="board_edit_result.php" enctype="multipart/form-data" method="post">
	<div id="board_write">
		<table>
			<colgroup>
				<col width="20%">
				<col>
			</colgroup>
			<tbody>
			<tr>
					<th>작성자</th>					
					<td><input type="text" name="writer" class="form-control" value="<?php echo $row['writer']?>" detect="" detect-check="true" readonly="true"></td>
				</tr>
				<tr>
					<th>제목</th>
					<td><input type="text" name="title" id="subject" class="form-control" value="<?php echo $row['title']?>" detect="" detect-check="true"></td>
				</tr>
				<tr>
					<td colspan="2" class="editor"><textarea name="content" rows="20" title="내용"><?php echo $row['content']?></textarea></td>
				</tr>
				<tr>
				<th>비밀번호</th>	
				<td>
					<input type="text" name="pw" class="form-control" value="" detect="" detect-check="true"></input>		
				</td>
				</tr>
				<tr>
					<th>첨부파일</th>
					<td>
						<div class="file_box">
						<input type="file" id="uploadBtn" value="1" name="b_file" class="uploadBtn"></input>
								
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- 수정대상 글 idx 보내기 -->
	<input type="hidden" id="idx" name="idx" value="<?php echo $row['idx']?>">

	<!-- //게시판 쓰기 -->
	<div class="btn_1">
	<div class="btn_2">
    <button type="submit" class="btn_edit_ok" return false;> 수정</button> 
    <button type="button" class="btn_edit_cancle" onclick="location.href='/teamstudy/board.php'; return false;"> 취소</button>  
	<br><br><br><br><br>
	</div>
	</div>
</form>
</div>
</section>
</div>
</div>
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