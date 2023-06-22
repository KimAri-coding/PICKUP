<!DOCTYPE HTML>
<html>
	<head> 

		<title>회원가입</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
       
	   <style>	
      .div_in{
        text-align: center;
			display: flex;
			flex-direction: column;
			align-items: center;
      }

      .div_main{
          position: relative;
          width: 116%;
          height: 100%;
          padding-top: 1px;
      }

      .div_scroll {
        width: 536px;
          height: 110px;
          background-color: white;
          overflow: scroll;
          border: 2px solid;
        font-size:13px;
      }

      p{
      text-align: left;
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

      li{
      list-style:none;
      }

   .button-container {
      display: flex;
      justify-content: center;
    }

    .next-button {
      width: 100px;
      height: 45px;
      font-size: 15px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      margin: 0 10px;
    }

    .next-button button {
      width: 100%;
    }
    </style>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $(document).ready(function() {
      // 모두 동의 체크박스
      const checkAll = $("#checkAll");

      // 필수 동의 체크박스들
      const serviceCheckbox = $("#service");
      const privacyCheckbox = $("#privacy");

      // 확인 버튼
      const submitButton = $(".next-button");

      // 모두 동의 체크박스 상태 변경 시 이벤트 처리
      checkAll.change(function() {
        $(".input__check input").prop("checked", checkAll.prop("checked"));
        toggleSubmitButton();
      });

      // 필수 동의 체크박스 상태 변경 시 이벤트 처리
      serviceCheckbox.change(toggleSubmitButton);
      privacyCheckbox.change(toggleSubmitButton);

      // 체크박스 상태에 따라 확인 버튼 활성화/비활성화 처리
      function toggleSubmitButton() {
        submitButton.prop("disabled", !serviceCheckbox.prop("checked") || !privacyCheckbox.prop("checked"));
      }
    });

    function btnJoin() {		
		location.href="/teamstudy/join.php";    
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
					<h1 class="major">회원가입</h1>					
				</div>
			</section>
			
 <div class="div_in" style="text-align: center">
  <div class="div_main" >

    <div style="text-align: -webkit-center;">
      <h2 style="font-size: 35px;">회원가입 약관동의</h2>
      
      <form action="/" method="POST" id="form__wrap">
      <div class="terms__check__all">
      <label class ="checkbox-container" for="checkAll">
        <input type="checkbox" name="checkAll" id="checkAll">
        <span class="checkmark"></span>
        <label style="padding-right: 356px;">모두 동의합니다</label>
      </label>
    </div>

  <ul class="terms__list">
   <li class="terms__box">
    <div class="input__check">
    <label class="checkbox-container" for="service">
        <input type="checkbox" name="service" id="service" value="service" required />
        <span class="checkmark"></span>
        <label style="padding-right: 356px;">서비스 이용약관<text style="font-size: 12px;color: red;">(필수)</text></label>
    </label>
    </div>
      <div class="div_scroll">
        <p>여러분을 환영합니다. PICKUP스터디카페 서비스 및 제품(이하 ‘서비스’)을 이용해 주셔서 감사합니다. 본 약관은 다양한 PICKUP스터디카페
           서비스의 이용과 관련하여 서비스를 제공하는 PICKUP스터디카페(이하 ‘피크업’)와 이를 이용하는 피크업 서비스
           회원(이하 ‘회원’) 또는 비회원과의 관계를 설명하며, 아울러 여러분의 피크업 서비스 이용에 도움이 될 수 있는
           유익한 정보를 포함하고 있습니다. 피크업 서비스를 이용하시거나 피크업 서비스 회원으로 가입하실 경우 여러분은 본
           약관 및 관련 운영 정책을 확인하거나 동의하게 되므로, 잠시 시간을 내시어 주의 깊게 살펴봐 주시기 바랍니다.</p>
      </div>
   </li>
 
    <li class="terms__box">
    <div class="input__check">
     <label class="checkbox-container" for="privacy">
        <input type="checkbox" name="privacy" id="privacy" value="privacy" required />
        <span class="checkmark"></span>
        <label style="padding-right: 330px;">개인정보 수신 동의<text style="font-size: 12px;color: red;">(필수)</text></label>
      </label>
    </div>
      <div class="div_scroll">
        <p>개인정보보호법에 따라 피크업에 회원가입 신청하시는 분께 수집하는 개인정보의 항목, 개인정보의 수집 및
           이용목적, 개인정보의 보유 및 이용기간, 동의 거부권 및 동의 거부 시 불이익에 관한 사항을 안내 드리오니
           자세히 읽은 후 동의하여 주시기 바랍니다.1. 수집하는 개인정보 이용자는 회원가입을 하지 않아도 정보 검색,
           뉴스 보기 등 대부분의 피크업 서비스를 회원과 동일하게 이용할 수 있습니다. 이용자가 메일, 캘린더, 카페,
           블로그 등과 같이 개인화 혹은 회원제 서비스를 이용하기 위해 회원가입을 할 경우, 피크업는 서비스 이용을
           위해 필요한 최소한의 개인정보를 수집합니다.</p>
      </div>
     </li>


     <li class="terms__box">
     <div class="input__check">
      <label class="checkbox-container" for="promotion">
        <input type="checkbox" name="promotion" id="promotion" value="promotion">
        <span class="checkmark"></span>
        <label style="padding-right: 373px;">정보수신동의<text style="font-size: 12px;">(선택)</text></label>
      </label>
    </div>
      <div class="div_scroll">
        <p">피크업에서 제공하는 이벤트/혜택 등 다양한 정보를 휴대전화(피크업 앱 알림 또는 문자), 이메일로 받아보실 수
                있습니다. 일부 서비스(별도 회원 체계로 운영하거나 피크업 가입 이후 추가 가입하여 이용하는 서비스 등)의
                경우, 개별 서비스에 대해 별도 수신 동의를 받을 수 있으며, 이때에도 수신 동의에 대해 별도로 안내하고
                동의를 받습니다.</p>
      </div>
    </li>
    </ul>
    
    <button type="button" class="next-button" style="background-color: #1a237e; color: white" disabled onclick="btnJoin()">확인</button>
    <button type="button" class="next-button" onClick="history.back(-1)">취소</button>
    </form>

    </div>
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

      </body>
</html>