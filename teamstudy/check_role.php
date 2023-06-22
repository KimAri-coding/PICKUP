<?php
session_start();
$userId = $_SESSION['user_id'];

if ($userId === 'admin') {
  // id 값이 'admin'인 경우, admin_page.php로 이동
  header('Location: admin_page.php');
  exit;
} else {
  // id 값이 'admin'이 아닌 경우, 마이페이지로 이동
  header('Location: mypage.php');
  exit;
}
?>
