<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con, 'SET NAMES utf8');

$date = isset($_GET['date']) ? $_GET['date'] : '';
$seat = isset($_GET['seat']) ? $_GET['seat'] : '';
$startTime = isset($_GET['startTime']) ? $_GET['startTime'] : '';
$endTime = isset($_GET['endTime']) ? $_GET['endTime'] : '';

$response = array();
$response['allowBooking'] = true;

// 중복 예약 확인 쿼리를 실행합니다.
$overlapStatement = mysqli_prepare($con, "SELECT COUNT(*) FROM together WHERE date = ? AND seat = ? AND ((st_time <= ? AND end_time > ?) OR (st_time < ? AND end_time > ?) OR (st_time < ? AND end_time <= ?) OR (st_time >= ? AND end_time <= ?))");
mysqli_stmt_bind_param($overlapStatement, "ssssssssss", $date, $seat, $endTime, $startTime, $startTime, $endTime, $startTime, $endTime, $startTime, $endTime);
mysqli_stmt_execute($overlapStatement);
mysqli_stmt_bind_result($overlapStatement, $overlapCount);
mysqli_stmt_fetch($overlapStatement);
mysqli_stmt_close($overlapStatement);

if ($overlapCount > 0) {
  // 중복 예약이 있는 경우
  $response['allowBooking'] = false;
}

echo json_encode($response);
?>