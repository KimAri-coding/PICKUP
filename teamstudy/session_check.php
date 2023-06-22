<?php
session_start(); // 세션 시작

$response = array();

if (isset($_SESSION['login_check']) && $_SESSION['login_check']) {
  $response['isLoggedIn'] = true;
  $response['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : "";
} else {
  $response['isLoggedIn'] = false;
}

echo json_encode($response);
?>