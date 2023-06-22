<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con,'SET NAMES utf8');

$id = $_POST['user_id'];
$date = $_POST['date'];
$st_time = $_POST['startTime'];
$end_time = $_POST['endTime'];;
$seat = $_POST['seat'];
$hour = intval($_POST['hour']);
$price = intval($_POST['price']);

$statement = mysqli_prepare($con, "INSERT INTO books VALUES (null,?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($statement, "sssssii", $id, $date, $st_time, $end_time, $seat, $hour, $price);
    mysqli_stmt_execute($statement);

    echo "<script>alert('예약이 완료되었습니다');</script>"; 
    echo("<script>location.href='./mybook.php';</script>"); 

?>

