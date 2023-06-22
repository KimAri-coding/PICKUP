<?php
// 세션 데이터에 접근하기 위해 세션 시작
session_start();
$userId = $_SESSION['user_id'];
?>

<?php
        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');	

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
		<title>Generic - Hyperspace by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		<style>
			/* 체크박스 컨테이너 스타일 */
			.checkbox-container {
			display: inline-block;
			position: relative;
			padding-left: 25px;
			margin-bottom: 10px;
			cursor: pointer;
			font-size: 18px;
			text-align: center;
				float:center;
				display:center;
			align-items: flex-start;
			}

			/* 체크박스 표시 스타일 */
			.checkbox-container .checkmark {
			position: absolute;
			top: 0;
			left: 0;
			height: 20px;
			width: 20px;
			border: solid 2px #212121;
			background-color: white;
			border-radius: 0.25em;
			margin-right: 20px;
			margin-top: 24px;
			}

			/* 체크 표시 스타일 */
			.checkbox-container .checkmark:after {
			content: "";
			position: absolute;
			display: none;
			}

			/* 체크박스가 선택되었을 때 체크 표시 스타일 */
			.checkbox-container input:checked ~ .checkmark:after {
			display: block;
			}

			/* 체크 표시 아이콘 스타일 */
			.checkbox-container .checkmark:after {
			left: 6px;
			top: 2px;
			width: 5px;
			height: 10px;
			border: solid #000;
			border-width: 0 2px 2px 0;
			transform: rotate(45deg);
			}
			.checkbox-container label{
				color: #212121;
				text-align: center;
				margin-top: 21px;
			}

			/* 체크박스에 마우스를 올렸을 때 효과 */
			.checkbox-container:hover .checkmark {
			background-color: #ccc;
			}
			.user_id{
				color: #212121;
				font-weight: normal;
				padding: 5px 5px;
				text-align: left;
				float:center;
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
						<li><a href="board.php" target="_blank">게시판</a></li>
						<li><a href="elements.html">Elements</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">글쓰기</h1>
							<!-- 본문 -->
						<div class="container">	
	
	<!-- 게시판 쓰기 -->
	
	<form action="write_result.php" enctype="multipart/form-data" method="post">
	
	<div id="board_write">
		<table>
			<colgroup>
				<col width="20%">
				<col>
			</colgroup>
			<tbody>
			<tr>
					<th>작성자</th>					
					<td><label class= "user_id"><?php echo $userId; ?></label></td>
				</tr>
				<tr>
					<th>제목</th>
					<td><input type="text" name="title" id="subject" class="form-control" value="" detect="" detect-check="true"></td>
				</tr>
				<tr>	
					<td colspan="2" class="editor"><textarea name="content" rows="20" title="내용"></textarea></td>		
				</tr>
				<tr>
				<th><span>*</span>비밀번호</th>	
				<td>
					<input type="password" name="pw" class="form-control" value="" detect="" detect-check="true"></input>		
				</td>
				</tr>
				<tr>
				<th>비밀글</th>	
				<td>
				<label class="checkbox-container">
                    <input id= "in-lock" type="checkbox" value="1" name="lockpost" />
					<span class="checkmark"></span>
					<label>해당글을 잠급니다.</label>
				</label>	
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
	<!-- //게시판 쓰기 -->

	<!-- 게시판 버튼 -->
	<div class="btn_1">
	<div class="btn_2">
        <button class="btn_insert" type="submit">확인</button>
		<button class="btn_cancle" type="button" onclick="location.href='/teamstudy/board.php'; return false;">취소</button>
    </div>
	</div>
	<!-- //게시판 버튼 -->
	<input type="hidden" name="com_num" value="1">
	<input type="hidden" name="page" value="<?=$page_name?>" />
	<input type="hidden" name="answer" value="<?=$answer?>" />
	<? if($answer==1) { ?>
	<input type="hidden" name="idx" value="<?=$idx?>" />
	<?}?>
	</form>
	
</div>
<!-- //본문 -->
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

			<!-- 체크박스 -->
			<script>
				var checkbox=document.getElementById("myCheckbox")
			</script>

			<!-- 비밀글 제어 -->
			<script>
			var lockpostCheckbox = document.getElementById('lockpostCheckbox');
			lockpostCheckbox.addEventListener('change', function() {
			var postElement = document.getElementById('post');
			if (lockpostCheckbox.checked) {
				// 비밀글로 설정하는 로직을 구현합니다.
				postElement.classList.add('secret');
			} else {
				// 비밀글 설정을 해제하는 로직을 구현합니다.
				postElement.classList.remove('secret');
			}
			});
			</script>


	</body>
</html>