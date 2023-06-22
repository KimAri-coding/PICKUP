<?php
session_start();

// 세션에서 로그인한 사용자의 ID 값을 가져옴
$userId = $_SESSION['user_id'];

    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con, 'SET NAMES utf8');

// 요청 본문에서 데이터 읽어오기
$requestData = json_decode(file_get_contents('php://input'), true);

$tab = $requestData['tab'];
$date = $requestData['date'];
$seat = $requestData['seat'];
$hour = $requestData['hour'];
$price = $requestData['price'];

// 탭 메뉴 값에 따라 테이블 이름 지정
$tablename = "";
if ($tab == "book-list") {
    $tablename = "book";
} else if ($tab == "books-list") {
    $tablename = "books";
} else if ($tab == "together-list") {
    $tablename = "together";
} else if ($tab == "community-list") {
    $tablename = "community";
}

$query = "DELETE FROM $tablename WHERE id = ? AND date = ? AND seat = ? AND hour = ? AND price = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("sssss", $userId, $date, $seat, $hour, $price);
$stmt->execute();

$response = array();
if ($stmt->affected_rows > 0) {
    $response['success'] = true;
    $response['message'] = '정상적으로 삭제되었습니다.';
} else {
    $response['success'] = false;
    $response['message'] = '삭제 시 오류가 발생했습니다. 관리자에게 문의해주세요.';
}

// JSON 형식으로 응답 반환
header('Content-Type: application/json');
echo json_encode($response);
?>
