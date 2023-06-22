<?php
header('Content-Type: application/json');

$pw = $_POST['pw'];
$idx = $_POST['idx'];

if ($pw == "") {
  $response = array(
    'success' => false,
    'message' => '비밀번호를 입력하세요.',
  );
} else {
      $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
  mysqli_query($con, 'SET NAMES utf8');

  $pwCheck = false;
  $query = "SELECT * FROM board WHERE idx = '".$idx."'";
  $result = $con->query($query);

  while ($row = $result->fetch_assoc()) {
    if ($row['pw'] === $pw) {
      $pwCheck = true;
      break;
    }
  }

  if (!$pwCheck) {
    $response = array(
      'success' => false,
      'message' => '비밀번호가 틀립니다!',
    );
  } else {
    session_start();
    $_SESSION['pw_check'] = true;

    $response = array(
      'success' => true,
      'message' => '',
    );
  }
}

echo json_encode($response);
?>
