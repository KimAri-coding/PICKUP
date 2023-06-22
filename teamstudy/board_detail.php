
<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');	

  $idx = $_GET['idx'];     
                               
  $sql = "select * , com_num FROM board WHERE idx = '$idx'";
  $result = mysqli_query($con, $sql); 
  $row = mysqli_fetch_array($result);  

  $com_num = $row['com_num'];
?>



<?php
// 세션 데이터에 접근하기 위해 세션 시작
session_start();

// 로그인한 사용자의 아이디 가져오기
$userId = $_SESSION['user_id'];

// 작성자 ID 가져오기
function getAuthorId($idx) {
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con, 'SET NAMES utf8');

    $query = "SELECT writer FROM board WHERE idx = $idx";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $writerId = $row['writer'];
        return $writerId;
    }

    return null;
}

$authorId = getAuthorId($idx); // 작성자의 아이디

// 작성자와 로그인한 사용자 비교
$isAuthor = ($userId === $authorId);

// 수정 버튼 출력 여부 결정
$showEditButton = $isAuthor ? true : false;

// 삭제 버튼 출력 여부 결정
$showDeleteButton = $isAuthor ? true : false;
?>


<!-- 조회수 업데이트 -->
<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con,'SET NAMES utf8');

$idx = $_GET['idx'];
$hit = $_GET['hit'];
      
$hit += 1;
	$query  = "update board Set hit ='".$hit."'where idx ='$idx'"; 
    $result = $con->query($query);    
    
?>



<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>게시판</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		<style>
  	/* 수정 버튼 모달 창 */

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
  color: #212121;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  height: 60px;
  text-align:center;
  align-items:center;
}

.modal-button:hover {
  opacity: 0.8;
}

/* 삭제 버튼 모달 창 */

#deletePasswordModal {
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

.Cedit-button{
  border: none !important;
  width: 100px;
  height: 45px;
  font-size: 15px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  margin: 0 2px;
  cursor: pointer;
}

.Cdel-button {
  border: none !important;
  width: 100px;
  height: 45px;
  font-size: 15px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  margin: 0 2px;
  cursor: pointer;
  }

  .comment-item {
    font-weight: bold;
  }

  .button-container {
    display: inline-block;  /* 필요에 따라 inline 또는 block으로 변경 가능 */
}

.button-container button {
    display: inline-block;
    /* 버튼의 스타일을 추가로 지정 */
}
/* 상세보기 수정,삭제버튼 */
.btn_edit ,.btn_del{
  display: flex;
  justify-content: center;
  align-items: center;
  float: right;
  width: 50px;
  color: #fff ; /* !important 키워드 추가 */
  height: 40px;
  margin-top: 20px;
  text-align: center;
  line-height: 30px;
  background: #1a237e;
  border-radius: 5px;
  margin: auto;
}


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

		<!-- 아래 제목 -->
			<div id="wrapper">
				<!-- Main -->
				<section id="main" class="wrapper">
				<div class="inner">
				<h1 class="major">게시글상세보기</h1>

					<h3 > 제목: <?php echo $row['title']?></h3>
					<h3 > 작성자: <?php echo $row['writer']?></h3>
					<div class="">
					<!-- 수정 버튼 -->
          <?php if ($showEditButton): ?>
          <button type="button" class="btn_edit" onclick="openPasswordModal(<?php echo $idx; ?>)">수정</button>
          <?php endif; ?>

          <!-- 삭제 버튼 -->
          <?php if ($showDeleteButton): ?>
              <button type="button" class="btn_del" onclick="openDeleteModal(<?php echo $idx; ?>)">삭제</button>
          <?php endif; ?>
  			</div>
			<div id="submenu2_1_container1">

			<div class="sub2_1_con1_wrap">
			<div class="add_info_table_lt_view">
				<table class="add_info_tablewrap_view">
					<th colspan="2" style="box-sizing:border-box;">상세 내용</th>
					<tr>
					<td colspan="1" class="textarea">
          <p><?php echo $row['content']?></p>                               
          <?php
          // 파일이 이미지인 경우 이미지 태그를 사용하여 표시합니다.
          if ($row['file']) {
              echo '<img src="' . $row['file'] . '" alt="첨부 이미지">';
          }
          ?>
          <br><br>
      </td>

                                     
					<br><br>
					</td>
					</tr>
				</table>
					  
	
<!-- 수정버튼 비밀번호 입력 모달 -->
<div id="passwordModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closePasswordModal()">&times;</span>
    <h3>비밀번호 확인</h3>
    <input type="password" id="pwInput">
    <button class="modal-button" id="confirmButton" onclick="checkPassword(<?php echo $idx; ?>)">확인</button>
  </div>
