<?php
session_start();
if (!isset($_SESSION['user_id'])) {
}

    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM member WHERE id='$id'";
$res = mysqli_fetch_array(mysqli_query($con, $sql));
?>

<!DOCTYPE HTML>
<html>
	<head> 

		<?php
		header("Progma:no-cache");
		header("Cache-Control: no-store, no-cache ,must-revalidate");
		?>

		<title>회원정보관리</title>
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
			align-items: center;
			margin-bottom: 12px;
		}
		.container {
			text-align: center;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		.form-row label {
			width: 200px;
			text-align: right;
			margin-right: 15px;
		}

		.form-row select {
			width: 200px;
			margin-left: 10px;
			height: 40px;
		}

		.form-row input[type="text"] 
					   [type="password"]
		{
			width: 300px;
			height: 40px;
		}

		.form-row button {
			width: 150px;
			height: 45px;
			font-size: 15px;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			text-align: center;
			margin: 0 10px;
			}

		table {
		border-collapse: separate;
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
            updateCheckMessage('#pw_check', '#4dd0e1', '비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 8자리 ~ 최대 14자리 이내로 입력해주세요.');
          } else if (data === "2") {
            updateCheckMessage('#pw_check', '#4dd0e1', '비밀번호는 공백없이 입력해주세요.');
          } else if (data === "3") {
            updateCheckMessage('#pw_check', '#4dd0e1', '영문, 숫자, 특수문자를 혼합하여 입력해주세요.');
          }
        }
      );
    });
  });

  		//문자 제어
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

		function btn() {		
                location.href="mypage.php";    
            }  

			function change_pw() {
				document.getElementById("pw").readOnly = false;
				document.getElementById("pw").style.background = "white";
				document.getElementById("pw_r").readOnly = false;
				document.getElementById("pw_r").style.background = "white";
				document.getElementById("pw_button").setAttribute("onclick", "decide_pw()");
			}
			function decide_pw() {
				document.getElementById("submit").readOnly = false;
				document.getElementById("pw2").value = document.getElementById("pw").value;
			}


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
					<h1 class="major">개인정보관리</h1>					
				</div>
			</section>
			
			<div class="container">

						<form method="POST" onsubmit="retrun idCheck()" action="member_edit.php" >
						<div class="form-row">
							<label style="text-align: right;">아이디</label>
							<input type="text" onkeyup="checkReg(event)" class="check-id" value="<?=$res['id']?>" style="width: 250px; margin-bottom: 0;" size="20" id="userid" name="id" disabled>
						</div>
						
						<div id="id_check" style="font-size: 15px;"></div>

						<div class="form-row">
							<label style="text-align: right;">비밀번호</label>
							<input type="password" class="check-pw" value="<?=$res['pw']?>" style="background: #EAEAEA; width: 250px; margin-bottom: 2px;" size="20" id="pw" name="pw" readonly>
							<button style="button_join" type="button" id="pw_button" value="비밀번호 변경" onclick="change_pw();">비밀번호 변경</button>
					    </div>
						<div id="pw_check" style="font-size: 15px;  margin-left: 220px; margin-top:-5px; margin-bottom: 4px; text-align:left;">
						</div>
						<div class="form-row">
							<label style="text-align: right;">비밀번호 확인</label>
							<input type="password" value="<?=$res['pw']?>" style="background: #EAEAEA; width: 250px; margin-bottom: 2px;" size="20" id="pw_r" name="pw_r" readonly>
						</div>
						<div class="form-row">
							<label>이름</label>
							<input type="text" value="<?=$res['name']?>" style="width: 250px" name="name" >
							<input type=hidden name=name2 id=name2 value="<?=$res['name']?>">
						</div>

						<div class="form-row">
							<label>연락처</label>
							<input type="text" value="<?=$res['hp']?>" style="width: 250px" onkeyup="checkNum(event)" name="hp">
						</div>
						
						<div class="form-row">
									<label>이메일</label>
                                    <?php
                                    // explode("기준 문자", "어떤 문장에서");
                                    $email = explode("@", $res["email"]);
                                    $email_id = $email[0];
                                    $email_domain = $email[1];
                                    ?>

                                    <input type="text" value="<?php echo $email_id; ?>" style="width: 250px" onkeyup="checkReg(event)" size="15" id="email_id" name="email_id">
                                    &nbsp; @ &nbsp;
                                    <input type="text" value="<?php echo $email_domain; ?>" style="width: 250px" onkeyup="checkReg(event)" size="15" id="email_domain" name="email_domain">
										<select name="email" style="width: 250px" onclick="setEmailDomain(this.value); return false;">
                                            <option value="">선택</option>
                                            <option value="naver.com">naver.com</option>
											<option value="google.com">google.com</option>
											<option value="daum.net">daum.net</option>
                                            <option value="">직접입력</option>
										</select>
						</div>

			
						<br>
										<span class="button_join">
											<button type="submit" style="background-color: #1a237e; color: white; margin-top:10px;">수정완료</button>
											<button type="button" class="button_join" onClick="btn()">취소</button>&nbsp;
										</span>
						</form>
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
