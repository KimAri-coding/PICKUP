<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con, 'SET NAMES utf8');

// 세션 시작
session_start();

$pw = $_POST['password'];
$idx = $_POST['post_id'];

if ($pw == "") {
  $response = array('success' => false, 'message' => '비밀번호를 입력하시오.');
  echo json_encode($response);
  return;
}

$pwCheck = false;
$query = "SELECT * FROM board WHERE pw = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $pw);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
  $pwCheck = true;
}

if (!$pwCheck) {
  $response = array('success' => false, 'message' => '비밀번호가 틀립니다.');
  echo json_encode($response);
} else {
  // 세션 변수 등록
  $_SESSION['pw_check'] = true;
  $response = array('success' => true, 'message' => '비밀번호가 일치합니다.');
  echo json_encode($response);
}
?>