</div>

<!-- 삭제버튼 비밀번호 입력 모달 -->
<div id="deletePasswordModal" class="modal" style="display: none;">
  <div class="modal-content">
    <span class="close" onclick="closeDeletePasswordModal()">&times;</span>
    <h3>비밀번호 확인</h3>
    <form id="deleteForm" method="POST" action="pw_check_del.php">
      <input type="hidden" name="idx" value="<?php echo $idx; ?>">
      <input type="hidden" name="com_num" value="<?php echo $com_num; ?>"> <!-- com_num 추가 -->
      <input type="password" name="pw" id="deletePwInput">
      <button type="button" class="modal-button" onclick="submitDeleteForm()">확인</button>
    </form>
  </div>
</div>



	<!-- 게시글 댓글창 -->
<div id="comment">
  <h3>댓글</h3>
  <ul id="comment-list">
    <!-- 여기에 댓글이 동적으로 추가될 것. -->
  </ul>
  <form id="comment-form">
    <textarea id="comment-input" name="content" placeholder="댓글을 입력하세요."></textarea>
    <input type="hidden" id="post_id" name = "user_id" value = "<?php echo $userId; ?>"/>
    <input type="hidden" id="content" name="content" value="<?php echo $content; ?>">
    <input type="hidden" id="com_num" name="com_num" value="<?php echo $com_num; ?>">
    <!--<input type="hidden" id="post-id" name="post-id" value=""-->
    <button type="button" onclick="submitComment()">등록</button>
  </form>
</div>

<script>
  // 페이지 로드 시 댓글 목록 불러오기
fetchComments();

// 댓글 등록
function submitComment() {
  var commentInput = document.getElementById('comment-input');
  var commentText = commentInput.value;
  var postId = document.getElementById('post_id').value;
  var comNum = document.getElementById('com_num').value; // com_num 값을 가져옴

  if (commentText.trim() !== '') {
    var formData = new FormData();
    formData.append('content', commentText);
    formData.append('post_id', postId);
    formData.append('com_num', comNum); // com_num 값을 추가

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'board_comment.php');
    xhr.onload = function() {
      if (xhr.status === 200) {
        console.log('댓글 등록 완료');
        commentInput.value = ''; // 입력란 초기화
        fetchComments();
      } else {
        console.error('댓글 등록 실패');
      }
    };
    xhr.send(formData);
  }
}

// 댓글 목록 불러오기
function fetchComments() {
  var postId = document.getElementById('post_id').value; // 게시글의 idx 값 가져오기
  var com_num = document.getElementById('com_num').value;
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'fetch_comments.php?com_num=' + encodeURIComponent(com_num));
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var comments = JSON.parse(xhr.responseText);
        displayComments(comments);
        showDeleteButton(); // 댓글 삭제 버튼 보여주기
      } else {
        console.error('댓글 목록 불러오기 실패');
      }
    }
  };
  xhr.send();
}

