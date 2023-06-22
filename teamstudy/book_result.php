<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con, 'SET NAMES utf8');

  $id = $_POST['user_id'];
  $date = $_POST['date'];
  $st_time = $_POST['startTime'];
  $end_time = $_POST['endTime'];
  $seat = $_POST['seat'];
  $hour = intval($_POST['hour']);
  $price = intval($_POST['price']);

  // 중복 예약 체크
  $query = "SELECT COUNT(*) FROM book WHERE date = ? AND seat = ? AND ((st_time <= ? AND end_time > ?) OR (st_time < ? AND end_time >= ?) OR (st_time >= ? AND end_time <= ?) OR (st_time < ? AND end_time > ?))";
  $stmt = mysqli_prepare($con, $query);
  mysqli_stmt_bind_param($stmt, "ssssssssss", $date, $seat, $st_time, $end_time, $st_time, $end_time, $st_time, $end_time, $st_time, $end_time);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $count);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);

if ($count > 0) {
    // 중복 예약이 존재하는 경우
    echo "<script>alert('중복 예약입니다. 다른 시간대를 선택해주세요.');</script>";
    echo "<script>location.href='./book.php';</script>";
} else {
    // 중복 예약이 없는 경우, 예약을 실행합니다.
    $statement = mysqli_prepare($con, "INSERT INTO book VALUES (null,?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($statement, "ssssisi",$id ,$date, $st_time, $end_time, $hour, $seat, $price);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    echo "<script>alert('예약이 완료되었습니다');</script>";
    echo "<script>location.href='./mybook.php';</script>";
}
?>