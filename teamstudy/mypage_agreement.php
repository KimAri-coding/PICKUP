<?php
    session_start();

    // 로그인 여부 확인
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('서비스를 이용하기 위해서는 로그인이 필요합니다.');</script>";
        echo "<script>location.href='./mypage_login.php';</script>";
        exit; 
    }
    
    $userId = $_SESSION['user_id'];
    
?>


<!DOCTYPE HTML>
<html>
	<head> 

		<title>개인정보이용</title>
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
        width: 570px;
          height: 150px;
          background-color: white;
          overflow: scroll;
          border: 2px solid;
        font-size:13px;
      }

      p{
      text-align: left;
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

  </head>
	<body class="is-preload">

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

		<!-- Main -->
    <div id="wrapper">
			<section id="main" class="wrapper">
				<div class="inner">
					<h1 class="major">개인정보이용</h1>					
				</div>
			</section>
			
    <div class="div_in" style="text-align: center">
      <div class="div_main" >

        <div style="text-align: -webkit-center;">

      <ul class="terms__list">
      <li class="terms__box">
        <div class="input__check">
            <label style="font-size: 25px;">서비스 이용약관</label>
        </div>
          <div class="div_scroll">
            <p>여러분을 환영합니다. PICKUP스터디카페 서비스 및 제품(이하 ‘서비스’)을 이용해 주셔서 감사합니다. 본 약관은 다양한 PICKUP스터디카페
              서비스의 이용과 관련하여 서비스를 제공하는 PICKUP스터디카페(이하 ‘피크업’)와 이를 이용하는 피크업 서비스
              회원(이하 ‘회원’) 또는 비회원과의 관계를 설명하며, 아울러 여러분의 피크업 서비스 이용에 도움이 될 수 있는
              유익한 정보를 포함하고 있습니다. 피크업 서비스를 이용하시거나 피크업 서비스 회원으로 가입하실 경우 여러분은 본
              약관 및 관련 운영 정책을 확인하거나 동의하게 되므로, 잠시 시간을 내시어 주의 깊게 살펴봐 주시기 바랍니다.</p>
          </div>
      </li><br><br>
    
        <li class="terms__box">
        <div class="input__check">
            <label style="font-size: 25px;">개인정보 수신 동의</label>
        </div>
          <div class="div_scroll">
            <p>개인정보보호법에 따라 피크업에 회원가입 신청하시는 분께 수집하는 개인정보의 항목, 개인정보의 수집 및
              이용목적, 개인정보의 보유 및 이용기간, 동의 거부권 및 동의 거부 시 불이익에 관한 사항을 안내 드리오니
              자세히 읽은 후 동의하여 주시기 바랍니다.1. 수집하는 개인정보 이용자는 회원가입을 하지 않아도 정보 검색,
              뉴스 보기 등 대부분의 피크업 서비스를 회원과 동일하게 이용할 수 있습니다. 이용자가 메일, 캘린더, 카페,
              블로그 등과 같이 개인화 혹은 회원제 서비스를 이용하기 위해 회원가입을 할 경우, 피크업는 서비스 이용을
              위해 필요한 최소한의 개인정보를 수집합니다.</p>
          </div>
        </li><br><br>


        <li class="terms__box">
        <div class="input__check">
            <label style="font-size: 25px;">정보수신동의</label>
        </div>
          <div class="div_scroll">
            <p>피크업에서 제공하는 이벤트/혜택 등 다양한 정보를 휴대전화(피크업 앱 알림 또는 문자), 이메일로 받아보실 수
                    있습니다. 일부 서비스(별도 회원 체계로 운영하거나 피크업 가입 이후 추가 가입하여 이용하는 서비스 등)의
                    경우, 개별 서비스에 대해 별도 수신 동의를 받을 수 있으며, 이때에도 수신 동의에 대해 별도로 안내하고
                    동의를 받습니다.</p>
          </div>
        </li><br>
        </ul>
        <button type="button" class="next-button" onClick="history.back(-1)">확인</button>
        </form>

        </div>
    </div>
</div>
</div>
      <!-- 게시판영역 종료-->


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