function displayComments(comments) {
  var commentList = document.getElementById('comment-list');
  commentList.innerHTML = ''; // 댓글 목록 초기화

  // comments 객체를 순회하면서 댓글 배열을 가져옴
  for (var comNum in comments) {
    if (comments.hasOwnProperty(comNum)) {
      var commentArr = comments[comNum];

      // 댓글 배열을 순회하면서 각각의 댓글을 출력
      commentArr.forEach(function(comment) {
        var commentItem = document.createElement('li');
        commentItem.dataset.commentId = comment.post_id;
        commentItem.dataset.content = comment.content;
        commentItem.dataset.writerId = comment.writer_id;

        var idElement = document.createElement('span');
        idElement.textContent = comment.post_id;
        idElement.style.fontWeight = 'bold';

        var contentWrapper = document.createElement('div');
        contentWrapper.style.display = "inline";
        
        var contentElement = document.createElement('span');
        contentElement.textContent = comment.content;

        var delButton = document.createElement('text');
        delButton.textContent = '삭제';
        delButton.classList.add('Cdel-button');
        delButton.style.marginLeft = '5em'; // 삭제 버튼과 내용 사이에 10px의 왼쪽 여백 추가

        // 댓글 삭제
delButton.addEventListener('click', function() {
  // 모달 창 표시
  var confirmation = confirm("삭제하시겠습니까?");

  if (confirmation) {
    // 삭제 요청을 처리할 페이지 URL
    var url = "delete_comment.php";

    // 삭제할 댓글의 식별자 가져오기
    var commentId = getCommentId();
    var content = commentItem.dataset.content;

    // 로그인한 사용자의 아이디
    var userId = "<?php echo $_SESSION['user_id']; ?>";

    // 댓글 작성자의 아이디 가져오기
    var commentAuthorId = commentItem.dataset.commentId;

    // 로그인한 사용자의 아이디와 댓글 작성자의 아이디를 비교하여 삭제 여부 결정
    if (userId === commentAuthorId) {
      // POST 요청을 위한 FormData 객체 생성
      var formData = new FormData();
      formData.append("post_id", commentId);
      formData.append("content", content);
      formData.append("com_num", comNum);

      // AJAX 요청 보내기
      var xhr = new XMLHttpRequest();
      xhr.open("POST", url, true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // 삭제 요청이 성공적으로 처리됨
          // 여기에 적절한 처리 로직을 작성하세요.
          console.log("댓글이 성공적으로 삭제되었습니다.");
          // 삭제된 댓글 화면에서 제거
          removeCommentElement(commentId);
          fetchComments();
        }
      };
      xhr.send(formData);
    } else {
      console.log("해당 댓글을 삭제할 권한이 없습니다.");
    }
  }
});

// 로그인한 사용자의 아이디와 댓글 작성자의 아이디 비교하여 삭제 버튼 표시 여부 결정
var userId = "<?php echo $_SESSION['user_id']; ?>";
var commentAuthorId = commentItem.dataset.commentId;

if (userId === commentAuthorId) {
  delButton.style.display = "inline";
} else {
  delButton.style.display = "none";
}

          contentWrapper.appendChild(contentElement);

          commentItem.appendChild(idElement);
          commentItem.appendChild(document.createTextNode(' '));
          commentItem.appendChild(contentWrapper);
          commentItem.appendChild(delButton);
          commentList.appendChild(commentItem);
      });
    }
  }
}

function getCommentId() {
  var commentItem = event.target.parentNode.dataset.commentId;
  return commentItem;
}

function removeCommentElement(commentId) {
  var commentElement = document.getElementById('comment-' + commentId);
  if (commentElement && commentElement.parentNode) {
    commentElement.parentNode.removeChild(commentElement);
  }
}

// 댓글 삭제 버튼 보여주기
function showDeleteButton() {
  var commentItems = document.getElementsByClassName('comment-item');
  for (var i = 0; i < commentItems.length; i++) {
    var commentItem = commentItems[i];
    var commentWriterId = commentItem.dataset.writerId;

    if (commentWriterId === "<?php echo $userId; ?>") {
      var deleteButton = commentItem.querySelector('.Cdel-button');
      deleteButton.style.display = 'block';
    }
  }
}


</script>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
			
		<!-- 게시글 수정 비밀번호 모달 -->
		<script type="text/javascript">
    function openPasswordModal(idx) {
    var modal = document.getElementById("passwordModal");
    modal.style.display = "block";
    document.getElementById("pwInput").value = ""; // 모달이 열릴 때마다 비밀번호 입력 필드 초기화
    document.getElementById("confirmButton").onclick = function() {
      checkPassword(idx);
    };
  }

  function closePasswordModal() {
    var modal = document.getElementById("passwordModal");
    modal.style.display = "none";
  }

  function checkPassword(idx) {
    var pw = document.getElementById('pwInput').value;
    if (pw.trim() === "") {
      alert("비밀번호를 입력하세요.");
      return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "pw_check.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
  // 비밀번호 확인이 성공한 경우 수정 화면으로 이동
  window.location.href = "board_edit.php?idx=" + idx;
  } else {
    alert(response.message);
    closePasswordModal(); // 모달 닫기
  } 

    }
    };
    xhr.send("pw=" + pw + "&idx=" + idx);
  }
</script>

		<!-- 게시글 삭제 비밀번호 모달 -->
<script type="text/javascript">
  function openDeleteModal(idx) {
    var modal = document.getElementById("deletePasswordModal");
    modal.style.display = "block";
    document.getElementById("deletePwInput").value = ""; // 모달이 열릴 때마다 비밀번호 입력 필드 초기화
    document.getElementById("deleteForm").action = "pw_check_del.php"; // 수정: idx는 hidden 필드로 전달
  }

  function closeDeletePasswordModal() {
    var modal = document.getElementById("deletePasswordModal");
    modal.style.display = "none";
  }

  function submitDeleteForm() {
    var pw = document.getElementById('deletePwInput').value;
    if (pw.trim() === "") {
      alert("비밀번호를 입력하세요.");
      return;
    }
    document.getElementById("deleteForm").submit();
  }

  // 모달 창이 바깥 영역을 클릭하면 닫히도록 처리
  window.onclick = function(event) {
    var modal = document.getElementById("deletePasswordModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
</script>


		</body>
		</html>