<?php
        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');

		//세션 시작
		session_start();
?>

<!DOCTYPE HTML>
<html>
	<head> 

		<?php
		header("Progma:no-cache");
		header("Cache-Control: no-store, no-cache ,must-revalidate");
		?>

		<title>회원가입</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
       
	   <style>	
		input[type="text"],
		input[type="password"]
				{
				border: solid 1px #1a237e;
				width: 400px;
				height: 50px;
				}

		.form-row {
			display: flex;
			align-items: left;
			margin-bottom: 12px;
		}
		.container {
			text-align: center;
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		.join-form-container {
			width: 550px;
			height: auto;
			background: #ffffff; 
			padding: 10px;
			margin-left: 5px;
			margin-bottom: 5em;
			border: 1px solid #1a237e;
		}

		.form-row {
			margin-top: 8px;
		}

		.form-row label {
			width: 200px;
			text-align: left;
			margin-left: 25px;
			margin-top: 10px;
			font-size: 1em;
		}

		.form-row select {
			width: 200px;
			margin-left: 10px;
			height: 40px;
			border: solid 1px #1a237e;
		}

		.form-row input[type="text"], 
		.form-row input[type="password"] {
			width: 230px;
			height: 40px;
		}

		.form-row button {
			margin-left: 10px;
		}

		table {
		border-collapse: separate;
		}

		.button-container {
		display: flex;
		justify-content: center;
		}

		.button_join {
		width: 100px;
		height: 45px;
		font-size: 15px;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		text-align: center;
		margin: 0 10px;
		}

		.button_join button{
			width: 100px;
			height: 45px;
			font-size: 15px;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			text-align: center;
			margin: 0 10px;
		}

    	</style>
		
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script> 
		 function updateCheckMessage(selector, color, message) {
    $(selector).empty().html(`<span style="color: ${color};">${message}</span>`);
  }

  // 아이디 유효성 검사 핸들러
  $(document).ready(function() {
    $(".check-id").on("keyup", function() {
      var self = $(this);
      var userid = self.val();

      if (userid === "") {
        updateCheckMessage('#id_check', '#4dd0e1', '아이디를 입력하시오.');
        return;
      }

      $.post(
        "join_id_check.php",
        { userid: userid },
        function(data) {
          if (data === "0") {
            updateCheckMessage('#id_check', '#1a237e', '사용가능한 아이디입니다.');
          } else if (data === "1") {
            updateCheckMessage('#id_check', '#4dd0e1', '아이디가 중복입니다.');
          } else if (data === "2") {
            updateCheckMessage('#id_check', '#4dd0e1', '6 ~ 12자 영문 대 소문자 또는 숫자를 사용하세요.');
          }
        }
      );
    });
  });

  // 비밀번호 유효성 검사 핸들러
  $(document).ready(function() {
    $(".check-pw").on("keyup", function() {
      var self = $(this);
      var pw = self.val();

      if (pw === "") {
        updateCheckMessage('#pw_check', '#4dd0e1', '비밀번호를 입력하시오.');
        return;
      }

      $.post(
        "join_pw_check.php",
        { pw: pw },
        function(data) {
          if (data === "0") {
            updateCheckMessage('#pw_check', '#1a237e', '사용가능한 비밀번호입니다.');
          } else if (data === "1") {
            updateCheckMessage('#pw_check', '#4dd0e1', '비밀번호는 영문, 숫자, 특수문자를 혼합하여 8자리 ~ 14자리 이내로 입력해주세요.');
          } else if (data === "2") {
            updateCheckMessage('#pw_check', '#4dd0e1', '비밀번호는 공백없이 입력해주세요.');
          } else if (data === "3") {
            updateCheckMessage('#pw_check', '#4dd0e1', '영문, 숫자, 특수문자를 혼합하여 입력해주세요.');
          }
        }
      );
    });
  });


		function checkReg(event) {
		const regExp = /[^0-9a-zA-Z]/g; // 숫자와 영문자만 허용
		//   const regExp = /[^ㄱ-ㅎ|가-힣]/g; // 한글만 허용
		const del = event.target;
		if (regExp.test(del.value)) {
			del.value = del.value.replace(regExp, '');
			}
		};

		function checkNum(event) {
		const regExp = /[^0-9]/g; // 숫자와 영문자만 허용
		//   const regExp = /[^ㄱ-ㅎ|가-힣]/g; // 한글만 허용
		const del = event.target;
		if (regExp.test(del.value)) {
			del.value = del.value.replace(regExp, '');
			}
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

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<h1 class="major">회원가입</h1>					
				</div>
			</section>
			
			<div class="container">
				<div class="join-form-container">
			
						<form method="POST" onsubmit="retrun idCheck()" action="join_result.php" >
						<div class="form-row">
							<label style="font-size: 1em;">아이디</label>
							<input type="text" onkeyup="checkReg(event)" class="check-id" style="margin-left:20px;" size="20" id="userid" name="id" required>
						</div>
						
						<div id="id_check" style="font-size: 15px; margin-left:8em; margin-bottom: 5px;"></div>

						<div class="form-row">
							<label style="text-align: left;">비밀번호</label>
							<input type="password" class="check-pw" style="margin-left:20px;" size="20" id="pw" name="pw" required>
					    </div>
						<div id="pw_check" style="font-size: 15px; margin-left:8em; margin-bottom: 5px;">
						</div>
						<div class="form-row">
							<label style="text-align: left;">비밀번호 확인</label>
							<input type="password" style="margin-left:20px;" size="20" name="pw_r" required>
						</div>
						<div class="form-row">
							<label>이름</label>
							<input type="text" style="margin-left:20px;" name="name" value="">
						</div>

						<div class="form-row">
							<label>연락처</label>
							<input type="text" style="margin-left:20px;" onkeyup="checkNum(event)" name="hp" value="">
						</div>
						
						<div class="form-row">
							<label>이메일</label>
						</div>
						<div class="form-row" style="justify-content: space-between;">			
							<input type="text" style="width: 150px;" onkeyup="checkReg(event)" size="15" id="email_id" name="email_id">
							&nbsp;<label>@</label>&nbsp;
							<input type="text" style="width: 150px;" onkeyup="checkReg(event)" size="15" id="email_domain" name="email_domain">
							<select name="email" style="width: 150px;" onclick="setEmailDomain(this.value); return false;">
								<option value="">선택</option>
								<option value="naver.com">naver.com</option>
								<option value="google.com">google.com</option>
								<option value="daum.net">daum.net</option>
								<option value="">직접입력</option>
							</select>
						</div>

			
						<br>
						<span class="button_join">
										<button type="submit" style="background-color: #1a237e; color: white;">가입하기</button>
										<button type="button" onClick="history.back(-1)">취소</button>&nbsp;
										</span>
						</form>
					</div>
			</div>
      <!-- 게시판영역 종료-->

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


			<script type="text/javascript">
				function idCheck() {
					var id = document.getElementById('joinId').value;		
					location.href="./id_check.php?id="+id;
				//alert(name);
				}  
			</script>
	</body>
</html>

<script>
	//이메일 입력
  var email_rule =  /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
  $(function() {
  $("#email_domain_select").change(function() {
    var selected_domain = $(this).val();
    setEmailDomain(selected_domain);
  });
});

function setEmailDomain(domain){
  if (domain === '') {
    $('#email_domain').val('');
    return;
  }
  $("#email_domain").val(domain);
}

function validateEmail() {
  var email_id = $("#email_id").val();
  var email_domain = $("#email_domain").val();
  var mail = email_id + "@" + email_domain;
  
  if(!email_id) {
    alert("이메일을 입력해주세요");
    $("#email_id").focus();
    return false;
  }
  
  if(!email_domain) {
    alert("도메인을 입력해주세요");
    $("#email_domain").focus();
    return false;
  }
  
  if(!email_rule.test(mail)) {
    alert("이메일을 형식에 맞게 입력해주세요.");
    return false;
  }
  
  $("#mail").val(mail);
  return true;
}

</script>
