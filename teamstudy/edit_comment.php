<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con, 'SET NAMES utf8');

$comment_id = $_POST['comment_id'];
$edited_content = $_POST['edited_content'];

// 값 확인
echo "comment_id: " . $comment_id . "<br>";
echo "edited_content: " . $edited_content . "<br>";

$update_query = "UPDATE comment SET content=? WHERE post_id=?";

$statement = mysqli_prepare($con, $update_query);
mysqli_stmt_bind_param($statement, "ss", $edited_content, $comment_id);

$result = mysqli_stmt_execute($statement);
if ($result) {
    echo "success"; // 성공한 경우 "success"를 반환합니다.
} else {
    echo "failure"; // 실패한 경우 "failure"를 반환합니다.
}

mysqli_stmt_close($statement);
mysqli_close($con);
?>
