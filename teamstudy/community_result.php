<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con,'SET NAMES utf8');

$id = $_POST['id']; // together 테이블의 id

$user_id = $_POST['user_id']; // community 테이블에 저장될 user_id
$date = $_POST['date'];
$st_time = $_POST['startTime'];
$end_time = $_POST['endTime'];
$seat = $_POST['seat'];
$price = $_POST['price'];
$hour = $_POST['hour'];
$title = $_POST['title'];

// 예약 정보에 따라 가격(price) 계산
$price_result = 0;

if ($seat === 'Share4') {
    $price_result = $price/4;
} elseif ($seat === 'Share6') {
    $price_result = $price/6;
} elseif ($seat === 'Share8') {
    $price_result = $price/8;
}

$statement = mysqli_prepare($con, "INSERT INTO community VALUES (null,?,?,?,?,?,?,?,?)");
mysqli_stmt_bind_param($statement, "ssssssss", $user_id, $date, $st_time, $end_time, $seat, $hour, $price_result, $title);
mysqli_stmt_execute($statement);

// together 테이블의 count 값 감소
$update_statement = mysqli_prepare($con, "UPDATE together SET count = count - 1 WHERE id = ? AND date = ? AND title = ?");
mysqli_stmt_bind_param($update_statement, "sss", $id, $date, $title);
mysqli_stmt_execute($update_statement);

echo "<script>alert('참여가 완료되었습니다');</script>";
echo("<script>location.href='./community.php';</script>"); 

?>