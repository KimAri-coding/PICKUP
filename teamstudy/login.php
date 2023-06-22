<!DOCTYPE HTML>
<html>
	<head> 
		<title>Generic - Hyperspace by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

	<style>

		.container {
			text-align: center;
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		.loginform input[type="text"],
				   input[type="password"]
				   {
					border: solid 1px #1a237e;
					
				   }
		.loginform label[type="text"]
				   {
					color: #1a237e;
				   }

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
			border: solid 1px #1a237e;
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
				color: #1a237e;
				text-align: center;
				margin-top: 21px;
			}

			/* 체크박스에 마우스를 올렸을 때 효과 */
			.checkbox-container:hover .checkmark {
			background-color: #ffffff;
			}

			/* 로그인 버튼 */
			.button_login {	
				width: 300px;
				height: 45px;
				font-size: 15px;
				display: flex;
				align-items:center; 
				justify-content: center;
				margin-top: -30px;
				margin-left: 10px;
				background-color: #1a237e;
			}
		</style>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script>
	//아이디저장
	$(document).ready(function(){

	//저장된 쿠기값을 가져와서 id 칸에 넣어준다 없으면 공백으로 처리
	var key = getCookie("key");
	$("#id").val(key);


	if($("#id").val() !=""){               // 페이지 로딩시 입력 칸에 저장된 id가 표시된 상태라면 id저장하기를 체크 상태로 둔다
		$("#idsave").attr("checked", true); //id저장하기를 체크 상태로 둔다 (.attr()은 요소(element)의 속성(attribute)의 값을 가져오거나 속성을 추가합니다.)
	}

	$("#idsave").change(function(){ // 체크박스에 변화가 있다면,
			if($("#idsave").is(":checked")){ // ID 저장하기 체크했을 때,
				setCookie("key", $("#id").val(), 2); // 하루 동안 쿠키 보관
			}else{ // ID 저장하기 체크 해제 시,
				deleteCookie("key");
			}
	});

		// ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
		$("#id").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
			if($("#idsave").is(":checked")){ // ID 저장하기를 체크한 상태라면,
				setCookie("key", $("#id").val(), 2); // 7일 동안 쿠키 보관
			}
		});
	});

	//쿠키 함수 
	function setCookie(cookieName, value, exdays){
		var exdate = new Date();
		exdate.setDate(exdate.getDate() + exdays);
		var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
		document.cookie = cookieName + "=" + cookieValue;
	}

	function deleteCookie(cookieName){
		var expireDate = new Date();
		expireDate.setDate(expireDate.getDate() - 1);
		document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
	}

	function getCookie(cookieName) {
		cookieName = cookieName + '=';
		var cookieData = document.cookie;
		var start = cookieData.indexOf(cookieName);
		var cookieValue = '';
		if(start != -1){
			start += cookieName.length;
			var end = cookieData.indexOf(';', start);
			if(end == -1)end = cookieData.length;
			cookieValue = cookieData.substring(start, end);
		}
		return unescape(cookieValue);
	}

	window.history.pushState(null, null, window.location.href);
	window.onpopstate = function () {
    window.history.go(1);
};
	</script>


	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a href="index.php" class="title"><img src="images/title1.png" height=""></a>
				<nav>
					<ul>
					<li><a href="index.php" onclick="closeCurrentPage()" >Home</a></li>
						<li><a href="book_intro.php" onclick="closeCurrentPage()" target="_blank">예약하기</a></li>
						<li><a href="board.php" onclick="closeCurrentPage()" target="_blank">게시판</a></li>
						<li><a href="mypage.php"onclick="closeCurrentPage()">커뮤니티</a></li>
					</ul>
				</nav>
			</header>

			<script>
		
			</script>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
                            <div class="container">
		
		<div style="text-align : center"> 
          
          <div id="main" class="wrapper">					
                  <form action="login_result.php" method="POST" class="form">
                      <div class="loginform">
                      <p><input type="text" id="id" name="id" maxlength="20" placeholder="아이디" required></p>
					  <p><input type="password" id="pw" name="pw" maxlength="20" placeholder="비밀번호" required></p>

						 
                      </div>
												<label class="checkbox-container">
												<input type="checkbox" id="idsave" name="idsave">
												<span class="checkmark"></span>
												<label type="text" for="idsave">아이디 저장</label>
												</label>  &emsp;
												<label class="checkbox-container">
												<input type="checkbox" id="auto_login" name="auto_login">
												<span class="checkmark"></span> 
												<label type="text" for="auto_login">자동로그인</label>
												</label>
											</div> 

                      <button class="button_login" type="submit" id="btn_login" style="color: white">로그인</button><br>
					  <ul>
						<a onclick="joinCheck()" class="active" style="cursor: pointer;">회원가입</a> &emsp; 
						<a onclick="loginFind()" class="favorite styled" style="cursor: pointer;" style="margin-right: 15px;">계정찾기</a>
					</ul>
                    
                      
                  </form>
          </div> 
      </div>
</div>  
    
  </div>

                        
                        </div>
					</section>

			</div>

  <script type="text/javascript">
    function joinCheck() {		
		location.href="agreement.php";    
    }  
	
	function loginFind() {		
		location.href="login_find.php";    
    }  
  </script>

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

	</body>
</html>


